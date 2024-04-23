<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return view("auth.login");
        }

        $userId = Auth::id();
        $manga_category = DB::table('sach')->where('DM_Ma', 12)->get();
        $sachtienganh = DB::table('sach')
            ->join('Danhmucsanpham', 'Danhmucsanpham.DM_Ma', '=', 'sach.DM_Ma')
            ->where('DM_PhanCap', 2)->get()->toArray();
        $danhmuc = DB::table('Danhmucsanpham')
            ->select('Danhmucsanpham.*')
            ->get()
            ->toArray();

        // Lấy giỏ hàng từ Session
        $cart = Session::get('cart', []);
        
        $totalPrice = 0;
        foreach ($cart as $item) {
        $totalPrice += $item['quantity'] * $item['price'];
        }
        return view('cart', compact('manga_category', 'sachtienganh', 'danhmuc', 'cart','totalPrice'));
    }
    
    public function removeFromCart($productId)
{
    // Lấy giỏ hàng từ Session
    $cart = session('cart', []);

    // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
    if (array_key_exists($productId, $cart)) {
        // Xóa sản phẩm ra khỏi giỏ hàng
        unset($cart[$productId]);

        // Cập nhật giỏ hàng trong Session
        session(['cart' => $cart]);

        // Kiểm tra xem session 'selected_cart' có tồn tại không
        if (session()->has('selected_cart')) {
            // Xóa session 'selected_cart' sau khi thanh toán
            session()->forget('selected_cart');
        }
    }

    return redirect()->route('cart.index');
}
    
    public function updateQuantity(Request $request)
    {
    $productId = $request->input('productId');
    $quantity = $request->input('quantity');

    // Lấy giỏ hàng từ Session
    $cart = session('cart', []);

    // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
    if (array_key_exists($productId, $cart)) {
        // Cập nhật số lượng sản phẩm
        $cart[$productId]['quantity'] = $quantity;

        // Cập nhật giỏ hàng trong Session
        session(['cart' => $cart]);

        // Tính lại tổng giá trị giỏ hàng
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['quantity'] * $item['price'];
        }
// number_format($subtotal, 0, ',', '.')
        // Trả về thông tin cần thiết, bao gồm tổng tiền và thông tin sản phẩm
        return response()->json([
            'success' => true,
            'subtotal' => number_format($subtotal, 0, ',', '.') . 'đ',
            'products' => $cart,
        ]);
    }

    // Trả về thông báo lỗi nếu không tìm thấy sản phẩm trong giỏ hàng
    return response()->json(['success' => false, 'message' => 'Product not found in the cart.']);
    }
    public function checkout(Request $request)
    {
    // Lấy danh sách sản phẩm được chọn từ request
    $selectedProducts = $request->input('selectedProducts', []);

    // Kiểm tra xem danh sách sản phẩm đã chọn có trống không
    if (empty($selectedProducts)) {
        // Nếu danh sách rỗng, hiển thị thông báo và chuyển hướng về trang giỏ hàng hoặc trang khác
        return redirect()->route('cart.index')->with('error', 'Vui lòng chọn ít nhất một sản phẩm để thanh toán.');
    }

    // Lấy giỏ hàng từ Session
    $cart = session('cart', []);

    // Tạo một mảng mới chỉ chứa các sản phẩm được chọn
    $selectedCart = [];
    foreach ($selectedProducts as $productId) {
        if (array_key_exists($productId, $cart)) {
            $selectedCart[$productId] = $cart[$productId];
        }
    }

    // Lưu giỏ hàng đã chọn vào Session
    session(['selected_cart' => $selectedCart]);

    // Chuyển hướng đến trang thanh toán
    return redirect()->route('checkout.index');
    }
}
