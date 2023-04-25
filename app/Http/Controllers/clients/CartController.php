<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\AuthController;

class CartController extends Controller
{
    public function getcart() {
        // dd($request->all('userid')['userid']);

        $fish = DB::select("select carts.cart_id , cart_details.product_id, fish.category_id, fish.fish_size, fish.fish_id, fish.fish_link_img, fish.fish_name, fish.fish_species, has_size.has_price, cart_details.quantity
                            from carts , cart_details, fish, has_size
                            where carts.cart_id = cart_details.cart_id
                                and fish.fish_id = cart_details.product_id
                                and has_size.size = fish.fish_size
                                and has_size.fish_species = fish.fish_species
                                and carts.user_id = ?", [Auth::user()->id]);
        //  dd(empty($fish));
        $accessories = DB::select("select *
        from carts , cart_details, accessories, accessories_type
        WHERE carts.cart_id = cart_details.cart_id
            and cart_details.product_id = accessories_id
            and  accessories.accessories_type_id = accessories_type.accessories_type_id
            and carts.user_id = ?", [Auth::user()->id]);



        // dd($fish, $accessories);

        if(!empty($fish)) {
            if(!empty($accessories)) {
                $batch_acc = [];
                $tempbatch_acc =0;
                foreach($accessories as $key => $acc) {
                    // $temp = DB::table('accessories_import_batch')->where('accessories_id', $acc[0]->accessories_id)->get('quantity');
                    // dd($acc);
                    $batch_acc[$tempbatch_acc] = DB::table('accessories_import_batches')->where('accessories_id', $acc->accessories_id)->get('quantity');
                    $tempbatch_acc++;
                }

                $batch_fish = [];
                $tempbatch_fish =0;
                foreach($fish as $key => $element) {
                    $batch_fish[$tempbatch_fish] = DB::table('fish_import_batches')->where('fish_id', $element->fish_id)->get('quantity');
                    $tempbatch_fish++;
                }
                // dd($batch_fish[0][0]->quantity,$batch_acc[0][0]->quantity );
                return view('clients.cart', compact('fish', 'accessories', 'batch_fish', 'batch_acc'));
            } else {
                // dd($fish);
                $batch_fish = [];
                $tempbatch_fish =0;
                foreach($fish as $key => $element) {
                    $batch_fish[$tempbatch_fish] = DB::table('fish_import_batches')->where('fish_id', $element->fish_id)->get('quantity');
                    $tempbatch_fish++;
                }
                return view('clients.cart', compact('fish','batch_fish'));
            }
        } else {
            if($accessories) {
                $batch_acc = [];
                $tempbatch_acc =0;
                foreach($accessories as $key => $acc) {
                    $batch_acc[$tempbatch_acc] = DB::table('accessories_import_batches')->where('accessories_id', $acc->accessories_id)->get('quantity');
                    $tempbatch_acc++;
                }
                return view('clients.cart', compact('accessories', 'batch_acc'));
            }
        }



        return view('clients.cart', compact('fish', 'accessories'));
    }

    public function updatequantity($cart_id, $product_id, $quantity) {

        //lay san pham user muon tang so luong trong gio hang cua minh
        $detail= DB::table('cart_details')
        ->where('cart_id', $cart_id)
        ->where('product_id', $product_id)->get();

        //lay loai san pham va so luong trong gio hang;
        $cate = $detail[0]->category_id;
        $quantityincart = $detail[0]->quantity;

        //lay so luong con trong kho
        if($cate == 1) {
            $rest =
            DB::table('fish_import_batches')
            ->where('fish_id',$product_id)
            ->get('quantity'); //sum('quantity')
            // -
            // DB::table('order_details')
            // ->where('product_id',$product_id)
            // ->sum('quantity');
        } else {
            $rest =
            DB::table('accessories_import_batches')
            ->where('accessories_id',$product_id)
            ->get('quantity'); //sum('quantity');
            //  -
            // DB::table('order_details')
            // ->where('product_id',$product_id)
            // ->sum('quantity');
        }

        // dd($cart_id, $product_id, $quantity, $detail,$cate, $quantityincart, $rest);

        // dd($detail);

        //update so luong
        if($detail[0]->quantity == 1 && $quantity == -1 || $quantity == 1 && $quantityincart + 1 > $rest[0]->quantity ) {
            return redirect('/cart');
        } else {
        DB::table('cart_details')
            ->where('cart_id', $cart_id)
            ->where('product_id', $product_id)
            ->increment('quantity', $quantity);
            return redirect('/cart');
        }

    }

    public function deleteitem($cart_id, $product_id) {
        DB::table('cart_details')
        ->where('cart_id', $cart_id)
        ->where('product_id', $product_id)
        ->delete();
        return redirect('/cart');
    }

}
