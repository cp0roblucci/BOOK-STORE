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

        <!-- logged -->
        @if(Auth::check())
            <div class="leading-[80px]">
                <a href="/profile" class="hover:text-slate-400">
                    <i class="fa-solid fa-user text-slate-500"></i>
                    <span class=" ml-2">{{ Auth::user()->last_name . ' ' . Auth::user()->first_name }}</span>
                    <label for="" class="border mx-2 border-white"></label>
                </a>
                <form action="{{ route('logout') }}" method="post" class="inline-block">
                    @csrf
                    <button type="submit" class="hover:text-slate-400">
                        Log Out
                    </button>
                </form>
            </div>
        @else
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
        @endif

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
    <div class="content mx-20 h-auto rounded-lg">
        <div class="flex flex-row h-auto">
            <div class="sidebar basis-3/12 bg-slate-50 h-auto uppercase text-20 shadow-lg rounded-lg font-popins">
                <div class="bars flex pl-1 leading-10">
                    <i class="fa-solid fa-bars mt-2.5 text-24"></i>
                    <h1 class="ml-2 mt-1 text-blue-400">Danh muc san pham</h1>
                </div>
                <ul class="">
                    <li class="relative group  leading-70">
                        <a href="#" class="block pl-8 my-2 relative group-hover:after:block after:hidden after:absolute after:bottom-0 after:left-8 after:w-0 after:animate-line">Ca Rong</a>
                    </li>
                    <li class="relative group leading-70">
                        <a href="#" class="block pl-8 my-2 relative group-hover:after:block after:hidden after:absolute after:bottom-0 after:left-8 after:w-0 after:animate-line">Ca Phuong Hoang</a>
                    </li>
                    <li class="relative group leading-70">
                        <a href="#" class="block pl-8 my-2 relative group-hover:after:block after:hidden after:absolute after:bottom-0 after:left-8 after:w-0 after:animate-line">Ca Betta</a>
                    </li>
                    <li class="relative group leading-70">
                        <a href="#" class="block pl-8 my-2 relative group-hover:after:block after:hidden after:absolute after:bottom-0 after:left-8 after:w-0 after:animate-line">Ca Bay Mau</a>
                    </li>
                    <li class="relative group leading-70">
                        <a href="#" class="block pl-8 my-2 relative group-hover:after:block after:hidden after:absolute after:bottom-0 after:left-8 after:w-0 after:animate-line">Ca Vang</a>
                    </li>
                    <li class="relative group leading-70">
                        <a href="#" class="block pl-8 my-2 relative group-hover:after:block after:hidden after:absolute after:bottom-0 after:left-8 after:w-0 after:animate-line">Thuc An</a>
                    </li>
                    <li class="relative group leading-70">
                        <a href="#" class="block pl-8 my-2 relative group-hover:after:block after:hidden after:absolute after:bottom-0 after:left-8 after:w-0 after:animate-line">Phu Kien</a>
                    </li>
                </ul>
            </div>
            <div class="banner ml-2 basis-9/12  w-auto bg-black h-125 relative rounded-lg">
                <div class="w-full h-full img-bg-box-banner">
                    <img class="bg-img h-98p w-98p blur-10" src="/images/product1.jpg" alt="">
                </div>
                <div class="content-img-box absolute top-1/2 right-1/4 translate-x-1/2 -translate-y-1/2 w-1/3 h-64">
                    <img class=" content-img w-full h-full"  src="/images/product1-nobg.png" alt="">
                </div>
                <div class="content-banner absolute w-1/3 top-1/2 left-1/4 -translate-y-1/2 -translate-x-1/2  text-aliceblue ">
                    <h1 class="fish-name uppercase font-bold text-48 mb-4 ">Cyan Red</h1>
                    <h2 class="subname uppercase text-26 mb-2">HAFMOON BETTA FISH</h2>
                    <p class="des">Bettas are a member of the gourami family and are know to be highly territorial.</p>
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
        <div class="product h-auto my-2 bg-slate-50 rounded-lg shadow-lg">
            <div class=""><h1 class="text-26 ml-2 mb-5 text-blue-400 border-b-2 before:border-r-4 before:border-blue-400 before:mr-2">Cac Loai Ca</h1></div>
            <div class="product-container grid grid-cols-5 gap-2 mx-2">
                <div class="product-item w-full rounded-2xl border-black hover:shadow-2xl relative">
                    <a class="block img h-auto w-full my-5" href="#">
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
                <div class="product-item w-full rounded-2xl border-black hover:shadow-2xl relative">
                    <a class="block img h-auto w-full my-5" href="#">
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
                <div class="product-item w-full rounded-2xl border-black hover:shadow-2xl relative">
                    <a class="block img h-auto w-full my-5" href="#">
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
                <div class="product-item w-full rounded-2xl border-black hover:shadow-2xl relative">
                    <a class="block img h-auto w-full my-5" href="#">
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
                <div class="product-item w-full rounded-2xl border-black hover:shadow-2xl relative">
                    <a class="block img h-auto w-full my-5" href="#">
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
                </div>
            </div>

        </div>
        <div class="feedback h-125 shadow-lg bg-slate-50 rounded-lg">
            <div class="container-feedback grid grid-cols-3 gap-10 h-115 mx-10">
                <div class="feedback h-auto col-span-1 relative">
                    <div class="content-feedback w-full h-2/3 absolute top-1/3  bg-slate-400 rounded-t-3xl ">
                        <img class="img-user h-28 rounded-full absolute left-1/2 top-0 -translate-y-2/3 -translate-x-1/2" src="/images/user1.png" alt="">
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
                </div>
            </div>
        </div>
    </div>
    <div class="footer auto bg-yellow-300">
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
    <script >
        // var myIndex = 0;
        // slideshow();
        // function slideshow() {
        //     var i;
        //     var x = document.getElementsByClassName("slideshow");
        //     for (i = 0; i < x.length; i++) {
        //         x[i].style.display = "none";
        //     }
        //     myIndex++;
        //     if (myIndex > x.length) {myIndex = 1}
        //     x[myIndex-1].style.display = "block";
        //     setTimeout(slideshow, 2000);
        // }
    </script>
</body>
</html>

