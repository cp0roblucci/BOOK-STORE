<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use App\Models\FishSpecies;
use App\Models\AccessoriesType;
use App\Models\Accessories;
use App\Models\HasSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{   
    public function create(Request $request)
    {
      dd($request);
    }
    public function index() {
      return redirect()->route('get-product',['category_id' => 1]);
    }
    
    public function getProducts($categoryId) {
      $fishSpecies = FishSpecies::all();
      $accessoriesType = AccessoriesType::all();
      if($categoryId == 1) {
        $data = DB::table('fish')
         ->join('has_size', function ($join) {
           $join->on('fish.fish_species', '=', 'has_size.fish_species')
               ->on('fish.fish_size', '=', 'has_size.size');
         })
        ->select('fish.*', 'has_size.has_price')
        ->get();
        // dd($data);
        
      } else {
        $data = Accessories::all();
      }
      
      return view('/products', compact('data','categoryId','fishSpecies','accessoriesType'));
    }
    public function filterProductsByPrice($categoryId,$priceFilter) {
      $fishSpecies = FishSpecies::all();
      $accessoriesType = AccessoriesType::all();
      if($categoryId == 1) {
      $data = DB::table('fish')
      ->join('has_size', function ($join) {
        $join->on('fish.fish_species', '=', 'has_size.fish_species')
            ->on('fish.fish_size', '=', 'has_size.size');
      })
     ->select('fish.*', 'has_size.has_price')
     ->orderBy('has_size.has_price', $priceFilter)
     ->get();
     
    } else {
      $data = DB::table('accessories')
      ->orderBy('accessories.accessories_price',$priceFilter)
      ->get();
      
    }
    // dd($data);
     return view('/products', compact('data','categoryId','priceFilter','fishSpecies','accessoriesType'));
    }
    

    public function filterProductsByFish($categoryId, $fishSpeciesId) {
      $fishSpecies = FishSpecies::all();
      $accessoriesType = AccessoriesType::all();
      $data = DB::table('fish')
          ->join('has_size', function ($join) use ($fishSpeciesId) {
              $join->on('fish.fish_species', '=', 'has_size.fish_species')
                  ->on('fish.fish_size', '=', 'has_size.size')
                  ->where('fish.fish_species', '=', $fishSpeciesId);
          })
          ->select('fish.*', 'has_size.has_price')
          ->get();
      
      
      return view('/products', compact('data', 'categoryId', 'fishSpecies','accessoriesType'));
  }
  public function filterProductsByAccessories($categoryId, $accessoriesTypeId) {
    $fishSpecies = FishSpecies::all();
    $accessoriesType = AccessoriesType::all();
    $data = DB::table('accessories')
    ->join('accessories_type', 'accessories.accessories_type_id', '=', 'accessories_type.accessories_type_id')
    ->where ('accessories.accessories_type_id','=',$accessoriesTypeId)
    ->get();
    // dd($data);
    return view('/products', compact('data', 'categoryId', 'accessoriesType','fishSpecies'));
  }

  // public function filterProductsPrice($categoryId, $fishPrice) {

  // }
}
