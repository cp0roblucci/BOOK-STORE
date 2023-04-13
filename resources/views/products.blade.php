@extends('layouts.main')

@section('title')
@endsection

@section('scripts')
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('body')
<section class="py-5 bg-white">
    {{-- container filter --}}
    <div class="container_filter flex mx-6 relative ml-28">
        <div class="flex mr-6 border border-gray-300 px-4 py-1 rounded-md text-sm bg-gray-50 hover:text-blue-500 active:bg-red-500">
            <button id="all-products-btn" class="category-btn">Tất cả</button>
        </div>
       <div class="inline-block">
        <button id="filter_btn" class="relative flex justify-center items-center bg-gray-50 border-gray-300 focus:outline-none outline-none border group z-10 rounded-md hover:bg-gray-200" onclick="">
            <p class="px-2 text-sm group-hover:text-blue-500">Loại sản phẩm </p>
            <span class="p-1 group-hover:text-blue-500">
                <i class="fa-solid fa-angle-down -translate-x-1 "></i>
            </span>
            <div id="filter-type" class="absolute group-hover:block hidden bg-white transition-all top-full w-max shadow-md rounded ml-8"
                id=""
                name="">
                <ul class="text-left border rounded text-sm w-40">
                    <li class="category-btn px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 category" >Cá Rồng</li>
                    <li class="category-btn px-4 py-1 border-b hover:bg-gray-100  hover:text-blue-500 category" >Cá Phượng Hoàng</li>
                    <li class="category-btn px-4 py-1 border-b hover:bg-gray-100  hover:text-blue-500 category" >Cá Betta</li>
                    <li class="category-btn px-4 py-1 border-b hover:bg-gray-100  hover:text-blue-500 category">Cá Bảy Màu</li>
                    <li class="category-btn px-4 py-1 border-b hover:bg-gray-100  hover:text-blue-500 category">Cá Vàng</li>
                    <li class="category-btn px-4 py-1 border-b hover:bg-gray-100  hover:text-blue-500">Thức Ăn</li>
                    <li class="category-btn px-4 py-1 border-b hover:bg-gray-100  hover:text-blue-500">Phụ Kiện</li>
                </ul>
            </div>
        </button>
       </div>
        <div class="inline-block">
            <button  class="relative flex justify-center items-center bg-gray-50 border-gray-300 focus:outline-none outline-none border group z-10 rounded-md ml-4 hover:bg-gray-2200">
                <p class="px-4 text-sm group-hover:text-blue-500">Giá Sản Phẩm</p>
                <span class="p-1 group-hover:text-blue-500">
                    <i class="fa-solid fa-angle-down -translate-x-1 "></i>
                </span>
                <div class="absolute group-hover:block hidden bg-white transition-all top-full w-max shadow-md rounded ml-5"
                    id="dropdown">
                    <ul class="text-left border rounded text-sm w-40">
                        <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500">Giá dưới 20.000đ</li>
                        <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500">20.000đ - 50.000đ</li>
                        <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500">50.000đ - 70.000đ</li>
                        <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500">70.000đ - 100.000đ</li>
                        <li class="pl-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500">100.000đ - 500.000đ</li>
                        <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500">Giá trên 500.000đ</li>
                    </ul>
                </div>
            </button>
        </div>

        <div class="inline-block">
            <button class="relative flex justify-center items-center bg-gray-50 border-gray-300 focus:outline-none outline-none border group z-10 rounded-md ml-4 hover:bg-gray-200">
                <p class="px-4 text-sm group-hover:text-blue-500">Kích thước</p>
                <span class="p-1 group-hover:text-blue-500">
                    <i class="fa-solid fa-angle-down -translate-x-1 "></i>
                </span>
                <div class="absolute group-hover:block hidden bg-white transition-all top-full w-max shadow-md rounded ml-14 "
                    id="dropdown">
                    <ul class="text-left border rounded text-sm w-44">
                        <li id="size_20" class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500">Dưới 20cm</li>
                        <li id="size_35" name class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500">20cm - 50cm</li>
                        <li id="size_75" class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500">50cm - 100cm</li>
                        <li id="size_100" class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500">Trên 100cm</li>
                    </ul>
                </div>
            </button>
        </div>
    </div>
    {{--  --}}
    <div class="flex ml-28 mt-7">
        <input class="w-5 h-5 mr-1 " type="radio" name="radio-check" id=""> <span class="mr-6 text-sm -translate-y-0.5">Tên A-Z</span>
        <input class="w-5 h-5 mr-1" type="radio" name="radio-check" id=""> <span class="mr-6 text-sm -translate-y-0.5">Tên Z-A</span>
        <input class="w-5 h-5 mr-1" type="radio" name="radio-check" id=""> <span class="mr-6 text-sm -translate-y-0.5">Giá thấp lên cao</span>
        <input class="w-5 h-5 mr-1" type="radio" name="radio-check" id=""> <span class="text-sm -translate-y-0.5">Giá cao xuống thấp</span>
    </div>
    {{-- container product --}}
    <div id="product-container" class=" mt-10 mx-20 ">
        <div class="mb-6 text-32 font-bold text-center py-2 border-b border-b-gray-100">
            <h2 class="">TẤT CẢ SẢN PHẨM</h2>
        </div>
        @for($i = 0; $i<5; $i++)
          <div id="dragon-fish" class="product dragon-fish border md:w-1/5 float-left border-gray-100 relative overflow-hidden group">

              <a class="block img h-auto w-full my-5 px-0.5" href="#">
                  <img class=" h-48 w-full " src="/storage/images/img_products/pd1.jpg" alt="">
              </a>
                  {{-- button --}}
              <div class="absolute w-full flex -translate-y-10 opacity-0 group-hover:opacity-100 items-center justify-center transition-all ">

                  <button id="btnProductDetail" href="/products_detail" class="px-5 py-2 mx-0.5 w-full bg-blue-500 text-white rounded-md font-semibold">
                      <i class="fa-solid fa-link text-14 " ></i>
                      Tùy chọn
                  </button>
              </div>
              <div class="item-content my-4 mx-2">
                  <div class="font-semibold text-sm my-2 mt-6">
                      <a class="hover:text-red-500" href="/products_detail">Cá Siêu Saiyan SSJ 1</a>
                  </div>
                  <div class="price flex">
                      <span class="text-red-500 text-16 font-bold">50000đ</span>
                      <span class="block ml-2 mt-0.5 opacity-70 line-through text-sm">60000d</span>
                  </div>
              </div>
          </div>
        @endfor
        
        
        <div
          id="phoenix-fish"
          class="product phoenix-fish border w-1/5 float-left border-gray-100 relative overflow-hidden group">
            <a class="block img h-auto w-full my-5 px-0.5" href="#">
                <img class=" h-48 w-full" src="/storage/images/img_products/dragon_fish/dragon_fish_2.jpg" alt="">
            </a>

            <div class="absolute w-full flex -translate-y-10 opacity-0 group-hover:opacity-100 items-center justify-center transition-all">
                <button class="px-5 py-2 mx-0.5 w-full bg-blue-500 text-white rounded-md font-semibold">
                    <i class="fa-solid fa-link text-14"></i>
                    Tùy chọn
                </button>
            </div>

            <div class="item-content my-4 mx-2 mt-2">

                <div class="font-semibold text-sm my-2 mt-6">
                    <a class=" hover:text-red-500" href="#">Cá Siêu Saiyan SSJ 2</a>
                </div>
                <div class="price flex">
                    <span class="text-red-500 text-16 font-bold">50000đ</span>
                    <span class="block ml-2 mt-0.5 opacity-70 line-through text-sm">60000d</span>
                </div>
            </div>
        </div>

        <div class="border w-1/5 float-left border-gray-100 relative overflow-hidden group">
            <a class="block img h-auto w-full my-5 px-0.5" href="#">
                <img class=" h-48 w-full " src="/images/img_products/dragon_fish/dragon_fish_3.jpg" alt="">
            </a>

            <div class="absolute w-full flex -translate-y-10 opacity-0 group-hover:opacity-100 items-center justify-center transition-all">
                <button class="px-5 py-2 mx-0.5 w-full bg-blue-500 text-white rounded-md font-semibold">
                    <i class="fa-solid fa-link text-14"></i>
                    Tùy chọn
                </button>
            </div>

            <div class="item-content my-4 mx-2 mt-2">

                <div class="font-semibold text-sm my-2 mt-6">
                    <a class=" hover:text-red-500" href="#">Cá Siêu Saiyan SSJ 3</a>
                </div>
                <div class="price flex">
                    <span class="text-red-500 text-16 font-bold">50000đ</span>
                    <span class="block ml-2 mt-0.5 opacity-70 line-through text-sm">60000d</span>
                </div>
            </div>
        </div>
        
        <div class="clear-left"></div>
       
    </div>
    {{-- paging --}}
    <div class="text-center pt-10">
        <div class="">
            <a class="border px-4 py-2 hover:bg-black/20" href="">&laquo;</a>
            <a class="border px-4 py-2 hover:bg-black/20" href="#">1</a>
            <a class="border px-4 py-2 hover:bg-black/20" href="#">2</a>
            <a class="border px-4 py-2 hover:bg-black/20" href="#">3</a>
            <a class="border px-4 py-2 hover:bg-black/20" href="#">4</a>
            <a class="border px-4 py-2 hover:bg-black/20" href="#">5</a>
            <a class="border px-4 py-2 hover:bg-black/20" href="#">&raquo;</a>
        </div>
    </div>
</section>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@section('scripts')
    @vite('./resources/js/products.js')
@endsection


