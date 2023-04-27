<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use App\Models\Fish;
use App\Models\FishSpecies;
use App\Models\Accessories;
use App\Models\HasSize;
use App\Models\FishFood;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductsDetailController extends Controller
{

    public function getProductsDetail($id) {
        
        $data = DB::table('fish')
        ->join('has_size', function ($join) {
            $join->on('fish.fish_species', '=', 'has_size.fish_species')
                  ->on('fish.fish_size', '=', 'has_size.size');
        })
        ->join('fish_food', 'fish.fish_species', '=', 'fish_food.species_fish')
        ->where('fish_id', '=', $id)
        ->select ('fish.*','has_size.has_price','fish_food.food_id')
        ->first();
        // dd($data);
        if($data) {
            return view('/products_detail', compact('data','id'));
        }
        else {
            $data = DB::table('accessories')
            -> where ('accessories_id', '=', $id)
            ->first();
        }
        // dd($data);
     return view('/products_detail', compact('data','id'));
    }

    public function addToCart(Request $request)
    {
    
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
    }
    $userId = Auth::user()->id;
    $productId = $request->input('product_id');
    $categoryId = $request->input('category_id');
    $quantity = $request->input('qty');
    
    // dd($userId,$productId,$quantity,$categoryId);
    // dd($quantity);
    $cartId = DB::table('carts')
    ->where('carts.user_id', '=' , $userId)
    ->select('carts.cart_id')
    ->first()
    ->cart_id;
    //check
    $productIdExists = DB::table('cart_details')
    ->where('cart_id','=',$cartId)
    ->where('product_id','=',$productId)
    ->first();
    
    if($productIdExists) {
        $productIdExists->quantity += $quantity;
        // dd($productIdExists->quantity);
        DB::table('cart_details')
        ->where('cart_id','=',$cartId)
        ->where('product_id','=',$productId)
        ->update([
            'quantity' => $productIdExists->quantity
        ]);
        
    } else {
        CartDetail::create([
            'cart_id' => $cartId,
            'product_id' => $productId,
            'category_id' => $categoryId,
            'quantity' => $quantity
        ]);
    }
    
    return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công!');
    }

    public function addToTransaction(Request $request)
    {
        //check user dangnhap
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để mua ngay.');
    } $userId = Auth::user()->id;
    // dd($userId);
    $productId = $request->input('product_id');
    $categoryId = $request->input('category_id');
    $quantity = $request->input('qty');
    
    $cartId = DB::table('carts')
    ->where('carts.user_id', '=' , $userId)
    ->select('carts.cart_id')
    ->first()
    ->cart_id;
   
    CartDetail::create([
        'cart_id' => $cartId,
        'product_id' => $productId,
        'category_id' => $categoryId,
        'quantity' => $quantity
        
    ]);
    

    return redirect()->route('transaction');
    }
    

    public function getQuantityAll(Request $request) {
        $productId = $request->input('product_id');
        $categoryId = $request->input('category_id');
        if($categoryId == 1) {
            $maxQuantity = DB::table('fish_import_batches')
            ->where('fish_id', '=', $productId)
            ->select('quantity')
            ->first();
        } else {
            $maxQuantity = DB::table('accessories_import_batches')
            ->where('accessories_id', '=', $productId)
            ->select('quantity')
            ->first();
        }
        
        return response()->json(['quantity' => $maxQuantity->quantity]);
      }
    
}
