@component('components.head', ['title' => 'Sản Phẩm', 'manga_category' => $manga_category, 'danhmuc' => $danhmuc])
@endcomponent

<main class="max-w-[1360px] mx-auto px-16 my-10 mt-[137px]">
  {{-- Filter --}}
  {{-- <form method="post" action="{{ route('products.filter') }}">
    @csrf

    <div class="bg-white border shadow-2xl flex items-center gap-4 my-8 p-4 relative rounded-md">
        <span class="absolute -top-4 px-6 text-18 bg-gray-100 text-black rounded-md shadow-md"><i class="fa-solid fa-filter"></i></span>
        
        <div class="">
            <span class="mr-1 text-16">Giá:</span>
            <select name="filter_price" class="px-2 py-1 rounded-sm cursor-pointer outline-none">
                <option value="">Mặc định</option>
                <option value="price_asc" {{ old('filter_price') == 'price_asc' ? 'selected' : '' }}>Tăng dần</option>
                <option value="price_desc" {{ old('filter_price') == 'price_desc' ? 'selected' : '' }}>Giảm dần</option>
            </select>
        </div>

        <div class="">
            <span class="mr-1 text-16">Tên:</span>
            <select name="filter_name" class="px-2 py-1 rounded-sm cursor-pointer outline-none">
                <option value="">Mặc định</option>
                <option value="name_asc" {{ old('filter_name') == 'name_asc' ? 'selected' : '' }}>Từ A-Z</option>
                <option value="name_desc" {{ old('filter_name') == 'name_desc' ? 'selected' : '' }}>Từ Z-A</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Lọc</button>
    </div>
</form> --}}
<form id="filterForm" method="post" action="{{ route('products.filter') }}">
  @csrf

  <div class="bg-white border shadow-2xl flex items-center gap-4 my-8 p-4 relative rounded-md">
      <span class="absolute -top-4 px-6 text-18 bg-gray-100 text-black rounded-md shadow-md"><i class="fa-solid fa-filter"></i></span>
      
      <div class="">
          <span class="mr-1 text-16">Giá:</span>
          <select id="filter_price" name="filter_price" class="px-2 py-1 rounded-sm cursor-pointer outline-none">
              <option value="">Mặc định</option>
              <option value="price_asc">Tăng dần</option>
              <option value="price_desc">Giảm dần</option>
          </select>
      </div>

      <div class="">
          <span class="mr-1 text-16">Tên:</span>
          <select id="filter_name" name="filter_name" class="px-2 py-1 rounded-sm cursor-pointer outline-none">
              <option value="">Mặc định</option>
              <option value="name_asc">Từ A-Z</option>
              <option value="name_desc">Từ Z-A</option>
          </select>
      </div>
  </div>
</form>

  @if ($title_search)
      <h3 class="-mt-3 mb-6 font-san text-24 font-bold text-gray-800 text-center">{{$title_search}}</h3>
  @endif

  {{-- List product --}}
  <div class="grid grid-cols-5 gap-6">
    @foreach ($products as $product)
    <div class="card flex flex-col cursor-pointer group">
        <a href="{{ route('products.detail', ['id' => $product->S_Ma]) }}" class="h-full">
            {{-- {{ route('products.detail', ['id' => $product->SP_Ma]) }} --}}
          <img class="w-50 h-80" src="{{$product->S_HinhAnh}}" alt="product" class="h-full">
          
        </a>
        <div class="flex flex-col gap-4 p-2 pb-4 font-sans">
          <a href="{{ route('products.detail', ['id' => $product->S_Ma]) }}">
            <h4 class="text-center -ml-4">{{$product->S_Ten}}</h4>
            
          </a>
          <div class="flex flex-col gap-1">
              <p class="text-center font-bold"> {{number_format($product->S_GiaBan, 0,  ',', '.')}}₫</p>
             
              {{--  --}}
              <div class="flex justify-center"><a href="{{ route('products.detail', ['id' => $product->S_Ma]) }}" class="px-4 py-2 text-center text-14 border rounded-lg transition-all duration-300 hover:bg-primary-600 hover:text-white group-hover:bg-primary-600 group-hover:text-white">Xem chi tiết</a></div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{-- panigator --}}
  @if (count($products) > 0)
    <div class="flex justify-center items-center gap-2 my-4">
      @if ($products->currentPage() !== 1)
        <a href="{{ $products->previousPageUrl() }}" class="mx-2 px-4 transition-all duration-300 hover:-translate-x-2"><i class="fa-solid fa-chevron-left"></i></a>
      @endif
      @for ($i = 1; $i <= $products->lastPage(); $i++)
        @if ($i == $products->currentPage())
          <span class="bg-primary-500 text-white px-3.5 py-1.5 border rounded-full pointer-events-none">{{ $i }}</span>
        @else
        {{-- Nếu nhiều hơn 5 trang và nếu đang ở trang cuối thì chỉ hiện 4 trang gần cuối (lastPage - 4) nếu nhỏ hơn thì hiện ... --}}
          @if ($products->lastPage() >= 5 && $products->lastPage() - $products->currentPage() == 0 && $i <= $products->lastPage() - 4)
              <span>...</span>
          @else
            <a href="{{ $products->url($i) }}" class="px-3.5 py-1.5 border rounded-full transition-all duration-300 hover:bg-primary-500 hover:text-white">{{ $i }}</a>
            @endif
        @endif
      @endfor
      @if ($products->currentPage() !== $products->lastPage())
        <a href="{{ $products->nextPageUrl() }}" class="mx-2 px-4 transition-all duration-300 hover:translate-x-2"><i class="fa-solid fa-chevron-right"></i></a>
      @endif
    </div>
  @else
    <div class="min-h-[200px] flex justify-center items-center">
      <span class="">Không tìm thấy sách phù hợp.</span>
    </div>
  @endif
</main>

<x-footer :js-file="''" />
<script>
  $(document).ready(function () {
      // Sử dụng sự kiện change để theo dõi sự thay đổi của các trường lọc
      $('#filter_price, #filter_name').change(function () {
          // Tự động gửi form khi có sự thay đổi
          $('#filterForm').submit();
      });
  });
</script>