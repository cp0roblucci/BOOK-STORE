<?php

namespace App\Http\Controllers;

use App\Models\Donhang;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class ProfileController extends Controller
{
    public function getProfile($id){
        $user = User::find($id);
        return view('admin.profile-admin',compact('user'));
    }
    public function editProfile($id, Request $request){
        $user = User::find($id);
        $ND_Ten = $request->input('ND_Ten');
        $ND_SDT = $request->input('ND_SDT');
        $email = $request->input('ND_Email');
        $ND_Diachi = $request->input('ND_DiaChi');
          // $password = $request->input('password');
        DB::table('nguoidung')
              ->where('ND_Ma', $id)
              ->update([
                  'ND_Ten' => $ND_Ten,
                  'ND_SDT' => $ND_SDT,
                  'ND_Email' => $email,
                  'ND_DiaChi' => $ND_Diachi,
            ]);
        Session::flash('update-success', 'Cập nhật người dùng thành công.');
        return redirect()->route('profile-users',compact('user','id'));
    }
    ///customer 
    public function getProfileCustomer($id) {
        $user = User::find($id);
    
        // Lấy thông tin đơn hàng và chi tiết đơn hàng tương ứng với người dùng hiện tại
        $donhang = DB::table('donhang')
            ->join('chitietdonhang', 'donhang.DH_Ma', '=', 'chitietdonhang.DH_Ma')
            ->join('trangthai_donhang', 'donhang.TT_Ma', '=', 'trangthai_donhang.TT_Ma')
            ->where('donhang.ND_Ma', '=', $id)
            ->select(
                'donhang.DH_Ma',
                'donhang.DH_NgayTao',
                'trangthai_donhang.TT_Ten',
                DB::raw('SUM(chitietdonhang.CTDH_DonGia * chitietdonhang.CTDH_SoLuong) as TongTien')
            )
            ->groupBy('donhang.DH_Ma', 'donhang.DH_NgayTao', 'trangthai_donhang.TT_Ten')
            ->get();
    
        $manga_category = DB::table('sach')->where('DM_Ma', 12)->get();
        $sachtienganh = DB::table('sach')
            ->join('Danhmucsanpham', 'Danhmucsanpham.DM_Ma', '=', 'sach.DM_Ma')
            ->where('DM_PhanCap', 2)->get()->toArray();
        $danhmuc = DB::table('Danhmucsanpham')
            ->select('Danhmucsanpham.*')
            ->get()
            ->toArray();
    
        return view('info-customer', compact('user', 'manga_category', 'sachtienganh', 'danhmuc', 'donhang'));
    }
    public function editProfileCustomer($id, Request $request){
        $user = User::find($id);
        
        if ($request->hasFile('user-img')) {
          $oldImg = $user->ND_avt;

          if (!empty($oldImg)) {
              $oldImagePath = public_path('storage/images/users/' . $oldImg);
          
              if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                  unlink($oldImagePath); // Xóa ảnh cũ nếu là tệp tin
              }
          }
            $file = $request->file('user-img');
            $userImg = $file->getClientOriginalName();
        
            $avtdb = '/storage/images/users/'. $userImg;
            $path = 'public/storage/images/users/';
      
            $file->move(base_path($path), $userImg);
            $avatarUrl = $avtdb;
          } else {
            $avatarUrl  = $user->ND_avt;
          }
          $ND_Ten = $request->input('ND_Ten');
          $ND_SDT = $request->input('ND_SDT');
          $email = $request->input('ND_Email');
          $ND_Diachi = $request->input('ND_DiaChi');
          // $password = $request->input('password');
          DB::table('nguoidung')
              ->where('ND_Ma', $id)
              ->update([
                  'ND_Ten' => $ND_Ten,
                  'ND_SDT' => $ND_SDT,
                  'ND_Email' => $email,
                  'ND_DiaChi' => $ND_Diachi,
                  'ND_avt' => $avatarUrl,
              ]);
        Session::flash('update-success', 'Cập nhật người dùng thành công.');
        return redirect()->route('profile-customer',compact('user','id'));
    }
    public function orderCustomer($id) {
        $donhang = DB::table('donhang')
      
        ->join('nguoidung', 'donhang.ND_Ma', '=', 'nguoidung.ND_Ma')
        ->where('donhang.DH_Ma', '=', $id)
        ->select('donhang.*',
        'nguoidung.ND_Ten',
        'nguoidung.ND_DiaChi',
        'nguoidung.ND_SDT',
        'nguoidung.ND_avt'
       )
    
        ->first();
    
        $orderDetails = DB::table('chitietdonhang')
            ->join('donhang', 'chitietdonhang.DH_Ma', '=', 'donhang.DH_Ma')
            ->join('sach','chitietdonhang.S_Ma','=', 'sach.S_Ma')
            ->where('chitietdonhang.DH_Ma', '=', $id)
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
        $manga_category = DB::table('sach')->where('DM_Ma', 12)->get();
        $sachtienganh = DB::table('sach')
            ->join('Danhmucsanpham', 'Danhmucsanpham.DM_Ma', '=', 'sach.DM_Ma')
            ->where('DM_PhanCap', 2)->get()->toArray();
        $danhmuc = DB::table('Danhmucsanpham')
            ->select('Danhmucsanpham.*')
            ->get()
            ->toArray();
        // dd($productDetails);
        return view('order_details_customer', compact( 'manga_category', 'sachtienganh', 'danhmuc', 'donhang','totalPrice','totalQuantity','productDetails'));
    }

   
}
