<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Danhmucsanpham;
class HomeController extends Controller
{
    public function getHomePage()
    {
        $manga_category = DB::table('sach')->where('DM_Ma', 12)->get();
        $sachtienganh = DB::table('sach')
        ->join('Danhmucsanpham','Danhmucsanpham.DM_Ma','=','sach.DM_Ma')
        ->where('DM_PhanCap',2)->get()->toArray();
        $danhmuc = DB::table('Danhmucsanpham')
        ->select('Danhmucsanpham.*')
        ->get()
        ->toArray();
        return view('home',compact('manga_category','danhmuc','sachtienganh'));
    }
    public function contact() {
        $manga_category = DB::table('sach')->where('DM_Ma', 12)->get();
        $sachtienganh = DB::table('sach')
        ->join('Danhmucsanpham','Danhmucsanpham.DM_Ma','=','sach.DM_Ma')
        ->where('DM_PhanCap',2)->get()->toArray();
        $danhmuc = DB::table('Danhmucsanpham')
        ->select('Danhmucsanpham.*')
        ->get()
        ->toArray();
        return view('contact',compact('manga_category','danhmuc','sachtienganh'));
    }
}
