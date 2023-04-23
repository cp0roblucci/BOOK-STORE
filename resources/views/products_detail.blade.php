@extends('layouts.main')

@section('title')
@endsection

@section('scripts')
@vite('./resources/js/products_detail.js')
@endsection

@section('header')
    @include('layouts.header')
@endsection
  
@section('body')
  {{--  --}}
<section class="px-20 py-4 bg-white">
    @if ($data->category_id === 1)
    <div class="bg-white">
        
        <div class="flex ">
            <div class="flex flex-col w-1/2">
                <img src="{{$data->fish_link_img}}" alt=""
                class="py-6 px-10">
            </div>
        
            <div class="flex flex-col w-1/2 mr-16  mt-4" data-key="1">
                
                <div class="">
                    <h2 class="text-24 font-semibold mb-2">{{$data->fish_name}}</h2>
                    <div class="flex text-sm font-semibold">
                        <p class="mr-2">SKU: </p> 
                        <span class="text-red-500">{{$data->fish_id}}</span>
                        <p class="mx-4">|</p>
                        <p class="mr-2">Thương Hiệu:</p>
                        <span class="text-red-500">3TL</span>     
                    </div>
                </div>
                <div class="price flex mt-4">
                    <span class="mr-2 text-red-600 font-bold text-20">Giá:</span>
                    <span class="text-20 text-red-600 font-bold">{{number_format($data->has_price,0,',','.')}}đ</span>
                </div>
                <div>
                    <button type="button" 
                    class="text-sm text-left font-medium text-red-600 mt-4 w-3/4 border-b border-b-black py-2 group">ĐẶC ĐIỂM NỔI BẬT</button>
                    
                    <div class="">
                        <ul class="mb-4">
                            <li class="flex mt-4">
                                <p class="text-gray-700 text-sm font-bold mr-1">pH:</p>
                                <p class="text-sm font-normal">{{$data->ph_level}}</p>
                            </li>
                            <li class="flex mt-4">
                                <p class="text-gray-700 text-sm font-bold mr-1">Màu Sắc:</p>
                                 <p class="text-sm font-normal lowercase">{{$data->color}}</p>
                            </li>
                            <li class="flex mt-4">
                                <p class="text-gray-700 text-sm font-bold mr-1">Thức ăn:</p>
                                <p class="text-sm font-normal lowercase">{{$data->food_id}}</p>
                            </li>
                            <li class="flex mt-4">
                                <p class="text-gray-700 text-sm font-bold mr-1">Tập tính:</p>
                                <p class="text-sm font-normal">{{$data->fish_habit}}</p>
                            </li>
                            <li class="flex mt-4">
                                <p class="text-gray-700 text-sm font-bold mr-1">Mô tả:</p>
                                <p class="text-sm font-normal lowercase">{{$data->fish_desc}}</p>
                            </li>
                            <li class="flex mt-4">
                                <p class="text-gray-700 text-sm font-bold mr-1">Kích thước:</p>
                                <p class="text-sm font-normal">{{$data->fish_size}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <form action="{{ route('add-to-cart')}}" method="post" class="">
                    @csrf
                        <div class="quantity flex mb-6 space-x-4">
                            <p class="text-gray-700 text-sm font-bold mt-0.5">Số lượng:</p>
                            <div class="quantity-buttons flex items-center border rounded-sm border-gray-900/30 ">
                                <button class="mb-0.5" type="button" id="quantity-down">
                                    <i class="quantity-down fa-solid fa-minus ml-1 text-12"></i>
                                </button>
                                <input name="qty" class="w-12 h-full text-center outline-none text-sm" min="1" max="100" step="1" value="1">
                                <input name="product_id" type="hidden" value="{{$data->fish_id}}">
                                <button class="mb-0.5" type="button" id="quantity-up">
                                    <i class="quantity-up fa-solid fa-plus mr-1 text-12 "></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="flex">
                                <button type="submit" class="py-4 px-10 bg-blue-500 text-white font-medium hover:bg-red-500 mr-3">
                                    <i class="fa-solid fa-cart-shopping mr-2"></i>
                                    MUA NGAY
                                </button>
                                <button type="submit" class="py-4 px-6 bg-blue-500 text-white font-medium hover:bg-red-500" id="add-to-cart">
                                    <i class="fa-solid fa-cart-shopping mr-2"></i>
                                    THÊM VÀO GIỎ HÀNG
                                </button>
                            </div>
                        </div>
                </form>
                <div class="mb-4 flex border-t pt-2 border-black">
                    <p class="text-sm mr-2.5">Hotline đặt hàng:</p>
                    <p class="text-sm text-blue-500 font-semibold hover:text-red-500">
                        <i class="fa-solid fa-phone"></i>
                        +0123456789
                    </p>
                    <p class="text-sm ml-1">(7:30 - 22:00)</p>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="bg-white">
        
        <div class="flex ">
            <div class="flex flex-col w-1/2">
                <img src="{{$data->accessories_link_img}}" alt=""
                class="py-6 px-10 h-3/4">
            </div>
            <div class="flex flex-col w-1/2 mr-16  mt-4" data-key="1">
                <div class="">
                    <h2 class="text-24 font-semibold mb-2">{{$data->accessories_name}}</h2>
                    <div class="flex text-sm font-semibold">
                        <p class="mr-2">SKU: </p> 
                        <span class="text-red-500">{{$data->accessories_id}}</span>
                        <p class="mx-4">|</p>
                        <p class="mr-2">Thương Hiệu:</p>
                        <span class="text-red-500">3TL</span>     
                    </div>
                </div>
                <div class="price flex mt-4">
                    <span class="mr-2 text-red-600 font-bold text-20">Giá:</span>
                    <span class="text-20 text-red-600 font-bold">{{number_format($data->accessories_price,0,',','.')}}đ</span>
                </div>
                <div>
                    <button type="button" 
                    class="text-sm text-left font-medium text-red-600 mt-4 w-3/4 border-b border-b-black py-2 group">ĐẶC ĐIỂM NỔI BẬT</button>
                    <div class="">
                        <ul class="mb-4">
                            <li class="flex mt-4">
                                <p class="text-gray-700 text-sm font-bold mr-1">Mô tả:</p>
                                <p class="text-sm font-normal">{{$data->accessories_desc}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <form action="{{ route('add-to-cart',['cart_details'])}}" method="post" class="">
                    @csrf
                        <div class="quantity flex mb-6 space-x-4">
                            <p class="text-gray-700 text-sm font-bold mt-0.5">Số lượng:</p>
                            <div class="quantity-buttons flex items-center border rounded-sm border-gray-900/30 ">
                                <button class="mb-0.5" type="button" id="quantity-down">
                                    <i class="quantity-down fa-solid fa-minus ml-1 text-12"></i>
                                </button>
                                <input name="qty" class="w-12 h-full text-center outline-none text-sm" min="1" max="100" step="1" value="1">
                                <input name="product_id" type="hidden" value="{{$data->accessories_id}}">
                                <button class="mb-0.5" type="button" id="quantity-up">
                                    <i class="quantity-up fa-solid fa-plus mr-1 text-12 "></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="flex">
                                <button type="submit" class="py-4 px-10 bg-blue-500 text-white font-medium hover:bg-red-500 mr-3">
                                    <i class="fa-solid fa-cart-shopping mr-2"></i>
                                    MUA NGAY
                                </button>
                                <button type="submit" class="py-4 px-6 bg-blue-500 text-white font-medium hover:bg-red-500" id="add-to-cart">
                                    <i class="fa-solid fa-cart-shopping mr-2"></i>
                                    THÊM VÀO GIỎ HÀNG
                                </button>
                            </div>
                        </div>
                </form>
                <div class="mb-4 flex border-t pt-2 border-black">
                    <p class="text-sm mr-2.5">Hotline đặt hàng:</p>
                    <p class="text-sm text-blue-500 font-semibold hover:text-red-500">
                        <i class="fa-solid fa-phone"></i>
                        +0123456789
                    </p>
                    <p class="text-sm ml-1">(7:30 - 22:00)</p>
                </div>
            </div>
        </div>
    </div>
    @endif
    
</section>
@endsection
    {{--  --}}
@section('footer')
    @include('layouts.footer')
@endsection

@section('scripts')
    @vite('./resources/js/products_detail.js')
@endsection

