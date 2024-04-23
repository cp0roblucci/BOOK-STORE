<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hoadonnhap;
use App\Models\Chitiethoadonnhap;
use App\Models\Sach;
use App\Models\Danhmucsanpham;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Tacgia;
use App\Models\Nhacungcap;
use App\Models\Nhaxuatban;
use App\Http\Requests\ImportWarehouseRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ImportwarehouseController extends Controller
{
    public function importWarehouse(Request $request) {
        $page = $request->query('page',1);
        $data = DB::table('hoadonnhap')
        ->join('nguoidung','hoadonnhap.ND_Ma','=','nguoidung.ND_Ma')
        ->select('hoadonnhap.*','nguoidung.ND_Ten')
        ->paginate(5);
        return view ('admin.importwarehouse.importwarehouse',compact('data','page'));
    }

    public function getImportwarehouseDetails(Request $request, $id)
    {
    $hoadonnhap = DB::table('hoadonnhap')
        ->where('hoadonnhap.HDN_Ma', '=', $id)
        ->join('chitiethoadonnhap', 'chitiethoadonnhap.HDN_Ma', '=', 'hoadonnhap.HDN_Ma')
        ->join('nguoidung', 'hoadonnhap.ND_Ma', '=', 'nguoidung.ND_Ma')
        ->select('hoadonnhap.*', 'chitiethoadonnhap.*', 'nguoidung.ND_Ten')
        ->first();

    $chitiethoadonnhap = DB::table('chitiethoadonnhap')
        ->join('hoadonnhap', 'chitiethoadonnhap.HDN_Ma', '=', 'hoadonnhap.HDN_Ma')
        ->where('chitiethoadonnhap.HDN_Ma', '=', $id)
        ->get();

    $bookDetails = [];
    $totalQuantity = 0; // Tổng số lượng

    foreach ($chitiethoadonnhap as $key => $cthdn) {
        $bookDetails[$key] = DB::table('Sach')
            ->join('chitiethoadonnhap', 'chitiethoadonnhap.S_Ma', '=', 'sach.S_Ma')
            ->join('Danhmucsanpham', 'danhmucsanpham.DM_Ma', '=', 'sach.DM_Ma')
            ->join('nhacungcap', 'nhacungcap.NCC_Ma', '=', 'sach.NCC_Ma')
            ->where('sach.S_Ma', '=', $cthdn->S_Ma)
            ->select(
                'sach.S_HinhAnh as link_img', 'sach.S_Ten as name', 'sach.S_GiaBan as giasp', 'danhmucsanpham.DM_Ten as danhmucsanpham',
                'nhacungcap.NCC_Ten as ncc',
                'chitiethoadonnhap.CTHDN_SoLuong as soluongnhap', 'chitiethoadonnhap.CTHDN_Gia as gianhap'
            )
            ->first();

        $totalQuantity += $cthdn->CTHDN_SoLuong; // Tăng tổng số lượng
    }

    $totalPrice = 0;
    foreach ($bookDetails as $sp) {
        $totalPrice += ($sp->soluongnhap * $sp->gianhap);
    }

    return view('admin.importwarehouse.importwarehouse_details', compact('id', 'hoadonnhap', 'bookDetails', 'chitiethoadonnhap', 'totalPrice', 'totalQuantity'));
    }

    public function newImportwarehouse(){
        $book = Sach::all();
        $categorybook = Danhmucsanpham::all();
        $author = Tacgia::all();
        $ncc = Nhacungcap::all();
        $nxb = Nhaxuatban::all();
  
        return view('admin.importwarehouse.new-importwarehouse',compact('book', 'author', 'ncc', 'nxb','categorybook'));
    }

    public function createImportwareHouse(ImportWarehouseRequest $request)
    {
    $ngayNhap = Carbon::createFromFormat('Y-m-d', $request->input('HDN_NgayNhap'));
    $currentUser = Auth::user();

    // Tạo hóa đơn mới
    $hoadonnhap = Hoadonnhap::create([
        'ND_Ma' => $currentUser->ND_Ma,
        'HDN_NgayNhap' => $ngayNhap, // Lưu ngày giờ dưới dạng Carbon
        'HDN_Ghichu' => $request->input('HDN_GhiChu'),
    ]);

    foreach ($request->input('S_Ten') as $index => $tenSanPham) {
        // Kiểm tra sản phẩm đã tồn tại hay chưa
        $sach = Sach::where('S_Ten', $tenSanPham)->first();

        if ($sach) {
            // Nếu sản phẩm đã tồn tại, tăng số lượng
            DB::table('sach')
                ->where('S_Ma', $sach->S_Ma)
                ->update([
                    'S_SoLuong' => DB::raw('S_SoLuong + ' . $request->input('S_SoLuong')[$index]),
                ]);

            // Kiểm tra và xóa ảnh cũ
            if ($sach->S_HinhAnh) {
                $oldImagePath = public_path($sach->S_HinhAnh);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $S_Ma = $sach->S_Ma;
        } else {
            // Xử lý ảnh cho sản phẩm mới
            $file = $request->file('book-img')[$index] ?? null;

            if ($file) {
                $productImg = $file->getClientOriginalName();
                $avtdb = '/storage/images/products/' . $productImg;
                $path = 'public/storage/images/products/';
                $file->move(base_path($path), $productImg);
                $productImgURL = $avtdb;
            } else {
                $productImgURL = '/storage/images/admin/book-default.png';
            }

            // Nếu sản phẩm chưa tồn tại, tạo mới sản phẩm
            $TG_Ten = $request->input('TG_Ten')[$index];
            $author = TacGia::where('TG_Ten', $TG_Ten)->first();
            if (!$author) {
                 $author = TacGia::create(['TG_Ten' => $TG_Ten]);
            }   

            $sach = Sach::create([
                'NXB_Ma' => $request->input('NXB_Ten')[$index],
                'NCC_Ma' => $request->input('NCC_Ten')[$index],
                'TG_Ma' => $author->TG_Ma,
                'DM_Ma' => $request->input('S_Danhmuc')[$index],
                'S_Ten' => $request->input('S_Ten')[$index],
                'S_GiaBan' => $request->input('S_GiaBan')[$index],
                'S_Mota' => $request->input('S_Mota')[$index],
                'S_SoLuong' => $request->input('S_SoLuong')[$index],
                'S_NamXuatBan' => $request->input('S_NamXuatBan')[$index],
                'S_DichGia' => $request->input('S_DichGia')[$index],
                'S_SoTrang' => $request->input('S_SoTrang')[$index],
                'S_TrongLuong' => $request->input('S_TrongLuong')[$index],
                'S_HinhAnh' => $productImgURL,
            ]);

            $S_Ma = $sach->S_Ma;
        }
       
        // Tạo chi tiết hóa đơn nhập mới
        ChiTietHoaDonNhap::create([
            'CTHDN_SoLuong' => $request->input('S_SoLuong')[$index],
            'CTHDN_Gia' => $request->input('S_GiaBan')[$index],
            'S_Ma' => $S_Ma,
            'HDN_Ma' => $hoadonnhap->HDN_Ma,
        ]);
    }

    Session::flash('add-success', 'Thêm hóa đơn nhập thành công');
    return redirect()->route('admin-new-importwarehouse');
    }
    public function getUpdateImportwarehouse($id) {
        $hoadonnhap = DB::table('hoadonnhap')
        ->where('hoadonnhap.HDN_Ma', '=', $id)
        ->first();
        $chitiethoadonnhap = DB::table('chitiethoadonnhap')
        ->join('sach','chitiethoadonnhap.S_Ma','=','sach.S_Ma')
        ->join('tacgia','sach.TG_Ma','=','tacgia.TG_Ma')
        ->where('HDN_Ma','=', $id)
        ->get();
        $categorybook = Danhmucsanpham::all();
        $author = Tacgia::all();
        $ncc = Nhacungcap::all();
        $nxb = Nhaxuatban::all();
        return view('admin.importwarehouse.update-importwarehouse',compact('id','hoadonnhap','chitiethoadonnhap','categorybook','author','nxb','ncc'));
    }
    public function updateImportwarehouse($id, ImportWarehouseRequest $request)
    {
    $hoadonnhap = Hoadonnhap::find($id);
    $ngayNhap = Carbon::createFromFormat('Y-m-d', $request->input('HDN_NgayNhap'));
    // $currentUser = Auth::user();

    // Tạo hóa đơn mới
    $hoadonnhap->update([
        'HDN_NgayNhap' => $ngayNhap, // Lưu ngày giờ dưới dạng Carbon
        'HDN_Ghichu' => $request->input('HDN_Ghichu'),
    ]);

    foreach ($request->input('S_Ten') as $index => $tenSanPham) {
        $sach = Sach::where('S_Ten', $tenSanPham)->first();
        $file = $request->file('book-img')[$index] ?? null;

        if ($sach) {
            $file = $request->file('book-img')[$index] ?? null;

            if ($file) {
                $productImg = $file->getClientOriginalName();
                $avtdb = '/storage/images/products/' . $productImg;
                $path = 'public/storage/images/products/';
                $file->move(base_path($path), $productImg);
                $productImgURL = $avtdb;
            } else {
                $productImgURL = $sach->S_HinhAnh;
            }
            $TG_Ten = $request->input('TG_Ten')[$index];
            $author = TacGia::where('TG_Ten', $TG_Ten)->first();
            if (!$author) {
                 $author = TacGia::create(['TG_Ten' => $TG_Ten]);
            }   

            $sach->update([
                'NXB_Ma' => $request->input('NXB_Ten')[$index],
                'NCC_Ma' => $request->input('NCC_Ten')[$index],
                'TG_Ma' => $author->TG_Ma,
                'DM_Ma' => $request->input('S_Danhmuc')[$index],
                'S_Ten' => $request->input('S_Ten')[$index],
                'S_GiaBan' => $request->input('S_GiaBan')[$index],
                'S_Mota' => $request->input('S_Mota')[$index],
                'S_SoLuong' => $request->input('S_SoLuong')[$index],
                'S_NamXuatBan' => $request->input('S_NamXuatBan')[$index],
                'S_DichGia' => $request->input('S_DichGia')[$index],
                'S_SoTrang' => $request->input('S_SoTrang')[$index],
                'S_TrongLuong' => $request->input('S_TrongLuong')[$index],
                'S_HinhAnh' => $productImgURL,
            ]);


            $S_Ma = $sach->S_Ma;
        } else {
            if ($file) {
                $productImg = $file->getClientOriginalName();
                $avtdb = '/storage/images/products/' . $productImg;
                $path = 'public/storage/images/products/';
                $file->move(base_path($path), $productImg);
                $productImgURL = $avtdb;
            } else {
                $productImgURL = '/storage/images/admin/book-default.png';
            }
            $TG_Ten = $request->input('TG_Ten')[$index];
            $author = TacGia::where('TG_Ten', $TG_Ten)->first();
            if (!$author) {
                 $author = TacGia::create(['TG_Ten' => $TG_Ten]);
            }   

            $sach = Sach::create([
                'NXB_Ma' => $request->input('NXB_Ten')[$index],
                'NCC_Ma' => $request->input('NCC_Ten')[$index],
                'TG_Ma' => $author->TG_Ma,
                'DM_Ma' => $request->input('S_Danhmuc')[$index],
                'S_Ten' => $request->input('S_Ten')[$index],
                'S_GiaBan' => $request->input('S_GiaBan')[$index],
                'S_Mota' => $request->input('S_Mota')[$index],
                'S_SoLuong' => $request->input('S_SoLuong')[$index],
                'S_NamXuatBan' => $request->input('S_NamXuatBan')[$index],
                'S_DichGia' => $request->input('S_DichGia')[$index],
                'S_SoTrang' => $request->input('S_SoTrang')[$index],
                'S_TrongLuong' => $request->input('S_TrongLuong')[$index],
                'S_HinhAnh' => $productImgURL,
            ]);

            $S_Ma = $sach->S_Ma;
        }

        chitiethoadonnhap::where('HDN_Ma', $id)
            ->where('S_Ma', $S_Ma)
            ->update([
                'CTHDN_SoLuong' => $request->input('S_SoLuong')[$index],
                'CTHDN_Gia' => $request->input('S_GiaBan')[$index],
            ]);
    }

    Session::flash('update-success', 'Cập nhật hóa đơn nhập thành công');
    return redirect()->route('admin-importwarehouse', compact('id'));
    }


    public function deleteImportwarehouse(Request $request) {
           
        $import_id = $request->input('importwarehouse_id');

        $hasDetails = chitiethoadonnhap::where('HDN_Ma', $import_id)->exists();

        // Nếu có chi tiết hóa đơn nhập
        if ($hasDetails) {
            chitiethoadonnhap::where('HDN_Ma', $import_id)->delete();
        }

        hoadonnhap::destroy($import_id);

        Session::flash('delete-success', 'Xóa hóa đơn nhập thành công');
        return redirect()->route('admin-importwarehouse');
    }
}
