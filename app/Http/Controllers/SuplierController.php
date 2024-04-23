<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nhacungcap;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class SuplierController extends Controller
{
    public function newSupplier() {
        $ncc = Nhacungcap::all();
        return view('admin.supplier.new-supplier',compact('ncc'));
    }
    public function createSupplier(Request $request){
        
        Nhacungcap::create([
            'NCC_Ten' => $request->NCC_Ten,
            'NCC_Diachi' => $request->NCC_Diachi,
            'NCC_Email' => $request->NCC_Email,
            'NCC_SDT' => $request->NCC_SDT
        ]);
        Session::flash('add-success', 'Thêm nhà cung cấp thành công.');
        return redirect()->route('admin-new-supplier');
    }
    public function getUpdateSupplier($id) {
        
        $ncc = DB::table('Nhacungcap')
        ->where('NCC_Ma', '=', $id)
        ->first();
        
        return view('admin.supplier.update-supplier',compact('ncc'));
    }

    public function updateSupplier(Request $request,$id) {
        $ncc = DB::table('Nhacungcap')
        ->where('NCC_Ma', '=', $id)
        ->update([
            'NCC_Ten' => $request->NCC_Ten,
            'NCC_Diachi' => $request->NCC_Diachi,
            'NCC_Email' => $request->NCC_Email,
            'NCC_SDT' => $request->NCC_SDT
        ]);
        Session::flash('update-success', 'Cập nhật Nhà cung cấp thành công');
        return redirect()->route('update-supplier',compact('id', 'ncc'));
    }

    public function delete(Request $request)
    {
      $supplier_id = $request->input('supplier_id');
      Nhacungcap::where('NCC_Ma', $supplier_id)->delete();
      Session::flash('delete-success', 'Xóa nhà cung cấp thành công');
      return redirect()->route('admin-supplier');
    }
}
