<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
  public function create(Request $request)
  {
    dd($request);
    $color = $request->input('color');
    Color::create([
      'color' => $color,
    ]);
  }

  public function update()
  {

  }
  public function delete()
  {

  }
}
