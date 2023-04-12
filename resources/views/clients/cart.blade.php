@extends('layouts.main')

@section('title')
    Cart
@endsection

@section('scripts')
    @vite('./resources/js/cart.js')
@endsection

@section('header')
    {{-- @include('layouts.header') --}}
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
<div class="content mx-20 h-auto rounded-lg grid grid-cols-3 gap-2">
    <div class="cart bg-slate-100 col-span-2">
        <div class="title text-36 font-bold text-blue-200 ml-2">
            <h1>Your Cart</h1>
        </div>
        <div class="items-cart mx-2 text-18">
            @for($i = 1; $i<5; $i++)
            <div class="item-cart bg-slate-200 my-5 grid grid-cols-10 gap-2 items-center border " data-key="{{$i}}">
                <div class="check">
                    <input class="add-buy w-5 h-5 ml-2" type="checkbox">
                </div>
                <div class="img-item-cart-box w-16 h-16 col-span-1">
                    <img class="img-item-cart w-full h-full" src="/storage/images/xanhdam-trang.png" alt="">
                </div>
                <div class="name-product-box col-span-2">
                    <span class="name-product">Ca Rong Duoi Trang {{$i}}</span>
                </div>
                <div class="category-box">
                    <span class="category">Ca Rong</span>
                </div>
                <div class="price-box">
                    <span class="price">{{$i*50000}}₫</span>
                </div>
                <div class="quantity-box relative col-span-2 flex justify-center">
                    <div class="quantity  absolute top-1/2 -translate-y-1/2">
                        <i class="fa-solid fa-minus minus p-2 border rounded-lg cursor-pointer inline-block hover:bg-white"></i>
                        <input class="num w-1/4 inline-block h-8 text-center rounded-lg " type="text" value="1">
                        <i class="fa-solid fa-plus plus p-2 border rounded-lg cursor-pointer inline-block hover:bg-white "></i>
                    </div>
                </div>
                <div class="total-box">
                    <span class="total">{{$i*50000}}₫</span>
                </div>
                <div class="delete cursor-pointer relative">
                    <i class="fa-solid fa-trash-can delete-btn p-2 absolute right-5 top-0 -translate-y-1/2"></i>
                </div>
            </div>
            @endfor
            {{-- <div class="item-cart bg-slate-200 my-5 grid grid-cols-10 gap-2 items-center border " data-key="2">
                <div class="check">
                    <input class="add-buy w-5 h-5 ml-2" type="checkbox">
                </div>
                <div class="img-item-cart-box w-16 h-16 col-span-1">
                    <img class="w-full h-full" src="/images/xanhdam-trang.png" alt="">
                </div>
                <div class="name-product-box col-span-2">
                    <span class="name-product">Ca Rong Duoi Vang</span>
                </div>
                <div class="category-box">
                    <span class="category">Ca Rong</span>
                </div>
                <div class="price-box">
                    <span class="price">70000₫</span>
                </div>
                <div class="quantity-box relative col-span-2 flex justify-center">
                    <div class="quantity  absolute top-1/2 -translate-y-1/2">
                        <i class="fa-solid fa-minus minus p-2 border rounded-lg cursor-pointer inline-block hover:bg-white"></i>
                        <input class="num w-1/4 inline-block h-8 text-center rounded-lg " type="text" value="2">
                        <i class="fa-solid fa-plus plus p-2 border rounded-lg cursor-pointer inline-block hover:bg-white "></i>
                    </div>
                </div>
                <div class="total-box">
                    <span class="total">70000₫</span>
                </div>
                <div class="delete cursor-pointer relative">
                    <i class="fa-solid fa-trash-can delete-btn p-2 absolute right-5 top-0 -translate-y-1/2"></i>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="order-container bg-slate-100 relative flex flex-col justify-between">
        <div class="items-order-container ">
            <span class="hidden">-</span>
            <div class="warning w-fulll h-16 text-24 flex justify-center items-center text-blue-100 p-2">
                <h1 class="font-bold uppercase p-2">Add Items to buy</h1>
            </div>
        </div>
        <div class="w-full">
            <div class="total py-4 w-full flex justify-between">
                <span class="uppercase ml-2">total</span>
                <span class="total-value mr-2">0₫</span>
            </div>
            <div class="ordering h-16 flex justify-center items-center w-full uppercase bg-blue-300 text-aliceblue text-26">
               <a class="w-full hover:scale-75 font-bold text-center" href="/transaction">Mua Ngay</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection