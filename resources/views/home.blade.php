@component('components.head', ['title' => 'Trang chủ', 'manga_category' => $manga_category, 'danhmuc' => $danhmuc])
@endcomponent
<main class="max-w-[1360px] mx-auto px-16 mt-[137px]">
    {{-- category & slider --}}
    <section class="grid grid-cols-12 gap-4 my-10 ">
      <aside class="col-span-3 border w-72  rounded-xl ">
        <div class="border-b py-2 text-center text-22   font-bold relative flex">
          <img class="text-black w-5 h-5 flex mt-1 ml-8" src="/storage/images/admin/boxmenu.png" alt="">
            <h2 class="flex ml-2 font-san font-semibold text-18 text-gray-800">Danh Mục Sản Phẩm</h2>
           
        </div>
        
        <ul class="mx-auto ">
          <li class="main-category " >
            <div  class="flex text-16 py-3  hover:bg-gray-100 hover:text-blue-200 ">
              <img class="flex w-6 mr-2 ml-8" src="/storage/images/slide/sachtv.jpg" alt="">
              <a href="{{ route('products.language', ['language' => 'vietnamese']) }}" class="mt-1.5 mr-12 flex pr-6 font-san">Sách Tiếng Việt</a>    
            </div>
            
          </li>
          <li class="">
            <div class="flex text-16  py-3  hover:bg-gray-100 hover:text-blue-200 ">
              <img class="flex w-6 mr-2 ml-8" src="/storage/images/products/ta1.jpg" alt="">
                <a href="{{ route('products.language', ['language' => 'english']) }}" class="mt-1.5 mr-12 flex pr-6 font-san">Sách Tiếng Anh</a>
                {{-- <i class="fa-solid fa-angle-right flex mt-1 "></i>     --}}
            </div>
          </li>
          <li class="">
            <div class="flex text-16  py-3  hover:bg-gray-100 hover:text-blue-200 ">
              <img class="flex w-6 mr-2 ml-8" src="/storage/images/products/jujutsu/jujutsu8.jpg" alt="">
                <a id="mangaLink" href="javascript:void(0);" class="mt-1.5 mr-6 flex font-san">Truyện Tranh - Manga</a>
                {{-- <i class="fa-solid fa-angle-right flex mt-1 "></i>     --}}
            </div>
          </li>
          <li class="">
            <div class="flex text-16  py-3  hover:bg-gray-100 hover:text-blue-200 ">
              <img class="flex w-6 mr-2 ml-8" src="/storage/images/slide/sachvhkd.jpg" alt="">
                <a id="vanhocLink" href="javascript:void(0);" class="mt-1.5 mr-6 flex font-san">Văn Học Kinh Điển</a>
                {{-- <i class="fa-solid fa-angle-right flex mt-1 "></i>     --}}
            </div>
          </li>
          <li class="">
            <div class="flex text-16  py-3  hover:bg-gray-100 hover:text-blue-200 ">
              <img class="flex w-6 mr-2 ml-8" src="/storage/images/products/sherlockhome/sh2.jpg" alt="">
                <a id="comicLink" href="javascript:void(0);" class="mt-1.5 mr-6 flex font-san">Truyện Tranh - Comic</a>
                {{-- <i class="fa-solid fa-angle-right flex mt-1 "></i>     --}}
            </div>
          </li>
          <li class="">
            <div class="flex text-16  py-3  hover:bg-gray-100 hover:text-blue-200">
              <img class="flex w-6 mr-2 ml-8" src="/storage/images/slide/sachavb.png" alt="">
                <a id="tieuthuyetLink" href="javascript:void(0);" class="mt-1.5 mr-6 flex font-san">Tiểu Thuyết</a>
                {{-- <i class="fa-solid fa-angle-right flex mt-1 "></i>     --}}
            </div>
          </li>
          <li class="">
            <div class="flex text-16  py-3  hover:bg-gray-100 hover:text-blue-200 ">
              <img class="flex w-6 mr-2 ml-8" src="/storage/images/slide/sgk.jpg" alt="">
                <a id="sgkLink" href="javascript:void(0);" class="mt-1.5 mr-6 flex font-san">Sách Giáo Khoa</a>
                {{-- <i class="fa-solid fa-angle-right flex mt-1 "></i>     --}}
            </div>
          </li>
        </ul>
      </aside>
      <div id="slider" class="col-span-9 w-full ">
      </div>
    </section>
    {{-- <article class="my-10">
      <img src="/storage/images/banner-aonam.jpg" alt="">
    </article> --}}
    <section class="grid grid-cols-12 gap-4 my-10 border rounded-xl shadow-xl">
        <aside class="bannerbook col-span-3 border w-72 overflow-hidden rounded-xl shadow-xl">
          <h2 class="bg-black py-2 text-center text-20 text-white font-pacifico ">Truyện Tranh - Manga</h2>
          <img src="/storage/images/mangabanner.png" alt="" class="w-full h-full">
        </aside>
        <div class="col-span-9 grid grid-cols-4 gap-3 mt-16">
          @foreach ($manga_category->take(8) as $product)
          <div class="card flex flex-col cursor-pointer group">
            <a href="{{ route('products.detail', ['id' => $product->S_Ma]) }}" class="h-full">
                {{--  --}}
              <img class="w-50 h-80" src="{{$product->S_HinhAnh}}" alt="product" class="h-full">
              
            </a>
            <div class="flex flex-col gap-4 p-2 pb-4 font-sans">
              <a href="{{ route('products.detail', ['id' => $product->S_Ma]) }}">
                <h4 class="text-center -ml-4">{{$product->S_Ten}}</h4>
                
              </a>
              <div class="flex flex-col gap-1">
                  <p class="text-center font-bold"> {{number_format($product->S_GiaBan, 0,  ',', '.')}}₫</p>
                 
                  {{-- {{ route('products.detail', ['id' => $product->SP_Ma]) }} --}}
                  <div class="flex justify-center"><a href="{{ route('products.detail', ['id' => $product->S_Ma]) }}" class="px-4 py-2 text-center text-14 border rounded-lg transition-all duration-300 hover:bg-primary-600 hover:text-white group-hover:bg-primary-600 group-hover:text-white">Xem chi tiết</a></div>
              </div>
            </div>
          </div>
          @endforeach
      </section>
      <article class="my-10">
        <img src="/storage/images/bnft.png" alt="">
      </article>
      <section class="grid grid-cols-12 gap-4 my-10 border rounded-xl shadow-xl">
        <aside class="bannerbook col-span-3 border w-72 overflow-hidden  rounded-xl shadow-xl">
          <h2 class="bg-black py-2 text-center text-20 text-white font-pacifico">Sách Tiếng Anh</h2>
          <img src="/storage/images/bnenglish.png" alt="" class="w-full h-full">
        </aside>
        <div class="col-span-9 grid grid-cols-4 gap-3 mt-16">
          @foreach ($sachtienganh as $product)
          <div class="card flex flex-col cursor-pointer group">
            <a href="{{ route('products.detail', ['id' => $product->S_Ma]) }}" class="h-full">
                {{-- {{ route('products.detail', ['id' => $product->SP_Ma]) }} --}}
              <img class="w-50 h-80" src="{{$product->S_HinhAnh}}" alt="product" class="h-full">
              
            </a>
            <div class="flex flex-col gap-4 p-2 pb-4 font-sans">
              <a href="/products/name">
                <h4 class="text-center -ml-4">{{$product->S_Ten}}</h4>
                
              </a>
              <div class="flex flex-col gap-1">
                  <p class="text-center font-bold"> {{number_format($product->S_GiaBan, 0,  ',', '.')}}₫</p>
                 
                  {{-- {{ route('products.detail', ['id' => $product->SP_Ma]) }} --}}
                  <div class="flex justify-center"><a href="" class="px-4 py-2 text-center text-14 border rounded-lg transition-all duration-300 hover:bg-primary-600 hover:text-white group-hover:bg-primary-600 group-hover:text-white">Xem chi tiết</a></div>
              </div>
            </div>
          </div>
          @endforeach
      </section>
      <article class="my-10 grid grid-cols-3 gap-6">
        <img src="/storage/images/slide/1.png" alt="banner">
        <img src="/storage/images/slide/2.png" alt="banner">
        <img src="/storage/images/slide/3.png" alt="banner">
      </article>
  </main>

  <x-footer />
<script>
document.getElementById('mangaLink').addEventListener('click', function() {
    // Lấy đường dẫn của trang sản phẩm với danh mục manga có mã là 13
    var mangaUrl = '/products/12';

    // Chuyển hướng đến trang sản phẩm
    window.location.href = mangaUrl;
});
document.getElementById('vanhocLink').addEventListener('click', function() {
    // Lấy đường dẫn của trang sản phẩm với danh mục manga có mã là 13
    var vanhocUrl = '/products/3';

    // Chuyển hướng đến trang sản phẩm
    window.location.href = vanhocUrl;
});
document.getElementById('comicLink').addEventListener('click', function() {
    // Lấy đường dẫn của trang sản phẩm với danh mục manga có mã là 13
    var vanhocUrl = '/products/14';

    // Chuyển hướng đến trang sản phẩm
    window.location.href = vanhocUrl;
});
document.getElementById('tieuthuyetLink').addEventListener('click', function() {
    // Lấy đường dẫn của trang sản phẩm với danh mục manga có mã là 13
    var vanhocUrl = '/products/31';

    // Chuyển hướng đến trang sản phẩm
    window.location.href = vanhocUrl;
});
document.getElementById('sgkLink').addEventListener('click', function() {
    // Lấy đường dẫn của trang sản phẩm với danh mục manga có mã là 13
    var vanhocUrl = '/products/9';

    // Chuyển hướng đến trang sản phẩm
    window.location.href = vanhocUrl;
});
</script>
  