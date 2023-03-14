<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chi Tiết Sản Phẩm</title>
    @vite('./resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
{{-- container products_details --}}
<body class="bg-slate-200">
   
    {{--  --}}
    <div class="header flex justify-between mx-20 px-4 h-20">
        <div class="logo h-auto py-1 col-span-1 relative text-center">
            <a href="/">
                <img class="w-12 h-12 m-auto" src="{{ URL::to('/images/logo.png')}}" alt="">
            </a>
            <h1 class=""><a class="hover:text-red-500 font-bold" href="#">BETTA3TL.<span class="font-normal">COM</span></a></h1>
        </div>
        <div class="flex leading-[80px] text-20">
              <div class="px-4">
                <a href="/" class="px-8 py-4 border-b-2 border-slate-300 rounded-xl hover:text-blue-500 hover:bg-gray-100">Trang chu</a>
              </div>
              <div class="px-4">
                <a href="/product" class="px-8 py-4 border-b-2 border-slate-300 rounded-xl hover:text-blue-500 hover:bg-gray-100">San Pham</a>
              </div>
              <div class="px-4">
                <a href="/product" class="px-8 py-4 border-b-2 border-slate-300 rounded-xl hover:text-blue-500 hover:bg-gray-100">Lien He</a>
              </div>
    </div>
  
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
        <div class="cart leading-[80px] pr-10">
          <a href="">
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
    {{--  --}}
    <section class="px-20 py-4 bg-white">
        <div class="bg-white">
            <div class="flex ">
                <div class="flex flex-col w-1/2">
                    <img src="/images/img_products/pd1.jpg" alt=""
                    class="py-6 px-10">
                    <div class="flex space-x-4 ml-12">
                        <div class="w-24 h-24 border-2 hover:border-blue-400">
                            <img src="images/img_products/pd1.jpg" alt=""
                            class="h-full px-2 py-2">
                        </div>
                        <div class="w-24 h-24 border-2 hover:border-blue-400">
                            <img src="images/img_products/pd1.jpg" alt=""
                            class="h-full px-2 py-2">
                        </div>
                        <div class="w-24 h-24 border-2 hover:border-blue-400">
                            <img src="images/img_products/pd1.jpg" alt=""
                            class="h-full px-2 py-2">
                        </div>
                        <div class="w-24 h-24 border-2 hover:border-blue-400">
                            <img src="images/img_products/pd1.jpg" alt=""
                            class="h-full px-2 py-2">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-1/2 mr-16  mt-4">
                    <div class="">
                        <h2 class="text-24 font-semibold mb-2">Cá Siêu Saiyan SJJ 1 - Super Pro VJP</h2>
                        <div class="flex text-sm font-semibold">
                            <p class="mr-2">SKU: </p> 
                            <span class="text-red-500">TT1101</span>
                            <p class="mx-4">|</p>
                            <p class="mr-2">Thương Hiệu:</p>
                            <span class="text-red-500">3TL</span>     
                        </div>
                    </div>
                    <div class="price flex mt-6">
                        <span class="text-red-500 mr-2 font-bold text-20">Giá:</span>
                        <span class="text-red-500 text-20 font-bold">50000đ</span>
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
                                    <p class="text-sm font-normal">6</p>
                                </li>
                                <li class="flex mt-4">
                                    <p class="text-gray-700 text-sm font-bold mr-1">Nhiệt độ:</p>
                                    <p class="text-sm font-normal">24oC</p>
                                </li>
                                <li class="flex mt-4">
                                    <p class="text-gray-700 text-sm font-bold mr-1">Thức ăn:</p>
                                    <p class="text-sm font-normal">cám,trùn chỉ,bobo,...</p>
                                </li>
                                <li class="flex mt-4">
                                    <p class="text-gray-700 text-sm font-bold mr-1">Tập tính:</p>
                                    <p class="text-sm font-normal">Đánh lẻ, solo Q</p>
                                </li>
                                <li class="flex mt-4">
                                    <p class="text-gray-700 text-sm font-bold mr-1">Kích thước:</p>
                                    <p class="text-sm font-normal">24cm</p>
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
    {{--  --}}
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

</body>

<script>
    count = 0;
    function countAdd(){
        count++;
        document.getElementById("count").innerHTML = count;
    }

    function countMinus(){
        count--;
        document.getElementById("count").innerHTML = count;
    }
// 
</script>
</html>
