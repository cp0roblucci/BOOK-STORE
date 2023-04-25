@extends('layouts.main')

@section('title')
    Giỏ Hàng
@endsection

@section('scripts')
    @vite('./resources/js/cart.js')
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('body')
    <div class="content-addbuy mx-20 h-auto rounded-lg grid grid-cols-3 gap-2 py-2">
        <div class="cart bg-slate-100 col-span-2">
            <div class="title text-36 font-bold text-blue-200 ml-2">
                <h1 class="p-2">Your Cart</h1>
            </div>
            <div class="items-cart mx-2 text-18">
                @if(empty($accessories) && empty($fish))
                <div class="w-full h-32 flex items-center justify-center">
                    <h1>Your Cart Is Empty!!!</h1>
                    <a href="/products" class="p-2 rounded-lg ml-3 bg-blue-100 text-aliceblue">Shop now</a>
                </div>
                @endif
            @if(!empty($fish))
                @foreach($fish as $key => $item)
                    <div class="item-cart bg-slate-200 my-5 grid grid-cols-10 gap-2 items-center border text-14 " data-key="{{$item->fish_id}}" data-type="{{$item->category_id}}">
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
                            <span class="size block">{{$item->fish_size}}</span>
                        </div>
                        <div class="price-box">
                            <span class="price" data-price="{{$item->has_price}}">{{number_format($item->has_price, 0, '', '.')}} VND</span>
                        </div>
                        <div class="quantity-box relative col-span-2 flex justify-center">
                            @if($batch_fish)
                                @if($item->quantity > $batch_fish[$key][0]->quantity)
                                    <div class="absolute -top-10 text-14 text-red-500">Hết hàng!!!</div>
                                @endif
                            @endif
                            <div class="quantity  absolute top-1/2 -translate-y-1/2">
                                <a href="{{route('update-quantity-cart', ['id_cart' => $item->cart_id, 'product_id' => $item->product_id, 'quantity' => -1])}}"><i class="fa-solid fa-minus minus p-2 border rounded-lg cursor-pointer inline-block hover:bg-white"></i></a>
                                <input class="num w-1/4 inline-block h-8 text-center rounded-lg border-none " type="text" value="{{$item->quantity}}">
                                <a href="{{route('update-quantity-cart', ['id_cart' => $item->cart_id, 'product_id' => $item->product_id, 'quantity' => 1])}}"><i class="fa-solid fa-plus plus p-2 border rounded-lg cursor-pointer inline-block hover:bg-white "></i></a>
                            </div>
                        </div>
                        <div class="total-box">
                            <span class="total" data-price-total="{{($item->has_price)*($item->quantity)}}">{{number_format(($item->has_price)*($item->quantity), 0, '', '.')}} VND</span>
                        </div>
                        <div class="delete cursor-pointer relative">
                            <a href="{{route('delete-item-cart', ['id_cart' => $item->cart_id, 'product_id' => $item->product_id])}}"><i class="fa-solid fa-trash-can delete-btn p-2 absolute right-5 top-0 -translate-y-1/2"></i></a>
                        </div>
                    </div>
                @endforeach
            @endif

            @if(!empty($accessories))
                @foreach($accessories as $key => $item)
                    <div class="item-cart bg-slate-200 my-5 grid grid-cols-10 gap-2 items-center border text-14 " data-key="{{$item->accessories_id}}" data-type="{{$item->category_id}}">
                        <div class="check">
                            <input class="add-buy w-5 h-5 ml-2" name="checked" type="checkbox">
                        </div>
                        <div class="img-item-cart-box w-16 h-16 col-span-1">
                            <img class="img-item-cart w-full h-full" src="{{$item->accessories_link_img}}" alt="">
                        </div>
                        <div class="name-product-box col-span-2">
                            <span class="name-product">{{$item->accessories_name}}</span>
                        </div>
                        <div class="category-box">
                            <span class="category">{{$item->accessories_type_name}}</span>
                        </div>
                        <div class="price-box">
                            <span class="price" data-price="{{$item->accessories_price}}">{{number_format($item->accessories_price, 0, '', '.')}} VND</span>
                        </div>
                        <div class="quantity-box relative col-span-2 flex justify-center">
                            @if($batch_acc)
                                @if($item->quantity > $batch_acc[$key][0]->quantity)
                                <div class="absolute -top-12 left-0 text-14 text-red-500">Hết hàng!!!</div>
                                @endif
                            @endif
                            <div class="quantity  absolute top-1/2 -translate-y-1/2">
                                <a href="{{route('update-quantity-cart', ['id_cart' => $item->cart_id, 'product_id' => $item->product_id, 'quantity' => -1])}}"><i class="fa-solid fa-minus minus p-2 border rounded-lg cursor-pointer inline-block hover:bg-white"></i></a>
                                <input class="num w-1/4 inline-block h-8 text-center rounded-lg " type="text" value="{{$item->quantity}}">
                                <a href="{{route('update-quantity-cart', ['id_cart' => $item->cart_id, 'product_id' => $item->product_id, 'quantity' => 1])}}"><i class="fa-solid fa-plus plus p-2 border rounded-lg cursor-pointer inline-block hover:bg-white "></i></a>
                            </div>
                        </div>
                        <div class="total-box">
                            <span class="total" data-price-total="{{($item->accessories_price)*($item->quantity)}}">{{number_format(($item->accessories_price)*($item->quantity), 0, '', '.')}} VND</span>
                        </div>
                        <div class="delete cursor-pointer relative">
                            <a href="{{route('delete-item-cart', ['id_cart' => $item->cart_id, 'product_id' => $item->product_id])}}"><i class="fa-solid fa-trash-can delete-btn p-2 absolute right-5 top-0 -translate-y-1/2"></i></a>
                        </div>
                    </div>
                @endforeach
            @else
                
            @endif
            </div>
        </div>
        <div class="order-container bg-slate-100 relative flex flex-col justify-between">
            <div class="items-order-container ">
                <div class="warning w-fulll h-16 text-36 flex justify-center items-center text-red-500  p-2">
                    <h1 class="font-bold capitalize p-2">Hãy chọn sản phẩm!!!</h1>
                </div>
            </div>
            <div class="w-full">
                <div class="total py-4 w-full flex justify-between">
                    <span class="uppercase ml-2">total</span>
                    <span class="total-value mr-2 text-blue-400" data-total="0">0 VND</span>
                </div>
                <div class="ordering h-16 flex justify-center items-center w-full uppercase bg-blue-300 text-aliceblue text-26">
                    <form class="form-bill" action="{{route('transaction')}}" method="GET">
                        <input type="hidden" name="checked" value="" id="checkempty">
                        <div class="items-chosen">
                        </div>
                        <button type="submit" class="buybtn w-full h-full hover:scale-75 font-bold text-center">Mua Ngay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection