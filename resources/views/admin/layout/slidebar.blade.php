<div class="border flex flex-col top-0 w-full h-screen bg-white text-14 overflow-y-scroll scrollbar-thin scroll-smooth scrollbar-thumb-rounded-lg scrollbar-thumb-blue-200 scrollbar-track-gray-100">
  <aside class="">
    <div class="flex bg-white border-b border-r-2 w-full items-center text-[18px] h-[40px] fixed">
      <div class="px-4 text-20  text-slate-405">
      <div class="ml-1">
          Trang Quản Trị
        </div>
      </div>
    </div>
    <ul class="mt-[50px] ml-1 text-14">
      <li class="w-full inline-block text-gray-500">
        <div class="cursor-pointer mb-4 border mx-2 rounded-xl 
        {{
          request()->is('admin/homepage')
             ? 'bg-pink-700 text-white'
             : ''
       }}">
          <a href="{{route('admin-homepage')}}" id="Statistics" class="hover:opacity-60 ml-2 py-2 rounded-sm block">
            <button class=" w-5 h-5 rounded-full">
              <i class="fa-solid fa-circle-dot text-16 hover:text-blue-400 mr-1"></i>
            </button>
            THỐNG KÊ
          </a>
        </div>
      </li>

      <li class="w-full inline-block text-gray-500">
        <div class="btn__slidebar cursor-pointer border mx-2 rounded-xl 
        {{
           request()->is('admin/categorybook')
              || request()->is('admin/book')
              || request()->is('admin/supplier')
              || request()->is('admin/nxb')
              ? 'bg-primary-blue text-white'
              : ''
        }}">
        
          <div class="hover:text-opacity-60 py-2 rounded-xl">
            <button class="icon__btn--slidebar w-5 h-5 rounded-full
            {{
               request()->is('admin/categorybook')
              || request()->is('admin/book')
              || request()->is('admin/supplier')
              || request()->is('admin/nxb')

              ? 'bg-primary-blue text-white'
              : ''
            }}">
        
              <i class="fa-solid fa-angle-right transform transition-all duration-200"></i>
            </button>
            SẢN PHẨM
          </div>
        </div>
        <div class="menu__slidebar flex flex-col ml-6 text-14 mt-1 mb-4 transform transition-all duration-200 overflow-hidden 
        {{
          request()->is('admin/categorybook')
          || request()->is('admin/book')
          || request()->is('admin/supplier')
          || request()->is('admin/nxb')
          ? ' max-h-screen' :
          'max-h-0'
        }}
        ">
          <a
            href="{{route('admin-categorybook')}}"
            class="transition-all hover:bg-slate-100 py-1 rounded-sm 
            {{      
              request()->is('admin/categorybook')
              
              ? ' text-primary-blue'
              : ''
            }}">
            <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1 "></i>
            Danh sách danh mục
          </a>
          <a
            href="{{route('admin-book')}}"
            class="transition-all hover:bg-slate-100 py-1 rounded-sm
            {{      
              request()->is('admin/book')
              
              ? ' text-primary-blue'
              : ''
            }}">
            <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
            Danh sách sách
          </a>
          <a
            href="{{route('admin-supplier')}}"
            class="transition-all hover:bg-slate-100 py-1 rounded-sm
            {{      
              request()->is('admin/supplier')
              
              ? ' text-primary-blue'
              : ''
            }}
            ">
            <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
            Danh sách nhà cung cấp
          </a>
          <a
            href="{{route('admin-nxb')}}"
            class="transition-all hover:bg-slate-100 py-1 rounded-sm
            {{      
              request()->is('admin/nxb')
              
              ? ' text-primary-blue'
              : ''
            }}
            ">
            <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
            Danh sách nhà xuất bản
          </a>
          <div class="btn__slidebar2 cursor-pointer">
          <div class="hover:bg-slate-200 py-1 rounded-sm">
            <button class="icon__btn--slidebar2 w-4 h-4 rounded-full hover:bg-primary-blue hover:text-white">
              <i class="fa-solid fa-angle-right flex items-center ml-[5px] transform transition-all duration-200 text-10"></i>
            </button>
            Tạo mới
          </div>
        </div>
          <div
            class="menu__slidebar2 flex flex-col ml-6 text-14 mt-1 transform transition-all duration-200 overflow-hidden ">
           
            <a
              href="{{route('admin-new-categorybook')}}"
              class="transition-all hover:bg-slate-100 py-1 rounded-sm "
            >
              <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
              Danh mục
            </a>
            <a
              href="{{route('admin-new-book')}}"
              class="transition-all hover:bg-slate-100 py-1 rounded-sm"
            >
              <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
              Sách
            </a>
            <a
              href="{{route('admin-new-supplier')}}"
              class="transition-all hover:bg-slate-100 py-1 rounded-sm"
            >
              <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
              Nhà Cung Cấp
            </a>
            <a
            href="{{route('admin-new-nxb')}}"
            class="transition-all hover:bg-slate-100 py-1 rounded-sm"
          >
            <i class="fa-solid fa-circle-dot text-10 text-primary-blue mr-1"></i>
            Nhà Xuất Bản
          </a>
          </div>
        </div>
      </li>

      <li class="w-full inline-block text-gray-500">
        <div class="btn__slidebar cursor-pointer border mx-2 rounded-xl 
        {{
          request()->is('admin/users')
          || request()->is('admin/new-user')
          ? ' bg-cyan-500 text-white' 
              : ''
        }}">
          <div class="hover:text-opacity-60 py-2 rounded-sm">
            <button class="icon__btn--slidebar w-5 h-5 rounded-full">
              <i class="fa-solid fa-angle-right transform transition-all duration-200"></i>
            </button>
            NGƯỜI DÙNG
          </div>
        </div>
        <div class="menu__slidebar flex flex-col ml-6 text-14 mt-1 mb-4 transform transition-all duration-200 overflow-hidden 
        {{
          request()->is('admin/users')
          || request()->is('admin/new-user')

          ? ' max-h-screen' :
          'max-h-0'
        }}
        ">
          <a
            href="{{route('admin-users')}}"
            class="transition-all hover:bg-slate-100 py-1 rounded-sm overflow-hidden
            {{      
              request()->is('admin/users')
              
              ? ' text-cyan-500'
              : ''
            }}
            ">
            <i class="fa-solid fa-circle-dot text-10 text-cyan-400 mr-1 hi"></i>
            Danh sách người dùng
          </a>
          <a
            href="{{route('admin-new-user')}}"
            class="transition-all hover:bg-slate-100 py-1 rounded-sm
            {{      
              request()->is('admin/new-user')
              
              ? ' text-cyan-500'
              : ''
            }} "
          >
            <i class="fa-solid fa-circle-dot text-10 text-cyan-400  mr-1"></i>
            Thêm người dùng mới
          </a>
        </div>
      </li>
      <li class="w-full inline-block text-gray-500">
        <div class="cursor-pointer mb-4 border mx-2 rounded-xl {{
          request()->is('admin/orders/10') ? 'bg-gray-500 text-white'
             : ''
        }}">
          <a href="{{route('admin-order')}}" class="hover:opacity-60 ml-2 py-2 rounded-sm block">
            <button class=" w-5 h-5 rounded-full">
              <i class="fa-solid fa-circle-dot text-16 mr-1"></i>
            </button>
            ĐƠN HÀNG 
          </a>
        </div>
      </li>

      <li class="w-full inline-block text-gray-500">
        <div class="cursor-pointer mb-4 border mx-2 rounded-xl first-letter: {{
          request()->is('admin/importwarehouse')
             ? 'bg-purple-500 text-white'
             : ''
       }}">
          <a href="{{route('admin-importwarehouse')}}" class="hover:opacity-60 ml-2 py-2 rounded-sm block">
            <button class=" w-5 h-5 rounded-full">
              <i class="fa-solid fa-circle-dot text-16 mr-1"></i>
            </button>
            KHO HÀNG
          </a>
        </div>
      </li>

    </ul>
  </aside>
</div>
