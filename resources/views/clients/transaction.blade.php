@extends('layouts.main')

@section('title')
    Thanh Toán
@endsection

@section('header')
    @include('layouts.header')

@endsection

@section('body')
<div class="py-2 content-transaction">
    <form action="{{route('order')}}" method="POST">
        <div class="mx-20 h-auto rounded-lg font-popins">
            <div class="infomation bg-slate-100 py-3 mb-2">
                <div class="address flex text-2xl leading-[4] text-blue-200 mx-5">
                    <div class="icon mr-5">
                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                    </div>
                    <div class="capitalize">Địa chỉ nhận hàng</div>
                </div>
                <div class="inf capitalize flex text-18 ml-5">
                    <div class="infor text-16">
                        <label for="name_order">Tên người nhận hàng: </label>
                        <input class="text-18 h-8 w-36 border-none placeholder:text-14" type="text" name="name_order" id="name_order" 
                            value="{{Auth::user()->last_name . ' ' . Auth::user()->first_name }}">
                        <label for="phone_order">Số điện thoại: </label>
                        <input class="text-18 h-8 border-none placeholder:text-14" type="text" name="phone_order" id="phone_order" 
                            placeholder="@if(Auth::user()->phone_number){{Auth::user()->phone_number}} @else Số điện thoại @endif">
                        
                    </div>
                    <div class="addr ml-5 text-16">
                        <label for="">Địa chỉ: </label>
                        <input class="text-18 h-8 border-none placeholder:text-14" type="text" name="address_order" placeholder="@if(Auth::user()->user_address) {{Auth::user()->user_address}} @else Địa chỉ @endif">
                    </div>
                    <div class="ml-5 text-16">
                        <label for="note">Lời nhắn: </label>
                        <input class="text-18 h-8 border-none placeholder:text-14" type="text" name="note" id="note" placeholder="Lời nhắn...">
                    </div>
                </div>
            </div>
            <div class="products bg-slate-100 py-3 my-2">
                <table class="w-full mx-5">
                    <tr>
                        <th>Sản Phẩm</th>
                        <th>Loại</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành Tiền</th>
                    </tr>
                    @foreach($fish as $key => $item)
                    <tr class="">
                        <td class="flex items-center">
                            <img class="min-h-10 w-20" src="{{$item[0]->fish_link_img}}" alt="">
                            <p class="ml-5">{{$item[0]->fish_name}}</p>
                            <input type="hidden" name="item{{$item[0]->fish_id}}" value="{{$item[0]->fish_id}}">
                            <input type="hidden" name="category{{$item[0]->fish_id}}" value="{{$item[0]->category_id}}">
                        </td>
                        <td class="text-center">Size {{$item[0]->fish_size}}</td>
                        <td class="text-center"><span>{{number_format($item[0]->has_price, 0, '', '.')}} VND</span></td>
                        <td class="text-center">{{$qttfish[$key]}}
                            <input type="hidden" name="qtt{{$item[0]->fish_id}}" value="{{$qttfish[$key]}}">
                        </td>
                        <td class="text-center">{{number_format(($qttfish[$key])*($item[0]->has_price), 0, '', '.')}} VND</td>
                    </tr>
                    @endforeach
                    @foreach($accessories as $key => $item)
                    <tr class="">
                        <td class="flex items-center">
                            <img class="h-10 w-20" src="{{$item[0]->accessories_link_img}}" alt="">
                            <p class="ml-5">{{$item[0]->accessories_name}}</p>
                            <input type="hidden" name="item{{$item[0]->accessories_id}}" value="{{$item[0]->accessories_id}}">
                            <input type="hidden" name="category{{$item[0]->accessories_id}}" value="{{$item[0]->category_id}}">
                        </td>
                        <td class="text-center">Loại: {{$item[0]->category_name}}</td>
                        <td class="text-center"><span>{{number_format($item[0]->accessories_price, 0, '', '.')}} VND</span></td>
                        <td class="text-center">{{$qttacc[$key]}}
                            <input type="hidden" name="qtt{{$item[0]->accessories_id}}" value="{{$qttacc[$key]}}">
                        </td>
                        <td class="text-center">{{number_format(($qttacc[$key])*($item[0]->accessories_price), 0, '', '.')}} VND</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-green-500">Đơn Vị Vận Chuyển:</td>
                        <td><h2 class="font-bold">Giao Hàng tiết Kiệm</h2>   <span class="text-14 opacity-80">Nhận hàng vào {{date("d")}} Th{{date("m")}} - @if(date("d") + 3 > 30) {{date("d") + 3 -30}} @else {{date("d") + 3}} @endif Th{{date("m")}}</span></td>
                        <td class="text-center"><span>{{number_format(30000, 0, '', '.')}} VND</span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="font-bold">Tổng Tiền: <span class="ml-5">{{number_format($total+30000, 0, '', '.')}} VND</span></td>
                    </tr>

                </table>
            </div>
            <div class="payment bg-slate-100">
                <div class="title-payment mx-5 flex py-5">
                    <div class=" py-2 px-5 text-18 "><h1 class="capitalize text-2xl">Phương thức thanh toán</h1></div>
                    {{-- <div > <button class=" py-2 px-5 mr-5 text-18 border bg-slate-200 hover:border-blue-300 hover:text-blue-300 focus:border-blue-300 focus:text-blue-300">ATM</button></div> --}}
                    <div ><a class=" py-2 px-5 text-18 border bg-slate-200 hover:border-blue-300 hover:text-blue-300 focus:border-blue-300 focus:text-blue-300">Thanh Toán Khi Nhận Hàng</a></div>
                </div>
                <div class=" mx-5 flex justify-end">
                    <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                    @csrf
                    <button type="submit" class=" px-8 py-4 mb-2 bg-blue-300 text-26 text-aliceblue">Đặt Hàng</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection