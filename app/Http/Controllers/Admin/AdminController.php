<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Sach;
use App\Models\Danhmucsanpham;
use App\Models\Chitietdonhang;
class AdminController extends Controller
{
    public function getTopProduct( $limit = 2, $isDescending = true) {
        return DB::table('chitietdonhang')
          ->join('sach', 'sach.S_Ma', '=', 'chitietdonhang.S_Ma')
          ->join('danhmucsanpham', 'sach.DM_Ma', '=', 'danhmucsanpham.DM_Ma')
          ->select('sach.S_Ten', 'danhmucsanpham.DM_Ten', DB::raw('SUM(CTDH_SoLuong) as totalQuantity'))
          ->groupBy('sach.S_Ten', 'danhmucsanpham.DM_Ten')
          ->orderBy('totalQuantity', $isDescending ? 'desc' : 'asc')
          ->take($limit)
          ->get();
    }
    
    public function getAdminPage()
    {
        $sach = Sach::all()->count();
        $totalCustomer = User::where('VT_Ma', '=',  3)->count();
        $totalNewOrder = Donhang::all()->count();
        $topCustomer = DB::table('nguoidung')
        ->join('donhang', 'nguoidung.ND_Ma', '=', 'donhang.ND_Ma')
        ->join('chitietdonhang', 'donhang.DH_Ma', '=', 'chitietdonhang.DH_Ma')
        ->select('nguoidung.ND_Ten', 'nguoidung.ND_SDT', 'nguoidung.ND_Email', 'nguoidung.ND_DiaChi', DB::raw('SUM(chitietdonhang.CTDH_DonGia * chitietdonhang.CTDH_SoLuong) AS total_spent'))
        ->groupBy('nguoidung.ND_Ten', 'nguoidung.ND_SDT', 'nguoidung.ND_Email', 'nguoidung.ND_DiaChi')
        ->orderByDesc('total_spent')
        ->limit(2)
        ->get();

        $mostProduct = $this->getTopProduct(2, true);
    
        $leastProduct = $this->getTopProduct(2, false);

        return view('admin.homepage',compact('sach','totalCustomer','totalNewOrder','topCustomer','mostProduct','leastProduct'));
    }
    public function categorybook(Request $request) {
        $page = $request->query('page', 1);
        $data = DB::table('danhmucsanpham')
        ->select('danhmucsanpham.DM_Ma','danhmucsanpham.DM_Ten','danhmucsanpham.DM_PhanCap')
        ->paginate(5);

        return view('admin.categorybook.categorybook',compact('data','page'));
      }
    
    public function book(Request $request) {
        $page = $request->query('page', 1);
        $data = DB::table('sach')
        ->join('danhmucsanpham', 'sach.DM_Ma', '=', 'danhmucsanpham.DM_Ma')
        ->join('tacgia', 'sach.TG_Ma', '=', 'tacgia.TG_Ma')
        ->join('nhacungcap', 'sach.NCC_Ma', '=', 'nhacungcap.NCC_Ma')
        ->join('nhaxuatban','sach.NXB_Ma', '=','nhaxuatban.NXB_Ma')
        ->select('sach.*','danhmucsanpham.DM_Ten','tacgia.TG_Ten','nhacungcap.NCC_Ten','nhaxuatban.NXB_Ten')
        ->paginate(5);

        return view('admin.book.book',compact('data','page'));
    }
    

    public function supplier(Request $request) {
       
        $page = $request->query('page', 1);
        $data = DB::table('nhacungcap')
        ->select('nhacungcap.*')
        ->paginate(7);
        
        return view('admin.supplier.supplier',compact('data','page'));
    }

    public function nxb(Request $request) {
        $page = $request->query('page', 1);
        $data = DB::table('nhaxuatban')
        ->select('nhaxuatban.*')
        ->paginate(7);
        
        return view('admin.nxb.nxb',compact('data','page'));
    }

    public function users(Request $request) {
       
        $page = $request->query('page', 1);
        $data = DB::table('nguoidung')
        ->join('vaitro', 'nguoidung.VT_Ma', '=', 'vaitro.VT_Ma')
        ->select('nguoidung.*','vaitro.VT_Ten')
        ->paginate(5);
        
        return view('admin.user.users',compact('data','page'));
    }
}
