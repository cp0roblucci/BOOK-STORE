<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    @vite('./resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-slate-200">
    <div class="header mx-20 my-2 h-32 grid grid-cols-6 gap-2 ">
        <div class="logo h-auto col-span-1 relative text-center">
            <img class="h-28 m-auto" src="/images/logo.png" alt="">
            <h1 class=""><a class="hover:text-red-500 font-bold" href="#">BETTA3TL.<span class="font-normal">COM</span></a></h1>
        </div>
        <div class="search col-span-2">
            <form action="" class=" h-full relative">
                <div class="w-10/12 relative h-2/5 left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2">
                    <input type="text" class="w-full h-full  bg-slate-300 indent-2 text-white rounded-md " placeholder="Nhap san phamm ban can tim">
                    <button><i class="fa-solid fa-magnifying-glass absolute top-0 right-0 p-4.5 rounded-md  hover:bg-blue-300"><input type="submit" value=""></i></button>
                </div>
            </form>
        </div>
        <div class="inf col-span-3 text-center relative m-auto">
            <ul class="grid grid-cols-3 gap-2 text-36">
                <li><a class="font-bold text-blue-400 " href="#">0797973939 <span class="block font-normal text-16 text-black ">Ho tro mua hang</span></a></li>
                <li>
                    <a class="inline-block" href="#"><i class="fa-solid fa-user text-slate-500"></i></a>
                    <ul class="inline-block text-14">
                        <li><a class="hover:text-red-500" href="/signin">Đăng nhập</a></li>
                        <li><a class="hover:text-red-500" href="/signup">Đăng ký</a></li>
                    </ul>
                </li>
                <li><a class="" href="#"><i class="fa-solid fa-cart-shopping text-slate-500"></i></a></li>
            </ul>
        </div>

    </div>
    <div class="nav mb-2 h-12 mx-20 text-center bg-slate-50 rounded-lg">
        <div class="sub-nav ">    
            <ul class="grid grid-cols-4 text-black">
                <li class=""><a class="block hover:border hover:text-white hover:bg-blue-200 py-3 bg-slate-50 h-full w-full rounded-lg" href=""> Trang chu</a></li>
                <li class=""><a class="block hover:border hover:text-white hover:bg-blue-200 py-3 bg-slate-50 h-full w-full rounded-lg" href="/product"> San Pham</a></li>
                <li class=""><a class="block hover:border hover:text-white hover:bg-blue-200 py-3 bg-slate-50 h-full w-full rounded-lg" href=""> Ky Thuat nuoi</a></li>
                <li class=""><a class="block hover:border hover:text-white hover:bg-blue-200 py-3 bg-slate-50 h-full w-full rounded-lg" href=""> Tin tuc</a></li>
            </ul>
        </div>
        <!-- <div class="search basis-4/12 w-auto">
            <form action="" class=" h-full">
                <div class="w-11/12 relative h-full">
                    <input type="text" class="w-full h-3/5 absolute bottom-0.5 left-0 bg-slate-300 indent-2 text-white " placeholder="Nhap san phamm ban can tim">
                    <button><i class="fa-solid fa-magnifying-glass absolute right-0 top-5 hover:bg-blue-300 p-2"><input type="submit" value=""></i></button>
                </div>
            </form>
        </div>-->
    </div> 
    <div class="content mx-20 h-auto  bg-slate-200 rounded-lg">
        <div class="flex flex-row h-auto bg-slate-50 rounded-lg shadow-lg">
            <div class="sidebar basis-3/12  h-auto uppercase text-20 ml-2">
                <div class="bars flex pl-1">
                <i class="fa-solid fa-bars mt-1 text-24"></i>
                <h1 class="pl-2 text-blue-400">Danh muc san pham</h1>
                </div>
                <ul class="">
                    <li class="relative group">
                        <a href="#" class="pl-8 my-2 block border-b-2">Ca Rong</a>
                        <div class="hidden group-hover:block line absolute bottom-0 left-0 h-1 w-full bg-red-300"></div>
                    </li>
                    <li class="relative group">
                        <a href="#" class="pl-8 my-2 block border-b-2">Ca Phuong Hoang</a>
                        <div class="hidden group-hover:block line absolute bottom-0 left-0 h-1 w-full bg-red-300">
                    </li>
                    <li class="relative group">
                        <a href="#" class="pl-8 my-2 block border-b-2">Ca Betta</a>
                        <div class="hidden group-hover:block line absolute bottom-0 left-0 h-1 w-full bg-red-300">
                    </li>
                    <li class="relative group">
                        <a href="#" class="pl-8 my-2 block border-b-2">Ca Bay Mau</a>
                        <div class="hidden group-hover:block line absolute bottom-0 left-0 h-1 w-full bg-red-300">
                    </li>
                    <li class="relative group">
                        <a href="#" class="pl-8 my-2 block border-b-2">Ca Vang</a>
                        <div class="hidden group-hover:block line absolute bottom-0 left-0 h-1 w-full bg-red-300">
                    </li>
                    <li class="relative group">
                        <a href="#" class="pl-8 my-2 block border-b-2">Thuc An</a>
                        <div class="hidden group-hover:block line absolute bottom-0 left-0 h-1 w-full bg-red-300">
                    </li>
                    <li class="relative group">
                        <a href="#" class="pl-8 my-2 block border-b-2">Phu Kien</a>
                        <div class="hidden group-hover:block line absolute bottom-0 left-0 h-1 w-full bg-red-300">
                    </li>
                </ul>
            </div>
            <div class="banner ml-2 basis-9/12 /bg-green-400 h-auto w-auto">
                <img class="slideshow h-80 w-full rounded-lg" src="/images/banner1.jpg" alt="">
                <img class="slideshow h-80 w-full rounded-lg" src="/images/banner2.jpg" alt="">
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
                        <div class="discription my-4"><a class=" hover:text-red-500" href="#">Discription</a></div>
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
                        <div class="discription my-4"><a class=" hover:text-red-500" href="#">Discription</a></div>
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
                        <div class="discription my-4"><a class=" hover:text-red-500" href="#">Discription</a></div>
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
                        <div class="discription my-4"><a class=" hover:text-red-500" href="#">Discription</a></div>
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
                        <div class="discription my-4"><a class=" hover:text-red-500" href="#">Discription</a></div>
                        <div class="price flex">
                            <span class="text-red-400">50000d</span>
                            <span class="block ml-2 mt-0.5 opacity-70 line-through text-14">60000d</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="news h-auto grid grid-cols-5 gap-1 /bg-blue-600 shadow-lg bg-slate-50 rounded-lg">
            <div class="listNews col-span-3 grid grid-rows-3 gap-1 ml-2 mt-6">
                <div class="news-item">
                    <a href="#" class="grid grid-cols-5 gap-1 group">
                        <div class="img-col-span-1">
                            <img class="rounded-lg" src="/images/news1.png" alt="">
                        </div>
                        <div class="news-content col-span-4">
                            <h3 class=" group-hover:text-red-500">Shop cá cảnh TPHCM Online uy tín giá tốt</h3>
                            <p class="block hover:text-black">Ngày nay, việc mua cá cảnh cũng có thể dễ dàng thực hiện bằng hình thức online. Bạn không cần phải đến trực...</p>
                        </div>
                    </a>
                </div>
                <div class="news-item">
                    <a href="#" class="grid grid-cols-5 gap-1 group">
                        <div class="img-col-span-1">
                            <img class="rounded-lg" src="/images/news2.png" alt="">
                        </div>
                        <div class="news-content col-span-4">
                            <h3 class=" group-hover:text-red-500">Tọa đàm về ngành nuôi cá ở Cần Thơ</h3>
                            <p> Vừa qua, ông Lê Hữu Thiện, Giám đốc công ty cổ phần sinh vật cảnh Thiên Đức đã có buổi gặp mặt, trao ...</p>
                        </div>
                    </a>
                </div>
                <div class="news-item">
                    <a href="#" class="grid grid-cols-5 gap-1 group">
                        <div class="img-col-span-1">
                            <img class="rounded-lg" src="/images/news3.jpg" alt="">
                        </div>
                        <div class="news-content col-span-4">
                            <h3 class=" group-hover:text-red-500">Trại nuôi cá cảnh của ba anh chàng IT lỏ ở Cần Thơ</h3>
                            <p>Lỏd Hùng - Lỏd Duy - Lỏd Trường có những xuất phát điểm khác nhau, nhưng cùng sở hữu chung trại cá Betta lớn ở Cần Thơ sau thời gian dài lao đao với nghề.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news-outstanding col-span-2 my-6 mr-2">
                <a class="group" href="#">
                    <div class="">
                        <img class="rounded-tr-lg rounded-lg w-full h-96" src="/images/news1.png" alt="">
                    </div>
                    <div class="">
                        <h3 class="font-bold text-18 group-hover:text-red-500">Shop cá cảnh TPHCM Online uy tín giá tốt</h3>
                        <p class="text-14">Ngày nay, việc mua cá cảnh cũng có thể dễ dàng thực hiện bằng hình thức online. Bạn không cần phải đến trực...</p>
                    </div>
                </a>
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
    <script>
        var myIndex = 0;
        slideshow();
        function slideshow() {
            var i;
            var x = document.getElementsByClassName("slideshow");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(slideshow, 2000);
        }
    </script>
</body>
</html>

