<footer class="text-14">
    <div class=" text-black p-8 grid grid-cols-4 gap-10 mx-28 border border-top-1 rounded-t-xl shadow-2xl ">
      {{-- info shop --}}
      <div class="">
        <h4 class="uppercase mb-2 font-bold">Sunny Book Store</h4>
        <div class="">
          <span>Địa chỉ: </span><span>Ninh Kiều, Cần Thơ</span>
        </div>
        <div class="">
          <span>Số điện thoại: </span><span>0886152443</span>
        </div>
        <div class="">
          <span>Email: </span><span>sunnybookstore@gmail.com</span>
        </div>
      </div>
      {{-- About shop --}}
      <div class="">
        <h4 class="uppercase pb-2 font-bold">Thông tin</h4>
        <ul class="text-black">
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Về chúng tôi</a></li>
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Thông tin giao hàng</a></li>
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Thông tin bảo mật</a></li>
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Điều khoản & Điều kiện</a></li>
        </ul>
      </div>
      {{-- Contact shop --}}
        
      <div class="">
        <h4 class="uppercase pb-2 font-bold">Đăng ký nhận thông báo</h4>
        <p class="">Đăng ký email để nhanh chóng nhận được thông tin về các sản phẩm mới và chương trình khuyến mãi của chúng tôi</p>
        <div class="my-2 -mx-3">
          <form action="" method="" class="flex">
            <input type="email" placeholder="Nhập email..." required class="p-2 text-gray-700 rounded-l-lg">
            <button class="bg-black text-white px-2 uppercase rounded-r-lg transition-all duration-200 hover:bg-primary-400">Đăng ký</button>
          </form>
        </div>
      </div>
      
      {{-- Support --}}
      <div class="ml-10">
        <h4 class="uppercase pb-2 font-bold">Tài khoản của tôi</h4>
        <ul class="text-black">
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Đăng nhập/Tạo mới tài khoản</a></li>
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Thay đổi thông tin người dùng</a></li>
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Chi tiết tài khoản</a></li>
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Lịch sử mua hàng</a></li>
        </ul>
      </div>
    </div> 
    <div class=" text-black text-12 py-1 flex justify-center gap-2 mx-28 bg-white shadow-2xl">
      <p>© Bản quyền thuộc về Sunny Book Store</p>
      <span>-</span>
      <p> Make by ❤️ Sunny Book Store </p>
    </div>
  </footer>

  
  @if ($jsFile)
        @vite($jsFile)
  @endif
</body>

</html>