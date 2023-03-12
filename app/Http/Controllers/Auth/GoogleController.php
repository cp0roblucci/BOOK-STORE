<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

            $user = User::where('email', $googleUser->email)->first();
            if ($user) {
                throw  new \Exception(__('Goole sign in email existed!'));
            }
            $nameArr = explode(' ', $googleUser->name, 2);
            $password = bin2hex(random_bytes(10));
            $user = User::create(
                [
                    'first_name' => $nameArr[1],
                    'last_name' => $nameArr[0],
                    'google_id' => $googleUser->id,
                    'email' => $googleUser->email,
                    'password' => Hash::make($password),
                ]
            );
            Auth::login($user);
            session()->flash('loginGoogleSuccess', 'You have logged in with Google.');
            return redirect()->route('complete-info');
        } catch (\Exception $exception) {
            return response()->json([
                'status' => __('google sign in failed'),
                'error' => $exception,
                'message' => $exception->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function completeInfo(Request $request) {
        echo "Complete Info";
        dd($request);
//        session()->forget('success');
    }
}
