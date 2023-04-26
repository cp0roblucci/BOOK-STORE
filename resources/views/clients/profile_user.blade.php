@extends('layouts.main')

@section('title')
    Tài Khoản
@endsection

@section('scripts')
    @vite('./resources/js/profile-user.js')
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('body')
    <div class="mx-20 flex font-popins">
            <div class="w-1/5 p-2 bg-slate-100 mt-2">
                <h1 class="text-24">Thông tin người dùng</h1>
                <ul>
                    <li class="leading-[5]"><span class="btninfor text-18 cursor-pointer px-4 py-2 border border-slate-700 rounded-md bg-blue-100 text-aliceblue" >Thông tin cá nhân</span></li>
                    <li class="leading-[5]"><span class="btnordered text-18 cursor-pointer px-4 py-2 border border-slate-700 rounded-md">Tra cứu đơn hàng</span></li>
                </ul>
            </div>
            <div class="w-4/5 p-2 bg-slate-100 mt-2">
                <div class="information mt-10 ">
                    <div class=" flex">
                        <img class="h-25 w-25 rounded-full" src="{{$infor[0]->link_avt?:'/storage/images/users/user-default.jpg'}}" alt="">
                        <form action="{{route('upload-avt-user')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input class="ml-5" type="file" name="link_avt" id="link_avt">
                            <button class="px-2 py-1 border rounded-md bg-blue-300 text-aliceblue" type="submit">Tải lên</button>
                        </form>
                    </div>
                    <div class="mt-2 flex leading-[5]">
                        <div class="infor ">
                            <label for="" class="px-2 py-1 font-semibold">Họ và tên: </label> 
                            <span class="text-17">{{$infor[0]->last_name . ' ' . $infor[0]->first_name}}</span></div>
                        <div class="form hidden">
                            <form action="{{route('updatename')}}" method="post">
                                @csrf
                                <label for="" class="text-18 font-semibold">Họ đệm: </label>
                                <input class="h-8 w-40 mx-2 rounded-md" type="text" name="last_name">
                                <label for="" class="text-18 font-semibold">Tên: </label>
                                <input class="h-8 w-40 mx-2 rounded-md" type="text" name="first_name">
                                <button class="text-14 ml-5"><span class="px-2 py-1 bg-blue-300 rounded-md text-aliceblue" >Thay đổi</span></button>
                            </form>
                        </div>
                        <div class="btn-box text-14 ml-5"><span class="btn-show px-2 py-1 bg-blue-300 rounded-md text-aliceblue cursor-pointer">Thay đổi</span></div>
                        
                    </div>
                    <div class="leading-[5] flex ">
                        <div class="flex">
                            @if($infor[0]->phone_number)
                            <div class="infor ">
                                <label for="" class="px-2 py-1 font-semibold">Số điện thoại: </label>
                                <span class="text-17">{{{$infor[0]->phone_number}}}</span>
                            </div>
                            <div class="form hidden">
                                <form action="{{route('updatephone')}}" method="post">
                                    @csrf
                                    <label for="" class="px-2 py-1 font-semibold">Số điện thoại: </label>
                                    <input class="h-8 w-40 mx-2 rounded-md" type="text" name="phone_number">
                                    <button class="text-14 ml-5"><span class=" px-2 py-1 bg-blue-300 rounded-md text-aliceblue" >Thay đổi</span></button>
                                </form>
                            </div>
                            <div class="btn-box text-14 ml-5"><span class=" btn-show cursor-pointer px-2 py-1 bg-blue-300 rounded-md text-aliceblue" >Thay đổi</span></div>
                            @else
                            <div class="form">
                                <form action="{{route('updatephone')}}" method="post">
                                    @csrf
                                    <label for="" class="px-2 py-1 font-semibold">Số điện thoại: </label>
                                    <input class="h-8 w-40 mx-2 rounded-md" type="text" name="phone_number">
                                    <button class="text-14 ml-5"><span class=" px-2 py-1 bg-blue-300 rounded-md text-aliceblue" >Thêm</span></button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="leading-[5] flex "> 
                        <div class="flex ">
                            @if($infor[0]->user_address)
                            <div class="infor ">
                                <label for="" class="px-2 py-1 font-semibold">Địa chỉ: </label>
                                <span class="text-17">{{$infor[0]->user_address}}</span>
                            </div>
                            <div class="form hidden">
                                <form action="{{route('updateaddress')}}" method="post">
                                    @csrf
                                    <label for="" class="px-2 py-1 font-semibold">Địa chỉ: </label>
                                    <input class="h-8 w-40 mx-2 rounded-md" type="text" name="user_address">
                                    <button class="text-14 ml-5"><span class=" px-2 py-1 bg-blue-300 rounded-md text-aliceblue" >Thay đổi</span></button>
                                </form>
                            </div>
                            <div class="btn-box text-14 ml-5"><span class="btn-show cursor-pointer px-2 py-1 bg-blue-300 rounded-md text-aliceblue" >Thay đổi</span></div>
                            @else
                            <div class="form">
                                <form action="{{route('updateaddress')}}" method="post">
                                    @csrf
                                    <label for="" class="px-2 py-1 font-semibold">Địa chỉ: </label>
                                    <input class="h-8 w-40 mx-2 rounded-md" type="text" name="user_address">
                                    <button class="text-14 ml-5"><span class=" px-2 py-1 bg-blue-300 rounded-md text-aliceblue" >Thêm</span></button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class=" leading-[5]">
                        <div class="flex">
                            <div class="infor ">
                                <label for="" class="px-2 py-1 font-semibold">Email: </label> 
                                <span class="text-17">lehung@gmail.com</span>
                            </div>
                            <div class="form hidden">
                                <form action="{{route('updateemail')}}" method="post">
                                    @csrf
                                    <label for="" class="px-2 py-1 font-semibold">Email: </label> 
                                    <input class="h-8 w-40 mx-2 rounded-md" type="text" name="email">
                                    <button class="text-14 ml-5"><span class=" px-2 py-1 bg-blue-300 rounded-md text-aliceblue" >Thay đổi</span></button>
                                </form>
                            </div>
                        
                            <div class="btn-box text-14 ml-5"><span class="btn-show cursor-pointer px-2 py-1 bg-blue-300 rounded-md text-aliceblue">Thay đổi</span></div>
                        </div>
                    </div>
                    @error('email')
                    <div class=""><h2 class="text-24 text-red-500">{{$message}}</h2></div>
                    @enderror
                    @error('user_address')
                    <div class=""><h2 class="text-24 text-red-500">{{$message}}</h2></div>
                    @enderror
                    @error('phone_number')
                    <div class=""><h2 class="text-24 text-red-500">{{$message}}</h2></div>
                    @enderror
                    @error('first_name')
                    <div class=""><h2 class="text-24 text-red-500">{{$message}}</h2></div>
                    @enderror
                    @error('last_name')
                    <div class=""><h2 class="text-24 text-red-500">{{$message}}</h2></div>
                    @enderror
                    {{-- @error('email', 'phone_number', 'first_name', 'last_name', 'user_address') <div class=""><h2>{{$message}}</h2></div> @enderror --}}
                </div>
                <div class="ordered hidden">
                    <div class=""><h1 class="capitalize text-24">Tất cả đơn hàng</h1></div>
                    <div class="orders mt-20">
                        <table class="capitalize w-full text-center" >
                            <tr class="">
                                <th>mã đơn hàng</th>
                                <th>Thời gian đặt</th>
                                <th>Trạng thái</th>
                                <th>Tên</th>
                                <th>số điện thoại</th>
                                <th>địa chỉ</th>
                                <th>Chi tiết</th>
                            </tr>
                            @foreach($ordered as $order)
                                <tr class="border-b-2">
                                    <td class="leading-[5] py-2">{{$order->order_id}}</td>
                                    <td class="leading-[5] py-2">{{$order->order_date}}</td>
                                    <td class="leading-[5] py-2">
                                        <span class="leading-[2]">{{$order->status_name}}</span>
                                        <div class="w-full flex  leading-[2] justify-center">
                                            @if($order->status_id == 0 || $order->status_id == 1)
                                                <form action="{{route('updatestatus')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="order_id" value="{{$order->order_id}}">
                                                    <input type="hidden" name="status_id" value="4">
                                                    <button class="px-1 py-0.5 text-14 border rounded-md bg-red-400">Hủy đơn hàng</button>
                                                </form>
                                            @endif
                                            @if($order->status_id == 3)
                                            <form action="{{route('updatestatus')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{$order->order_id}}">
                                                <input type="hidden" name="status_id" value="6">
                                                <button class="px-1 py-0.5 text-14 border rounded-md bg-red-400">Trả Hàng</button>
                                            </form>
                                            <form action="{{route('updatestatus')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{$order->order_id}}">
                                                <input type="hidden" name="status_id" value="5">
                                                <button class="px-1 py-0.5 text-14 border rounded-md bg-green-400">Đã nhận</button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="leading-[5] py-2">{{$order->full_name}}</td>
                                    <td class="leading-[5] py-2">{{$order->order_phone_number}}</td>
                                    <td class="leading-[5] py-2">{{$order->order_delivery_address}}</td>
                                    <td class="leading-[5] py-2"><a href="{{route('ordered', ['order_id' => $order->order_id])}}" class="text-14 text-blue-100">Chi tiết</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection