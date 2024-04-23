<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepositoryRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Middleware\AdminMiddleware;

class AuthController extends Controller
{
    public function __construct() {
        
    }

   
    //register ---------------------------
    public function getRegister()
    {
        return view('Auth.register');
    }
    public function postRegister(RegisterRequest $request) {
        
        $nd_ten = $request->input('fullname');
        $nd_email = $request->input('email');
        $nd_matkhau =  Hash::make($request->input('password'));
        $nd_vaitro = $request->input('role');


        $user = DB::table('nguoidung')->where('nd_email', $nd_email)->first();
        
        if ($user) {
            session()->flash('email-exists', 'Email is existed.');
            return redirect()->route('register');
        }
        $user = User::create(
            [
                'VT_Ma' => $nd_vaitro,
                'ND_Ten' => $nd_ten,
                'ND_Email' => $nd_email,
                'password' => $nd_matkhau,
            ]
        );
        session()->flash('create-win', 'Tài khoản của bạn đã được tạo thành công');
        return redirect()->route('login');
    }
    //login ---------------------------
    public function getLogin() {
        return view ('Auth.login');
    }
    public function postLogin(LoginRequest $request) {
        $nd_email = $request->input('email');
        $nd_matkhau = $request->input('password');
        $user = User::where('ND_Email', $nd_email)->first();
        // $user = DB::table('nguoidung')->where('nd_email', $nd_email)->first();
        $remember = $request->input('remember');
       
        if (!$user) {
            session()->flash('account-not-exists', 'Tài khoản không tồn tại.');
            return redirect()->route('login');
        }
        if (Auth::attempt([
            'ND_Email' => $nd_email, 
            'password' => $nd_matkhau ]
            ,$remember)) {
                
            if (Auth::User()->VT_Ma == 1) {
                Auth::login($user);
                return redirect()->route('admin-homepage')->withInput();
            } else {
                Auth::login($user);
                return redirect()->route('home')->withInput();
            } 
           
        }  else {
            session()->flash('incorect-password', 'Mật khẩu sai');
            return redirect()->route('login');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
