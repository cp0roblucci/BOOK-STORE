@extends('layouts.main')

@section('title')
    Cart
@endsection

@section('scripts')
    @vite('./resources/js/cart.js')
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('body')
    <div class="content mx-20 h-auto rounded-lg grid grid-cols-3 gap-2 py-2">
        <div class="cart bg-slate-100 col-span-2">
            <div class="title text-36 font-bold text-blue-200 ml-2">
                <h1 class="p-2">Your Cart</h1>
            </div>
            <div class="items-cart mx-2 text-18">
                @foreach($cart as $key => $item)
                <div class="item-cart bg-slate-200 my-5 grid grid-cols-10 gap-2 items-center border " data-key="{{$key+1}}">
                    <div class="check">
                        <input class="add-buy w-5 h-5 ml-2" type="checkbox">
                    </div>
                    <div class="img-item-cart-box w-16 h-16 col-span-1">
                        <img class="img-item-cart w-full h-full" src="{{$item->fish_link_img}}" alt="">
                    </div>
                    <div class="name-product-box col-span-2">
                        <span class="name-product">{{$item->fish_name}}</span>
                    </div>
                    <div class="category-box">
                        <span class="category">{{$item->fish_species}}</span>
                    </div>
                    <div class="price-box">
                        <span class="price">{{$item->has_price}}₫</span>
                    </div>
                    <div class="quantity-box relative col-span-2 flex justify-center">
                        <div class="quantity  absolute top-1/2 -translate-y-1/2">
                            <i class="fa-solid fa-minus minus p-2 border rounded-lg cursor-pointer inline-block hover:bg-white"></i>
                            <input class="num w-1/4 inline-block h-8 text-center rounded-lg " type="text" value="{{$item->QUANTITY}}">
                            <i class="fa-solid fa-plus plus p-2 border rounded-lg cursor-pointer inline-block hover:bg-white "></i>
                        </div>
                    </div>
                    <div class="total-box">
                        <span class="total">{{($item->has_price)*($item->QUANTITY)}}₫</span>
                    </div>
                    <div class="delete cursor-pointer relative">
                        <i class="fa-solid fa-trash-can delete-btn p-2 absolute right-5 top-0 -translate-y-1/2"></i>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="order-container bg-slate-100 relative flex flex-col justify-between">
            <div class="items-order-container ">
                <span class="hidden">-</span>
                <div class="warning w-fulll h-16 text-36 flex justify-center items-center text-blue-100 p-2">
                    <h1 class="font-bold capitalize p-2">Add Items to buy</h1>
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