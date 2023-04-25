<?php

namespace App\Http\Controllers;

use App\Models\FishSpecies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpeciesController extends Controller
{
    public function index() {
        $listSpecies = FishSpecies::all();
        return view('admin.fish.new-species', compact('listSpecies'));
    }
    public function create(Request $request) {
        // dd($request);

        // $species = $request->input('species');
        // FishSpecies::create([
        //     'fish_species' => $species
        // ]);

        Session::flash('create-success', 'Thêm loại cá thành công');
        return redirect()->route('new-species');
    }
}
