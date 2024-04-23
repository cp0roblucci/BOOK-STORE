@component('components.head', ['title' => 'Thanh toán', 'manga_category' => $manga_category, 'danhmuc' => $danhmuc])
@endcomponent
<main class="max-w-[1360px] mx-auto px-16 my-10 mt-[137px]">
  <form action="{{ route('create.order') }}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="max-w-[960px] mx-auto border p-4 rounded-lg shadow-lg mb-5">
      <h1 class="pb-6 text-18 font-serif font-semibold uppercase">ĐỊA CHỈ GIAO HÀNG</h1>
      
      <div class="big">
        <div class="small">
          <label
            for="DH_TenNguoiNhan"
            class="text-slate-500 text-14"
          >
            Họ và tên người nhận
          </label><br>
          <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
            <input
              type="text"
              name="DH_TenNguoiNhan"
              placeholder="Nhập họ và tên người nhận"
              class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
            >
           <!-- Hiển thị thông báo lỗi -->
          </div>
          <span class="text-danger text-14">{{ $errors->first('DH_TenNguoiNhan') }}</span> 
        </div>
        {{--  --}}
        <div class="small mt-4">
          <label
            for="DH_SDTNhan"
            class="text-slate-500 text-14"
          >
            Số điện thoại
          </label><br>
          <div class="flex items-center mt-1 rounded-lg relative  focus-within:border-blue-100">
            {{-- <i class="fa-solid fa-mobile-screen absolute left-2 top-1/2 transform -translate-y-1/2 group"></i> --}}
            <input
              type="number"
              name="DH_SDTNhan"
              placeholder="Ví dụ: 088615xxxx (10 ký tự số)"
              class="py-1.5 w-full outline-none rounded-lg placeholder:text-14 text-14"
            >
          </div>
          <span class="text-danger text-14">{{ $errors->first('DH_SDTNhan') }}</span> 
        </div>
        {{--  --}}
        <div class="mt-4 ">
          <label
            for="DH_DiaChiNhan"
            class="text-slate-500 text-14"
          >
            Địa chỉ nhận hàng
          </label><br>
          <div class=" flex items-center mt-1 rounded-lg relative  focus-within:border-blue-100">
            <input
              type="text"
              name="DH_DiaChiNhan"
              placeholder="Nhập địa chỉ nhận hàng"
              class="py-1.5 w-full outline-none rounded-lg placeholder:text-14 text-14"
            >
          </div>
          <span class="text-danger text-14">{{ $errors->first('DH_DiaChiNhan') }}</span> 
        </div>
        <div class="mt-4 ">
          <label
            for="DH_DiaChiNhan"
            class="text-slate-500 text-14"
          >
            Ghi Chú
          </label><br>
          <div class=" flex items-center mt-1 rounded-lg relative  focus-within:border-blue-100">
            <input
              type="text"
              name="DH_GhiChu"
              placeholder="Nhập ghi chú"
              class="py-1.5 w-full outline-none rounded-lg placeholder:text-14 text-14"
            >
          </div>
        </div>
        {{--  --}}
      </div>
  </div>

  <div class="max-w-[960px] mx-auto border p-4 rounded-lg shadow-lg">
    <h1 class="pb-6 text-18 font-serif font-semibold uppercase">KIỂM TRA LẠI ĐƠN HÀNG</h1>
    <div class="">
        <div class="grid grid-cols-12 gap-6 pb-2 text-gray-500 text-14 font-medium border-b">
            <span class="col-span-6">Sản phẩm</span>
            <span class="col-span-2">Đơn giá</span>
            <span class="col-span-2">Số lượng</span>
            <span class="col-span-2">Thành tiền</span>
        </div>

        @foreach ($selectedCart as $productId => $item)
        <div class="">
          <input
            type="hidden"
            name="TT_Ma"
            id="TT_Ma"
            value="0"
            class="h-4 w-4 cursor-pointer peer/admin"
          >
        </div>
            <div class="grid grid-cols-12 gap-6 items-center py-4 border-b">
              
                <div class="col-span-6 flex items-center gap-4">
                    <!-- Hiển thị thông tin sản phẩm từ selected_cart -->
                    <img src={{$item['image'] }} alt="img-product" class="w-24">
                    <span class="">{{ $item['name'] }}</span>
                    <!-- Thêm các trường thông tin khác nếu cần -->
                </div>
                <div class="col-span-2 font-semibold">{{ number_format($item['price'], 0, ',', '.') }}đ</div>
                <div class="col-span-2">
                    <span>{{ $item['quantity'] }}</span>
                </div>
                <div class="col-span-2 font-semibold" data-product-price="{{ $item['quantity'] * $item['price'] }}">
                    {{ number_format($item['quantity'] * $item['price'], 0, ',', '.') }}đ
                </div>
                <!-- Hiển thị các thông tin khác nếu cần -->
            </div>
        @endforeach

        <div class="flex flex-col items-end gap-4 my-6">
            <p>Tổng tiền: <span class="font-bold">{{ number_format($totalPrice, 0, ',', '.') }}đ</span></p>
            <button id="payment" class="text-primary-600 text-20 font-semibold uppercase px-8 py-2 border-2 border-primary-600 rounded-lg transition-all duration-500 hover:bg-primary-600 hover:text-white">Thanh toán</button>
        </div>
    </div>
</div>
  </form>
</main>

{{-- <script>
    const checkoutRoute = @json(route("checkout.show"));
</script> --}}

<x-footer :js-file="'resources/js/guest/cart.js'"/>