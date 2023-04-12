@extends('layouts.main')

@section('title')
    Thanh Toán
@endsection

@section('header')
<div class="header flex justify-between items-center mx-20 text-16 h-full font-popins py-2">
    <div class="w-1/4 items-center">
        <div class="shop-img w-14">
            <a class="" href="/">
                <img class="h-14 " src="/storage/images/logo.png" alt="">
            </a>
        </div>
        <div class="shopname">
            <a class="text-16 font-bold hover:text-slate-300" href="/" >
                <span class="uppercase">betta3tl.
                </span><span>com</span>
            </a>
        </div>
    </div>
    <div class="w-2/4  flex justify-center">
        <ul class="w-3/4 m-auto flex justify-between items-center flex-wrap">
            <li><a class="px-4 py-2 bg-slate-200 rounded-md shadow-md text-16 hover:bg-blue-300 hover:text-slate-200" href="/">Trang chủ</a></li>
            <li><a class="px-4 py-2 bg-slate-200 rounded-md shadow-md text-16 hover:bg-blue-300 hover:text-slate-200" href="/products">Sản phẩm</a></li>
            <li><a class="px-4 py-2 bg-slate-200 rounded-md shadow-md text-16 hover:bg-blue-300 hover:text-slate-200" href="/contact">Liên hệ</a></li>
            {{-- <li class="w-full flex justify-center items-center mt-3 relative">
                <input class="w-1/2 border-none rounded-md h-7 px-2 py-2 text-18 bg-slate-200 placeholder-black placeholder-opacity-60 outline-none" type="text" placeholder="ca rong, ca betta">
                <a href="" class=" absolute right-1/4 px-2 py-0.5 hover:bg-blue-300 rounded-md text-slate-500 text-16"><i class="fa-solid fa-magnifying-glass"></i></a>
            </li> --}}
        </ul>
    </div>
    <div class="w-1/4  flex justify-center items-center">
        <div class="mr-20 hover:text-slate-300">
            <a href="/cart" class="text-20"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
        {{-- logged --}}
        <div class="text-16 flex justify-center items-center">
            <a href="#" class="flex justify-center items-center hover:text-slate-300">
                <img src="/storage/images/user1.png" class="w-8 h-8 rounded-full mr-2" alt="">
                <span class="">Le Thanh Hung</span>
            </a>
            <a href="" class="mx-2 hover:text-slate-500"></a>
            <button class="before:border-r-2 before:border-slate-900 before:mr-1.5 before:text-14 hover:text-slate-300">Logout</button>
        </div>
        {{-- not logged --}}
        {{-- <div>
            <a href="/login">Login</a>
        </div> --}}


    </div>
</div>
@endsection

@section('body')
    <div class="content mx-20 h-auto rounded-lg font-popins">
       <div class="infomation bg-slate-100 py-3 mb-2">
            <div class="address flex text-2xl leading-[4] text-blue-200 mx-5">
                <div class="icon mr-5">
                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                </div>
                <div class="capitalize">Địa chỉ nhận hàng</div>
            </div>
            <div class="inf capitalize flex text-18 ml-5">
                <div class="infor font-bold">Lê Thanh Hùng 0354324624</div>
                <div class="addr ml-5 opacity-60">Ninh Kiều, Cần Thơ</div>
                <div class="text-12  mx-5"> <p class=" px-1 py-0.5 border border-blue-200">mặc định</p> </div>
                <button class="px-2 text-blue-200">Thay đổi</button>
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
                @for($i = 1; $i<=3 ;$i++)
                <tr class="">
                    <td class="flex items-center">
                        <img class="h-10" src="./storage/images/product3.jpg" alt="">
                        <p class="ml-5">Cá Betta Đỏ</p>
                    </td>
                    <td class="text-center">Size {{$i*5}}-{{$i*7}}cm</td>
                    <td class="text-center"><span>{{50000}}d</span></td>
                    <td class="text-center">{{$i}}</td>
                    <td class="text-center">{{50000*$i}}</td>
                </tr>
                @endfor
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-green-500">Đơn Vị Vận Chuyển:</td>
                    <td><h2 class="font-bold">Giao Hàng tiết Kiệm</h2> <span class="text-14 opacity-80">Nhận hàng vào 15 Th04 - 18 Th04</span></td>
                    <td class="text-center"><span>30000d</span></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="font-bold">Tổng Tiền: <span class="ml-5">330000d</span></td>
                </tr>

            </table>
       </div>
       <div class="payment bg-slate-100">
            <div class="title-payment mx-5 flex py-5">
                <div class=" py-2 px-5 text-18 "><h1 class="capitalize text-2xl">Phương thức thanh toán</h1></div>
                {{-- <div > <button class=" py-2 px-5 mr-5 text-18 border bg-slate-200 hover:border-blue-300 hover:text-blue-300 focus:border-blue-300 focus:text-blue-300">ATM</button></div> --}}
                <div ><button class=" py-2 px-5 text-18 border bg-slate-200 hover:border-blue-300 hover:text-blue-300 focus:border-blue-300 focus:text-blue-300">Thanh Toán Khi Nhận Hàng</button></div>
            </div>
            <div class=""></div>
            <div class=" mx-5 flex justify-end">
                <button class=" px-8 py-4 mb-2 bg-blue-300 text-26 text-aliceblue">Đặt Hàng</button>
            </div>
       </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection