<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function getcart() {
        $cart = DB::select('select * from carts join cart_details on carts.CART_ID = cart_details.CART_ID
        join fish on fish.fish_id = cart_details.product_id');
        //dd($cart);


        return view('clients.cart', compact('cart'));
    }
}
