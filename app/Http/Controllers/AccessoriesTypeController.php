<?php

namespace App\Http\Controllers;

use App\Models\AccessoriesType;
use Illuminate\Http\Request;

class AccessoriesTypeController extends Controller
{

  public function index() {
    $accessoriesTypes = AccessoriesType::all();

    return view('admin.accessories.new-accessories-type', compact('accessoriesTypes'));
  }
  public function create(Request $request)
  {
    dd($request);
  }

  public function update()
  {

  }
  public function delete()
  {

  }
}
