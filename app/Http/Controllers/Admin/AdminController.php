<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function profile() {
        return view('admin.profile');
    }

    public function product() {
        return view('admin.product');
    }

    public function order() {
        return view('admin.order');
    }

    public function category() {
        return view('admin.category');
    }

    public function logout() {
        session()->flush();
        Cache::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
