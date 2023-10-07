<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct() {
        
    }

    public function getLogin() {
        return view ('Auth.login');
    }

    public function getRegister()
    {
        return view('Auth.register');
    }
    public function postRegister(RegisterRequest $request) {
        echo "Post Register";
        dd($request);
        // $nd_ten = $request->input('fullname');
        // $nd_email = $request->input('email');
        // $nd_matkhau =  Hash::make($request->input('password'));
        // $nd_vaitro = $request->input('role');
        // $user = DB::table('nguoidung')->where('nd_email', $nd_email)->first();
        
        
        //     $newUser = new User();
        //     $newUser->vt_ma =  $nd_vaitro;
        //     $newUser->nd_ten = $nd_ten;
        //     $newUser->nd_email = $nd_email;
        //     $newUser->nd_matkhau = $nd_matkhau;
        //     $newUser->save();
        
    }
}
