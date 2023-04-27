@extends('layouts.main')

@section('title')
    Sản Phẩm
@endsection

@section('scripts')
    @vite('./resources/js/products.js')
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('body')
<section class="py-5 bg-white">
    {{-- container filter --}}

    {{-- container product --}}

    <div class="container_filter flex mx-6 relative ml-28">
        @if ($categoryId == 1)
        {{-- slidebar fish --}}
        <div class="flex mr-6 border px-4 py-1.5 rounded-md text-sm hover:text-blue-500 hover:border-blue-500">
            <a href="{{route('get-product',['category_id' => 1])}}" id="all-products-btn" class="category-btn mt-1">
                <i class="fa-solid fa-fish mr-1"></i> Cá
            </a>
        </div>
        <div class="flex mr-6 border px-4 py-1.5 rounded-md text-sm hover:text-blue-500 hover:border-blue-500">
            <a href="{{route('get-product',['category_id' => 0])}}" id="all-products-btn" class="category-btn mt-1">
                <i class="fa-solid fa-diagram-successor mr-2"></i>Phụ Kiện
            </a>
        </div>
        <div class="inline-block">
        <button id="filter_btn" class="hover:border-blue-500 relative flex justify-center items-center focus:outline-none outline-none border group z-10 rounded-md hover:bg-gray-200" onclick="">
            <p class="px-2 py-2 mt-0.5 text-sm group-hover:text-blue-500 hover:border-blue-500">
                <i class="fa-solid fa-fish mr-1"></i>
                Loại sản phẩm
                <i class="fa-solid fa-angle-down mr-2 text-14 ml-1"></i>
            </p>
            <div id="filter-type" class="absolute group-hover:block hidden bg-white transition-all top-full w-max shadow-md rounded ml-2"
                id=""
                name="">

                <ul class="text-left border rounded text-sm w-40">
                @foreach($fishSpecies as $value)
                    <li class="category-btn px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 hover:border-blue-500 category ">
                        <a href="{{ route('filter-products-by-fish', ['category_id' => 1, 'fish_species' => $value->fish_species]) }}">
                            {{$value->fish_species}}
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>
        </button>
        </div>
        <div class="inline-block">
            <button  class="relative flex justify-center items-center focus:outline-none outline-none border group z-10 rounded-md ml-4 hover:bg-gray-2200 hover:border-blue-500">
                <p class="px-4 py-2 mt-0.5 text-sm group-hover:text-blue-500 ">
                    <i class="fa-regular fa-money-bill-1 mr-2"></i>
                    Giá Sản Phẩm
                    <i class="fa-solid fa-angle-down ml-1"></i>
                </p>
                <div class="absolute group-hover:block hidden bg-white transition-all top-full w-max shadow-md rounded"
                    id="dropdown">
                    <ul class="text-left border rounded text-sm w-40 ">
                        <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 hover:border-blue-500">
                            <a href="{{ route('filter-products-by-price', ['category_id' => 1, 'price_filter' => 'from_50000']) }}">Dưới 50.000đ</a>
                        </li>
                        <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 hover:border-blue-500">
                            <a href="{{ route('filter-products-by-price', ['category_id' => 1, 'price_filter' => 'from_50000_to_150000']) }}">50.000đ - 150.000đ</a>
                        </li>
                        <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 hover:border-blue-500">
                            <a href="{{ route('filter-products-by-price', ['category_id' => 1, 'price_filter' => 'from_150000_to_300000']) }}">150.000đ - 300.000đ</a>
                        </li>
                        <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 hover:border-blue-500">
                            <a href="{{ route('filter-products-by-price', ['category_id' => 1, 'price_filter' => 'from_300000']) }}">Trên 300.000đ</a>
                        </li>
                    </ul>
                </div>
            </button>
        </div>
        {{-- <div class="inline-block">
            <button class="relative flex justify-center items-center focus:outline-none outline-none border group z-10 rounded-md ml-4 hover:border-blue-500">
                <p class="px-4 text-sm group-hover:text-blue-500 p-2">
                    <i class="fa-solid fa-fish mr-1"></i>
                    Kích thước
                    <i class="fa-solid fa-angle-down -translate-x-1 pt-1 ml-2"></i>
                </p>

                <div class="absolute group-hover:block hidden bg-white transition-all top-full w-max shadow-md rounded ml-8"
                    id="dropdown">
                    <ul class="text-left border rounded text-sm w-44">
                        <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 hover:border-blue-500">
                            <a href="{{ route('filter-fish-by-size', ['category_id' => 1, 'size_filter' => 'from_5cm']) }}">Dưới 5cm</a>
                        </li>
                        <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 hover:border-blue-500">
                            <a href="{{ route('filter-fish-by-size', ['category_id' => 1, 'size_filter' => 'from_5cm_to_10cm']) }}">Từ 5 - 10 cm</a>
                        </li>
                        <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 hover:border-blue-500">
                            <a href="{{ route('filter-fish-by-size', ['category_id' => 1, 'size_filter' => 'from_10cm_to_50cm']) }}">Từ 10 - 50 cm</a>
                        </li>
                        <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 hover:border-blue-500">
                            <a href="{{ route('filter-fish-by-size', ['category_id' => 1, 'size_filter' => 'from_50cm']) }}">Lớn hơn 50 cm</a>
                        </li>
                    </ul>
                </div>
            </button>
        </div> --}}
        <div class="flex ml-4">
            <a class="font-light mr-4 text-sm p-2 px-4 rounded-md border hover:text-blue-500 hover:border-blue-500"
            href="{{route('filter-products-by-price',['category_id' => 1,'price_filter'=> 'asc'])}}">
            <p class="mt-0.5">
                <i class="fa-regular fa-money-bill-1 mr-2"></i>
                Giá thấp đến cao
                <i class="fa-solid fa-arrow-up ml-2"></i>
            </p>
            </a>
            <a class="font-light text-sm p-2 px-4 rounded-md border hover:text-blue-500 hover:border-blue-500"
            href="{{route('filter-products-by-price',['category_id' => 1,'price_filter'=> 'desc'])}}">
            <p class="mt-0.5">
                <i class="fa-regular fa-money-bill-1 mr-2"></i>
                Giá cao đến thấp
                <i class="fa-solid fa-arrow-down ml-2"></i>
            </p>
            </a>
        </div>
    @else
    {{-- slidebar phụ kiện --}}
    <div class="flex mr-6 border px-4 py-1.5 rounded-md text-sm hover:text-blue-500 hover:border-blue-500">
        <a href="{{route('get-product',['category_id' => 1])}}" id="all-products-btn" class="category-btn mt-1">
            <i class="fa-solid fa-fish mr-1"></i> Cá
        </a>
    </div>
    <div class="flex mr-6 border px-4 py-1.5 rounded-md text-sm hover:text-blue-500 hover:border-blue-500">
        <a href="{{route('get-product',['category_id' => 0])}}" id="all-products-btn" class="category-btn mt-1">
            <i class="fa-solid fa-diagram-successor mr-2"></i>Phụ Kiện
        </a>
    </div>
    <div class="inline-block">
    <button id="filter_btn" class="relative flex justify-center items-center  focus:outline-none outline-none border group z-10 rounded-md hover:border-blue-500" onclick="">
        <p class="px-2 text-sm group-hover:text-blue-500  p-2 mt-0.5">
            <i class="fa-solid fa-diagram-successor mr-2"></i>
            Loại sản phẩm
            <i class="fa-solid fa-angle-down text-14 ml-2"></i>
        </p>
        <div id="filter-type" class="absolute group-hover:block hidden bg-white transition-all top-full w-max shadow-md rounded ml-3"
            id=""
            name="">

            <ul class="text-left border rounded text-sm w-40 ">
            @foreach($accessoriesType as $value)
                <li class="category-btn px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 hover:border-blue-500 category">
                    <a href="{{ route('filter-products-by-accessories', ['category_id' => 0, 'accessories_type_name' => $value->accessories_type_id]) }}">
                        {{$value->accessories_type_name}}
                    </a>
                </li>
            @endforeach
            </ul>
        </div>
    </button>
    </div>
    <div class="inline-block">
        <button  class="relative flex justify-center items-center focus:outline-none outline-none border group z-10 rounded-md ml-4 hover:bg-gray-2200 hover:border-blue-500">
            <p class="px-4 py-2 mt-0.5 text-sm group-hover:text-blue-500 ">
                <i class="fa-regular fa-money-bill-1 mr-2"></i>
                Giá Sản Phẩm
                <i class="fa-solid fa-angle-down ml-1"></i>
            </p>
            <div class="absolute group-hover:block hidden bg-white transition-all top-full w-max shadow-md rounded ml-5"
                id="dropdown">
                <ul class="text-left border rounded text-sm w-40 ">
                    <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 hover:border-blue-500">
                        <a href="{{ route('filter-products-by-price', ['category_id' => 0, 'price_filter' => 'from_50000']) }}">Dưới 50.000đ</a>
                    </li>
                    <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 hover:border-blue-500">
                        <a href="{{ route('filter-products-by-price', ['category_id' => 0, 'price_filter' => 'from_50000_to_150000']) }}">50.000đ - 150.000đ</a>
                    </li>
                    <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 hover:border-blue-500">
                        <a href="{{ route('filter-products-by-price', ['category_id' => 0, 'price_filter' => 'from_150000_to_300000']) }}">150.000đ - 300.000đ</a>
                    </li>
                    <li class="px-4 py-1 border-b hover:bg-gray-100 hover:text-blue-500 hover:border-blue-500">
                        <a href="{{ route('filter-products-by-price', ['category_id' => 0, 'price_filter' => 'from_300000']) }}">Trên 300.000đ</a>
                    </li>
                </ul>
            </div>
        </button>
    </div>
    <div class="flex ml-4">
        <a class="font-light mr-4 text-sm p-2 px-4 rounded-md border hover:text-blue-500 hover:border-blue-500"
        href="{{route('filter-products-by-price',['category_id' => 0,'price_filter'=> 'asc'])}}">
        <p class="mt-0.5">
            <i class="fa-regular fa-money-bill-1 mr-2"></i>
            Giá thấp đến cao
            <i class="fa-solid fa-arrow-up ml-2"></i>
        </p>
        </a>
        <a class="font-light text-sm p-2 px-4 rounded-md border hover:text-blue-500 hover:border-blue-500"
        href="{{route('filter-products-by-price',['category_id' => 0,'price_filter'=> 'desc'])}}">
        <p class="mt-0.5">
            <i class="fa-regular fa-money-bill-1 mr-2"></i>
            Giá cao đến thấp
            <i class="fa-solid fa-arrow-down ml-2"></i>
        </p>
        </a>
    </div>
    @endif
    </div>


    {{--  --}}
    <div id="product-container" class=" mt-10 mx-20 ">
        <div class="p-4 text-center text-32 uppercase font-bold">
            TẤT CẢ SẢN PHẨM
        </div>
        @if($categoryId == 1)

        @foreach($data as $value)

        <div id="dragon-fish" class="product dragon-fish border md:w-1/5 float-left border-gray-100 relative overflow-hidden group">

            <a class="block img h-auto w-full my-5 px-0.5">
                <img class=" h-48 w-full " src="{{$value->fish_link_img}}" alt="">
            </a>
                {{-- button --}}
            <div class="absolute w-full flex -translate-y-10 opacity-0 group-hover:opacity-100 items-center justify-center transition-all ">

                <a href="/products_detail/{{$value->fish_id}}" class="px-5 py-2 mx-0.5 w-full bg-blue-500 text-white rounded-md font-semibold text-center">
                    <i class="fa-solid fa-link text-14 " ></i>
                    Tùy chọn
                </a>
            </div>
            <div class="item-content my-4 mx-2">
                <div class="font-semibold text-sm my-2 mt-6">
                    <a class="hover:text-red-500" href="/products_detail/{{$value->fish_id}}">{{$value->fish_name}}</a>
                </div>
                <div class="price flex">
                    <span class="text-red-600 text-16 font-semibold">{{number_format($value->has_price,0,',','.')}}đ</span>
                </div>
            </div>
        </div>
        @endforeach
        @else
    {{--  --}}
        @foreach($data as $value)
        <div id="dragon-fish" class="product dragon-fish border md:w-1/5 float-left border-gray-100 relative overflow-hidden group">

            <a class="block img h-auto w-full my-5 px-0.5">
                <img class=" h-48 w-full " src="{{$value->accessories_link_img}}" alt="">
            </a>
                {{-- button --}}
            <div class="absolute w-full flex -translate-y-10 opacity-0 group-hover:opacity-100 items-center justify-center transition-all ">

                <a href="/products_detail/{{$value->accessories_id}}" id="btnProductDetail" class="px-5 py-2 mx-0.5 w-full bg-blue-500 text-white rounded-md font-semibold text-center">
                    <i class="fa-solid fa-link text-14 " ></i>
                    Tùy chọn
                </a>
            </div>
            <div class="item-content my-4 mx-2">
                <div class="font-semibold text-sm my-2 mt-6">
                    <a class="hover:text-red-500" href="/products_detail/{{$value->accessories_id}}">{{$value->accessories_name}}</a>
                </div>
                <div class="price flex">
                    <span class="text-red-600 text-16 font-semibold">{{number_format($value->accessories_price,0,',','.')}}đ</span>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        <div class="clear-left"></div>
    </div>
    {{-- paging --}}
    <div class="flex justify-center mx-4 mt-10 py-6 border-t">
        {{-- <span class="text-slate-700 text-14 font-light">1 - 5 of {{ $data->lastPage() }} entries</span> --}}
        <div class="bg-white rounded-full">
          <ol class="pagination flex text-black ">
            <li class="pagination_li hover:bg-slate-200 rounded-full">
              <a
                   href="{{ $data->previousPageUrl() }}"
                class="flex items-center h-8 px-3 rounded-full text-center"
              >
                <i class="fa-solid fa-angle-left text-24"></i>
              </a>
            </li>
             @for ($i = 1; $i <= $data->lastPage(); $i++)
              <li
                class="pagination_li rounded-full
                 {{ $data->currentPage() == $i ? 'bg-blue-500 hover:bg-blue-700 text-white' : 'hover:bg-slate-200'}}
                "
              >
                <a
                   href="{{ $data->url($i) }}"
                  class="flex items-center h-8 px-3 rounded-full text-center text-20"
                >
                   {{ $i }}
                </a>
              </li>
             @endfor

            <li class="pagination_li hover:bg-slate-200 rounded-full">
              <a
                   href="{{ $data->nextPageUrl() }}"
                class="flex items-center h-8 px-3 rounded-full text-center"
              >
                <i class="fa-solid fa-angle-right text-24"></i>
              </a>
            </li>
          </ol>
        </div>
      </div>
</section>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection




