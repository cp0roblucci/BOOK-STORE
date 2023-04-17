@extends('layouts.main')

@section('title')
@endsection

@section('scripts')
@endsection

@section('header')
    @include('layouts.header')
@endsection
  
@section('body')
  {{--  --}}
<section class="px-20 py-4 bg-white">
    <div class="bg-white">
        <div class="flex ">
            <div class="flex flex-col w-1/2">
                <img src="{{$detail[0]->fish_link_img}}" alt="" 
                class="py-6 px-10">
                <div class="flex space-x-4 ml-12">
                    <div class="w-24 h-24 border-2 hover:border-blue-400">
                        <img src="{{$detail[0]->fish_link_img}}" alt=""
                        class="h-full px-2 py-2">
                    </div>
                    <div class="w-24 h-24 border-2 hover:border-blue-400">
                        <img src="{{$detail[0]->fish_link_img}}" alt=""
                        class="h-full px-2 py-2">
                    </div>
                    <div class="w-24 h-24 border-2 hover:border-blue-400">
                        <img src="{{$detail[0]->fish_link_img}}" alt=""
                        class="h-full px-2 py-2">
                    </div>
                    <div class="w-24 h-24 border-2 hover:border-blue-400">
                        <img src="{{$detail[0]->fish_link_img}}" alt=""
                        class="h-full px-2 py-2">
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-1/2 mr-16  mt-4" data-key="1">
                <div class="">
                    <h2 class="text-24 font-semibold mb-2">{{$detail[0]->fish_name}}</h2>
                    <div class="flex text-sm font-semibold">
                        <p class="mr-2">SKU: </p> 
                        <span class="text-red-500">{{$detail[0]->fish_id}}</span>
                        <p class="mx-4">|</p>
                        <p class="mr-2">Thương Hiệu:</p>
                        <span class="text-red-500">3TL</span>     
                    </div>
                </div>
                <div class="price flex mt-6">
                    <span class="text-red-500 mr-2 font-bold text-20">Giá:</span>
                    <span class="text-red-500 text-20 font-bold">{{$detail[1]->has_price}}đ</span>
                    <span class="block ml-2 opacity-70 mt-1 line-through text-sm">60000d</span>
                </div>
                <div class="flex text-sm mt-1 font-semibold">
                    <span class="text-gray-700">Tiết kiệm:</span>
                    <span class="text-red-500 ml-1">5000đ</span>
                </div>
                <div class="flex text-sm mt-1 font-semibold">
                    <span class="text-gray-700">Tình trạng:</span>
                    <span class="text-red-500 ml-1">Còn hàng</span>
                </div>
                <div>
                    <button type="button" 
                    class="text-sm text-left font-medium text-red-600 mt-4 w-3/4 border-b border-b-black py-2 group">ĐẶC ĐIỂM NỔI BẬT</button>
                    <div class="">
                        <ul class="mb-4">
                            <li class="flex mt-4">
                                <p class="text-gray-700 text-sm font-bold mr-1">pH:</p>
                                <p class="text-sm font-normal">{{$detail[0]->ph_level}}</p>
                            </li>
                            <li class="flex mt-4">
                                <p class="text-gray-700 text-sm font-bold mr-1">Nhiệt độ:</p>
                                 <p class="text-sm font-normal">24oC</p>
                            </li>
                            <li class="flex mt-4">
                                <p class="text-gray-700 text-sm font-bold mr-1">Thức ăn:</p>
                                <p class="text-sm font-normal">{{$detail[0]->food_id}}</p>
                            </li>
                            <li class="flex mt-4">
                                <p class="text-gray-700 text-sm font-bold mr-1">Tập  tính:</p>
                                <p class="text-sm font-normal">{{$detail[0]->fish_habit}}</p>
                            </li>
                            <li class="flex mt-4">
                                <label for="">Kích Thước: </label>
                                <select class= " ml-2 border border-slate-500" name="size" id="">
                                    @foreach($detail as $key => $value)
                                    <option value="{{$value->size}}">{{$value->size}}</option>
                                    @endforeach
                                </select>

                                {{-- <p class="text-gray-700 text-sm font-bold mr-1">Kích thước:</p>
                                <p class="text-sm font-normal">{{$detail[0]->size}} - {{$detail[2]->size}}</p> --}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex mb-6 space-x-4">
                    <p class="text-gray-700 text-sm font-bold mt-0.5">Số lượng:</p>
                    <div class="flex items-center border rounded-sm border-gray-900/30 hover:border-black">
                        <button onclick="countMinus()" class="mb-0.5">
                            <i class="fa-solid fa-minus ml-1 text-12"></i>
                        </button>
                        <label id="count" class="w-12 h-full text-center outline-none text-sm mt-1">0</label>
                        <button onclick="countAdd()" class="mb-0.5">
                            <i class="fa-solid fa-plus mr-1 text-12 "></i>
                        </button>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="flex">
                        <button class="py-4 px-10 bg-blue-500 text-white font-medium hover:bg-red-500 mr-3">
                            <i class="fa-solid fa-cart-shopping mr-2"></i>    
                            MUA NGAY
                        </button>
                        <button class="py-4 px-6 bg-blue-500 text-white font-medium hover:bg-red-500 ">
                            <i class="fa-solid fa-cart-shopping mr-2"></i>    
                            THÊM VÀO GIỎ HÀNG
                        </button>
                    </div>
                </div>
                    
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
</section>
@endsection
    {{--  --}}
@section('footer')
    @include('layouts.footer')
@endsection

@section('scripts')
    @vite('./resources/js/products_detail.js')
@endsection

