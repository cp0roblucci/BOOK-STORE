<?php

namespace App\Http\Controllers;

use App\Models\PH;
use Illuminate\Http\Request;

class PHController extends Controller
{
  public function create(Request $request)
  {
    dd($request);
    $phLevel = $request->input('ph-level');
    PH::create([
      'ph_level' => $phLevel,
    ]);
  }

  public function update()
  {

  }
  public function delete()
  {

  }
}
