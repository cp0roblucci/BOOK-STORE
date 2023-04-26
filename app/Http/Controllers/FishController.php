<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Fish;
use App\Models\FishImport;
use App\Models\FishSpecies;
use App\Models\PH;
use App\Models\Size;
use App\Models\SupplierInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class FishController extends Controller
{

  public function newFish() {

    $fish_species = FishSpecies::all();
    $ph = PH::all();
    $color = Color::all();
    $size = Size::all();

    return view('admin.fish.new-fish', compact( 'fish_species', 'ph', 'color', 'size'));
  }

  public function postCreateNewFish(Request $request)
  {
    // dd($request);
    $fishImg = $request->file('fish-img');
    if ($fishImg) {
      $linkImgPath = $fishImg->store('public/images/img_products');
      $fishImgURL = Storage::url($linkImgPath);
    } else {
      $fishImgURL = '/storage/images/admin/fish-default.png';
    }

    // tìm nếu có mã sản phẩm này rồi thì cập nhật lại lô nhập
    $fishId = $request->input('fish_id');
    $species = $request->input('species');
    $fishName = $request->input('fish_name');
    $phLevel = $request->input('ph_level');
    $color = $request->input('color');
    $size = $request->input('size');
    $habit= $request->input('habit');
    $description= $request->input('description');

    if ($fishId === null || $fishName === null) {
      Session::flash('lack-info', 'Vui lòng nhập thêm thông tin Cá');
      return redirect()->route('new-fish');
    }

    $fishExists = DB::table('fish')
      ->where('fish_id', '=', $fishId)
      ->first();
    if ($fishExists) {
      if($fishExists->color === $color  && $fishExists->fish_size == $size) {
        $product = FishImport::where('fish_id', $fishId)->first();
        // tăng sl lên 1
        $product->increment('quantity');
        // $productImport->supplier_invoice_total_price = $productImport->supplier_invoice_quantity * $productImport->supplier_invoice_price;
        $product->save();
        Session::flash('add-success', 'Đã có sản phẩm trong kho, tăng số lượng thành công.');
        return redirect()->route('admin-fish');
      } else {
        Session::flash('exists-fish_id', 'Mã sản phẩm đã tồn tại, vui lòng nhập mã khác.');
        return redirect()->route('new-fish');
      }
    }

    Fish::create([
        'fish_id' => $fishId,
        'fish_link_img' => $fishImgURL,
        'fish_species' => $species,
        'fish_name' => $fishName,
        'ph_level' => $phLevel,
        'color' => $color,
        'fish_size' => $size,
        'fish_habit' => $habit,
        'fish_desc' => $description
      ]);

    FishImport::create([
      'fish_id' => $fishId,
      'quantity' => 1,
    ]);

    Session::flash('add-success', 'Thêm cá thành công.');
    return redirect()->route('admin-fish');
  }

  public function getEditFish($id) {
    $fish_species = FishSpecies::all();
    $ph = PH::all();
    $color = Color::all();
    $size = Size::all();

    $fish = DB::table('fish')
      ->where('fish_id', '=', $id)
      ->first();
    return view('admin.fish.edit-fish', compact('fish', 'fish_species', 'ph', 'color', 'size'));
  }

  public function postEditFish(Request $request, $fishId)
  {
    $fish = DB::table('fish')
      ->where('fish_id', '=', $fishId)
      ->first();

    $fishImg = $request->file('fish-img');
    if ($fishImg) {
      $linkImgPath = $fishImg->store('public/images/img_products');
      $fishImgURL = Storage::url($linkImgPath);

      $fishLinkImg = Storage::url($fish->fish_link_img);

      if (File::exists($fishLinkImg)) {
        File::delete($fishLinkImg);
      }
    } else {
      $fishImgURL = $fish->fish_link_img;
    }

    $species = $request->input('species');
    $fishName = $request->input('fish_name');
    $phLevel = $request->input('ph_level');
    $color = $request->input('color');
    $size = $request->input('size');
    $habit= $request->input('habit');
    $description= $request->input('description');

    DB::table('fish')
    ->where('fish_id', '=', $fishId)
    ->update([
        'fish_link_img' => $fishImgURL,
        'fish_species' => $species,
        'fish_name' => $fishName,
        'ph_level' => $phLevel,
        'color' => $color,
        'fish_size' => $size,
        'fish_habit' => $habit,
        'fish_desc' => $description
    ]);

    Session::flash('update-success', 'Cập nhật cá thành công');
    return redirect()->route('admin-fish');
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
      ->Orwhere('fish.fish_species', 'LIKE', '%'. $fish_name .'%')
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

    DB::table('fish_import_batches')
    ->where('fish_id', '=', $fish_id)
    ->delete();

    DB::table('fish')
      ->where('fish_id', '=', $fish_id)
      ->delete();

    Session::flash('delete-success', 'Xóa cá thành công');
    return redirect()->route('admin-fish');
  }
}
