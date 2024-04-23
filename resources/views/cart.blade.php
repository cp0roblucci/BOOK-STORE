@component('components.head', ['title' => 'Giỏ hàng', 'manga_category' => $manga_category, 'danhmuc' => $danhmuc])
@endcomponent

<main class="max-w-[1360px] mx-auto px-16 my-10 mt-[137px]">
    <div class="max-w-[960px] mx-auto">
        <h1 class="pb-6 text-18 font-serif font-semibold uppercase">Giỏ Hàng</h1>
        <div id="error-message" class="text-red-600 hidden mb-2 border w-1/2 p-2 shadow-lg rounded-md">
            Vui lòng chọn ít nhất một sản phẩm để thanh toán
        </div>
        <div class="container">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        <div>
            <div class="grid grid-cols-12 gap-6 pb-2 text-gray-500 text-14 font-medium border-b">
                <span class="col-span-6">Sản phẩm</span>
                <span class="col-span-2">Đơn giá</span>
                <span class="col-span-2">Số lượng</span>
                <span class="col-span-2">Thành tiền</span>
            </div>

            @forelse($cart as $productId => $item)
                <div class="grid grid-cols-12 gap-6 items-center py-4 border-b" id="product-{{ $productId }}">
                    <div class="col-span-6 flex items-center gap-4">
                        <div>
                            <input type="checkbox" name="selectedProducts[]" class="checkboxItem" data-product-id= {{ $productId }}>
                        </div>
                        <img src="{{$item['image']}}" alt="img-product" class="w-24">
                        <div class="flex flex-col items-start text-14">
                            <span>{{ $item['name'] }}</span>
                            <a href="{{ route('cart.remove', ['id' => $productId]) }}" class="text-red-500 text-12 hover:underline">Xóa</a>
                        </div>
                    </div>

                    <div class="dongia col-span-2 font-semibold">{{number_format($item['price'], 0, ',', '.')}}đ</div>
                    <div class="col-span-2 flex items-center">
                        <button 
                          class="decrease flex items-center px-[6px] py-[5px] border rounded-full group" data-product-id="{{ $productId }}"
                          
                        >
                          <i class="fa fa-minus text-12 font-bold group-active:scale-125"></i>
                        </button>
                        <span class="quantity px-4">{{$item['quantity']}}</span>
                        <button 
                          class="increase flex items-center px-[6px] py-[5px] border rounded-full group" data-product-id="{{ $productId }}"
                         
                        >
                          <i class="fa fa-plus text-12 font-black group-active:scale-125"></i>
                        </button>
                      </div>

                    <div class="thanhtien col-span-2 font-semibold" data-product-price="{{ $item['quantity'] * $item['price']}}">
                        {{ number_format($item['quantity'] * $item['price'], 0, ',', '.') }}đ
                    </div>
                </div>
            @empty
                <p>Giỏ hàng của bạn trống.</p>
            @endforelse

            <div class="flex flex-col items-end gap-4 my-6" >
                <p>Tổng tiền: <span class="totalPrice font-bold">{{number_format($totalPrice, 0, ',', '.')}}đ</span></p>
                <button id="payment"
                    class="text-primary-600 text-20 font-semibold uppercase px-8 py-2 border-2 border-primary-600 rounded-lg transition-all duration-500 hover:bg-primary-600 hover:text-white" onclick="redirectToCheckout()">Thanh
                    toán</button>
            </div>
        </div>
    </div>
</main>

<script>
    function redirectToCheckout() {
    // Lấy danh sách sản phẩm được chọn
    const selectedProducts = document.querySelectorAll('.checkboxItem:checked');
    const selectedProductIds = Array.from(selectedProducts).map(product => product.dataset.productId);

    // Kiểm tra xem có ít nhất một sản phẩm được chọn không
    if (selectedProductIds.length === 0) {
        // Hiển thị thông báo lỗi và ngăn chặn chuyển hướng
        document.getElementById('error-message').classList.remove('hidden');
        return;
    }

    // Gửi danh sách sản phẩm được chọn đến route checkout
    axios.post('/cart/checkout', { selectedProducts: selectedProductIds })
        .then(response => {
            // Chuyển hướng đến trang thanh toán
            window.location.href = '{{ route('checkout.index') }}';
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
</script>
<x-footer :js-file="'resources/js/guest/cart.js'"/>