<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard() {
        $totalCustomer = User::where('role_id', '=',  0)->count();
        // dd($totalCustomers);
        return view('admin.dashboard', compact('totalCustomer'));
    }

    public function accessories(Request $request) {
      $page = $request->query('page', 1);
      $accessories = DB::table('accessories')->paginate(5);
      return view('admin.accessories', compact('accessories', 'page'));
    }

  public function fish(Request $request) {
    $page = $request->query('page', 1);
    $fish= DB::table('fish')->paginate(5);
    return view('admin.fish', compact('fish', 'page'));
  }

  public function users(Request $request) {
    $page = $request->query('page', 1);
    $users = DB::table('users')
      ->join('role', 'users.role_id', '=', 'role.role_id')
      ->select('users.*', 'role.role_name')
      ->paginate(5);
    return view('admin.user', compact('users', 'page'));
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
