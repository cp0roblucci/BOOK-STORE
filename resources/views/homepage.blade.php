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
    <div class="Logo bg-blue-300 text-center">
        <div class="img-logo h-24 w-24">
            <img src="./assets/" alt="">
        </div>
    </div>
    <div class="nav-search flex flex-row h-14  text-center bg-slate-50 ">
        <div class="nav basis-8/12 mr-2 bg-red-400">    
            <ul class="grid grid-cols-4 text-black">
                <li class="hover:border hover:text-white hover:bg-blue-200 py-3 bg-slate-50"><a class="" href=""> Trang chu</a></li>
                <li class="hover:border hover:text-white hover:bg-blue-200 py-3 bg-slate-50"><a class="" href=""> San Pham</a></li>
                <li class="hover:border hover:text-white hover:bg-blue-200 py-3 bg-slate-50"><a class="" href=""> Ky Thuat nuoi</a></li>
                <li class="hover:border hover:text-white hover:bg-blue-200 py-3 bg-slate-50"><a class="" href=""> Tin tuc</a></li>
            </ul>
        </div>
        <div class="search basis-4/12 w-auto">
            <form action="" class=" h-full">
                <div class="w-11/12 relative h-full">
                    <input type="text" class="w-full h-3/5 absolute bottom-0.5 left-0 bg-slate-100" placeholder="Nhap san phamm ban can tim">
                    <button><i class="fa-solid fa-magnifying-glass absolute right-0 top-5 hover:bg-blue-300 p-2"><input type="submit" value=""></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="content mx-20 h-auto  bg-slate-200 rounded-lg">
        <div class="flex flex-row h-auto bg-slate-50 rounded-lg shadow-lg">
            <div class="sidebar basis-3/12  h-auto uppercase text-20 ml-2">
                <div class="bars flex pl-1">
                <i class="fa-solid fa-bars mt-1 text-24"></i>
                <h1 class="pl-2 ">Danh muc san pham</h1>
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
                <img class="slideshow max-h-80 w-full rounded-lg" src="https://tepbac.com/upload/news/ge_image/2021/02/nuoi-ca-canh_1614155419.jpg" alt="">
                <img class="slideshow max-h-80 w-full rounded-lg" src="https://thuysinh4u.com/wp-content/uploads/2020/11/Ca-ba-duoi.jpg" alt="">
            </div>
        </div>
        <div class="product h-auto my-2 bg-slate-50 rounded-lg shadow-lg">
            <div class=""><h1 class="text-26 ml-2 mb-5 text-red-500 border-b-2 before:border-r-4 before:border-blue-400 before:mr-2">Cac Loai Ca</h1></div>
            <div class="product-container grid grid-cols-5 gap-2 mx-2">
                <div class="product-item rounded-2xl border-black hover:shadow-2xl relative">
                    <a class="img h-auto w-auto my-5 -z-10" href="#">
                        <img class="rounded-t-2xl" src="https://bizweb.dktcdn.net/thumb/large/100/424/759/products/8ca93a1b-7702-4d57-a77c-7bf6bc62cdbf-1-201-a-result.jpg?v=1624862507100" alt="">
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
                        <a class="discription my-2 hover:text-red-500" href="#">Discription</a>
                        <div class="price flex">
                            <span class="text-red-400">50000d</span>
                            <span class="block ml-2 mt-0.5 opacity-70 line-through text-14">60000d</span>
                        </div>
                    </div>
                </div>
                <div class="product-item rounded-2xl border-black hover:shadow-2xl relative">
                    <a class="img h-auto w-auto my-5 -z-10" href="#">
                        <img class="rounded-t-2xl" src="https://bizweb.dktcdn.net/thumb/large/100/424/759/products/8ca93a1b-7702-4d57-a77c-7bf6bc62cdbf-1-201-a-result.jpg?v=1624862507100" alt="">
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
                        <a class="discription my-2 hover:text-red-500" href="#">Discription</a>
                        <div class="price flex">
                            <span class="text-red-400">50000d</span>
                            <span class="block ml-2 mt-0.5 opacity-70 line-through text-14">60000d</span>
                        </div>
                    </div>
                </div>
                <div class="product-item rounded-2xl border-black hover:shadow-2xl relative">
                    <a class="img h-auto w-auto my-5 -z-10" href="#">
                        <img class="rounded-t-2xl" src="https://bizweb.dktcdn.net/thumb/large/100/424/759/products/8ca93a1b-7702-4d57-a77c-7bf6bc62cdbf-1-201-a-result.jpg?v=1624862507100" alt="">
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
                        <a class="discription my-2 hover:text-red-500" href="#">Discription</a>
                        <div class="price flex">
                            <span class="text-red-400">50000d</span>
                            <span class="block ml-2 mt-0.5 opacity-70 line-through text-14">60000d</span>
                        </div>
                    </div>
                </div>
                <div class="product-item rounded-2xl border-black hover:shadow-2xl relative">
                    <a class="img h-auto w-auto my-5 -z-10" href="#">
                        <img class="rounded-t-2xl" src="https://bizweb.dktcdn.net/thumb/large/100/424/759/products/8ca93a1b-7702-4d57-a77c-7bf6bc62cdbf-1-201-a-result.jpg?v=1624862507100" alt="">
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
                        <a class="discription my-2 hover:text-red-500" href="#">Discription</a>
                        <div class="price flex">
                            <span class="text-red-400">50000d</span>
                            <span class="block ml-2 mt-0.5 opacity-70 line-through text-14">60000d</span>
                        </div>
                    </div>
                </div>
                <div class="product-item rounded-2xl border-black hover:shadow-2xl relative">
                    <a class="img h-auto w-auto my-5 -z-10" href="#">
                        <img class="rounded-t-2xl" src="https://bizweb.dktcdn.net/thumb/large/100/424/759/products/8ca93a1b-7702-4d57-a77c-7bf6bc62cdbf-1-201-a-result.jpg?v=1624862507100" alt="">
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
                        <a class="discription my-2 hover:text-red-500" href="#">Discription</a>
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
                            <img class="rounded-lg" src="https://bizweb.dktcdn.net/100/424/759/files/306722639-5011597945612640-8288268009768571700-n.jpg?v=1663266743659" alt="">
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
                            <img class="rounded-lg" src="https://bizweb.dktcdn.net/100/424/759/files/306722639-5011597945612640-8288268009768571700-n.jpg?v=1663266743659" alt="">
                        </div>
                        <div class="news-content col-span-4">
                            <h3 class=" group-hover:text-red-500">Shop cá cảnh TPHCM Online uy tín giá tốt</h3>
                            <p>Ngày nay, việc mua cá cảnh cũng có thể dễ dàng thực hiện bằng hình thức online. Bạn không cần phải đến trực...</p>
                        </div>
                    </a>
                </div>
                <div class="news-item">
                    <a href="#" class="grid grid-cols-5 gap-1 group">
                        <div class="img-col-span-1">
                            <img class="rounded-lg" src="https://bizweb.dktcdn.net/100/424/759/files/306722639-5011597945612640-8288268009768571700-n.jpg?v=1663266743659" alt="">
                        </div>
                        <div class="news-content col-span-4">
                            <h3 class=" group-hover:text-red-500">Shop cá cảnh TPHCM Online uy tín giá tốt</h3>
                            <p>Ngày nay, việc mua cá cảnh cũng có thể dễ dàng thực hiện bằng hình thức online. Bạn không cần phải đến trực...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news-outstanding col-span-2">
                <a href="#">
                    <div class="">
                        <img class="rounded-tr-lg rounded-bl-lg" src="https://bizweb.dktcdn.net/100/424/759/files/306722639-5011597945612640-8288268009768571700-n.jpg?v=1663266743659" alt="">
                    </div>
                    <div class="">
                        <h3>Shop cá cảnh TPHCM Online uy tín giá tốt</h3>
                        <p>Ngày nay, việc mua cá cảnh cũng có thể dễ dàng thực hiện bằng hình thức online. Bạn không cần phải đến trực...</p>
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