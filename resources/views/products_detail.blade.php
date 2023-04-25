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
    @if(session('success'))
    <div id="message" class="backdrop-blur-3xl bg-gray-100 mt-16 absolute top-2 left-[40%] rounded-lg opacity-80">
        <div class="py-5 text-20 text-blue-300 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
          <span class="px-4">{{ session('success') }}</span>
        </div>
      </div>
    @endif
    <div class="bg-white">
       
        <div class="flex ">
            <div class="flex flex-col w-1/2 img h-auto">
                <img src="{{$data->fish_link_img}}" alt=""
                class="py-6 px-10 h-2/3">
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
                                <p class="text-gray-700 text-sm font-bold mr-1">Môi trường sống thích hợp (PH):</p>
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
                                <p class="text-gray-700 text-sm font-bold mr-1">Kích thước cá trưởng thành:</p>
                                <p class="text-sm font-normal">{{$data->fish_size}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div type="overflow-hidden" class="quantity flex mb-6 space-x-4">
                    <p class="text-gray-700 text-sm font-bold mt-0.5">Số lượng:</p>
                    <div class="quantity-buttons flex items-center border rounded-sm border-gray-900/30 ">
                        <button class="mb-0.5" type="button" id="previous">
                                <i class="quantity-down fa-solid fa-minus ml-1 text-12"></i>
                        </button>
                        <input name="qty" class="value-quantity w-12 h-full text-center outline-none text-sm" min="1" max="100" step="1" value="{{ old('value-quantity') ?? 1 }}">
                        <input id="product_id" name="product_id" type="hidden" value="{{$data->fish_id}}">
                        <input id="category_id" name="category_id" type="hidden" value="{{$data->category_id}}">
                        <button class="mb-0.5" type="button" id="increment">
                                <i class="quantity-up fa-solid fa-plus mr-1 text-12 "></i>
                        </button>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="flex">
                        <form action="{{route('add-to-transaction')}}" method="post" class="">
                            @csrf
                        <button type="submit" class="py-4 px-10 bg-red-500 text-white font-medium hover:bg-fuchsia-500 mr-3" id="add-to-transaction">
                            <input name="product_id" type="hidden" value="{{$data->fish_id}}">
                            <input name="qty" type="hidden" class="value-quantity w-12 h-full text-center outline-none text-sm" min="1" max="100" step="1" value="{{ old('value-quantity') ?? 1 }}">
                                <p>MUA NGAY VỚI GIÁ {{number_format($data->has_price,0,',','.')}}đ</p>
                        </button>
                        </form>
                        <form action="{{route('add-to-cart')}}" method="post">
                            @csrf
                        <button type="submit" class="py-4 px-6 bg-blue-500 text-white font-medium hover:bg-fuchsia-500" id="add-to-cart">
                            <input  name="product_id" type="hidden" value="{{$data->fish_id}}">
                            <input id="add_to_cart_product_id" type="hidden" name="qty" class="value-quantity w-12 h-full text-center outline-none text-sm" min="1" max="100" step="1" value="1">
                                <i class="fa-solid fa-cart-shopping mr-2"></i>
                                THÊM VÀO GIỎ HÀNG
                        </button>
                        </form>
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
    @else
    <div class="bg-white">
        @if(session('success'))
        <div id="message" class="backdrop-blur-3xl bg-gray-100 mt-16 absolute top-2 left-[40%] rounded-lg opacity-80">
            <div class="py-6 text-20  relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
                <span class="px-4 text-blue-500">{{ session('success') }}</span>
            </div>
        </div>
        @endif
        <div class="flex ">
            <div class="flex flex-col w-1/2">
                <img src="{{$data->accessories_link_img}}" alt=""
                class="py-6 px-10 h-full">
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
               
                
                <div class="quantity flex mb-6 space-x-4">
                    <p class="text-gray-700 text-sm font-bold mt-0.5">Số lượng:</p>
                    <div class="quantity-buttons flex items-center border rounded-sm border-gray-900/30 ">
                        <button class="mb-0.5" type="button" id="previous">
                                <i class="quantity-down fa-solid fa-minus ml-1 text-12"></i>
                        </button>
                        <input name="qty" class="value-quantity w-12 h-full text-center outline-none text-sm" min="1" max="100" step="1" value="{{ old('value-quantity') ?? 1 }}">
                        <input id="product_id" name="product_id" type="hidden" value="{{$data->accessories_id}}">
                        <input id="category_id" name="category_id" type="hidden" value="{{$data->category_id}}">
                        <button class="mb-0.5" type="button" id="increment">
                                <i class="quantity-up fa-solid fa-plus mr-1 text-12 "></i>
                        </button>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex">
                        <form action="{{route('add-to-transaction')}}" method="post" class="">
                            @csrf
                        <button type="submit" class="py-4 px-10 bg-red-500 text-white font-medium hover:bg-fuchsia-500 mr-3" id="add-to-transaction">
                            <input name="product_id" type="hidden" value="{{$data->accessories_id}}">
                            <input type="hidden" name="qty" class="value-quantity w-12 h-full text-center outline-none text-sm" min="1" max="100" step="1" value="{{ old('qty') ?? 1 }}">
                                <p>MUA NGAY VỚI GIÁ {{number_format($data->accessories_price,0,',','.')}}đ</p>
                        </button>
                        </form>
                        <form action="{{route('add-to-cart')}}" method="post">
                            @csrf
                        <button type="submit" class="py-4 px-6 bg-blue-500 text-white font-medium hover:bg-fuchsia-500" id="add-to-cart">
                            <input name="product_id" type="hidden" value="{{$data->accessories_id}}">
                            <input type="hidden" name="qty" class="value-quantity w-12 h-full text-center outline-none text-sm" min="1" max="100" step="1" value="1">
                                <i class="fa-solid fa-cart-shopping mr-2"></i>
                                THÊM VÀO GIỎ HÀNG
                        </button>
                        </form>
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

