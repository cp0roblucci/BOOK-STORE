<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nhaxuatban;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class NXBController extends Controller
{
    public function newNXB() {
        $nxb = Nhaxuatban::all();
        return view('admin.nxb.new-nxb',compact('nxb'));
    }
    public function createNXB(Request $request){
        
        Nhaxuatban::create([
            'NXB_Ten' => $request->NXB_Ten,
            'NXB_DiaChi' => $request->NXB_DiaChi
        ]);
        Session::flash('add-success', 'Thêm nhà xuất bản thành công.');
        return redirect()->route('admin-new-nxb');
    }

    public function getUpdateNXB($id) {
        
        $nxb = DB::table('Nhaxuatban')
        ->where('NXB_Ma', '=', $id)
        ->first();
        
        return view('admin.nxb.update-nxb',compact('nxb'));
    }
    public function updateNXB(Request $request,$id) {
        $nxb = DB::table('Nhaxuatban')
        ->where('NXB_Ma', '=', $id)
        ->update([
            'NXB_Ten' => $request->NXB_Ten,
            'NXB_DiaChi' => $request->NXB_DiaChi
        ]);
        Session::flash('update-success', 'Cập nhật Nhà xuất bản thành công');
        return redirect()->route('update-nxb',compact('id', 'nxb'));
    }

    public function delete(Request $request)
    {
      $nxb_id = $request->input('nxb_id');
      Nhaxuatban::where('NXB_Ma', $nxb_id)->delete();
      Session::flash('delete-success', 'Xóa nhà xuất bản thành công');
      return redirect()->route('admin-nxb');
    }
}
