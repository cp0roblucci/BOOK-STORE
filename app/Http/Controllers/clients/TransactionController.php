<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;


class TransactionController extends Controller
{
    public function getTransaction(Request $request)  {
        $request->validate([
            'checked' => 'required',
        ]);

        $data =$request->all();
        // dd($data);
        $items = [];
        $quantity = [];
        $category = [];
        $i =0;
        $q = 0;
        $c = 0;
        foreach($data as $key =>$element) {
            if(strpos($key, 'item') !== false) {
                $items[$i] = $element;
                $i++;
            }
            if(strpos($key, 'quantity') !== false) {
                $quantity[$q] = $element;
                $q++;
            }
            if(strpos($key, 'category') !== false) {
                $category[$c] = $element;
                $c++;
            }
        };
        $fish = [];
        $accessories = [];
        $qttfish =[];
        $qttacc = [];
        $f = 0;
        $acc = 0;
        foreach($category as $key => $item) {
            if($item == 0) {
                $accessories[$acc] = DB::select("select *
                                                from accessories, categories
                                                where accessories.category_id = categories.category_id
                                                and accessories_id = ?", [$items[$key]]);
                $qttacc[$acc] = $quantity[$key];
                $acc++;
            }
            if($item == 1) {
                $fish[$f] = DB::select("select *
                                        from fish, has_size, categories
                                        where fish.fish_species = has_size.fish_species
                                        and fish.category_id = categories.category_id
                                        and fish.fish_size = has_size.size
                                        and fish.fish_id = ?", [$items[$key]]);
                $qttfish[$f] = $quantity[$key];
                $f++;
            }
        }
        $total = (int)$request->input('total');
        // dd($request->all());
        // dd($accessories, $fish, $qttacc, $qttfish);
        return view('clients.transaction', compact('fish', 'accessories', 'qttfish', 'qttacc', 'total'));
    }

    public function postTransaction(Request $request)  {

        $request->validate([
            'name_order' => 'required',
            'phone_order' => 'required|regex:/(0[3,5,7,8,9][0-9]{8,9})/',
            'address_order' => 'required',
            'note' => 'required',
        ],
        [
            'name_order.required' => 'Vui lòng nhập tên!!!',
            'phone_order.required' => 'Vui lòng nhập số điện thoại!!!',
            'phone_order.regex' => 'Vui lòng nhập đúng định dạng!!!',
            'address_order.required' => 'Vui lòng nhập địa chỉ!!!',
            'note.required' => 'Mong bạn hãy để lại lời nhắn!!!',
        ]);

        $item_order = [];
        $qtt_item_order = [];
        $category = [];
        $itor = 0;
        $qttitor = 0;
        $ctgr = 0;
        foreach($request->all() as $key => $element) {
            if(strpos($key, 'item') !== false ) {
                $item_order[$itor] = $element;
                $itor++;
            }

            if(strpos($key, 'qtt') !== false) {
                $qtt_item_order[$qttitor] = $element;
                $qttitor++;
            }

            if(strpos($key, 'category') !== false) {
                $category[$ctgr] = $element;
                $ctgr++;
            }
        }

        $count_order = DB::select("select count(order_id) as count from orders");
        if($count_order[0]->count + 1 > 9 ) {
            $count = 'BT00' .$count_order[0]->count + 1;
        } else {
            $count = 'BT000' .$count_order[0]->count + 1;
        }
        $name_order = $request->input('name_order');
        $phone_order = $request->input('phone_order');
        $address_order = $request->input('address_order');
        $note_order = $request->input('note');
        // $getitem = DB::select("select accessories_price as price from accessories where accessories_id = ?", [$item_order[4]]);


        // dd($request->all(), $item_order, $qtt_item_order, $category, $count, $name_order, $phone_order, $address_order, $note_order);


        DB::table('orders')->insert(
            [
                'order_id' => $count,
                'user_id' => Auth::user()->id,
                'status_id' => 0,
                'delivery_id' => 0,
                'payment_id' => 0,
                'full_name' =>  $name_order,
                'order_phone_number' => $phone_order,
                'order_delivery_address' => $address_order,
                'order_notes' => $note_order
            ]
        );

        foreach($item_order as $key => $item) {
            if($category[$key] == 0) {
                $getitem = DB::select("select accessories_price as price from accessories where accessories_id = ?", [$item]);
                $quantityindepot = DB::table('accessories_import_batches')
                                    ->where('accessories_id', $item)
                                    ->get();
                // dd($quantityindepot, $qtt_item_order[$key]);

                DB::table('accessories_import_batches')
                ->where('accessories_id', $item)
                ->update([
                    'quantity' => ($quantityindepot[0]->quantity - $qtt_item_order[$key])
                ]);
            } else {
                $getitem = DB::select("select has_size.has_price as price
                                        from fish, has_size
                                        where fish.fish_size = has_size.size
                                        and fish.fish_species = has_size.fish_species
                                        and fish.fish_id = ?", [$item]);
                $quantityindepot = DB::table('fish_import_batches')
                                    ->where('fish_id', $item)
                                    ->get('quantity');
                // dd($quantityindepot, $qtt_item_order[$key]);
    
                DB::table('fish_import_batches')
                ->where('fish_id', $item)
                ->update([
                    'quantity' => ($quantityindepot[0]->quantity  - $qtt_item_order[$key])
                ]);
            }
            DB::table('order_details')->insert(
                [
                    'order_id' => $count,
                    'category_id' => $category[$key],
                    'product_id' => $item,
                    'price' => $getitem[0]->price,
                    'quantity' =>$qtt_item_order[$key]
                ] 
                );
            $cartid = DB::table('carts')
            ->where('user_id', Auth::user()->id)
            ->get('cart_id');
            DB::table('cart_details')
            ->where('product_id', $item)
            ->where('cart_id', $cartid[0]->cart_id)
            ->delete();

        }

        return redirect()->route('ordered', ['order_id' => $count]);

    }

    public function getOrderSuccess($order_id) {
        $infor  = DB::select("select * from orders, order_status where orders.status_id = order_status.status_id and order_id = ?", [$order_id]);

        $details = DB::select("select * from order_details where order_id = ?", [$order_id]);
        // dd($details);
        $bill = [];
        $test = DB::select("select * from order_details, fish
                            where order_details.product_id = fish.fish_id
                            and order_details.product_id = ?
                            and order_details.order_id = ?", [$details[0]->product_id, $order_id]);
        foreach($details as $key => $item) {
            if($item->category_id == 0) {
                $bill[$key] = DB::select("select * from order_details, accessories, accessories_type
                                    where order_details.product_id = accessories.accessories_id
                                    and accessories.accessories_type_id = accessories_type.accessories_type_id
                                    and order_details.product_id = ?
                                    and order_details.order_id = ?", [$item->product_id, $order_id]);
            }
            if($item->category_id == 1) {
                $bill[$key] = DB::select("select * from order_details, fish
                                        where order_details.product_id = fish.fish_id
                                        and order_details.product_id = ?
                                        and order_details.order_id = ?", [$item->product_id, $order_id]);
            }
        }
        // dd($request->all(), $infor, $details, $test, $details[0]->product_id, $test, $bill);
        $total = 0;
        foreach($bill as $item) {
          $total += $item[0]->price * $item[0]->quantity;
        }
        return view('clients.order-success', compact('bill', 'total', 'infor'));
    }
}
