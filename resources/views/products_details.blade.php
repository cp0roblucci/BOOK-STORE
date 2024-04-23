@component('components.head', ['title' => 'Chi tiết sản phẩm', 'manga_category' => $manga_category, 'danhmuc' => $danhmuc])
@endcomponent

<main class="max-w-[1360px] mx-auto px-16 mt-[137px] border rounded-xl shadow-lg">
  <form action="" method="post">
    {{-- {{route('cart.add')}} --}}
    @csrf

    @if(session('success'))
      <div id="alert" class="alert alert-success border  bg-white shadow-lg text-blue-500 py-4 w-[300px] text-center fixed top-[135px] right-[84px] z-10 text-22">
        <span class="mt-4 ">{{ session('success') }}</span>
      </div>
    @endif
    <div>
    
    <div class="py-20 flex gap-8">
      
      <input type="hidden" name="product_id" value={{ $product->S_Ma }}>
      <div class="w-[500px]">
        <img class="" src={{$product->S_HinhAnh}} alt="product-detail" class="">
      </div>
      <div class="w-full ml-20">

        <div class="flex flex-col gap-2 mb-4 border-b">
          <h3 class="text-32 font-san font-bold">{{$product->S_Ten}}</h3>
          <h3 class="text-14  ">Nhà cung cấp:  <span class="text-blue-300">{{$product->NCC_Ten}} </span></h3>
          <h3 class="text-14 ">Nhà xuất bản:  <span class="">{{$product->NXB_Ten}} </span></h3>
          <h3 class="text-14   ">Tác giả:  <span class="">{{$product->TG_Ten}} </span></h3>
          <h3 class="text-14  ">Danh mục:  <span class="">{{$product->DM_Ten}} </span></h3>
          <span class="pb-4 text-32 text-red-600 font-bold">{{number_format($product->S_GiaBan, 0, ',', '.')}} đ </span>
        </div>
        <div class="flex flex-col gap-4">
          <div class="w-[140px] flex items-center justify-between border border-slate-300 rounded-xl">
            <span id="btn_decrease" class="w-full  text-center border-r border-slate-300 cursor-pointer group">
              <i class="fa-solid fa-minus group-active:scale-125"></i>
            </span>
            <input id="quantity" type="number" name="quantity" class="w-full text-20 text-center border-none">
            <span id="btn_increase" class="w-full  text-center border-l border-slate-300 cursor-pointer group">
              <i class="fa-solid fa-plus group-active:scale-125"></i>
            </span>
          </div>
          <div class="flex gap-4">
            <form action="{{ route('cart.add', ['id' => $product->S_Ma]) }}" method="post">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->S_Ma }}">
              <button 
              type="submit"
              name="action"
              value="add" 
              class=" text-red-500 px-4 py-3 border border-red-400 rounded-md transition-all duration-300 hover:bg-gray-300 hover:border-gray-300"
            >
              <i class="fa-solid fa-cart-plus"></i>
              <span>Thêm vào giỏ hàng</span>
            </button>
          </form>
            {{-- , ['id' => $product->S_Ma] --}}
          <form action="{{ route('checkoutTransaction') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->S_Ma }}">
            <input type="hidden" name="product_quantity" id="product_quantity" value="1">
            <button type="submit" class="text-white px-[68px] py-3  border bg-red-600 border-red-600 rounded-md transition-all duration-300">
                
                <span>Mua ngay</span>
            </button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </form>
</main>
<main class="max-w-[1360px] mx-auto px-16 mt-5 border rounded-xl shadow-lg mb-5">
    <h2 class="text-20 text-gray-700 mt-2 mb-2 font-bold font-san">Thông tin sản phẩm</h2>
    <div class="flex flex-col gap-3 w-1/2">
        <div class="flex justify-between">
            <h3 class="text-18 font-san font-semibold text-gray-500 font-serif">Tên sách:</h3>
            <span class="text-16 font-serif items-start">{{$product->S_Ten}}</span>
        </div>
        <div class="flex justify-between">
            <h3 class="text-18 font-san font-semibold text-gray-500 font-serif mr-4">Danh mục:</h3>
            <span class="text-16 font-serif items-start">{{$product->DM_Ten}}</span>
        </div>
        <div class="flex justify-between ">
            <h3 class="text-18 font-san font-semibold text-gray-500 font-serif mr-4">Nhà xuất bản:</h3>
            <span class="text-16 font-serif items-start">{{$product->NXB_Ten}}</span>
        </div>
        <div class="flex justify-between ">
            <h3 class="text-18 font-san font-semibold text-gray-500 font-serif mr-4">Nhà cung cấp:</h3>
            <span class="text-16 font-serif items-start">{{$product->NCC_Ten}}</span>
        </div>
        <div class="flex justify-between items-start">
            <h3 class="text-18 font-san font-semibold text-gray-500 font-serif mr-4">Năm xuất bản:</h3>
            <span class="text-16 font-serif items-start">{{$product->S_NamXuatBan}}</span>
        </div>
        <div class="flex justify-between ">
            <h3 class="text-18 font-san font-semibold text-gray-500 font-serif mr-4">Dịch giả:</h3>
            <span class="text-16 font-serif items-start">{{$product->S_DichGia}}</span>
        </div>
        <div class="flex justify-between ">
            <h3 class="text-18 font-san font-semibold text-gray-500 font-serif mr-4">Số trang:</h3>
            <span class="text-16 font-serif items-start">{{$product->S_SoTrang}} trang</span>
        </div>
        <div class="flex justify-between">
            <h3 class="text-18 font-san font-semibold text-gray-500 font-serif mr-40">Trọng lượng:</h3>
            <span class="text-16 font-serif items-start">{{$product->S_TrongLuong}}(g)</span>
        </div>
        <div class="relative mb-5">
            <h3 class=" text-18 font-san font-semibold text-gray-500 font-serif mb-1.5">Mô tả: </h3>
            <span class=" text-16 font-serif">{{$product->S_Mota}}</span>
        </div>
    </div>
</main>
<main class="max-w-[1360px] mx-auto px-16 mt-5 border rounded-xl shadow-lg mb-5">
  <h3 class="my-3 font-bold font-san text-20">Gợi ý cho bạn : </h3>
  <div class="flex flex-wrap -mx-4">
      
      @foreach ($recommendedProducts as $recommendedProduct)
          <div class="w-1/5 px-4 mb-8">
              <div class="card flex flex-col cursor-pointer group">
                  <a href="{{ route('products.detail', ['id' => $recommendedProduct['S_Ma']]) }}" class="h-full">
                      <img class="w-full h-80 object-cover" src="{{ $recommendedProduct['S_HinhAnh'] }}" alt="product">
                  </a>
                  <div class="flex flex-col gap-4 p-2 pb-4 font-sans">
                      <a href="{{ route('products.detail', ['id' => $recommendedProduct['S_Ma']]) }}" class="text-center">
                          <h4 class="text-center -ml-4">{{ $recommendedProduct['S_Ten'] }}</h4>
                      </a>
                      <div class="flex flex-col gap-1">
                          <p class="text-center font-bold">{{ number_format($recommendedProduct['S_GiaBan'], 0, ',', '.') }}₫</p>
                          <div class="flex justify-center">
                              <a href="{{ route('products.detail', ['id' => $recommendedProduct['S_Ma']]) }}" class="px-4 py-2 text-center text-14 border rounded-lg transition-all duration-300 hover:bg-primary-600 hover:text-white group-hover:bg-primary-600 group-hover:text-white">Xem chi tiết</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach
  </div>
</main>

<script>
 
  setTimeout(function(){
      document.getElementById('alert').style.display = 'none';
  }, 3000);
</script>
<x-footer :js-file="'resources/js/guest/product_detail.js'" />