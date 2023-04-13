<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Fish;


class HomeController extends Controller
{
    public function getHome() {
        $fishselling = DB::select('select distinct fish.fish_name, fish.fish_link_img, has_size.HAS_PRICE 
                                        from fish join has_size on fish.fish_species = has_size.fish_species
                                        limit 10;
                                ');
        //dd($fishselling);
        return view('clients.homepage', compact('fishselling'));
    }
    
}
