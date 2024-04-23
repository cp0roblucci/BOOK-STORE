@component('components.head', ['title' => 'Liên Hệ', 'manga_category' => $manga_category, 'danhmuc' => $danhmuc])
@endcomponent
<main class="max-w-[1000px] mx-auto px-16 my-10 mt-[137px] border rounded-md shadow-xl bg-white">
  <h1 class="text-[32px] uppercase font-san font-bold text-black mt-4 text-center ">Liên hệ cửa hàng</h1>
  <div class="grid grid-cols-2">

        <div class="w-full  mt-20">
            <div class="flex">
                <img class="w-20 flex h-20" src="/storage/images/admin/contact.jpg" alt="">
                <h2 class="ml-4 font-semibold">HOTLINE <span class="text-blue-300">0886152443</span></h2>
            </div>
            <div class="flex">
                <h3 class="mr-20 ml-24 -mt-14">Chăm sóc và hỗ trợ khách hàng hoạt động suốt 7 ngày trong tuần từ 7:30 - 20:00 mỗi ngày (riêng Chủ Nhật, ngày lễ đến 17:00)</h3 >
            </div>
            <div class="mt-14 flex">
                <img class="w-20 flex h-20" src="/storage/images/admin/email.png" alt="">
                <h2 class="ml-4 font-semibold">HỖ TRỢ QUA EMAIL</h2>
            </div>
            <div class="flex">
                <h3 class="mr-20 ml-24 -mt-14">Gửi email về để được hỗ trợ. Thời gian trả lời trung bình từ 16-24 giờ</h3 >
               
            </div>
            <div class="flex">
                <h3 class="mr-20 ml-24 font-pacifico text-26">Duyttbt@gmail.com</h3>
            </div>
            <div class="mt-14 flex">
                <img class="w-20 flex h-20 rounded-full" src="/storage/images/admin/fb.jpg" alt="">
                <h2 class="ml-4 font-semibold">HỖ TRỢ QUA FACEBOOK</h2>
            </div>
            <div class="flex">
                <h3 class="mr-20 ml-24 -mt-14">Gửi thông tin đến trang cá nhân <span class="font-san text-20">Võ Duy (Lucci)</span> được hỗ trợ. Thời gian trả lời trung bình từ 16-24 giờ</h3 >
               
            </div>
        </div>
        <div class="">
            <img class="ml-4" src="/storage/images/slide/sunnybn.png" alt="">
        </div>
  </div>
</main>

{{-- <script>
    const checkoutRoute = @json(route("checkout.show"));
</script> --}}

<x-footer :js-file="'resources/js/guest/cart.js'"/>