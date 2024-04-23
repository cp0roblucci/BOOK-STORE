<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Validation\Rule;
class UserConTroller extends Controller
{
    public function newUser() {
        return view('admin.user.new-user');
    }

    public function createUser(Request $request) {
        $messages = [
            'required' => 'Vui lòng nhập :attribute.',
            'email' => 'Địa chỉ email không hợp lệ.',
            'unique' => 'Địa chỉ email đã tồn tại.',
            'image' => 'Tệp phải là hình ảnh.',
            'mimes' => 'Định dạng ảnh không hợp lệ.',
            'max' => 'Kích thước ảnh không được vượt quá :max kilobytes.',
        ];
    
        // Validate request data
        $request->validate([
            'ND_Ten' => 'required',
            'ND_Email' => [
                'required',
                'email',
                Rule::unique('nguoidung', 'ND_Email'),
            ],
            'password' => 'required|min:6',
            'ND_avt' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $messages);
    
        if($request->files->has('user-img')) {
            $file = $request->file('user-img');
            $userImg = $request->file('user-img')->getClientOriginalName();
      
            $avtdb = '/storage/images/users/'. $userImg ;
            $path = 'public/storage/images/users/';
      
            $file->move(base_path($path), $userImg );
            $avatarUrl = $avtdb;
          } else {
            $avatarUrl = '/storage/images/admin/user_default.png';
          }
        //nd mới
        $user = User::firstOrNew(['ND_Email' => $request->input('ND_Email')], [
            'VT_Ma' => $request->input('ND_VT'),
            'ND_Ten' => $request->input('ND_Ten'),
            'ND_SDT' => $request->input('ND_SDT'),
            'ND_DiaChi' => $request->input('ND_DiaChi'),
            'password' => Hash::make($request->input('password')),
            'ND_avt' => $avatarUrl,
        ]);
        //check tt
        if ($user->exists) {
            session()->flash('add-failed', 'Người dùng đã tồn tại');
        }
    
        $user->save();    
        Session::flash('create-success', 'Tạo người dùng thành công');
        return redirect()->route('admin-users');
    }

    public function getUpdateuser($id) {
        $user = User::find($id);
        
        return view('admin.user.update-user', compact('user'));
    }

    public function updateUser($id,Request $request) {
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
          $ND_VT = $request->input('ND_VT');
          $ND_Ten = $request->input('ND_Ten');
          $ND_SDT = $request->input('ND_SDT');
          $email = $request->input('ND_Email');
          $ND_Diachi = $request->input('ND_DiaChi');
          
          DB::table('nguoidung')
            ->where('ND_Ma', $id)
            ->update([
              'VT_Ma' => $ND_VT,
              'ND_Ten' => $ND_Ten,
              'ND_SDT' => $ND_SDT,
              'ND_Email' => $email,
              'ND_DiaChi' => $ND_Diachi,
              'ND_avt' => $avatarUrl,
            ]);
          Session::flash('update-success', 'Cập nhật người dùng thành công.');
          return redirect()->route('admin-users');
    }   
    public function delete(Request $request)
  {
    $user_id = $request->input('user_id');

    // Kiểm tra xem người dùng có quyền admin không
    $isAdmin = DB::table('nguoidung')
        ->where('ND_Ma', '=', $user_id)
        ->where('VT_Ma', '=', 1)  // VT_Ma == 1 là quyền admin
        ->exists();

    // Kiểm tra xem người dùng có đặt đơn hàng không
    $hasOrders = DB::table('donhang')
        ->where('ND_Ma', '=', $user_id)
        ->exists();

    if ($isAdmin) {
        Session::flash('delete-failed', 'Không thể xóa người dùng với quyền admin.');
    } elseif ($hasOrders) {
        Session::flash('delete-failed', 'Không thể xóa người dùng vì có đơn hàng liên quan.');
    } else {
        // Nếu không có quyền admin và không có đơn hàng, thì xóa người dùng
        DB::table('nguoidung')
            ->where('ND_Ma', '=', $user_id)
            ->delete();

        Session::flash('delete-success', 'Xóa người dùng thành công');
    }

    return redirect()->route('admin-users');
  }
  public function searchUser(Request $request) {
    $ND_Ten = $request->input('ND_Ten');
    $page = $request->query('page', 1);
    $data = DB::table('nguoidung')
        ->join('vaitro', 'nguoidung.VT_Ma', '=', 'vaitro.VT_Ma')
        ->where('nguoidung.ND_Ten', 'LIKE', '%'.  $ND_Ten .'%')
        ->select('nguoidung.*','vaitro.VT_Ten')
        ->paginate(5);

    return view('admin.user.search-user',compact('ND_Ten','data','page'));
  }
}
