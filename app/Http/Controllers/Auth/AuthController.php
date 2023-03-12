<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Constant\UrlConstant;
class AuthController extends Controller
{
    public function getLogin()
    {
        return view('Auth.login-register');
    }

    public function postLogin(Request $request)
    {
        Echo "Post Login";
//        dd($request);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {
            $user = User::where('email', $request->input('email'))->first();
            Auth::login($user, $request->get('rememberme'));
            if ($user->role_id) {
                return redirect( UrlConstant::DASHBOARD);
            } else {
                return redirect(RouteServiceProvider::HOME);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function getRegister()
    {
        return view('Auth.login-register');
    }

    public function postRegister(Request $request)
    {
        echo "Post Register";
        dd($request);
    }

    public function completeInfo()
    {
        return view('Auth.complete-info');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
