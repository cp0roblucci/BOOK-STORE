<?php

namespace App\Http\Controllers\Auth;

use App\Constant\EndpointConstant;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Constant\UrlConstant;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepositoryRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepositoryRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getLogin()
    {
        return view('Auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if (!$user) {
            session()->flash('account-not-exists', 'Account does not exist');
            return redirect()->route('login');
        }
        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {
            $user = $this->userRepository->getUserByEmail($email);
            Auth::login($user, $request->input('remeberme'));
            if ($user->role_id) {
                return redirect(UrlConstant::DASHBOARD);
            } else {
                return redirect(RouteServiceProvider::HOME);
            }
        } else {
            session()->flash('incorect-password', 'Incorect Password');
            return redirect()->route('login');
        }
    }

    public function getRegister()
    {
        return view('Auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        echo "Post Register";
//        dd($request);
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $password =  Hash::make($request->input('password'));

        $user = User::where('email', $email)->first();
        if ($user) {
            session()->flash('email-exists', 'Email is existed.');
            return redirect()->route('register');
        }
        $user = User::create(
            [
                'first_name' => $firstname,
                'last_name' => $lastname,
                'email' => $email,
                'password' => $password,
            ]
        );
        // tao cart moi cho nguoi dung
        Cart::create([
          'user_id' => $user->id,
        ]);
          return redirect(RouteServiceProvider::HOME);
    }


    public function logout() {
        session()->flush();
        Cache::flush();
        Auth::logout();
        return redirect(RouteServiceProvider::HOME);
    }
}
