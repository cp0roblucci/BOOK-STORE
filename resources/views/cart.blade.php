<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Trang chủ</title>
    @vite(['./resources/css/app.css','./resources/js/homepage.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-slate-200">
    <!-- Header -->
    <div class="header flex justify-between mx-20 px-4 mb-2 h-20">
        <div class="logo h-auto py-1 col-span-1 relative text-center">
            <a href="/">
                <img class="w-12 h-12 m-auto" src="{{ URL::to('/images/logo.png')}}" alt="">
            </a>
            <h1 class=""><a class="hover:text-red-500 font-bold" href="#">BETTA3TL.<span class="font-normal">COM</span></a></h1>
        </div>
        <div class="flex leading-[80px] text-20">
              <div class="px-4">
                <a href="/" class="px-8 py-4 border-b-2 border-slate-300 rounded-xl hover:text-blue-500 hover:bg-gray-300">Trang chu</a>
              </div>
              <div class="px-4">
                <a href="/product" class="px-8 py-4 border-b-2 border-slate-300 rounded-xl hover:text-blue-500 hover:bg-gray-300">San Pham</a>
              </div>
              <div class="px-4">
                <a href="/product" class="px-8 py-4 border-b-2 border-slate-300 rounded-xl hover:text-blue-500 hover:bg-gray-300">Lien He</a>
              </div>
      </div>
        {{-- <div class="search w-80 ">
            <form action="" class=" h-full relative">
                <div class="w-10/12 relative h-2/5 left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2">
                    <input type="text" class="w-full h-full border outline-none focus-within:border focus-within:border-slate-500 bg-slate-300 indent-2 text-white rounded-md " placeholder="Nhap san phamm ban can tim" required>
                    <button type="submit">
                        <i class="fa-solid opacity-60 fa-magnifying-glass absolute
                        top-[30%] right-4 rounded-md"></i>
                    </button>
                </div>
            </form>
        </div> --}}
        {{-- <div class="mt-6 text-center">
            <div class="text-24 font-bold text-blue-500">01231244123</div>
            <span class="">Ho tro mua hang</span>
        </div> --}}

        <!-- not logged -->
        <div class="leading-[80px]">
            <a href="/login" class="hover:text-slate-400">
                <i class="fa-solid fa-user text-slate-500"></i>
                <span class="">Login</span>
            </a>
            <label for="" class="border mx-2 border-white"></label>
            <a href="/register" class="hover:text-slate-400">
                <span>Register</span>
            </a>
        </div> 
        <!-- logged -->
        <!-- <div class="leading-[80px]">
            <a href="/login" class="hover:text-slate-400">
                <i class="fa-solid fa-user text-slate-500"></i>
                <span class=" ml-2">Name</span>
            </a>
        </div> -->
        <div class="cart leading-[80px] pr-10">
          <a href="/cart">
            <i class="fa-solid fa-cart-shopping text-24 hover:text-slate-400 text-slate-500"></i>
          </a>
        </div>
    </div>
    <div class="w-[50%] mx-20 leading-10 mb-4 mt-2 pl-4 bg-slate-100 rounded-md border-[1.5px] focus-within:border-[1.5px] border-slate-400 focus-within:border-blue-500">
      <form action="" method="post" class="flex justify-between">
        @csrf
        <input type="text" placeholder="Search..." name="users-search" class="caret-blue-500 outline-none w-full bg-slate-100" required>
          <button type="submit" class="inline-block w-[18%] cursor-pointer top-0.5">
            <i class="fa-solid fa-magnifying-glass text-slate-500"></i>
          </button>
      </form>
    </div>
    <!-- ConTent -->
    <div class="content mx-20 h-auto rounded-lg grid grid-cols-3 gap-2">
        <div class="cart bg-slate-100 col-span-2">
            <div class="title">
                <h1>Your Cart</h1>
            </div>
            <div class="items-cart mx-2">
                <div class="item-cart my-5 grid grid-cols-10 gap-2 items-center border ">
                    <div class="check ">
                        <input class="w-5 h-5 ml-2" type="checkbox">
                    </div>
                    <div class="img-item-cart w-16 h-16 col-span-2">
                        <img class="w-full h-full" src="/images/xanhdam-trang.png" alt="">
                    </div>
                    <div class="name-product col-span-2">
                            Name
                    </div>
                    <div class="category">
                            Ca Rong
                    </div>
                    <div class="price">
                        50000
                    </div>
                    <div class="quantity-container relative ">
                        <div class="quantity w-full absolute top-1/2 -translate-y-1/2 border">
                            <i class="fa-solid fa-plus px-0.5 cursor-pointer inline-block "></i>
                            <input class="w-1/2 inline-block " type="text">
                            <i class="fa-solid fa-minus px-0.5 cursor-pointer inline-block "></i>
                        </div>
                    </div>
                    <div class="sum">
                        50000
                    </div>
                    <div class="delete">
                        <i class="fa-solid fa-trash-can"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="order bg-slate-100">

        </div>
    </div>
    <!-- Footer -->
    <div class="footer auto bg-yellow-300 w-full">
        <div class="content-footer mx-20 mt-2 /bg-red-600 h-auto grid grid-cols-12 gap-4">
            <div class="footet-item col-span-4">
                <div class="title pb-3">
                    <h1 class="uppercase font-bold text-16">Liên hệ</h1>
                </div>
                <div class="list">
                    <ul>
                        <li><a class="hover:text-blue-300" href="#">132/DD85, KV2, An Khánh, Ninh Kiều, Cần Thơ</a></li>
                        <li><a class="hover:text-blue-300" href="#">Mr. Hung: 0969999999</a></li>
                        <li><a class="hover:text-blue-300" href="#">Mr. Duy: 0699999999</a></li>
                        <li><a class="hover:text-blue-300" href="#">Mr. Truong: 0789999999</a></li>
                        <li><a class="hover:text-blue-300" href="#">Office: 024 382 43210</a></li>
                    </ul>
                </div>
            </div>
            <div class="footet-item col-span-2">
                <div class="title pb-3">
                    <h1 class="uppercase font-bold text-16">thông tin</h1>
                </div>
                <div class="list">
                    <ul>
                        <li><a class="hover:text-blue-300" href="#">Trang chủ</a></li>
                        <li><a class="hover:text-blue-300" href="#">Giới thiệu</a></li>
                        <li><a class="hover:text-blue-300" href="#">Sản phẩm</a></li>
                        <li><a class="hover:text-blue-300" href="#">Liên hệ cung ứng</a></li>
                        <li><a class="hover:text-blue-300" href="#"></a></li>
                    </ul>
                </div>
            </div>
            <div class="footet-item col-span-3">
                <div class="title pb-3">
                    <h1 class="uppercase font-bold text-16 ">Hỗ trợ khách hàng</h1>
                </div>
                <div class="list">
                    <ul>
                        <li><a class="hover:text-blue-300" href="#">Hướng dẫn mua hàng</a></li>
                        <li><a class="hover:text-blue-300" href="#">Hướng dẫn thanh toán</a></li>
                        <li><a class="hover:text-blue-300" href="#">Chính sách vận chuyển</a></li>
                        <li><a class="hover:text-blue-300" href="#">Thành tích hoạt động</a></li>
                        <li><a class="hover:text-blue-300" href="#"></a></li>
                    </ul>
                </div>
            </div>
            <div class="footet-item col-span-3">
                <div class="title pb-3">
                    <h1 class="uppercase font-bold text-16">Fan page</h1>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

