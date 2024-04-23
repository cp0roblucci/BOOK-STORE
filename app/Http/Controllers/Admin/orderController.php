<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Donhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Chitietdonhang;
class orderController extends Controller
{
    // public function vieworder() {
    //     return view('admin.order.order');
    // }
    public function getOrderQuantityByStatus() {
        $orderQuantityByStatus = array();
        $numberStatus = DB::table('trangthai_donhang')
          ->select('TT_Ma', 'TT_Ten')
          ->get();
  
        $orderQuantityByStatus[10]['Tất cả'] = Donhang::all()->where('TT_Ma', '!=', 5)->count();
  
        foreach($numberStatus as $key => $status) {
          $orderQuantityByStatus[$status->TT_Ma][$status->TT_Ten] = DB::table('donhang')
            ->where('TT_Ma', '=', $key)
          ->count();
        }
        return $orderQuantityByStatus;
    }

    public function index() {
        return redirect()->route('order-filter', ['data_id' => 10]);
    
    }
    public function newOrderNotify() {
        $newOrders =  Donhang::all()->where('TT_Ma', '==', 0)->count();
        return view('admin.layout.header',compact('newOrders'));
    }
    public function getDataFilter($dataId, $userName = null) {
        $query = DB::table('donhang')
          ->join('trangthai_donhang', 'donhang.TT_Ma', '=', 'trangthai_donhang.TT_Ma')
          ->join('nguoidung', 'donhang.ND_Ma', '=', 'nguoidung.ND_Ma')
          ->where('donhang.TT_Ma', '=', $dataId);
        if(!empty($userName)) {
          $query->where(function ($query) use ($userName) {
            $query->where(DB::raw("nguoidung.ND_Ten"), 'LIKE', '%'. $userName .'%');
          });
        }
        $dataOrders = $query
          ->select('donhang.*',
            'trangthai_donhang.TT_Ten',
            'trangthai_donhang.TT_Chitiet',
            'nguoidung.ND_Ten'
          )
          ->get();
       
        foreach ($dataOrders as $order) {
          $totalPrice = DB::table('chitietdonhang')
              ->where('DH_Ma', $order->DH_Ma)
              ->sum(DB::raw('CTDH_DonGia * CTDH_SoLuong'));
  
          $order->totalPrice = $totalPrice;
      }
      return $dataOrders;
      }
  
    public function filter($dataId, $userName = null) {
      if ($dataId == 10) {
        $dataOrders = DB::table('donhang')
        ->join('trangthai_donhang', 'donhang.TT_Ma', '=', 'trangthai_donhang.TT_Ma')
        ->join('nguoidung', 'donhang.ND_Ma', '=', 'nguoidung.ND_Ma')
        ->leftJoin('chitietdonhang', 'donhang.DH_Ma', '=', 'chitietdonhang.DH_Ma')
        ->where('donhang.TT_Ma', '!=', 5)
        ->groupBy('donhang.DH_Ma', 'donhang.TT_Ma', 'donhang.ND_Ma', 'donhang.DH_NgayTao', 'donhang.DH_DiaChiGiao', 'donhang.DH_SDTNhan', 'donhang.DH_TenNguoiNhan', 'donhang.DH_GhiChu', 'trangthai_donhang.TT_Ten', 'trangthai_donhang.TT_Chitiet', 'nguoidung.ND_Ten')
        ->select(
            'donhang.*',
            'trangthai_donhang.TT_Ten',
            'trangthai_donhang.TT_Chitiet',
            'nguoidung.ND_Ten',
            DB::raw('SUM(chitietdonhang.CTDH_DonGia * chitietdonhang.CTDH_SoLuong) AS totalPrice')
        )
        ->latest('donhang.DH_NgayTao')
        ->get();
      } else {
          $dataOrders = $this->getDataFilter($dataId, $userName);
      }
  
     
      foreach ($dataOrders as $order) {
          $order->totalPrice = $order->totalPrice ?? 0; 
  
       
      }
  
      
      $orderQuantityByStatus = $this->getOrderQuantityByStatus();
  
      // Tổng số đơn hàng mới
      $totalNewOrder = DB::table('donhang')
          ->where('TT_Ma', '=', 0)
          ->count();
  
      // Lưu số đơn hàng mới vào session
      session()->put('newOrders', $totalNewOrder);
  
      return view('admin.order.order', compact(
          'dataOrders',
          'orderQuantityByStatus',
          'userName'
      ));
  }

    public function searchOrder(Request $request) {
        $userName = $request->input('user_name');
        $statusId = $request->input('status_id');
    
        $this->filter($statusId, $userName);
        return redirect()->route('order-filter', ['data_id' => $statusId, 'user_name' => $userName]);
    }
    public function orderDetail($orderId) {
        $order = DB::table('donhang')
          ->join('trangthai_donhang', 'donhang.TT_Ma', '=', 'trangthai_donhang.TT_Ma')
          ->join('nguoidung', 'donhang.ND_Ma', '=', 'nguoidung.ND_Ma')
          ->where('donhang.DH_Ma', '=', $orderId)
          ->select('donhang.*',
          'nguoidung.ND_Ten',
          'nguoidung.ND_DiaChi',
          'nguoidung.ND_SDT',
          'trangthai_donhang.TT_Ten',
          'trangthai_donhang.TT_Chitiet',
         )
          ->orderBy('donhang.DH_Ma')
          ->first();
    
        $orderDetails = DB::table('chitietdonhang')
          ->join('donhang', 'chitietdonhang.DH_Ma', '=', 'donhang.DH_Ma')
          ->join('sach','chitietdonhang.S_Ma','=', 'sach.S_Ma')
          ->where('chitietdonhang.DH_Ma', '=', $orderId)
          ->get();
   
        $totalQuantity = 0;
        $productDetails = [];
        
        foreach ($orderDetails as $orderDetail) {
          
          
            $totalQuantity += $orderDetail->CTDH_SoLuong; 
        }
        $totalPrice = 0;
        foreach ($orderDetails as $product) {
          $totalPrice += ($product->CTDH_SoLuong * $product->CTDH_DonGia);
        }
        $productDetails = $orderDetails->toArray();
    
        return view('admin.order.order-detail', compact('order', 'productDetails', 'totalPrice','totalQuantity'));
    }
    
 
    public function confirmOrder(Request $request) {
        $statusId = $request->input('status_id');
        $orderId = $request->input('order_id');
        $isArchived = $request->input('is_archived');

          // Kiểm tra nếu có chi tiết đơn hàng liên quan
          

    //    dd($statusId, $orderId, $isArchived);
    
        if ($statusId == 2 || $statusId == 5) {
          $orderDetailsExist = DB::table('chitietdonhang')->where('DH_Ma', '=', $orderId)->exists();
  
          if ($orderDetailsExist) {
              // Nếu có chi tiết đơn hàng, xóa chúng trước
              DB::table('chitietdonhang')->where('DH_Ma', '=', $orderId)->delete();
          }
          DB::table('donhang')
          ->where('DH_Ma', '=', $orderId)
          ->delete();
        } else {
          if ($statusId == 1) {
            DB::table('donhang')
              ->where('DH_Ma', '=', $orderId)
              ->update([
                'TT_Ma' => 2,
              ]);
          } else if ($statusId == 3) {
            DB::table('donhang')
              ->where('DH_Ma', '=', $orderId)
              ->update([
                'TT_Ma' => 5
              ]);
          } else {
            DB::table('donhang')
              ->where('DH_Ma', '=', $orderId)
              ->update([
                'TT_Ma' => ++$statusId
              ]);
            $statusId--;
          }
        }

        Session::flash('confirm-success', $statusId === 4 ? 'Xóa đơn hàng thành công.' : ($statusId === null ? 'Lưu trữ đơn hàng thành công.' : 'Cập nhật đơn hàng thành công'));
        // dd($statusId);
        return redirect()->route('order-filter', ['data_id' => $statusId]);
      }
  
    public function confirmOrders(Request $request) {
        $statusId = $request->input('status_id');
        $orderIds = $request->input('arr_order_id');
  
        // $data = $request->all();
  
        if ($statusId == 2 || $statusId == 5 || $statusId == 7) {
          foreach ($orderIds as $orderId) {
            $order = DB::table('donhang')
            ->where('DH_Ma', '=', $orderId)
              ->first();
            $order->delete();
          }
        } else {
          if ($statusId == 1) {
            foreach ($orderIds as $orderId) {
              DB::table('donhang')
              ->where('DH_Ma', '=', $orderId);
            }
          } else if ($statusId == 2) {
            foreach ($orderIds as $orderId) {
              DB::table('donhang')
                ->where('DH_Ma', '=', $orderId);
            }
          } else if ($statusId == 3) {
            foreach ($orderIds as $orderId) {
              DB::table('donhang')
              ->where('DH_Ma', '=', $orderId)
              ->update([
                'is_archived' => 1
              ]);
            }
          }
          foreach ($orderIds as $orderId) {
            DB::table('donhang')
            ->where('DH_Ma', '=', $orderId)
            ->update([
              'TT_Ma' => ++$statusId
            ]);
            $statusId--;
          }
        }
  
        $url = route('order-filter', ['data_id' => $statusId ?? 3]);
        Session::flash('confirm-success', $statusId == null ? 'Lưu trữ đơn hàng thành công.' : ($statusId == 2 || $statusId == 4 ? 'Xóa đơn hàng thành công.' : 'Cập nhật đơn hàng thành công'), 'status_id', $statusId);
        return response()->json(['url' => $url]);
    }

}
