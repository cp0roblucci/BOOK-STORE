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
                                        from fish ,has_size
                                        where fish.fish_size = has_size.size
                                            and fish.fish_species = has_size.fish_species
                                        limit 5;
                                ");
        $accessories = DB::select("select * 
                                    from accessories join accessories_type on accessories.accessories_type_id = accessories_type.accessories_type_id 
                                    limit 5");
        //dd($fishselling);
        return view('clients.homepage', compact('fishselling', 'accessories'));
    }

}
