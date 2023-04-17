<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index() {
      return redirect()->route('order-filter', ['data_id' => 10]);
    }

    public function getDataFilter($dataId) {
      $dataOrders = DB::table('orders')
        ->join('delivery_status', 'orders.delivery_id', '=', 'delivery_status.delivery_id')
        ->join('payment_status', 'orders.payment_id', '=', 'payment_status.payment_id')
        ->join('order_status', 'orders.status_id', '=', 'order_status.status_id')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->where('orders.status_id', '=', $dataId)
        ->select('orders.*',
          'order_status.status_name',
          'order_status.status_desc',
          'delivery_status.delivery_status',
          'delivery_status.delivery_desc',
          'payment_status.payment_status',
          'payment_status.payment_desc',
          'users.last_name',
          'users.first_name',
        )
        ->get();
      $totalPrice = DB::table('orders')
        ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
        ->select(DB::raw('SUM(order_details.price * order_details.quantity) AS totalPrice'))
        ->groupBy('order_details.order_id')
        ->get();

//      dd($dataOrders, $totalPrice);
      // them tong tien vao moi don hang
      for ($i = 0; $i < $dataOrders->count(); $i++) {
        $dataOrders[$i]->{'totalPrice'} = $totalPrice[$i]->totalPrice;
      }

      return $dataOrders;
    }

  public function filter($dataId) {
    if ($dataId == 10) {
      $dataOrders = DB::table('orders')
        ->join('delivery_status', 'orders.delivery_id', '=', 'delivery_status.delivery_id')
        ->join('payment_status', 'orders.payment_id', '=', 'payment_status.payment_id')
        ->join('order_status', 'orders.status_id', '=', 'order_status.status_id')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.*',
          'order_status.status_name',
          'order_status.status_desc',
          'delivery_status.delivery_status',
          'delivery_status.delivery_desc',
          'payment_status.payment_status',
          'payment_status.payment_desc',
          'users.last_name',
          'users.first_name',
        )
        ->orderBy('orders.order_id')
        ->get();
      $totalPrice = DB::table('orders')
        ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
        ->select(DB::raw('SUM(order_details.price * order_details.quantity) AS totalPrice'))
        ->groupBy('orders.order_id')
        ->get();

//      dd($dataOrders, $totalPrice);
      // them tong tien vao moi don hang
      for ($i = 0; $i < $dataOrders->count(); $i++) {
        $dataOrders[$i]->{'totalPrice'} = $totalPrice[$i]->totalPrice;
      }

    } else {
      $dataOrders = $this->getDataFilter($dataId);
    }

    // tong so luong cac don hang
    $totalNewOrders = Order::all()->count();
    $totalOrderWaiting = DB::table('orders')
      ->where('status_id', '=', 0)
      ->count();
    $totalOrderConfirmed = DB::table('orders')
      ->where('status_id', '=', 4)
      ->count();
    $totalOrderCompleted = DB::table('orders')
      ->where('status_id', '=', 2)
      ->count();
    $totalOrderCanceled = DB::table('orders')
      ->where('status_id', '=', 3)
      ->count();

    return view('admin.orders.order',
      compact(
        'dataOrders',
        'totalNewOrders',
        'totalOrderWaiting',
        'totalOrderConfirmed',
        'totalOrderCompleted',
        'totalOrderCanceled',
      )
    );
  }

  public function orderDetail($orderId) {
//       dd($orderId);
        //
    $order = DB::table('orders')
      ->join('delivery_status', 'orders.delivery_id', '=', 'delivery_status.delivery_id')
      ->join('payment_status', 'orders.payment_id', '=', 'payment_status.payment_id')
      ->join('order_status', 'orders.status_id', '=', 'order_status.status_id')
      ->join('users', 'orders.user_id', '=', 'users.id')
      ->where('orders.order_id', '=', $orderId)
      ->select(
        'orders.*',
        'users.last_name', 'users.first_name', 'users.user_address', 'users.phone_number',
        'order_status.status_name',
        'delivery_status.delivery_status',
        'payment_status.payment_status'
      )
      ->orderBy('orders.order_id')
      ->first();

    $orderDetails = DB::table('order_details')
      ->join('orders', 'order_details.order_id', '=', 'orders.order_id')
      ->where('order_details.order_id', '=', $orderId)
      ->get();
//    dd($orderDetails);

    $productDetails = [];
    foreach ($orderDetails as $key => $orderDetail) {
      if ($orderDetail->category_id == 1) {
        $productDetails[$key] = DB::table('fish')
          ->join('order_details', 'fish.fish_id', '=', 'order_details.product_id')
          ->where('product_id', '=', $orderDetail->product_id)
          ->select(
            'fish.fish_link_img as link_img', 'fish.fish_name as name',
            'order_details.quantity', 'order_details.price'
          )
          ->first();
      } else {
        $productDetails[$key] = DB::table('accessories')
          ->join('order_details', 'accessories.accessories_id', '=', 'order_details.product_id')
          ->where('order_details.product_id', '=', $orderDetail->product_id)
          ->whereRaw('order_id = ?', [$orderDetail->order_id])
          ->select(
            'accessories.accessories_link_img as link_img', 'accessories.accessories_name as name',
            'order_details.quantity', 'order_details.price'
          )
          ->first();
      }
    }
    $totalPrice = 0;
    foreach ($productDetails as $product) {
      $totalPrice += ($product->quantity * $product->price);
    }
    return view('admin.orders.order-detail', compact('order', 'productDetails', 'totalPrice'));
  }

  public function searchOrder(Request $request) {
      dd($request);
  }

  public function confirmOrder(Request $request) {
    $orderId = $request->input('order_id');
    dd($orderId);

    DB::table('orders')
      ->where('order_id', '=', $orderId)
      ->update([
        'status_id' => 1
      ]);

    Session::flash('confirm-success', 'Xác nhận đơn hàng thành công.');
    return redirect()->route('order-filter', ['data_id' => 0]);
  }

  public function confirmAllOrder(Request $request) {
      $data = $request->all();
      $url = route('order-filter', ['data_id' => 0]);
      Session::flash('confirm-success', 'Xác nhận đơn hàng thành công.');
      return response()->json(['url' => $url]);
  }

  public function deleteOrder(Request $request) {
    $data = $request->all();

//    dd($data);
    $url = route('order-filter', ['data_id' => 3]);
    return response()->json(['url' => $url]);
  }

}
