<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function getcart() {
        $cart = DB::select("select fish.fish_link_img, fish.fish_name, fish.fish_species, has_size.has_price, cart_details.QUANTITY 
                            from carts join cart_details on carts.CART_ID = cart_details.CART_ID 
                                join fish on fish.fish_id = cart_details.product_id
                                join has_size on has_size.fish_species = fish.fish_species
                            where carts.CART_ID = 4
                                and fish.fish_link_img like '%betta_fish%'
                                or fish.fish_link_img like '%dragon_fish%'
                            limit 5");
        dd($cart);


        return view('clients.cart', compact('cart'));
    }
}
