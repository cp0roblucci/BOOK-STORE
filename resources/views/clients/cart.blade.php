@extends('layouts.main')

@section('scripts')
    @vite('./resources/js/cart.js')
@endsection

@section('header')
    @include('layouts.header')
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
                    <img class="img-item-cart w-full h-full" src="/images/xanhdam-trang.png" alt="">
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
            <div class="warning w-fulll h-16 text-24 flex justify-center items-center text-blue-100">
                <h1 class="font-bold uppercase">Add Your Favourites Item to buy</h1>
            </div>
        </div>
        <div class="w-full">
            <div class="total py-4 w-full flex justify-between">
                <span class="uppercase ml-2">total</span>
                <span class="total-value mr-2">0₫</span>
            </div>
            <div class="ordering h-16 flex items-center justify-center w-full uppercase bg-blue-300 text-aliceblue text-26 ">
               <a class="w-full h-full text-center" href="#">Order</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection