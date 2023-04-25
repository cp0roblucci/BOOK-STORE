<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class ProfileUserController extends Controller
{
    public function getprofileUser() {
        $user_id = Auth::user()->id;
        $infor = DB::table('users')
        ->where('id', $user_id)
        ->get();

        $ordered = DB::table('orders')
        ->where('user_id', $user_id)
        ->join('order_status', 'orders.status_id', '=', 'order_status.status_id')
        ->get();
        // dd($ordered);
        return view('clients.profile_user', compact('infor','ordered'));
    }

    public function getprofileUserUploadAvt(Request $req) {
        if($req->has('link_avt')) {
            $file = $req->link_avt;
            $file_name = $file->getClientOriginalName();
            $path = '/public/storage/images/users/';
            $pathdata = '/storage/images/users/'.$file_name;
            $user_id = Auth::user()->id;
            DB::table('users')
            ->where('id', $user_id)
            ->update(['link_avt' => $pathdata]);
            $file->move(base_path($path), $file_name);
        }
        return redirect('/profile-user');
    }

    public function updatename(Request $req) {
        $req->validate([
            'last_name' => 'required',
            'first_name' => 'required'
        ],
        [
            'last_name.required' => 'Họ đệm không được để trống!!!',
            'first_name.required' => 'Tên không được để trống!!!',
        ]
        );

        $lastname = $req->input('last_name');
        $firstname = $req->input('first_name');
        $user_id = Auth::user()->id;
        DB::table('users')
        ->where('id', $user_id)
        ->update(['last_name' => $lastname,'first_name' => $firstname]);
        return redirect('/profile-user');
    }
    public function updatephonenumber(Request $req) {
        $req->validate(
            [
                'phone_number' =>'required|min:10|regex:/(0[3,5,7,8][0-9]{8,9})/',
            ],
            [
                'phone_number.required' => 'Vui lòng nhập số điện thoại!!!',
                'phone_number.regex' => 'Vui lòng nhập đúng định dạng số điện thoại!!!',
                'phone_number.min' => 'Số điện thoại phải lớn hơn 10 số!!!',
            ]
        );
        $phone = $req->input('phone_number');
        $user_id = Auth::user()->id;
        DB::table('users')
        ->where('id', $user_id)
        ->update(['phone_number' => $phone]);
        return redirect('/profile-user');
    }
    public function updateaddress(Request $req) {

        $req->validate([
            'user_address' => 'required|min:5'
        ],
        [
            'user_address.required' => 'Vui lòng nhập địa chỉ!!!',
            'user_address.min' => 'Địa chỉ quá ngắn!!!'
        ]
        );

        $address = $req->input('user_address');
        $user_id = Auth::user()->id;
        DB::table('users')
        ->where('id', $user_id)
        ->update(['user_address' => $address]);
        return redirect('/profile-user');
    }
    public function updateemail(Request $req) {
        $req->validate([
            'email' =>'required|email'
        ],
        [
            'email.required' => 'Vui lòng nhập email!!!',
            'email.email' => 'Vui lòng nhập đúng định dạng email!!!'
        ]
    );

        $email = $req->input('email');
        $user_id = Auth::user()->id;
        DB::table('users')
        ->where('id', $user_id)
        ->update(['email' => $email]);
        return redirect('/profile-user');
    }

    public function updatestatus(Request $req) {
        $order_id = $req->input('order_id');
        $status_id = $req->input('status_id');
        DB::table('orders')
        ->where('order_id', $order_id)
        ->update(['status_id' => $status_id]);
        return redirect('/profile-user');
    }
    
}
