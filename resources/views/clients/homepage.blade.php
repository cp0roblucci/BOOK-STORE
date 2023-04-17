@extends('layouts.main')


@section('header')
    @include('layouts.header')
@endsection

@section('body')
<div class="content mx-20 h-auto rounded-lg">
    <div class="banner-container h-auto pt-7">
        <div class="banner w-auto bg-black h-banner relative rounded-lg">
            <div class="w-full h-full img-bg-box-banner">
                <img class="bg-img h-98p w-98p blur" src="/storage/images/product1.jpg" alt="">
            </div>
            <div class="content-img-box absolute top-1/2 right-1/4 translate-x-1/2 -translate-y-1/2 w-1/3 h-64">
                <img class=" content-img w-full h-full"  src="/storage/images/product1-nobg.png" alt="">
            </div>
            <div class="content-banner absolute w-1/3 top-1/2 left-1/4 -translate-y-1/2 -translate-x-1/2  text-aliceblue ">
                <h1 class="fish-name uppercase font-bold text-48 mb-4 ">Cyan Red</h1>
                <h2 class="subname uppercase text-26 mb-2">HAFMOON BETTA FISH</h2>
                <p class="des">Bettas are a member of the gourami family and are know to be highly territorial.</p>
                <button class="mt-4"><a class="px-4 py-2 bg-none text-aliceblue border rounded-lg hover:bg-blue-300" href="/products_detail">Mua Ngay</a></button>
            </div>
            <div class="btn-pre text-slate-300 text-36 p-4 absolute top-1/2 -translate-y-1/2">
                <button ><i class="fa-solid fa-angle-left"></i></button>
            </div>
            <div class="btn-next text-slate-300 text-36 p-4 absolute top-1/2 -translate-y-1/2 right-0">
                <button ><i class="fa-solid fa-angle-right"></i></button>
            </div>
            <div class="dot text-slate-500 text-36  absolute left-1/2 -translate-x-1/2 bottom-0">
                <i class="fa-solid fa-minus scroll cursor-pointer text-slate-300 "></i>
                <i class="fa-solid fa-minus scroll cursor-pointer "></i>
                <i class="fa-solid fa-minus scroll cursor-pointer "></i>
            </div>
        </div>
    </div>
    <div class="product h-auto mt-12 mb-2 bg-slate-200  rounded-lg shadow-lg">
        <div class="py-2"><h1 class="text-20 ml-2 mb-5 text-slate-700 border-b-2 border-slate-700 before:border-r-4 before:border-slate-700 before:mr-2">San Pham Noi Bat</h1></div>
            <div class="product-container grid grid-cols-5 gap-2 mx-2 py-4">
            @foreach ($fishselling as $fish)
                <div class="product-item w-full rounded-2xl border-black hover:shadow-2xl relative bg-aliceblue group">
                    <a class="img h-auto w-full my-5" href="/products_detail/{{$fish->fish_id}}">
                        <img class="w-full h-56  rounded-t-2xl" src="{{$fish->fish_link_img}}" alt="">
                    </a>
                    <div class="item-content py-4 relative">
                        <div class="detail w-full absolute top-0 -translate-y-1/2 group-hover:flex justify-center items-center hidden">
                            <a href="/products_detail/{{$fish->fish_id}}" class="w-full h-10 bg-blue-300 rounded-md flex justify-center items-center ">
                                <i class="fa-solid fa-link mr-3"></i>
                                <span>Chi tiết</span>
                            </a>
                        </div>
                        <div class="mx-2">
                            <div class="">
                                <span class="text-14">Tập Tính: {{$fish->fish_habit}}</span>
                            </div>
                            <div class="discription mb-4 mt-2">
                                <a class=" hover:text-red-500" href="/products_detail/{{$fish->fish_id}}">{{$fish->fish_name}}</a>
                            </div>
                            <div class="price flex">
                                <span class="text-red-400">{{$fish->HAS_PRICE}}d</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @foreach ($accessories as $access)
                <div class="product-item w-full rounded-2xl border-black hover:shadow-2xl relative bg-aliceblue group">
                    <a class="img h-auto w-full my-5" href="/products_detail/{{$access->accessories_id}}">
                        <img class="w-full h-56  rounded-t-2xl" src="{{$access->accessories_link_img}}" alt="">
                    </a>
                    <div class="item-content py-4 relative">
                        <div class="detail w-full absolute top-0 -translate-y-1/2 group-hover:flex justify-center items-center hidden">
                            <a href="/products_detail/{{$access->accessories_id}}" class="w-full h-10 bg-blue-300 rounded-md flex justify-center items-center ">
                                <i class="fa-solid fa-link mr-3"></i>
                                <span>Chi tiết</span>
                            </a>
                        </div>
                        <div class="mx-2">
                            <div class="">
                                <span class="text-14">Loại: {{$access->accessories_type_name}}</span>
                            </div>
                            <div class="discription mb-4 mt-2">
                                <a class=" hover:text-red-500" href="/products_detail/{{$access->accessories_id}}">{{$access->accessories_name}}</a>
                            </div>
                            <div class="price flex">
                                <span class="text-red-400">{{$access->accessories_price}}d</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

{{-- Scripts --}}
@section('scripts')
    @vite('./resources/js/homepage.js')
@endsection

