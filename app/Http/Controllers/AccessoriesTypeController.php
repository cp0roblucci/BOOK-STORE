<?php

namespace App\Http\Controllers;

use App\Models\AccessoriesType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccessoriesTypeController extends Controller
{

  public function index() {
    $accessoriesTypes = AccessoriesType::all();

    return view('admin.accessories.new-accessories-type', compact('accessoriesTypes'));
  }
  public function create(Request $request)
  {
    $accessoriesType = $request->input('accessories-type');

    $maxAccessoriesId = DB::table('accessories_type')->max('accessories_type_id');
    $maxNum = (int)substr($maxAccessoriesId, 4);
    $newNum = $maxNum + 1;
    $newAccessoriesId = 'ACCS'.str_pad($newNum, strlen($maxAccessoriesId) - 4, '0', STR_PAD_LEFT);

    AccessoriesType::create([
      'accessories_type_id' => $newAccessoriesId,
      'accessories_type_name' => $accessoriesType
    ]);
    return redirect()->route('new-accessories-type');
  }

}
