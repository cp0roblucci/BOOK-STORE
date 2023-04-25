<div class="border flex flex-col top-0 w-full h-screen bg-white text-14 overflow-y-scroll scrollbar-thin scroll-smooth scrollbar-thumb-rounded-lg scrollbar-thumb-blue-200 scrollbar-track-gray-100">
  <aside class="">
    <div class="flex bg-white border-b border-r-2 w-full items-center text-[18px] h-[40px] fixed">
      <div class="px-4 text-20 font-sora text-slate-405">
      <div class="ml-1">
          Trang Quản Trị
        </div>
      </div>
    </div>
    <ul class="mt-[50px] ml-1 text-14">
      <li class="w-full inline-block text-gray-500">
        <div class="cursor-pointer mb-4 border mx-2 rounded-xl
        {{ request()->is('admin/dashboard') ? 'bg-primary-purple text-white' : ''}}">
          <a href="{{ route('admin-dashboard')}}" id="Statistics" class="hover:opacity-60 ml-2 py-1 rounded-sm block">
            <button class=" w-5 h-5 rounded-full">
              <i class="fa-solid fa-circle-dot text-14 {{ request()->is('admin/dashboard') ? 'text-white' : 'text-slate-400' }} mr-1"></i>
            </button>
            Thống Kê
          </a>
        </div>
      </li>

      <li class="w-full inline-block text-gray-500">
        <div class="btn__slidebar cursor-pointer border mx-2 rounded-xl
        {{
          request()->is('admin/fish')
          || request()->is('admin/accessories')
          || request()->is('admin/list-price')
          || request()->is('admin/store')
          || request()->is('admin/search-price-fish')
          || request()->is('admin/search-fish')
          || request()->is('admin/fish/*/edit')
          || request()->is('admin/search-quantity')
          || request()->is('admin/search-accessories')
          || request()->is('admin/create-new-fish')
          || request()->is('admin/create-new-species')
          || request()->is('admin/create-new-accessories-type')
          || request()->is('admin/create-new-accessory')
          ? 'bg-primary-blue text-white'
          : ''
        }}">
          <div class="hover:text-opacity-60 py-1 rounded-xl">
            <button class="icon__btn--slidebar w-5 h-5 rounded-full
          {{
              request()->is('admin/fish')
              || request()->is('admin/accessories')
              || request()->is('admin/accessories/*/edit')
              || request()->is('admin/search-accessories')
              || request()->is('admin/list-price')
              || request()->is('admin/store')
              || request()->is('admin/search-price-fish')
              || request()->is('admin/search-fish')
              || request()->is('admin/fish/*/edit')
              || request()->is('admin/search-quantity')
              || request()->is('admin/create-new-fish')
              || request()->is('admin/create-new-species')
              || request()->is('admin/create-new-accessories-type')
              || request()->is('admin/create-new-accessory')
              ? 'bg-primary-blue text-white'
              : ''
            }}">
              <i class="fa-solid fa-angle-right transform transition-all duration-200"></i>
            </button>
            Sản Phẩm
          </div>
        </div>
        <div class="menu__slidebar flex flex-col ml-6 text-14 mt-1 mb-4 transform transition-all duration-200 overflow-hidden
        {{
          request()->is('admin/fish')
          || request()->is('admin/accessories')
          || request()->is('admin/accessories/*/edit')
          || request()->is('admin/search-accessories')
          || request()->is('admin/list-price')
          || request()->is('admin/store')
          || request()->is('admin/search-price-fish')
          || request()->is('admin/search-fish')
          || request()->is('admin/fish/*/edit')
          || request()->is('admin/search-quantity')
          || request()->is('admin/create-new-fish')
          || request()->is('admin/create-new-species')
          || request()->is('admin/create-new-accessories-type')
          || request()->is('admin/create-new-accessory')
          ? ' max-h-screen' :
          'max-h-0'
        }}">
          <a
            href="{{route('admin-accessories')}}"
            class="transition-all hover:bg-slate-100 py-1 rounded-sm
            {{
              request()->is('admin/accessories')
              || request()->is('admin/search-accessories')
              || request()->is('admin/accessories/*/edit')
              ? ' text-primary-blue'
              : ''
            }}"
          >
            <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
            Danh sách phụ kiện
          </a>
          <a
            href="{{route('admin-fish')}}"
            class="transition-all hover:bg-slate-100 py-1 rounded-sm
            {{ request()->is('admin/fish') || request()->is('admin/search-fish') || request()->is('admin/fish/*/edit')
  ? ' text-primary-blue' : ''}}"
          >
            <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
            Danh sách cá
          </a>
          <a
            href="{{route('admin-list-price')}}"
            class="transition-all hover:bg-slate-100 py-1 rounded-sm
            {{ request()->is('admin/list-price') || request()->is('admin/search-price-fish')  ? ' text-primary-blue' : ''}}"
          >
            <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
            Bảng giá Cá
          </a>
          <a
            href="{{route('admin-store')}}"
            class="transition-all hover:bg-slate-100 py-1 rounded-sm
            {{  request()->is('admin/store') || request()->is('admin/search-quantity')  ? ' text-primary-blue' : ''}}"
          >
            <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
            Kho Hàng
          </a>
          <div class="btn__slidebar2 cursor-pointer
            {{
              request()->is('admin/create-new-fish')
              || request()->is('admin/create-new-species')
              || request()->is('admin/create-new-accessories-type')
              ||request()->is('admin/create-new-accessory')
              ? ' text-primary-blue'
              : ''
            }}">
          <div class="hover:bg-slate-200 py-1 rounded-sm">
            <button class="icon__btn--slidebar2 w-4 h-4 rounded-full hover:bg-primary-blue hover:text-white
            {{
              request()->is('admin/create-new-fish')
              || request()->is('admin/create-new-species')
              || request()->is('admin/create-new-accessories-type')
              || request()->is('admin/create-new-accessory')
              ? 'bg-primary-blue text-white'
              : ''
            }}">
              <i class="fa-solid fa-angle-right flex items-center ml-[5px] transform transition-all duration-200 text-10"></i>
            </button>
            Tạo mới
          </div>
        </div>
          <div
            class="menu__slidebar2 flex flex-col ml-6 text-14 mt-1 transform transition-all duration-200 overflow-hidden
            {{
              request()->is('admin/create-new-fish')
              || request()->is('admin/create-new-species')
              || request()->is('admin/create-new-accessories-type')
              ||request()->is('admin/create-new-accessory')
              ? 'max-h-screen'
              : 'max-h-0'
            }}"
          >
            <a
              href="{{route('new-accessories-type')}}"
              class="transition-all hover:bg-slate-100 py-1 rounded-sm
              {{ request()->is('admin/create-new-accessories-type') ? 'text-primary-blue' : '' }}"
            >
              <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
              Loại phụ kiện
            </a>
            <a
              href="{{route('new-accessory')}}"
              class="transition-all hover:bg-slate-100 py-1 rounded-sm
              {{ request()->is('admin/create-new-accessory') ? 'text-primary-blue' : '' }}"
            >
              <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
              Phụ kiện
            </a>
            <a
              href="{{route('new-fish')}}"
              class="transition-all hover:bg-slate-100 py-1 rounded-sm
              {{ request()->is('admin/create-new-fish') ? 'text-primary-blue' : '' }}"
            >
              <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
              Cá
            </a>
            <a
              href="{{ route('new-species') }}"
              class="transition-all hover:bg-slate-100 py-1 rounded-sm
              {{ request()->is('admin/create-new-species') ? 'text-primary-blue' : '' }}"
            >
              <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
              Loài
            </a>
          </div>
        </div>
      </li>

      <li class="w-full inline-block text-gray-500">
        <div class="btn__slidebar cursor-pointer border mx-2 rounded-xl
        {{
          request()->is('admin/users')
          || request()->is('admin/create-new-user')
          || request()->is('admin/search-user')
          || request()->is('admin/users/*/edit')
          ? 'bg-primary-purple text-white'
          : ''
        }}">
          <div class="hover:text-opacity-60 py-1 rounded-sm">
            <button class="icon__btn--slidebar w-5 h-5 rounded-full
            {{
              request()->is('admin/users')
              || request()->is('admin/create-new-user')
              || request()->is('admin/search-user')
              || request()->is('admin/users/*/edit')
              ? 'bg-primary-purple text-white'
              : ''
            }}">
              <i class="fa-solid fa-angle-right transform transition-all duration-200"></i>
            </button>
            Người Dùng
          </div>
        </div>
        <div class="menu__slidebar flex flex-col ml-6 text-14 mt-1 mb-4 transform transition-all duration-200 overflow-hidden
        {{
          request()->is('admin/users')
          || request()->is('admin/create-new-user')
          || request()->is('admin/search-user')
          || request()->is('admin/users/*/edit')
          ? 'max-h-screen'
          : 'max-h-0'
        }}">
          <a
            href="{{route('admin-users')}}"
            class="transition-all hover:bg-slate-100 py-1 rounded-sm
            {{ request()->is('admin/users') ? 'text-primary-purple' : '' }}"
          >
            <i class="fa-solid fa-circle-dot text-10 text-primary-purple mr-1"></i>
            Danh sách người dùng
          </a>
          <a
            href="{{route('new-user')}}"
            class="transition-all hover:bg-slate-100 py-1 rounded-sm
            {{ request()->is('admin/create-new-user') ? 'text-primary-purple' : '' }}"
          >
            <i class="fa-solid fa-circle-dot text-10 text-primary-purple mr-1"></i>
            Thêm người dùng mới
          </a>
        </div>
      </li>

      <li class="w-full inline-block text-gray-500">
        <div class="cursor-pointer mb-4 border mx-2 rounded-xl
        {{ request()->is('admin/orders/*') || request()->is('admin/order-detail/*') ? 'bg-primary-blue text-white' : ''}}">
          <a href="{{ route('admin-orders')}}" class="hover:opacity-60 ml-2 py-1 rounded-sm block">
            <button class=" w-5 h-5 rounded-full">
              <i class="fa-solid fa-circle-dot text-14 {{ request()->is('admin/orders/*') || request()->is('admin/order-detail/*') ? 'text-white' : 'text-slate-400' }} mr-1"></i>
            </button>
            Đơn Hàng
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
