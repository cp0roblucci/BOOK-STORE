<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliverController extends Controller
{



    // deliver
    public function listOdersDeliver() {
      $groupedOrders = DB::table('orders')
        ->select('order_delivery_address', 'order_id', 'full_name', 'order_phone_number')
        ->where('status_id', '=', 2)
        ->groupBy('order_delivery_address', 'order_id', 'full_name', 'order_phone_number')
        ->get()
        ->groupBy('order_delivery_address');

//    dd($groupedOrders);
    return view('deliver.deliver', compact('groupedOrders'));

    }

    public function orderDetailDeliver($orderId) {
        $order = DB::table('orders')
        ->join('order_status', 'orders.status_id', '=', 'order_status.status_id')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->where('orders.order_id', '=', $orderId)
        ->select(
        'orders.*',
        'users.last_name', 'users.first_name', 'users.user_address', 'users.phone_number',
        'order_status.status_name',
        )
        ->orderBy('orders.order_id')
        ->first();

        $orderDetails = DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.order_id')
            ->where('order_details.order_id', '=', $orderId)
            ->get();

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
        return view('deliver.order-detail', compact('order', 'productDetails', 'totalPrice'));
    }

    public function confirmDeliverySuccess(Request $request) {
      $orderId = $request->input('order_id');
//        dd($orderId);
      DB::table('orders')
        ->where('order_id', '=', $orderId)
        ->update([
          'status_id' => 3,
          'delivery_id' => 2,
          'payment_id' => 1,
        ]);

      return redirect()->route('list-order-deliver');
    }
}
