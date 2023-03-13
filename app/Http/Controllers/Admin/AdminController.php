<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function logout() {
        return view('home');
    }

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
}
