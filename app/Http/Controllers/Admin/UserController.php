<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\UserRepositoryRepository;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryRepository $userRepository)
    {
      $this->userRepository = $userRepository;
    }

    public function index(Request $request) {
      $page = $request->query('page', 1);
      $users = DB::table('users')->paginate(5);
      return view('admin.user', compact('users', 'page'));
    }

    public function createUser(Request $request)
    {
//      dd($request);
//      $file = $request->file('file');
//      $response = Cloudinary::upload($file->getRealPath())->getSecurePath();

//      upload vào thư mục ct299/admin ten file la avatar
      $result = $request->file->storeOnCloudinaryAs('ct299/admin', 'avatar');
//      echo $result->getPath();
//      echo "</br>";
//      echo $result->getPublicId();

//      $url = cloudinary()->getUrl($result->getPublicId());
//      echo $url;

      $file = $request->file('file');
      $result = $request->file->storeOnCloudinaryAs('ct299/admin', 'avatar');
      $avatar = $result->getPath();
      $role = $request->input('role');
      $lastname = $request->input('lastname');
      $firstname = $request->input('firstname');
      $phonenumber = $request->input('phonenumber');
      $email = $request->input('email');
      $password = Hash::make($request->input('password'));
      $address= $request->input('address');

      User::create(
        [
          'role_id' => $role,
          'first_name' => $firstname,
          'last_name' => $lastname,
          'phone_number' => $phonenumber,
          'email' => $email,
          'password' => $password,
          'user_address' => $address,
          'link_avt' => $avatar
        ]
      );
      Session::flash('message', 'Create User successfully.');
      return redirect()->route('admin-users');
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function getAll()
    {

    }
}
