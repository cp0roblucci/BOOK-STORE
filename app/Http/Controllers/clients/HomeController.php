<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Fish;


class HomeController extends Controller
{
    public function getHome() {
        $fishselling = DB::select("select fish.fish_id, fish.fish_name, fish.fish_link_img, has_size.HAS_PRICE, fish.fish_habit   
                                        from fish join has_size on fish.fish_species = has_size.fish_species
                                        where fish_link_img like '%betta_fish%' or fish_link_img like '%dragon_fish%'
                                        limit 5;
                                ");
        $accessories = DB::select("select * 
                                    from accessories join accessories_type on accessories.accessories_type_id = accessories_type.accessories_type_id 
                                    limit 5");
        //dd($fishselling);
        return view('clients.homepage', compact('fishselling', 'accessories'));
    }
    
}
