<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use App\Models\AccessoriesType;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AccessoriesController extends Controller
{
  public function create(Request $request)
  {
    dd($request);
  }

  public function update(Request $request, $accessoriesId)
  {
    $accessories = DB::table('accessories')
      ->where('accessories_id', '=', $accessoriesId)
      ->first();

    $accessoriesImg = $request->file('accessories-img');
    if ($accessoriesImg) {
      $linkImgPath = $accessoriesImg->store('public/images/img_products');
      $accessoriesImgURL = Storage::url($linkImgPath);
      $accessoriesLinkImg = Storage::url($accessories->accessories_link_img);
      if (File::exists($accessoriesLinkImg)) {
        File::delete($accessoriesLinkImg);
      }
    } else {
      $accessoriesImgURL = $accessories->accessories_link_img;
    }
    $accessoriesTypeId = $request->input('accessories-type');
    $accessoriesPrice = $request->input('price');
    $accessoriesName = $request->input('accessories-name');
    $accessoriesDesc = $request->input('description');

    $accessories = DB::table('accessories')
      ->where('accessories_id', '=', $accessoriesId)
      ->update([
        'accessories_type_id' => $accessoriesTypeId,
        'accessories_name' => $accessoriesName,
        'accessories_price' => $accessoriesPrice,
        'accessories_desc' => $accessoriesDesc,
        'accessories_link_img' => $accessoriesImgURL
      ]);

    Session::flash('update-success', 'Cập nhật phụ kiện thành công');
    return redirect()->route('admin-accessories');
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
