<?php

namespace App\Http\Controllers;

use App\Models\Danhmucsanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
class CategorybookController extends Controller
{
    public function getCategorybookPage(){
        
        return view('admin.categorybook.categorybook', compact('categorybook'));
    }

   
    public function newCategorybook() {
        // $DM_Ma = DB::table('danhmucsanpham')
        // ->where('danhmucsanpham.DM_MA')
        // ->get();
        $categorybook = Danhmucsanpham::all();
        $parent = DB::table('danhmucsanpham')
        
        ->where('danhmucsanpham.DM_PhanCap',0)
        ->get();
        return view('admin.categorybook.new-categorybook',compact('categorybook','parent'));
    }

    public function createCategorybook(Request $request){
        
        $phancap = $request->input('DM_PhanCap');

    // Thêm danh mục mới vào CSDL
        Danhmucsanpham::create([
        'DM_Ten' => $request->input('DM_Ten'),
        'DM_PhanCap' => $phancap
        ]);
        Session::flash('add-success', 'Thêm danh mục thành công.');
        return redirect()->route('admin-new-categorybook');
    }

    public function getUpdateCategorybook($id) {
        
        $categorybook = DB::table('danhmucsanpham')
        ->where('DM_Ma', '=', $id)
        ->first();
        $parent = DB::table('danhmucsanpham')
        ->where('danhmucsanpham.DM_PhanCap',0)
        ->get();
        return view('admin.categorybook.update-categorybook',compact('categorybook','parent'));
    }
    public function updateCategorybook(Request $request, $id) {
        // Kiểm tra giá trị của DM_PhanCap được chọn từ form
        $phancap = $request->input('DM_PhanCap');
    
        // Cập nhật danh mục trong CSDL
        DB::table('danhmucsanpham')
            ->where('DM_Ma', '=', $id)
            ->update([
                'DM_Ten' => $request->input('DM_Ten'),
                'DM_PhanCap' => $phancap
            ]);
    
        Session::flash('update-success', 'Cập nhật danh mục thành công');
        
        // Chuyển hướng về trang cập nhật danh mục
        return redirect()->route('admin-categorybook', compact('id'));
    }
    public function delete(Request $request)
    {
      $categorybook_id = $request->input('categorybook_id');
      Danhmucsanpham::where('DM_Ma', $categorybook_id)->delete();
      return redirect()->route('admin-categorybook');
    }
}
