<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use App\Models\SupplierInvoice;
use Illuminate\Http\Request;
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
  public function delete($id)
  {
    dd($id);
  }
}
