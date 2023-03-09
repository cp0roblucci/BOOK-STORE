<div class="border border-slate-300 h-[94%] py-2 fixed w-[19%] bg-slate-100 rounded-2xl text-14 shadow-md">
  <aside class="mx-4">
    <ul class="">
      <li class="border-b w-full inline-block text-[18px] py-2">
        <div class="px-4 relative before:content-[''] before:absolute before:bottom-0 before:bg-blue-900 before:w-0 before:transition-all before:duration-500  before:hover:w-[100%] before:left-0 before:hover:left-0 before:h-0.5 cursor-pointer
        {{ request()->is('admin/dashboard') ? 'bg-slate-200' : ''}} py-2 px-2 rounded-[20px]">
        <a href="{{ route('admin-dashboard')}}" class="flex">
          <img src="{{ URL::to('/images/admin/dashboard.png')}}" alt="" class="w-8 h-8 mr-2">
            Dashboard
          </a>
        </div>
      </li>
      <li class="w-full inline-block py-2 text-gray-500">
        <div class="px-2 relative before:content-[''] before:absolute before:bottom-0 before:bg-blue-900 before:w-0 before:transition-all before:duration-500  before:hover:w-[100%] before:left-0 before:hover:left-0 before:h-0.5 cursor-pointer
        {{ request()->is('admin/categories') ? 'bg-slate-200 text-black`' : ''}} py-2 rounded-[20px]">
          <a href="{{route('admin-categories')}}" class="flex">
            <img src="{{ URL::to('/images/admin/categories.png')}}" alt="" class="w-6 h-6 mr-2">
            Categories management
          </a>
        </div>
      </li>

      <li class="texborder-b w-full inline-block py-2 text-gray-500">
        <div class="px-2 relative before:content-[''] before:absolute before:bottom-0 before:bg-blue-900 before:w-0 before:transition-all before:duration-500  before:hover:w-[100%] before:left-0 before:hover:left-0 before:h-0.5 cursor-pointer
        {{ request()->is('admin/products') ? 'bg-slate-200 text-black' : ''}} py-2 rounded-[20px]">
          <a href="{{route('admin-product')}}" class="flex">
            <img src="{{ URL::to('/images/admin/fish-icon.png')}}" alt="" class="w-6 h-6 mr-2">
            Products Management
          </a>
        </div>
      </li>

      <li class="w-full inline-block py-2 text-gray-500">
        <div class="px-2 relative before:content-[''] before:absolute before:bottom-0 before:bg-blue-900 before:w-0 before:transition-all before:duration-500 before:hover:w-[100%] before:left-0 before:hover:left-0 before:h-0.5 cursor-pointer
        {{ request()->is('admin/users') ? 'bg-slate-200 text-black' : ''}} py-2 rounded-[20px]">
          <a href="{{route('admin-index')}}" class="flex">
            <img src="{{ URL::to('/images/admin/user-icon.png')}}" alt="" class="w-6 h-6 mr-2">
            Users Management
          </a>
        </div>
      </li>

      <li class="w-full inline-block py-2 text-gray-500">
        <div class="px-2 relative before:content-[''] before:absolute before:bottom-0 before:bg-blue-900 before:w-0 before:transition-all before:duration-500 before:hover:w-[100%] before:left-0 before:hover:left-0 before:h-0.5 cursor-pointer
        {{ request()->is('admin/orders') ? 'bg-slate-200 text-black' : ''}} py-2 rounded-[20px]">
          <a href="{{ route('admin-order')}}" class="flex">
            <img src="{{ URL::to('/images/admin/bag.png')}}" alt="" class="w-6 h-6 mr-2">
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