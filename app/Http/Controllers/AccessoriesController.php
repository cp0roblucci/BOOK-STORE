<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use App\Models\AccessoriesType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccessoriesController extends Controller
{
  public function create(Request $request)
  {
    dd($request);
  }

  public function update($id)
  {
    dd($id);
  }

  public function editAccessories($id) {
    $accessories_type = AccessoriesType::all();
//    dd($accessories_type);
    $accessories = DB::table('accessories')
      ->join('accessories_type', 'accessories_type.accessories_type_id', '=', 'accessories.accessories_type_id')
      ->where('accessories_id' , '=', $id)
      ->select('accessories.*', 'accessories_type.accessories_type_name')
      ->first();
    return view('admin.accessories.edit-accessories', compact('accessories', 'accessories_type'));
  }

  public function searchAccessories(Request $request) {
    $accessories_name = $request->input('accessories_name');

    $results = DB::table('accessories')
      ->join('accessories_type', 'accessories_type.accessories_type_id', '=', 'accessories.accessories_type_id')
      ->where('accessories.accessories_name', 'LIKE', '%'. $accessories_name .'%')
      ->orWhere('accessories_type.accessories_type_name', 'LIKE', '%' . $accessories_name . '%')
      ->select('accessories.*', 'accessories_type.accessories_type_name')
      ->get();

//    dd($results);

    return view('admin.accessories.result-search-accessories', compact('results', 'accessories_name'));
  }

  public function delete(Request $request)
  {
    $accessories_id = $request->input('accessories_id');
    dd($accessories_id);
  }
}
