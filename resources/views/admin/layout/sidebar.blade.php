<div class="border flex flex-col top-0 w-full h-screen py-2 bg-white text-14">
  <aside class="">
    <div class="flex border-b w-full items-center text-[18px] h-[32px]">
      <div class="px-4 text-20 font-sora text-slate-405">
      <a href="{{ route('admin-dashboard')}}" class=" ml-2">
          Dashboard
        </a>
      </div>
    </div>
    <ul class="ml-4 mt-2">
      <li class="w-full inline-block py-4 text-gray-500">
        <div class="px-2 cursor-pointer
        {{ request()->is('admin/categories') ? 'text-blue-200' : ''}}">
          <a href="{{route('admin-categories')}}">
            Categories management
          </a>
        </div>
      </li>

      <li class="texborder-b w-full inline-block py-4 text-gray-500">
        <div class="px-2 cursor-pointer
        {{ request()->is('admin/products') ? ' text-blue-200' : ''}}">
          <a href="{{route('admin-product')}}">
            Products Management
          </a>
        </div>
      </li>

      <li class="w-full inline-block py-4 text-gray-500">
        <div class="px-2 cursor-pointer
        {{ request()->is('admin/users') ? 'text-blue-200' : ''}}">
          <a href="{{route('admin-index')}}">
            Users Management
          </a>
        </div>
      </li>

      <li class="w-full inline-block py-4 text-gray-500">
        <div class="px-2 cursor-pointer
        {{ request()->is('admin/orders') ? 'text-blue-200' : ''}} ">
          <a href="{{ route('admin-order')}}">
            Orders Management
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