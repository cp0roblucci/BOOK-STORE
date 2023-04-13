<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accessories;
use App\Models\AccessoriesType;
use App\Models\Fish;
use App\Models\FishSpecies;
use App\Models\HasSize;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard() {
      // tong sl ca
      $fish = Fish::all()->count();
      // tong sl phu kien
      $accessories = Accessories::all()->count();
      // tong sl san pham
      $totalProduct = $fish + $accessories;
      // tong sl customer
      $totalCustomer = User::where('role_id', '=',  0)->count();
      // dd($totalCustomers);

      $totalOrder = Order::all()->count();

      return view('admin.dashboard', compact('totalCustomer', 'totalProduct', 'totalOrder'));
    }

    public function accessories(Request $request) {
      $page = $request->query('page', 1);
      $accessories = DB::table('accessories')
        ->join('accessories_type', 'accessories_type.accessories_type_id', '=', 'accessories.accessories_type_id')
        ->select('accessories.*', 'accessories_type.accessories_type_name')
        ->paginate(5);
//      dd($accessories);
      return view('admin.accessories.accessories', compact('accessories', 'page'));
    }

  public function fish(Request $request) {
    $page = $request->query('page', 1);
    $data = DB::table('fish')
      ->join('has_size', function ($join) {
        $join->on('fish.fish_species', '=', 'has_size.fish_species')
            ->on('fish.fish_size', '=', 'has_size.size');
      })
      ->join('fish_import_batches', 'fish.fish_id', '=', 'fish_import_batches.fish_id')
      ->select('fish.*', 'has_size.has_price', 'fish_import_batches.quantity')
      ->paginate(5);

    return view('admin.fish.fish', compact('data', 'page'));
  }

  public function store() {
      // fish
    $listSpecies = FishSpecies::all();
    foreach ($listSpecies as $key => $data) {
      $values = DB::table('fish')
        ->join('fish_import_batches', 'fish.fish_id', '=', 'fish_import_batches.fish_id')
        ->select('fish.fish_name', 'fish_import_batches.quantity')
        ->get();
      if ($values->count() != 0) {
        $dataFish[$key] = DB::table('has_size')
          ->where('has_size.fish_species', '=', $data->fish_species)
          ->get();
      }
    }

    // accessories
    $listAccessoriesType = AccessoriesType::all();
    foreach ($listAccessoriesType as $key => $data) {
      $values = DB::table('accessories')
        ->join('accessories_import_batches', 'accessories.accessories_id', '=', 'accessories_import_batches.accessories_id')
        ->select('fish.fish_name', 'fish_import_batches.quantity')
        ->get();
      if ($values->count() != 0) {
        $dataAccessories[$key] = DB::table('has_size')
          ->where('has_size.fish_species', '=', $data->fish_species)
          ->get();
      }
    }

    return view('admin.fish.list-price-product', compact('dataFish', 'listSpecies', 'dataAccessories', 'listAccessoriesType'));
  }

  public function users(Request $request) {
    $page = $request->query('page', 1);
    $users = DB::table('users')
      ->join('role', 'users.role_id', '=', 'role.role_id')
      ->select('users.*', 'role.role_name')
      ->paginate(5);
    return view('admin.user.user', compact('users', 'page'));
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
