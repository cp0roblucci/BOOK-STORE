<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Danhmucsanpham;
use App\Models\Sach;
use App\Models\Tacgia;
use App\Models\Nhacungcap;
use App\Models\Nhaxuatban;
use App\Models\Chitiethoadonnhap;
use App\Models\Hoadonnhap;
class BookController extends Controller
{
  public function newBook(){
      $book = Sach::all();
      $categorybook = Danhmucsanpham::all();
      $author = Tacgia::all();
      $ncc = Nhacungcap::all();
      $nxb = Nhaxuatban::all();

      return view('admin.book.new-book',compact('book', 'author', 'ncc', 'nxb','categorybook'));
  }

    
  public function createnewBook(Request $request) {

      if($request->files->has('book-img')) {
        $file = $request->file('book-img');
        $productImg = $request->file('book-img')->getClientOriginalName();
    
        $avtdb = '/storage/images/products/'. $productImg;
        $path = 'public/storage/images/products/';
    
        $file->move(base_path($path),$productImg);
        $productImgURL = $avtdb;
      } else {
        $productImgURL = '/storage/images/admin/book-default.png';
      }
      $TG_Ten = $request->input('TG_Ten');
      $author = TacGia::where('TG_Ten', $TG_Ten)->first();
      if (!$author) {
          $author = TacGia::create(['TG_Ten' => $TG_Ten]);
      }

      $S_Danhmuc = $request->input('S_Danhmuc');
      $S_Ten = $request->input('S_Ten');
      $S_GiaBan = $request->input('S_GiaBan');
      $NCC_Ten = $request->input('NCC_Ten');
      $NXB_Ten= $request->input('NXB_Ten');
      $S_NamXuatBan= $request->input('S_NamXuatBan');
      $S_DichGia = $request->input('S_DichGia');
      $S_SoTrang = $request->input('S_SoTrang');
      $S_TrongLuong = $request->input('S_TrongLuong');
      $S_Mota = $request->input('S_Mota');
      $S_SoLuong = $request->input('S_SoLuong');
    
      Sach::create([
          'NXB_Ma' => $NXB_Ten,
          'NCC_Ma' => $NCC_Ten,
          'TG_Ma' => $author->TG_Ma,
          'DM_Ma' => $S_Danhmuc,
          'S_Ten' => $S_Ten,
          'S_GiaBan' => $S_GiaBan,
          'S_Mota' => $S_Mota,
          'S_SoLuong' => $S_SoLuong,
          'S_NamXuatBan' => $S_NamXuatBan,
          'S_DichGia' => $S_DichGia,
          'S_SoTrang' => $S_SoTrang,
          'S_TrongLuong' => $S_TrongLuong,
          'S_HinhAnh' => $productImgURL,
            
      ]);
      Session::flash('add-success','Thêm sản phẩm thành công');
      return redirect()->route('admin-new-book');
  }
  public function getupdateBook($id) {
    $book = DB::table('sach')
    ->join('tacgia','tacgia.TG_Ma','=','sach.TG_Ma')
    ->select('sach.*','tacgia.TG_Ten')
    ->where('sach.S_Ma','=',$id)
    ->first();
    $categorybook = DB::table('Danhmucsanpham')
    ->select('Danhmucsanpham.*')
    ->get();
    $author = DB::table('tacgia')
    ->select('tacgia.*');
    $ncc = Nhacungcap::all();
    $nxb = Nhaxuatban::all();
   
    // dd($categorybook);
    return view('admin.book.update-book',compact('book','categorybook','author','nxb','ncc'));
  }

  public function postUpdatebook($id, Request $request){
    $book = DB::table('sach')
    ->join('tacgia','tacgia.TG_Ma','=','sach.TG_Ma')
    ->select('sach.*','tacgia.TG_Ten')
    ->where('sach.S_Ma','=',$id)
    ->first();

    if ($request->hasFile('book-img')) {
      $oldImg = $book->S_HinhAnh;
      $oldImagePath = public_path('storage/images/products/' . $oldImg);
      if (file_exists($oldImagePath)) {
        unlink($oldImagePath); // Xóa ảnh cũ
    }
      $file = $request->file('book-img');
      $bookImg = $file->getClientOriginalName();
  
      // Kiểm tra xem sản phẩm đã có ảnh hay chưa
      $avtdb = '/storage/images/products/'. $bookImg;
      $path = 'public/storage/images/products/';

      $file->move(base_path($path),$bookImg);
      $productImgURL = $avtdb;
    } else {
      $productImgURL = $book->S_HinhAnh;
    }
    

      $S_Danhmuc = $request->input('S_Danhmuc');
      $S_Ten = $request->input('S_Ten');
      $S_GiaBan = $request->input('S_GiaBan');
      $NCC_Ten = $request->input('NCC_Ten');
      $NXB_Ten= $request->input('NXB_Ten');
      $S_NamXuatBan= $request->input('S_NamXuatBan');
      $S_DichGia = $request->input('S_DichGia');
      $S_SoTrang = $request->input('S_SoTrang');
      $S_TrongLuong = $request->input('S_TrongLuong');
      $S_Mota = $request->input('S_Mota');
      $S_SoLuong = $request->input('S_SoLuong');
    //   $TG_Ten = $request->input('TG_Ten');
    //   $author = TacGia::where('TG_Ten', $TG_Ten)->first();

    //   if (!$author) {
    // // Tên tác giả không tồn tại, tạo mới tác giả
    //     $author = TacGia::create(['TG_Ten' => $TG_Ten]);
    //   }
    $TG_Ten = $request->input('TG_Ten');
    $author = TacGia::where('TG_Ma', $book->TG_Ma)->first();

    if ($author) {
    $author->update(['TG_Ten' => $TG_Ten]);
    }
      DB::table('sach')
      ->where('S_Ma','=',$id)
      ->update([
        'NXB_Ma' => $NXB_Ten,
        'NCC_Ma' => $NCC_Ten,
        'TG_Ma' => $book->TG_Ma,
        'DM_Ma' => $S_Danhmuc,
        'S_Ten' => $S_Ten,
        'S_GiaBan' => $S_GiaBan,
        'S_Mota' => $S_Mota,
        'S_SoLuong' => $S_SoLuong,
        'S_NamXuatBan' => $S_NamXuatBan,
        'S_DichGia' => $S_DichGia,
        'S_SoTrang' => $S_SoTrang,
        'S_TrongLuong' => $S_TrongLuong,
        'S_HinhAnh' => $productImgURL,
    ]);
    Session::flash('update-success','Cập nhật sách thành công');
    return redirect()->route('admin-book');
  }

  public function delete(Request $request) {
    $book_id = $request->input('book_id');

    // Kiểm tra xem có chi tiết hóa đơn nhập nào liên quan không
    $hasRelatedDetails = ChiTietHoaDonNhap::where('S_Ma', $book_id)->exists();

    if ($hasRelatedDetails) {
        // Xóa chi tiết hóa đơn nhập trước
        $relatedInvoices = DB::table('chitiethoadonnhap')
        ->where('S_Ma', '=', $book_id)
        ->pluck('HDN_Ma');
        
      DB::table('chitiethoadonnhap')
        ->where('S_Ma', '=', $book_id)
        ->delete();

      DB::table('hoadonnhap')
        ->whereIn('HDN_Ma', $relatedInvoices)
        ->delete();
    }

    // Kiểm tra xem có hóa đơn nhập nào liên quan không
  
    // Cuối cùng, xóa sản phẩm
    Sach::where('S_Ma', $book_id)->delete();

    Session::flash('delete-success', 'Đã xóa sách thành công');
    return redirect()->route('admin-book');
  }
  public function searchProduct(Request $request) {
    $S_Ten = $request->input('S_Ten');
    $page = $request->query('page', 1);
        $data = DB::table('sach')
        ->join('danhmucsanpham', 'sach.DM_Ma', '=', 'danhmucsanpham.DM_Ma')
        ->join('tacgia', 'sach.TG_Ma', '=', 'tacgia.TG_Ma')
        ->join('nhacungcap', 'sach.NCC_Ma', '=', 'nhacungcap.NCC_Ma')
        ->join('nhaxuatban','sach.NXB_Ma', '=','nhaxuatban.NXB_Ma')
        ->where('sach.S_Ten', 'LIKE', '%'. $S_Ten .'%')
        ->select('sach.*','danhmucsanpham.DM_Ten','tacgia.TG_Ten','nhacungcap.NCC_Ten','nhaxuatban.NXB_Ten')
        ->paginate(5);

    return view('admin.book.search-book',compact('data','S_Ten','page'));
  }
}
