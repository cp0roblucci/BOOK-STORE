<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Sản Phẩm</title>
    @vite(['./resources/css/app.css', './resources/js/products.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
{{-- container header --}}
<body class="bg-slate-200">
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
{{-- container products --}}
<section class="py-5  bg-white">
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
        <div id="dragon-fish" class="product dragon-fish border md:w-1/5 float-left border-gray-100 relative overflow-hidden group ">

            <a class="block img h-auto w-full my-5 px-0.5" href="#">
                <img class=" h-48 w-full " src="/images/img_products/dragon_fish/dragon_fish_1.jpg" alt="">
            </a>
                {{-- button --}}
            <div class="absolute w-full flex -translate-y-10 opacity-0 group-hover:opacity-100 items-center justify-center transition-all ">

                <button id="btnProductDetail" class="px-5 py-2 mx-0.5 w-full bg-blue-500 text-white rounded-md font-semibold">
                    <i class="fa-solid fa-link text-14"></i>
                    Tùy chọn
                </button>
            </div>
            <div class="item-content my-4 mx-2">
                <div class="font-semibold text-sm my-2 mt-6">
                    <a class="hover:text-red-500" href="#">Cá Siêu Saiyan SSJ 1</a>
                </div>
                <div class="price flex">
                    <span class="text-red-500 text-16 font-bold">50000đ</span>
                    <span class="block ml-2 mt-0.5 opacity-70 line-through text-sm">60000d</span>
                </div>
            </div>
        </div>

        <div
          id="phoenix-fish"
          class="product phoenix-fish border w-1/5 float-left border-gray-100 relative overflow-hidden group">
            <a class="block img h-auto w-full my-5 px-0.5" href="#">
                <img class=" h-48 w-full" src="/images/img_products/dragon_fish/dragon_fish_2.jpg" alt="">
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
{{-- container footer --}}
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
		// Lấy all btn
		const categoryBtns = document.querySelectorAll('.category-btn');

		// Lấy ctn-pd
		const productContainer = document.getElementById('product-container');
		// Lặp qua từng button & create event
		categoryBtns.forEach(function(btn) {
			btn.addEventListener('click', function() {
				// Lấy id của button
				const categoryId = this.id;
				productContainer.querySelectorAll('.product').forEach(function(product) {
					if (categoryId === 'all-products-btn' || product.classList.contains(categoryId)) {
						product.style.display = 'block';
					} else {
						product.style.display = 'none';
					}
				});
			});
		});
</script>

</html>

