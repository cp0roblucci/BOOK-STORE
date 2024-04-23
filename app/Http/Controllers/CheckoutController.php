<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
{
public function checkoutindex() {
    ///
    // Xóa session sau khi lấy thông tin
    ///
    $manga_category = DB::table('sach')->where('DM_Ma', 12)->get();
    $sachtienganh = DB::table('sach')
                    ->join('Danhmucsanpham', 'Danhmucsanpham.DM_Ma', '=', 'sach.DM_Ma')
                    ->where('DM_PhanCap', 2)->get()->toArray();
    $danhmuc = DB::table('Danhmucsanpham')
                    ->select('Danhmucsanpham.*')
                    ->get()
                    ->toArray();
    $cart = session('cart', []);
    $selectedCart = session('selected_cart', []);
    $totalPrice = 0;
    foreach  ($selectedCart as $item) {
        $totalPrice += $item['quantity'] * $item['price'];
    }
    // dd(session()->all());
    // dd($cart,$selectedCart );
    return view('checkout',compact('danhmuc', 'manga_category', 'sachtienganh','selectedCart','totalPrice'));
}
    public function createOrder(CheckoutRequest $request)
    {
            
    $orderData = [
        'TT_Ma' => $request->input('TT_Ma', 0),
        'ND_Ma' => Auth::id(), // Lấy ID của người dùng đăng nhập
        'DH_NgayTao' => now(),
        'DH_DiaChiGiao' => $request->input('DH_DiaChiNhan'),
        'DH_SDTNhan' => $request->input('DH_SDTNhan'),
        'DH_TenNguoiNhan' => $request->input('DH_TenNguoiNhan'),
        'DH_GhiChu' => $request->input('DH_GhiChu'),
    ];

    // Thêm đơn hàng vào bảng đơn hàng
    $orderId = DB::table('donhang')->insertGetId($orderData);
    
    // Lấy giỏ hàng đã chọn từ Session
    $selectedCart = session('selected_cart', []);

    // Thêm chi tiết đơn hàng vào bảng chi tiết đơn hàng
    foreach ($selectedCart as $productId => $item) {
        $orderDetailData = [
            'S_Ma' => $productId,
            'DH_Ma' => $orderId,
            'CTDH_SoLuong' => $item['quantity'],
            'CTDH_DonGia' => $item['price'],
        ];

        DB::table('chitietdonhang')->insert($orderDetailData);
    }

    // Xóa sản phẩm đã chọn khỏi giỏ hàng
    $cart = session('cart', []);
    foreach ($selectedCart as $productId => $item) {
        unset($cart[$productId]);
    }

    // Cập nhật giỏ hàng trong Session
    session(['cart' => $cart]);

    // Xóa giỏ hàng đã chọn khỏi Session sau khi tạo đơn hàng thành công
    session()->forget('selected_cart');

    // Chuyển hướng hoặc hiển thị thông báo thành công tùy thuộc vào yêu cầu của bạn
    return redirect()->route('order-success');
}
public function orderSuccess() 
    {
    $manga_category = DB::table('sach')->where('DM_Ma', 12)->get();
    $sachtienganh = DB::table('sach')
                    ->join('Danhmucsanpham', 'Danhmucsanpham.DM_Ma', '=', 'sach.DM_Ma')
                    ->where('DM_PhanCap', 2)->get()->toArray();
    $danhmuc = DB::table('Danhmucsanpham')
                    ->select('Danhmucsanpham.*')
                    ->get()
                    ->toArray();
    return view('order-success',compact('danhmuc', 'manga_category', 'sachtienganh'));
    }

    public function buyNowView() {
        $manga_category = DB::table('sach')->where('DM_Ma', 12)->get();
        $sachtienganh = DB::table('sach')
                    ->join('Danhmucsanpham', 'Danhmucsanpham.DM_Ma', '=', 'sach.DM_Ma')
                    ->where('DM_PhanCap', 2)->get()->toArray();
        $danhmuc = DB::table('Danhmucsanpham')
                    ->select('Danhmucsanpham.*')
                    ->get()
                    ->toArray();

        $productId = Session::get('checkout.product_id');
        $productQuantity = Session::get('checkout.product_quantity');
        $product = DB::table('sach')->where('S_Ma','=',$productId)->first();
    //    dd($product,$productQuantity);
        return view('checkoutnow',compact('danhmuc', 'manga_category', 'sachtienganh','product','productId', 'productQuantity'));
    }
    public function checkoutTransaction(Request $request) {
        $manga_category = DB::table('sach')->where('DM_Ma', 12)->get();
        $sachtienganh = DB::table('sach')
                    ->join('Danhmucsanpham', 'Danhmucsanpham.DM_Ma', '=', 'sach.DM_Ma')
                    ->where('DM_PhanCap', 2)->get()->toArray();
        $danhmuc = DB::table('Danhmucsanpham')
                    ->select('Danhmucsanpham.*')
                    ->get()
                    ->toArray();
        $productId = $request->input('product_id');
        $productQuantity = $request->input('product_quantity');

        Session::put('checkout.product_id', $productId);
        Session::put('checkout.product_quantity', $productQuantity);
    
        return redirect()->route('checkoutnowview', compact('productId', 'productQuantity','danhmuc', 'manga_category', 'sachtienganh'));
    }

    public function createOrderNow(Request $request)
    {
        
// Lấy thông tin đơn hàng từ request
        $orderData = [
        'TT_Ma' => $request->input('TT_Ma', 0),
        'ND_Ma' => Auth::id(), // Lấy ID của người dùng đăng nhập
        'DH_NgayTao' => now(),
        'DH_DiaChiGiao' => $request->input('DH_DiaChiNhan'),
        'DH_SDTNhan' => $request->input('DH_SDTNhan'),
        'DH_TenNguoiNhan' => $request->input('DH_TenNguoiNhan'),
        'DH_GhiChu' => $request->input('DH_GhiChu'),
     ];

// Thêm đơn hàng vào bảng đơn hàng
        $orderId = DB::table('donhang')->insertGetId($orderData);

// Lấy giỏ hàng đã chọn từ Session
        $productId = Session::get('checkout.product_id');
        $productQuantity = Session::get('checkout.product_quantity');
        $product = DB::table('sach')->where('S_Ma','=',$productId)->first();

// Thêm chi tiết đơn hàng vào bảng chi tiết đơn hàng

        $orderDetailData = [
            'S_Ma' => $productId,
            'DH_Ma' => $orderId,
            'CTDH_SoLuong' => $productQuantity,
            'CTDH_DonGia' => $product->S_GiaBan,
        ];

        DB::table('chitietdonhang')->insert($orderDetailData);
    
// Chuyển hướng hoặc hiển thị thông báo thành công tùy thuộc vào yêu cầu của bạn
        return redirect()->route('order-success');
    }
}