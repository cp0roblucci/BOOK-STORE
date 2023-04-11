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
    <div class="header h-full flex justify-between mx-20 text-20">
        <div class="w-1/4  group">
            <a class="w-19" href="#">
                <img class="h-19 w-19" src="/images/logo.png" alt="">
            </a>
            <a class="text-16 font-bold group-hover:text-slate-300" href="#" ><span class="uppercase">betta3tl.</span><span>com</span></a>
        </div>
        <div class="w-2/4  flex justify-center">
            <ul class="w-3/4 m-auto flex justify-between items-center flex-wrap">
                <li><a class="px-4 py-2 bg-slate-300 rounded-md shadow-md hover:bg-blue-300 hover:text-slate-100" href="">Trang chủ</a></li>
                <li><a class="px-4 py-2 bg-slate-300 rounded-md shadow-md hover:bg-blue-300 hover:text-slate-100" href="">Sản phẩm</a></li>
                <li><a class="px-4 py-2 bg-slate-300 rounded-md shadow-md hover:bg-blue-300 hover:text-slate-100" href="">Liên hệ</a></li>
                <li class="w-full flex justify-center items-center mt-6 relative">
                    <input class="w-1/2 border-none rounded-md h-8 text-16 bg-slate-300 placeholder-black placeholder-opacity-60 " type="text" placeholder="ca rong, ca betta">
                    <a href="" class=" absolute right-1/4 px-2 py-0.5 hover:bg-blue-300 rounded-md text-slate-500"><i class="fa-solid fa-magnifying-glass"></i></a>
                </li>
            </ul>
        </div>
        <div class="w-1/4  flex justify-center items-center">
            <div class="mr-20">
                <a href="/cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>

            <div>
                <a href="/login">Login</a>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>