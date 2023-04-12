<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\Cart;
use App\Models\User;
use App\Repositories\UserRepositoryRepository;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryRepository $userRepository)
    {
      $this->userRepository = $userRepository;
    }

    public function createUser(Request $request)
    {
      $avatar = $request->file('avatar');
      $avatarPath = $avatar->store('public/images/users');

      $avatarUrl = Storage::url($avatarPath);
      $role = $request->input('role');
      $lastname = $request->input('lastname');
      $firstname = $request->input('firstname');
      $phonenumber = $request->input('phonenumber');
      $email = $request->input('email');
      $password = Hash::make($request->input('password'));
      $address= $request->input('address');

      $user = User::create(
        [
          'role_id' => $role,
          'first_name' => $firstname,
          'last_name' => $lastname,
          'phone_number' => $phonenumber,
          'email' => $email,
          'password' => $password,
          'user_address' => $address,
          'link_avt' => $avatarUrl
        ]
      );
      // tao cart moi cho nguoi dung
      Cart::create([
        'user_id' => $user->id,
      ]);
      Session::flash('message', 'Create User successfully.');
      return redirect()->route('admin-users');
    }

    public function update()
    {

    }

    public function delete(Request $request)
    {
      $id = $request->input('user_id');
      if ($id === 'undefined') {
        Session::flash('delete-failed', 'không thể xóa người dùng này.');
        return redirect()->route('admin-users');
      }
      $user = User::find($id);
      $user->delete();
      Session::flash('delete-success', 'Xóa người dùng thành công.');
      return redirect()->route('admin-users');

    }

    public function getAll()
    {

    }

    public function editUser($id) {
      $user = User::find($id);
      return view('admin.user.edit-user', compact('user'));
    }

    public function updateUser(Request $request, $id) {
      $user = User::find($id);
      // tìm xóa avatar cũ
      $avatar = $request->file('avatar');
      if ($avatar) {
        $avatarPath = $avatar->store('public/images/users');
        $avatarUrl = Storage::url($avatarPath);
        $filePath = public_path($user->link_avt);
        if (File::exists($filePath)) {
          File::delete($filePath);
        }
      } else if($user->link_avt) {
        $avatarUrl = $user->link_avt;
      } else {
        $avatarUrl = Storage::url('images/admin/avatar-default.png');
      }

      $role = $request->input('role');
      $lastname = $request->input('lastname');
      $firstname = $request->input('firstname');
      $phonenumber = $request->input('phonenumber');
      $email = $request->input('email');
      $address= $request->input('address');

      DB::table('users')
        ->where('id', $id)
        ->update([
          'role_id' => $role,
          'first_name' => $firstname,
          'last_name' => $lastname,
          'phone_number' => $phonenumber,
          'email' => $email,
          'user_address' => $address,
          'link_avt' => $avatarUrl
        ]);
      Session::flash('update-success', 'Cập nhật người dùng thành công.');
      return redirect()->route('admin-users');
    }

    public function editProfile(Request $request) {
      dd($request);
    }

    public function changePassword(ChangePasswordRequest $request) {
      $oldPassword = $request->input('old_password');
      $newPassword = $request->input('new_password');
      $confirmPassword = $request->input('confirm_password');

      // Kiểm tra mật khẩu cũ có khớp không
      if (!Hash::check($oldPassword, Auth::user()->password)) {
        return back()->withErrors(['old_password' => 'Password incorrect']);
      }

      // Kiểm tra mật khẩu mới và xác nhận mật khẩu có khớp nhau không
      if ($newPassword !== $confirmPassword) {
        return back()->withErrors(['confirm_password' => 'Confirm Password incorrect']);
      }

      // Cập nhật mật khẩu mới cho người dùng
      $user = Auth::user();
      $user->password = Hash::make($newPassword);
      $user->save();
      return redirect()->route('admin-profile')->with('success', 'Change Password Successfully!');
    }


    public function searchByName(Request $request) {
      $name = $request->input('user-name');

      $page = $request->query('page', 1);
      $results = DB::table('users')
      ->join('role', 'users.role_id', '=', 'role.role_id')
      ->select('users.*', 'role.role_name')
      ->whereRaw("CONCAT(users.last_name, ' ', users.first_name) LIKE '%{$name}%'")
      ->paginate(5);

      return view('admin.user.result-search-user', compact('results', 'page', 'name'));
    }
}
