<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function getOrderQuantityByStatus() {
      $orderQuantityByStatus = array();
      $numberStatus = DB::table('order_status')
        ->select('status_id', 'status_name')
        ->get();

      $orderQuantityByStatus[10]['Tất cả'] = Order::all()->where('status_id', '!=', 5)->count();

      foreach($numberStatus as $key => $status) {
        $orderQuantityByStatus[$status->status_id][$status->status_name] = DB::table('orders')
          ->where('status_id', '=', $key)
        ->count();
      }
      return $orderQuantityByStatus;
    }

    public function index() {
      return redirect()->route('order-filter', ['data_id' => 10]);
    }

    public function newOrderNotify() {
      $newOrders =  Order::all()->where('status_id', '==', 0)->count();
      return view('admin.layout.header',compact('newOrders'));
    }

    public function getDataFilter($dataId, $userName = null) {
      $query = DB::table('orders')
        ->join('delivery_status', 'orders.delivery_id', '=', 'delivery_status.delivery_id')
        ->join('payment_status', 'orders.payment_id', '=', 'payment_status.payment_id')
        ->join('order_status', 'orders.status_id', '=', 'order_status.status_id')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->where('orders.status_id', '=', $dataId);
      if(!empty($userName)) {
        $query->where(function ($query) use ($userName) {
          $query->where(DB::raw("CONCAT(users.last_name, ' ', users.first_name)"), 'LIKE', '%'. $userName .'%');
        });
      }
      $dataOrders = $query
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
      // them tong tien vao moi don hang
      for ($i = 0; $i < $dataOrders->count(); $i++) {
        $dataOrders[$i]->{'totalPrice'} = $totalPrice[$i]->totalPrice;
      }
      return $dataOrders;
    }

  public function filter($dataId, $userName = null) {
    if ($dataId == 10) {
      $query= DB::table('orders')
        ->join('delivery_status', 'orders.delivery_id', '=', 'delivery_status.delivery_id')
        ->join('payment_status', 'orders.payment_id', '=', 'payment_status.payment_id')
        ->join('order_status', 'orders.status_id', '=', 'order_status.status_id')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->where('orders.status_id', '!=', 5)
        ->where('orders.status_id', '!=', 7);
      if(!empty($userName)) {
        $query->where(function ($query) use ($userName) {
          $query->where(DB::raw("CONCAT(users.last_name, ' ', users.first_name)"), 'LIKE', '%'. $userName .'%');
        });
      }
      $dataOrders = $query->select('orders.*',
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
        ->where('orders.status_id', '!=', 5)
        ->select(DB::raw('SUM(order_details.price * order_details.quantity) AS totalPrice'))
        ->groupBy('order_details.order_id')
        ->get();
      // them tong tien vao moi don hang
      for ($i = 0; $i < $dataOrders->count(); $i++) {
        $dataOrders[$i]->{'totalPrice'} = $totalPrice[$i]->totalPrice;
      }
    } else {
      $dataOrders = $this->getDataFilter($dataId, $userName);
    }
    // tong so luong cac don hang
    $orderQuantityByStatus = $this->getOrderQuantityByStatus();

    $totalNewOrder = DB::table('orders')
    ->where('status_id', '=', 0)
    ->count();

    session()->put('newOrders', $totalNewOrder);

    return view('admin.orders.order',
      compact(
        'dataOrders',
        'orderQuantityByStatus',
        'userName',
      )
    );
  }

  public function orderDetail($orderId) {
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
    $userName = $request->input('user_name');
    $statusId = $request->input('status_id');

    $this->filter($statusId, $userName);
    return redirect()->route('order-filter', ['data_id' => $statusId, 'user_name' => $userName]);
  }

  public function confirmOrder(Request $request) {
    $statusId = $request->input('status_id');
    $orderId = $request->input('order_id');
    $isArchived = $request->input('is_archived');

//    dd($statusId, $orderId, $isArchived);

    if ($statusId == 4 || $statusId == 5) {
      DB::table('orders')
      ->where('order_id', '=', $orderId)
      ->delete();
    } else {
      if ($statusId == 1) {
          DB::table('orders')
          ->where('order_id', '=', $orderId)
          ->update([
            'delivery_id' => 1
          ]);
      } else if ($statusId == 2) {
          DB::table('orders')
            ->where('order_id', '=', $orderId)
            ->update([
              'delivery_id' => 2,
              'payment_id' => 1
            ]);
      }
        DB::table('orders')
        ->where('order_id', '=', $orderId)
        ->update([
          'status_id' => ++$statusId
        ]);
        $statusId--;
    }

    Session::flash('confirm-success', $statusId === 4 ? 'Xóa đơn hàng thành công.' : ($statusId === null ? 'Lưu trữ đơn hàng thành công.' : 'Cập nhật đơn hàng thành công'));
    return redirect()->route('order-filter', ['data_id' => $statusId]);
  }

    public function confirmOrders(Request $request) {
      $statusId = $request->input('status_id');
      $orderIds = $request->input('arr_order_id');

      // $data = $request->all();

      if ($statusId == 4 || $statusId == 5 || $statusId == 7) {
        foreach ($orderIds as $orderId) {
          $order = DB::table('orders')
          ->where('order_id', '=', $orderId)
            ->first();
          $order->delete();
        }
      } else {
        if ($statusId == 1) {
          foreach ($orderIds as $orderId) {
            DB::table('orders')
            ->where('order_id', '=', $orderId)
            ->update([
              'delivery_id' => 1
            ]);
          }
        } else if ($statusId == 2) {
          foreach ($orderIds as $orderId) {
            DB::table('orders')
              ->where('order_id', '=', $orderId)
              ->update([
                'delivery_id' => 2,
                'payment_id' => 1
              ]);
          }
        } else if ($statusId == 3) {
          foreach ($orderIds as $orderId) {
            DB::table('orders')
            ->where('order_id', '=', $orderId)
            ->update([
              'is_archived' => 1
            ]);
          }
        }
        foreach ($orderIds as $orderId) {
          DB::table('orders')
          ->where('order_id', '=', $orderId)
          ->update([
            'status_id' => ++$statusId
          ]);
          $statusId--;
        }
      }

      $url = route('order-filter', ['data_id' => $statusId ?? 3]);
      Session::flash('confirm-success', $statusId == null ? 'Lưu trữ đơn hàng thành công.' : ($statusId == 4 || $statusId == 3 ? 'Xóa đơn hàng thành công.' : 'Cập nhật đơn hàng thành công'), 'status_id', $statusId);
      return response()->json(['url' => $url]);
  }

}
