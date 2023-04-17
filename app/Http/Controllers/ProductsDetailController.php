<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use App\Models\FishSpecies;
use App\Models\Accessories;
use App\Models\HasSize;
use App\Models\FishFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsDetailController extends Controller
{

    // public function index(){

    //     return redirect()->route('get-products-detail');
    // }
    public function getProductsDetail($id) {
        
        $data = DB::table('fish')
        ->join('has_size', function ($join) {
            $join->on('fish.fish_species', '=', 'has_size.fish_species')
                  ->on('fish.fish_size', '=', 'has_size.size');
        })
        ->join('fish_food', 'fish.fish_species', '=', 'fish_food.species_fish')
        ->where('fish_id', '=', $id)
        ->select ('fish.*','has_size.has_price','fish_food.food_id')
        ->first();
        // dd($data);
        if($data) {
            return view('/products_detail', compact('data','id'));
        }
        else {
            $data = DB::table('accessories')
            -> where ('accessories_id', '=', $id)
            ->first();
        }
        // dd($data);
     return view('/products_detail', compact('data','id'));
    }
}
