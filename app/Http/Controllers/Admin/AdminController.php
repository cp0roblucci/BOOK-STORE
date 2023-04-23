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

  public function index() {
    $totalNewOrder = DB::table('orders')
        ->where('status_id', '=', 0)
        ->count();
    return view('admin.layout.main', compact('totalNewOrder'));
  }

    public function getTopFish($categoryId, $limit = 2, $isDescending = true) {
      return DB::table('order_details')
        ->join('fish', 'fish.fish_id', '=', 'order_details.product_id')
        ->join('fish_species', 'fish.fish_species', '=', 'fish_species.fish_species')
        ->select('fish.fish_name', 'fish_species.fish_species', DB::raw('SUM(quantity) as totalQuantity'))
        ->where('order_details.category_id', '=', $categoryId)
        ->groupBy('fish.fish_name', 'fish_species.fish_species')
        ->orderBy('totalQuantity', $isDescending ? 'desc' : 'asc')
        ->take($limit)
        ->get();
    }
    public function getTopAccessories($categoryId, $limit = 2, $isDescending = true) {
      return DB::table('order_details')
        ->join('accessories', 'accessories.accessories_id', '=', 'order_details.product_id')
        ->join('accessories_type', 'accessories_type.accessories_type_id', '=', 'accessories.accessories_type_id')
        ->select('accessories.accessories_name', 'accessories_type.accessories_type_name', DB::raw('SUM(quantity) as totalQuantity'))
        ->where('order_details.category_id', '=', $categoryId)
        ->groupBy('accessories.accessories_name', 'accessories_type.accessories_type_name')
        ->orderBy('totalQuantity', $isDescending ? 'desc' : 'asc')
        ->take($limit)
        ->get();
    }
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

      // tong don dat hang
      // $totalOrder = Order::all()->count();
      $totalNewOrder = DB::table('orders')
        ->where('status_id', '=', 0)
        ->count();

      session()->put('newOrders', $totalNewOrder);

      // Khach hang mua nhieu nhat
      $topCustomer = DB::table('users')
        ->join('orders', 'users.id', '=', 'orders.user_id')
        ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
        ->select('users.first_name', 'users.last_name', 'users.phone_number', 'users.email', 'users.user_address', DB::raw('SUM(order_details.price * order_details.quantity) AS total_spent'))
        ->groupBy('users.first_name',  'users.last_name', 'users.phone_number', 'users.email', 'users.user_address',)
        ->orderByDesc('total_spent')
        ->limit(2)
        ->get();

      // ca ban nhieu nhat
      $mostFish = $this->getTopFish(1, 2, true);
      // ca ban it nhat
      $leastFish = $this->getTopFish(1, 2, false);

      // phu kien ban nhieu nhat
      $mostAccessories = $this->getTopAccessories(0, 2, true);

      // phu kien ban it nhat
      $leastAccessories = $this->getTopAccessories(0, 2, false);

      return view('admin.dashboard',
        compact('totalCustomer', 'totalProduct', 'totalNewOrder', 'topCustomer', 'mostFish', 'leastFish', 'mostAccessories', 'leastAccessories')
      );
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
//       fish
    $listSpecies = FishSpecies::all();
    foreach ($listSpecies as $keys => $species) {
      $arrSpecies[$keys] = DB::table('fish')
        ->join('fish_species', 'fish.fish_species', '=', 'fish_species.fish_species')
        ->where('fish_species.fish_species', '=', $species->fish_species)
        ->select('fish.fish_id')
        ->get();

    }
    foreach ($arrSpecies as $key => $value) {
      $species1[$key] = $value;
    }
//    dd($species1);
    foreach ($species1 as $keys => $data) {
      foreach ($data as $key => $data1) {
        $dataFish[$keys][$key] = DB::table('fish_import_batches')
          ->join('fish', 'fish.fish_id', '=', 'fish_import_batches.fish_id')
          ->where('fish_import_batches.fish_id', '=', $data1->fish_id)
          ->select('fish.fish_name', 'fish.fish_id', 'fish_import_batches.quantity')
          ->first();
      }
    }

    // accessories
    $listAccessoriesType = AccessoriesType::all();
    foreach ($listAccessoriesType as $keys => $accessoriesType) {
      $arrAccessories[$keys] = DB::table('accessories')
        ->join('accessories_type', 'accessories.accessories_type_id', '=', 'accessories_type.accessories_type_id')
        ->where('accessories_type.accessories_type_id', '=', $accessoriesType->accessories_type_id)
        ->select('accessories.accessories_id')
        ->get();

    }
    foreach ($arrAccessories as $key => $data) {
      $arrAccessoriesId[$key] = $data;
    }
//    dd($species1);
    foreach ($arrAccessoriesId as $keys => $accessoreisIds) {
      foreach ($accessoreisIds as $key => $value) {
        $dataAccessories[$keys][$key] = DB::table('accessories_import_batches')
          ->join('accessories', 'accessories.accessories_id', '=', 'accessories_import_batches.accessories_id')
          ->where('accessories_import_batches.accessories_id', '=', $value->accessories_id)
          ->select('accessories.accessories_name', 'accessories.accessories_id', 'accessories_import_batches.quantity')
          ->first();
      }
    }

    return view('admin.products.store', compact('dataFish', 'listSpecies', 'dataAccessories', 'listAccessoriesType'));
  }


  public function updateQuantity(Request $request) {
    $productId = $request->input('product_id');
    $newQuantity = $request->input('new-quantity');

    $fish = DB::table('fish')
      ->where('fish_id', '=', $productId)
      ->first();

    if ($fish) {
      DB::table('fish_import_batches')
        ->where('fish_id', '=', $productId)
        ->update(['quantity' => $newQuantity]);
      return redirect()->back()->with('update-quantity-success', 'Cập nhật số lượng thành công');
    }

    DB::table('accessories_import_batches')
      ->where('accessories_id', '=', $productId)
      ->update(['quantity' => $newQuantity]);

    return redirect()->back()->with('update-quantity-success', 'Cập nhật số lượng thành công');
  }

  public function searchQuantity(Request $request) {
      $name = $request->input('product-type');
      $typeProduct = DB::table('fish_species')
        ->where('fish_species', 'LIKE', '%'. $name .'%')
        ->first();

      if ($typeProduct) {
        $arrSpecies = DB::table('fish')
          ->join('fish_species', 'fish.fish_species', '=', 'fish_species.fish_species')
          ->where('fish_species.fish_species', '=', $typeProduct->fish_species)
          ->select('fish.fish_id')
          ->get();
//        dd($arrSpecies);
        foreach ($arrSpecies as $key => $value) {
          $data[$key] = DB::table('fish_import_batches')
            ->join('fish', 'fish.fish_id', '=', 'fish_import_batches.fish_id')
            ->where('fish_import_batches.fish_id', '=', $value->fish_id)
            ->select('fish.fish_name', 'fish.fish_id', 'fish_import_batches.quantity')
            ->first();
        }
        return view('admin.products.result-search-store', compact('data', 'typeProduct'));
      }

    $typeAccessories = DB::table('accessories_type')
      ->where('accessories_type_name', 'LIKE', '%'. $name .'%')
      ->first();
    $listAccessories = DB::table('accessories')
      ->join('accessories_type', 'accessories.accessories_type_id', '=', 'accessories_type.accessories_type_id')
      ->where('accessories_type.accessories_type_id', '=', $typeAccessories->accessories_type_id)
      ->select('accessories.accessories_id')
      ->get();
    foreach ($listAccessories as $key => $value) {
      $data[$key] = DB::table('accessories_import_batches')
        ->join('accessories', 'accessories.accessories_id', '=', 'accessories_import_batches.accessories_id')
        ->where('accessories_import_batches.accessories_id', '=', $value->accessories_id)
        ->select('accessories.accessories_name', 'accessories.accessories_id', 'accessories_import_batches.quantity')
        ->first();

    }
//    dd($typeProduct);
    return view('admin.products.result-search-store', compact('data', 'typeAccessories', 'typeProduct'));
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
