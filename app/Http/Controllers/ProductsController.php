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
    
    public function getProducts($categoryId,$page = 1) {
      $fishSpecies = FishSpecies::all();
      $accessoriesType = AccessoriesType::all();
      if($categoryId == 1) {
        $data = DB::table('fish')
         ->join('has_size', function ($join) {
           $join->on('fish.fish_species', '=', 'has_size.fish_species')
               ->on('fish.fish_size', '=', 'has_size.size');
         })
        ->select('fish.*', 'has_size.has_price')
        // ->get();
        ->paginate(10);
        
        // dd($data);
        
      } else {
        $data = Accessories::paginate(10);
      }
      
      return view('/products', compact('data','categoryId','fishSpecies','accessoriesType','page'));
    }

    public function filterProductsByPrice($categoryId, $priceFilter)
    {
      $fishSpecies = FishSpecies::all();
      $accessoriesType = AccessoriesType::all();
    
      if ($categoryId == 1) {
          $data = DB::table('fish')
              ->join('has_size', function ($join) {
                  $join->on('fish.fish_species', '=', 'has_size.fish_species')
                      ->on('fish.fish_size', '=', 'has_size.size');
              })
              ->select('fish.*', 'has_size.has_price');
    
            // lọc theo giá
          switch ($priceFilter) {
              case 'from_50000':
                  $data = $data->where('has_size.has_price', '<', 50000)->orderBy('has_size.has_price', 'asc');
                  break;
              case 'from_50000_to_150000':
                  $data = $data->whereBetween('has_size.has_price', [50000, 150000])->orderBy('has_size.has_price','asc');
                  break;
              case 'from_150000_to_300000':
                  $data = $data->whereBetween('has_size.has_price', [150000, 300000])->orderBy('has_size.has_price','asc');
                    break;
              case 'from_300000':
                  $data = $data->where('has_size.has_price', '>', 300000)->orderBy('has_size.has_price', 'asc');
                  break;
              case 'desc' : 
                  $data = $data->orderBy('has_size.has_price', 'desc');
                  break;
              case 'asc':
                  $data = $data->orderBy('has_size.has_price', 'asc');
                  break;
          }
          $data = $data->paginate(10);
        } else {
            $data = DB::table('accessories');
            switch ($priceFilter) {
            case 'from_50000':
                  $data = $data->where('accessories.accessories_price', '<', 50000)->orderBy('accessories.accessories_price', 'asc');
                  break;
              case 'from_50000_to_150000':
                  $data = $data->whereBetween('accessories.accessories_price', [50000, 150000])->orderBy('accessories.accessories_price', 'asc');
                  break;
              case 'from_150000_to_300000':
                  $data = $data->whereBetween('accessories.accessories_price', [150000, 300000])->orderBy('accessories.accessories_price', 'asc');
                  break;
              case 'from_300000':
                  $data = $data->where('accessories.accessories_price', '>', 300000)->orderBy('accessories.accessories_price', 'asc');
                  break;
              case 'desc' : 
                  $data = $data->orderBy('accessories.accessories_price', 'desc');
                  break;
              case 'asc':
                  $data = $data->orderBy('accessories.accessories_price', 'asc');
                  break;
            }
            $data = $data->paginate(10);
        }
    
        return view('/products', compact('data', 'categoryId', 'priceFilter', 'fishSpecies', 'accessoriesType'));
    }
    

  public function filterProductsByFish($categoryId, $fishSpeciesId) {
    // $priceFilter = 0;
    $fishSpecies = FishSpecies::all();
    $accessoriesType = AccessoriesType::all();
    $data = DB::table('fish')
        ->join('has_size', function ($join) use ($fishSpeciesId) {
            $join->on('fish.fish_species', '=', 'has_size.fish_species')
                ->on('fish.fish_size', '=', 'has_size.size')
                ->where('fish.fish_species', '=', $fishSpeciesId);
    
        })
        ->select('fish.*', 'has_size.has_price')
        // ->orderBy('has_size.has_price', 'asc')
        ->paginate(10);
       
      
      return view('/products', compact('data', 'categoryId', 'fishSpecies','accessoriesType'));
  }
  public function filterProductsByAccessories($categoryId, $accessoriesTypeId) {
    $fishSpecies = FishSpecies::all();
    $accessoriesType = AccessoriesType::all();
    $data = DB::table('accessories')
    ->join('accessories_type', 'accessories.accessories_type_id', '=', 'accessories_type.accessories_type_id')
    ->where ('accessories.accessories_type_id','=',$accessoriesTypeId)
    ->paginate(10);
    // dd($data);
    return view('/products', compact('data', 'categoryId', 'accessoriesType','fishSpecies'));
  }

//   public function filterFishBySize($categoryId, $sizeFilter)
//   {
//       $fishSpecies = FishSpecies::all();
  
//       $data = DB::table('fish')
//           ->join('has_size', function ($join) {
//               $join->on('fish.fish_species', '=', 'has_size.fish_species')
//                   ->on('fish.fish_size', '=', 'has_size.size');
//           })
//           ->select('fish.*', 'has_size.has_price');
//           // ->orderBy('has_size.has_price', $sizeFilter)
//           switch ($sizeFilter) {
//             case 'from_5cm':
//                 $data = $data->whereBetween('fish.fish_size',['2 - 4 cm' , '7-8 cm'])->orderBy('fish.fish_size', 'asc');
//                 break;

//             case 'from_5cm_to_10cm':
//                 $data = $data->whereBetween('fish.fish_size', ['5 cm' , '10 cm'])->orderBy('fish.fish_size', 'asc');
//                 break;
//             case 'from_10_to_50cm':
//                 $data = $data->whereBetween('fish.fish_size', ['10 cm', '50cm'])->orderBy('fish.fish_size', 'asc');
//                 break;
//             case 'from_50cm':
//                 $data = $data->where('fish.fish_size', '>', '50cm')->orderBy('fish.fish_size', 'desc');
//                 break;
//           }
//           $data = $data->paginate(10);
  
      
//       return view('/products', compact('data', 'categoryId', 'sizeFilter','fishSpecies'));
//   }
}
