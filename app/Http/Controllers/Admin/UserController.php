<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\Cart;
use App\Models\User;
use App\Repositories\UserRepositoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryRepository $userRepository)
    {
      $this->userRepository = $userRepository;
    }

  public function checkBlock($userId) {
    $totalOrdersCanceled = DB::table('users')
      ->join('orders', 'users.id', '=', 'orders.user_id')
      ->where('orders.status_id', '=', 4)
      ->whereRaw("users.id = $userId")
      ->count();
    return $totalOrdersCanceled > 5;
  }

  public function users(Request $request) {
    $page = $request->query('page', 1);
    $userName = $request->input('user-name') ?? null;

    $query = DB::table('users')
      ->join('role', 'users.role_id', '=', 'role.role_id')
      ->join('account_status', 'users.status_id', '=', 'account_status.status_id')
      ->whereNull('users.deleted_at');


    if(!empty($userName)) {
      $query->where(function ($query) use ($userName) {
        $query->where(DB::raw("CONCAT(users.last_name, ' ', users.first_name)"), 'LIKE', '%' . $userName . '%');
      });
    }
    $users = $query
      ->select(
        'users.*',
        'role.role_name',
        'account_status.status_id',
        'account_status.status_name'
      )
      ->paginate(5);


//    foreach ($users as $user) {
//      if ($this->checkBlock($user->id)) {
//        DB::table('users')
//          ->where('id', '=', $user->id)
//          ->update([
//            'status_id' => 1
//          ]);
//      } else {
//        DB::table('users')
//          ->where('id', '=', $user->id)
//          ->update([
//            'status_id' => 0
//          ]);
//      }

    return view('admin.user.user', compact('users', 'page', 'userName'));
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
      $address = $request->input('address');

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

    public function delete(Request $request)
    {
      $userId = $request->input('user_id');
      if ($userId === 'undefined') {
        Session::flash('delete-failed', 'không thể xóa người dùng này.');
        $url = route('admin-users');
        return response()->json(['url' => $url]);
      }
      $user = User::find($userId);
      $user->delete();

      Session::flash('delete-success', 'Xóa người dùng thành công.');
      $url = route('admin-users');
      return response()->json(['url' => $url, 'id' => $userId]);
    }

    public function rollback(Request $request) {
      $userId = $request->input('user_id');

      $user = User::withTrashed()->where('id', $userId)->first();
      $user->restore();

      $url = route('admin-users');
      return response()->json(['url' => $url, 'id' => $userId]);
    }

    public function commit(Request $request) {
      $userId = $request->input('user_id');

      $user = User::withTrashed()->where('id', $userId)->first();
      $user->orders()->delete();
      $user->forceDelete();

      $url = route('admin-users');
      return response()->json(['url' => $url]);
    }




}
