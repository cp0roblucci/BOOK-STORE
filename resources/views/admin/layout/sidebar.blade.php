<div class="border border-slate-300 h-full mt-[68px] fixed w-[19%]">
  <aside class="pt-4 mx-4">
    <ul>
      <li class="border-b w-full inline-block text-[18px] font-bold py-2">
        <div class="inline-block relative before:content-[''] before:absolute before:bottom-0 before:bg-blue-900 before:w-0 before:transition-all before:duration-500  before:hover:w-[100%] before:left-0 before:hover:left-0 before:h-0.5 cursor-pointer
        {{ request()->is('admin/dashboard') ? 'bg-slate-200' : ''}} py-2 px-2 rounded-[20px]">
        <a href="{{ route('admin-dashboard')}}">
            <i class="fa-solid fa-house text-blue-500 pr-2"></i>
            Bảng Điều Khiển
          </a>
        </div>
      </li>
      <li class="border-b w-full inline-block py-4">
        <div class="inline-block relative before:content-[''] before:absolute before:bottom-0 before:bg-blue-900 before:w-0 before:transition-all before:duration-500  before:hover:w-[100%] before:left-0 before:hover:left-0 before:h-0.5 cursor-pointer
        {{ request()->is('admin/') ? 'bg-slate-200' : ''}} py-2 px-2 rounded-[20px]">
          <a href="">
            <i class="fa-solid fa-bars text-orange-500 pr-2"></i>
            Quản lý Danh Mục
          </a>
        </div>
      </li>

      <li class="border-b texborder-b w-full inline-block py-4">
        <div class="inline-block relative before:content-[''] before:absolute before:bottom-0 before:bg-blue-900 before:w-0 before:transition-all before:duration-500  before:hover:w-[100%] before:left-0 before:hover:left-0 before:h-0.5 cursor-pointer
        {{ request()->is('admin/products') ? 'bg-slate-200' : ''}} py-2 px-2 rounded-[20px]">
          <a href="{{route('admin-product')}}">
            <i class="fa-brands fa-product-hunt text-blue-500 pr-2"></i>
            Quản lý Sản Phẩm
          </a>
        </div>
      </li>

      <li class="border-b w-full inline-block py-4">
        <div class="inline-block relative before:content-[''] before:absolute before:bottom-0 before:bg-blue-900 before:w-0 before:transition-all before:duration-500 before:hover:w-[100%] before:left-0 before:hover:left-0 before:h-0.5 cursor-pointer
        {{ request()->is('admin/users') ? 'bg-slate-200' : ''}} py-2 px-2 rounded-[20px]">
          <a href="{{route('admin-index')}}">
            <i class="fa-solid fa-user text-purple-500 pr-2"></i>
            Quản lý Tài Khoản
          </a>
        </div>
      </li>

      <li class="border-b w-full inline-block py-4">
        <div class="inline-block relative before:content-[''] before:absolute before:bottom-0 before:bg-blue-900 before:w-0 before:transition-all before:duration-500 before:hover:w-[100%] before:left-0 before:hover:left-0 before:h-0.5 cursor-pointer
        {{ request()->is('admin/orders') ? 'bg-slate-200' : ''}} py-2 px-2 rounded-[20px]">
          <a href="{{ route('admin-order')}}">
            <i class="fa-solid fa-bag-shopping pr-2 text-orange-500"></i>
            Quản lý Đơn Hàng
          </a>
        </div>
      </li>

      {{-- <li class=" w-full inline-block py-4 relative border-b">
          <div class="click_dropdown-sidebar inline-block relative before:content-[''] before:absolute before:bottom-0 before:bg-blue-900 before:w-0 before:transition-all before:duration-500  before:hover:w-[100%] before:left-0 before:hover:left-0 before:h-0.5 cursor-pointer
          {{ request()->is('admin/') ? 'bg-slate-200' : ''}} py-2 px-2 rounded-[20px]">
            <span class="click_dropdown-sidebar-span">
              <i class="fa-solid fa-person-military-pointing text-green-500 pr-2"></i>
              Chăm sóc khách Hàng
            </span>
          </div>
        <div class="dropdown__siderbar animate-fadeIn hidden ml-8">
          <ul class="">
            <li class="hover:bg-slate-200 px-4 py-1 border-b">
              <a href="">Phản hồi</a>
              <li>
            <li class="hover:bg-slate-200 px-4 py-1 border-b">
              <a href="">Duyệt đơn hàng</a>
            </li>
          </ul>
        </div>
      </li> --}}
      
    </ul>
  </aside>
</div>