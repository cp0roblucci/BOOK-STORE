<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\AuthController;

class CartController extends Controller
{
    public function getcart(Request $request) {
        // dd($request->all('userid')['userid']);
        $fish = DB::select("select fish.category_id, fish.fish_size, fish.fish_id, fish.fish_link_img, fish.fish_name, fish.fish_species, has_size.has_price, cart_details.quantity
                            from carts , cart_details, fish, has_size 
                            where carts.CART_ID = cart_details.CART_ID
                                and fish.fish_id = cart_details.product_id
                                and has_size.size = fish.fish_size
                                and has_size.fish_species = fish.fish_species
                                and carts.user_id = ?", [$request->all('userid')['userid']]);
        //  dd(empty($fish));
        $accessories = DB::select("select * 
        from carts , cart_details, accessories, accessories_type
        WHERE carts.CART_ID = cart_details.CART_ID
            and cart_details.product_id = accessories_id
            and  accessories.accessories_type_id = accessories_type.accessories_type_id
            and carts.user_id = ?", [$request->all('userid')['userid']]);
        // dd($fish, $accessories);

        if(!empty($fish)) {
            if(!empty($accessories)) {
                return view('clients.cart', compact('fish', 'accessories'));
            } else {

                return view('clients.cart', compact('fish'));
            }
        } else {
            if($accessories) {
                return view('clients.cart', compact('accessories'));
            }
        }
        


        return view('clients.cart', compact('fish', 'accessories'));
    }

    public function postbill(Request $request) {
        dd($request->all());
    }
}
