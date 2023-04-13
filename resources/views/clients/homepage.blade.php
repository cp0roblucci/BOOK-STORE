@extends('layouts.main')


@section('header')
    @include('layouts.header')
@endsection

@section('body')
<div class="content mx-20 h-auto rounded-lg">
    <div class="banner-container h-auto">
        <div class="banner w-auto bg-black h-125 relative rounded-lg">
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
    <div class="product h-auto my-2 bg-gradient-to-r //from-cyan-600 to-cyan-300 rounded-lg shadow-lg">
        <div class="py-2"><h1 class="text-20 ml-2 mb-5 text-slate-300 border-b-2 before:border-r-4 before:border-slate-300 before:mr-2">San Pham Noi Bat</h1></div>
        <div class="product-container grid grid-cols-5 gap-2 mx-2 py-4">
            {{-- @for($i = 0; $i <10 ; $i++) --}}
            @foreach ($fishselling as $fish)
            <div class="product-item w-full rounded-2xl border-black hover:shadow-2xl relative bg-aliceblue group">
                <a class="img h-auto w-full my-5" href="/products_detail">
                    <img class="w-full h-56  rounded-t-2xl" src="{{$fish->fish_link_img}}" alt="">
                </a>
                <div class="item-content py-4 relative">
                    <div class="detail w-full h-10 absolute top-0 -translate-y-1/2 bg-blue-300 rounded-md group-hover:flex justify-center items-center hidden">
                        <a href="/products_detail">
                            <i class="fa-solid fa-link mr-3"></i>
                            <span>Chi tiết</span>
                        </a>
                    </div>
                    {{-- <div class="rate ">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-sharp fa-solid fa-bag-shopping ml-4 text-orange-500"><span class="text-12 ml-1">99</span></i>
                    <i class="fa-solid fa-eye ml-5 text-blue-400"><span class="text-12 ml-1">999</span></i>
                    </div> --}}
                   <div class="mx-2">
                        <div class="discription my-4"><a class=" hover:text-red-500" href="/products_detail">{{$fish->fish_name}}</a></div>
                        <div class="price flex">
                            <span class="text-red-400">{{$fish->HAS_PRICE}}</span>
                            {{-- <span class="block ml-2 mt-0.5 opacity-70 line-through text-14">60000d</span> --}}
                        </div>
                   </div>
                </div>
            </div>
            @endforeach
            {{-- @endfor --}}
            {{-- <div class="product-item w-full rounded-2xl border-black hover:shadow-2xl relative bg-aliceblue">
                <a class="img h-auto w-full my-5" href="#">
                    <img class="w-full h-56  rounded-t-2xl" src="/images/do-trang.png" alt="">
                </a>
                <div class="item-content my-4 mx-2">
                    <div class="rate ">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-sharp fa-solid fa-bag-shopping ml-4 text-orange-500"><span class="text-12 ml-1">99</span></i>
                    <i class="fa-solid fa-eye ml-5 text-blue-400"><span class="text-12 ml-1">999</span></i>
                    </div>
                    <div class="discription my-4"><a class=" hover:text-red-500" href="#">Name</a></div>
                    <div class="price flex">
                        <span class="text-red-400">50000d</span>
                        <span class="block ml-2 mt-0.5 opacity-70 line-through text-14">60000d</span>
                    </div>
                </div>
            </div>
            <div class="product-item w-full rounded-2xl border-black hover:shadow-2xl relative bg-aliceblue">
                <a class="img h-auto w-full my-5" href="#">
                    <img class="w-full h-56  rounded-t-2xl" src="/images/do-trang2.png" alt="">
                </a>
                <div class="item-content my-4 mx-2">
                    <div class="rate ">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-sharp fa-solid fa-bag-shopping ml-4 text-orange-500"><span class="text-12 ml-1">99</span></i>
                    <i class="fa-solid fa-eye ml-5 text-blue-400"><span class="text-12 ml-1">999</span></i>
                    </div>
                    <div class="discription my-4"><a class=" hover:text-red-500" href="#">Name</a></div>
                    <div class="price flex">
                        <span class="text-red-400">50000d</span>
                        <span class="block ml-2 mt-0.5 opacity-70 line-through text-14">60000d</span>
                    </div>
                </div>
            </div>
            <div class="product-item w-full rounded-2xl border-black hover:shadow-2xl relative bg-aliceblue">
                <a class="img h-auto w-full my-5" href="#">
                    <img class="w-full h-56  rounded-t-2xl" src="/images/xanh-trang.png" alt="">
                </a>
                <div class="item-content my-4 mx-2">
                    <div class="rate ">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-sharp fa-solid fa-bag-shopping ml-4 text-orange-500"><span class="text-12 ml-1">99</span></i>
                    <i class="fa-solid fa-eye ml-5 text-blue-400"><span class="text-12 ml-1">999</span></i>
                    </div>
                    <div class="discription my-4"><a class=" hover:text-red-500" href="#">Name</a></div>
                    <div class="price flex">
                        <span class="text-red-400">50000d</span>
                        <span class="block ml-2 mt-0.5 opacity-70 line-through text-14">60000d</span>
                    </div>
                </div>
            </div>
            <div class="product-item w-full rounded-2xl border-black hover:shadow-2xl relative bg-aliceblue">
                <a class="img h-auto w-full my-5" href="#">
                    <img class="w-full h-56  rounded-t-2xl" src="/images/xanhdam-trang.png" alt="">
                </a>
                <div class="item-content my-4 mx-2">
                    <div class="rate ">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-sharp fa-solid fa-bag-shopping ml-4 text-orange-500"><span class="text-12 ml-1">99</span></i>
                    <i class="fa-solid fa-eye ml-5 text-blue-400"><span class="text-12 ml-1">999</span></i>
                    </div>
                    <div class="discription my-4"><a class=" hover:text-red-500" href="#">Name</a></div>
                    <div class="price flex">
                        <span class="text-red-400">50000d</span>
                        <span class="block ml-2 mt-0.5 opacity-70 line-through text-14">60000d</span>
                    </div>
                </div>
            </div>
            <div class="product-item w-full rounded-2xl border-black hover:shadow-2xl relative bg-aliceblue">
                <a class="img h-auto w-full my-5" href="#">
                    <img class="w-full h-56  rounded-t-2xl" src="/images/vang.png" alt="">
                </a>
                <div class="item-content my-4 mx-2">
                    <div class="rate ">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <i class="fa-sharp fa-solid fa-bag-shopping ml-4 text-orange-500"><span class="text-12 ml-1">99</span></i>
                    <i class="fa-solid fa-eye ml-5 text-blue-400"><span class="text-12 ml-1">999</span></i>
                    </div>
                    <div class="discription my-4"><a class=" hover:text-red-500" href="#">Name</a></div>
                    <div class="price flex">
                        <span class="text-red-400">50000d</span>
                        <span class="block ml-2 mt-0.5 opacity-70 line-through text-14">60000d</span>
                    </div>
                </div>
            </div> --}}
        </div>

    </div>
    {{-- <div class="feedback h-125 shadow-lg bg-slate-50 rounded-lg">
        <div class="container-feedback grid grid-cols-3 gap-10 h-115 mx-10">
            @for($i = 0; $i <3 ; $i++)
            <div class="feedback h-auto col-span-1 relative">
                <div class="content-feedback w-full h-2/3 absolute top-1/3  bg-slate-400 rounded-t-3xl ">
                    <img class="img-user h-28 rounded-full absolute left-1/2 top-0 -translate-y-2/3 -translate-x-1/2" src="/storage/images/user1.png" alt="">
                    <div class="content text-center absolute top-1/3 left-1/2 -translate-x-1/2">
                        <i class="fa-solid fa-quote-left absolute -top-3 -left-5"></i>
                        <p>San pham rat ok</p>
                        <i class="fa-solid fa-quote-right absolute -bottom-3 -right-5 "></i>
                    </div>
                    <div class="name-user text-center absolute bottom-5 uppercase left-1/2 -translate-x-1/2">
                        <span>Le Hung</span>
                    </div>
                </div>
            </div>
            @endfor --}}
            {{-- <div class="feedback h-auto col-span-1 relative">
                <div class="content-feedback w-full h-2/3 absolute top-1/3  bg-slate-400 rounded-t-3xl ">
                    <img class="img-user h-28 rounded-full absolute left-1/2 top-0 -translate-y-2/3 -translate-x-1/2" src="/images/user2.png" alt="">
                    <div class="content text-center absolute top-1/3 left-1/2 -translate-x-1/2">
                        <i class="fa-solid fa-quote-left absolute -top-3 -left-5"></i>
                        <p>San pham rat ok</p>
                        <i class="fa-solid fa-quote-right absolute -bottom-3 -right-5 "></i>
                    </div>
                    <div class="name-user text-center absolute bottom-5 uppercase left-1/2 -translate-x-1/2">
                        <span>Le Hung</span>
                    </div>
                </div>
            </div>
            <div class="feedback h-auto col-span-1 relative">
                <div class="content-feedback w-full h-2/3 absolute top-1/3  bg-slate-400 rounded-t-3xl ">
                    <img class="img-user h-28 rounded-full absolute left-1/2 top-0 -translate-y-2/3 -translate-x-1/2" src="/images/user3.png" alt="">
                    <div class="content text-center absolute top-1/3 left-1/2 -translate-x-1/2">
                        <i class="fa-solid fa-quote-left absolute -top-3 -left-5"></i>
                        <p>San pham rat ok</p>
                        <i class="fa-solid fa-quote-right absolute -bottom-3 -right-5 "></i>
                    </div>
                    <div class="name-user text-center absolute bottom-5 uppercase left-1/2 -translate-x-1/2">
                        <span>Le Hung</span>
                    </div>
                </div>
            </div> --}}
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

