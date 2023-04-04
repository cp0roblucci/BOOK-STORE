<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function getGoogleSignIn() {
        try {
            $url = Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
            return redirect($url);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function loginCallback(Request $request) {
        try {
            $state = $request->input('state');

            parse_str($state, $result);
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('google_id', $googleUser->id)->first();
            if ($user) {
                Auth::login($user);
                return redirect(RouteServiceProvider::HOME);
            }
            $userEmail = User::where('email', $googleUser->email)->first();
            if ($userEmail) {
//                Auth::login($userEmail);
//                return redirect(RouteServiceProvider::HOME);
                session()->flash('email-exists', 'Email is existed.');
                return redirect()->route('register');
            }
            $nameArr = explode(' ', $googleUser->name, 2);
            $user = User::create(
                [
                    'first_name' => $nameArr[1],
                    'last_name' => $nameArr[0],
                    'google_id' => $googleUser->id,
                    'email' => $googleUser->email,
                    'password' => '',
                ]
            );
            // tao cart moi cho nguoi dung
            Cart::create([
              'user_id' => $user->id,
            ]);

            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => __('google sign in failed'),
                'error' => $exception,
                'message' => $exception->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

}
