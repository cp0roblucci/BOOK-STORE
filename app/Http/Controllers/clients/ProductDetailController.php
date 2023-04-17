<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProductDetailController extends Controller
{
    public function getProductDetail($id) {
        if(strpos($id, 'ARM') !== false) {
            $detail = DB::select('select  accessories.accessories_id as id, accessories.accessories_link_img, accessories.accessories_name, 
                                            accessories.accessories_price 
                                    from accessories join accessories_type on accessories.accessories_type_id = accessories_type.accessories_type_id
                                    where accessories_id = ?', [$id]);
        } else {
            $detail = DB::select("select fish.fish_name, fish.fish_id as id,  has_size.has_price, fish.ph_level,
		                            fish.fish_habit, fish_food.food_id, has_size.size, fish.fish_link_img
                            from fish 
	                            join fish_food on fish.fish_species = fish_food.species_fish
                                join has_size on fish.fish_species = has_size.fish_species 
                            where fish.fish_id = ?", [$id]);
        } 
        //dd($detail);
        return view('products_detail', compact('detail'));
    }
}
