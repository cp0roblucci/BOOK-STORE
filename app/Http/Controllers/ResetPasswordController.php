<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Jobs\SendMail;
use App\Models\PasswordReset;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function getForgotPassword() {
        return view('auth.forgot-password');
    }
    public function sendMail(Request $request)
    {
        $validateEmail = $request->validate([
            'email' => 'required|email',
        ]);
        $email = $validateEmail['email'];
        $user = User::where('email', $email)->first();
        if (!$user) {
            session()->flash('message-error', "Not found account");
            return redirect()->route('forgot-password');
        }
        $token = Str::random(60);
        $url = url('reset-password/?token=' . $token);
        $content = [
            'title' => env('MAIL_RESET_PASSWORD_TITLE'),
            'line1' => env('MAIL_RESET_PASSWORD_NOTIFY_MESSAGE'),
            'url' => $url,
            'line2' => env('MAIL_RESET_PASSWORD_SKIP_MESSAGE'),
        ];
        $user = User::where('email', $email)->first();
        PasswordReset::updateOrCreate([
            'email' => $user->email,
            'token' => $token,
        ]);
        SendMail::dispatch($content, $email)->delay(now()->addMinute(1));
        session()->flash('message-success', "We have emailed your password reset link!");
        return redirect()->route('forgot-password');
    }

    public function resetPassword(Request $request, $token = null) {
        $token = $request->input('token');
        $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(5)->isPast()) {
            $passwordReset->delete();
            session()->flash('message-error', 'This password reset token has expired. Please request a new one.');
            return redirect()->route('forgot-password');
        }
        return view('auth.reset-password')->with('token', $token);
    }

    public function reset(ResetPasswordRequest $request, $token = null) {
        $token = $request->input('token') ?? $token;
        $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
        $user = User::where('email', $passwordReset->email)->first();
        $password = Hash::make($request->input('password'));
        $updatePasswordUser = $user->update([
            'password' => $password,
        ]);
        $passwordReset->delete();
        session()->flash('message', $updatePasswordUser);
        return redirect(RouteServiceProvider::HOME);
    }
}
