<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('./resources/css/app.css')
</head>
<body class="bg-slate-300">
    @section('header')
    <div class="header flex justify-between items-center mx-20 text-16 h-full font-popins py-2">
        <div class="w-1/4 items-center">
            <div class="shop-img w-14">
                <a class="" href="/">
                    <img class="h-14 " src="/storage/images/logo.png" alt="">
                </a>
            </div>
            <div class="shopname">
                <a class="text-16 font-bold hover:text-slate-300" href="/" >
                    <span class="uppercase">betta3tl.
                    </span><span>com</span>
                </a>
            </div>
        </div>
        <div class="w-2/4  flex justify-center">
            <ul class="w-3/4 m-auto flex justify-between items-center flex-wrap">
                <li><a class="px-4 py-2 bg-slate-200 rounded-md shadow-md text-16 hover:bg-blue-300 hover:text-slate-200" href="/">Trang chủ</a></li>
                <li><a class="px-4 py-2 bg-slate-200 rounded-md shadow-md text-16 hover:bg-blue-300 hover:text-slate-200" href="/products">Sản phẩm</a></li>
                <li><a class="px-4 py-2 bg-slate-200 rounded-md shadow-md text-16 hover:bg-blue-300 hover:text-slate-200" href="/contact">Liên hệ</a></li>
                <li class="w-full flex justify-center items-center mt-3 relative">
                    <input class="w-1/2 border-none rounded-md h-7 px-2 py-2 text-18 bg-slate-200 placeholder-black placeholder-opacity-60 outline-none" type="text" placeholder="ca rong, ca betta">
                    <a href="" class=" absolute right-1/4 px-2 py-0.5 hover:bg-blue-300 rounded-md text-slate-500 text-16"><i class="fa-solid fa-magnifying-glass"></i></a>
                </li>
            </ul>
        </div>
        <div class="w-1/4  flex justify-center items-center">
            <div class="mr-20 hover:text-slate-300">
                <a href="/cart" class="text-20"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
            {{-- logged --}}
            <div class="text-16 flex justify-center items-center">
                <a href="#" class="flex justify-center items-center hover:text-slate-300">
                    <img src="/storage/images/user1.png" class="w-8 h-8 rounded-full mr-2" alt="">
                    <span class="">Le Thanh Hung</span>
                </a>
                <a href="" class="mx-2 hover:text-slate-500"></a>
                <button class="before:border-r-2 before:border-slate-900 before:mr-1.5 before:text-14 hover:text-slate-300">Logout</button>
            </div>
            {{-- not logged --}}
            {{-- <div>
                <a href="/login">Login</a>
            </div> --}}


        </div>
    </div>
    @endsection
</body>
</html>