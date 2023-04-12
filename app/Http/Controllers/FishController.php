<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Fish;
use App\Models\FishSpecies;
use App\Models\PH;
use App\Models\Size;
use App\Models\SupplierInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FishController extends Controller
{
  public function create(Request $request)
  {
    dd($request);

    $file = $request->file('fish-img');
    $fileName = $file->getClientOriginalName();
    $result = $request->file->storeOnCloudinaryAs('ct299/product', 'fish-' .$fileName);
    $fishImg = $result->getPath();

    // tìm nếu có mã sản phẩm này rồi thì cập nhật lại lô nhập
    $fishId = $request->input('fish_id');
    $fish = Fish::where('fish_id', $fishId)->first();
    $species = $request->input('species');
    $fishName = $request->input('fish_name');
    $phLevel = $request->input('ph_level');
    $color = $request->input('color');
    $size = $request->input('size');
    $habit= $request->input('habit');
    $description= $request->input('description');

    if ($fishId) {
      if($fishId->color == $color  && $fishId->fish_size == $size) {
        $product = SupplierInvoice::where('supplier_invoice_product_id', $fish)->first();
        // tăng sl lên 1
        $product->increment('supplier_invoice_quantity');
        $productImport->supplier_invoice_total_price = $productImport->supplier_invoice_quantity * $productImport->supplier_invoice_price;
        $product->save();

        Session::flash('message', 'Add Fish successfully.');
        return redirect()->route('admin-fish');
      }
    }

    Fish::create(
      [
        'fish_id' => $fishId,
        'fish_link_img' => $fishImg,
        'fish_species' => $species,
        'fish_name' => $fishName,
        'ph_level' => $phLevel,
        'color' => $color,
        'fish_size' => $size,
        'fish_habit' => $habit,
        'fish_desc' => $description
      ]
    );
    Session::flash('message', 'Add Fish successfully.');
    return redirect()->route('admin-fish');
  }

  public function update(Request $request)
  {
    dd($request);
  }

  public function editFish($id) {
    $fish_species = FishSpecies::all();
    $ph = PH::all();
    $color = Color::all();
    $size = Size::all();

    $fish = DB::table('fish')
      ->where('fish_id', '=', $id)
      ->first();
    return view('admin.fish.edit-fish', compact('fish', 'fish_species', 'ph', 'color', 'size'));
  }

  public function searchFish(Request $request) {
    $fish_name = $request->input('fish_name');
    $results = DB::table('fish')
      ->join('has_size', function ($join) {
        $join->on('fish.fish_species', '=', 'has_size.fish_species')
          ->on('fish.fish_size', '=', 'has_size.size');
      })
      ->join('fish_import_batches', 'fish.fish_id', '=', 'fish_import_batches.fish_id')
      ->where('fish.fish_name', 'LIKE', '%'. $fish_name .'%')
      ->select('fish.*', 'has_size.has_price', 'fish_import_batches.quantity')
      ->get();

    return view('admin.fish.result-search-fish', compact('results', 'fish_name'));
  }

  public function listPriceProduct()
  {
    $dataArr = array();
    $listSpecies = FishSpecies::all();
    foreach ($listSpecies as $key => $data) {
      $values = DB::table('has_size')
        ->where('has_size.fish_species', '=', $data->fish_species)
        ->get();
      if ($values->count() != 0) {
        $dataArr[$key] = DB::table('has_size')
          ->where('has_size.fish_species', '=', $data->fish_species)
          ->get();
      }
    }
    return view('admin.fish.list-price-product', compact('dataArr', 'listSpecies'));
  }
  public function updatePrice(Request $request) {
    $species = $request->input('species');
    $size = $request->input('size');
    $newPrice = $request->input('new-price');

    DB::table('has_size')
      ->where('fish_species', '=', $species)
      ->where('size', '=', $size)
      ->update(['has_price' => $newPrice]);

//    Session::flash('update-price-success', 'Cập nhật giá thành công.');
    return redirect()->back()->with('update-price-success', 'Cập nhật giá thành công.');
//    return redirect()->route('admin-list-price');
  }

  public function searchPriceFish(Request $request) {
    $fish_species = $request->input('fish_species');
    $species = DB::table('fish_species')
      ->where('fish_species.fish_species', 'LIKE', '%'. $fish_species .'%')
      ->first();
//    $listSpecies = FishSpecies::all();
    $data = DB::table('has_size')
      ->where('has_size.fish_species', 'LIKE', '%'. $fish_species .'%')
      ->get();

    return view('admin.fish.result-search-price', compact('data', 'species'));
  }

  public function delete(Request $request)
  {
    $fish_id = $request->input('fish_id');
    dd($fish_id);
  }
}
