<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getLogin() {
        return view('login');
    }

    public function postLogin(Request $request) {

    }

    public function logout() {
        return view('home');
    }

    public function dashboard() {
        return view('admin.dashboard');
    }

    public function account() {
        return view('admin.account');
    }

    public function product() {
        return view('admin.product');
    }

    public function order() {
        return view('admin.order');
    }
}
