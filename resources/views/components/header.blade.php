<header class="max-w-[1360px] mx-auto flex items-center justify-between gap-8 text-14 px-16 py-3">
    {{-- Logo --}}
    <div class="">
      <img src="" alt="">
      {{-- <a href={{ route('home') }}>FashionShop</a> --}}
      <h2 class="text-32 font-pacifico text-primary-500">
        <a href={{ route('home') }}>
          <img class="max-w-[125px]" src="/storage/images/logo1.png" alt="">
        </a>
      </h2>
      
    </div>
    @csrf
    {{-- box menu --}}
    <div class="boxmenu ml-52 relative z-10">
      <img class="text-black w-8" src="/storage/images/admin/boxmenu.png" alt="">
      <!-- Menu dropdown -->
      <div class="menu-dropdown -ml-40 absolute mt-2 bg-white border rounded shadow-md hidden z-20 ">
        

        @foreach ($danhmuc as $category)
            <a href="{{ route('products.category', ['category' => $category->DM_Ma]) }}" class="px-6 py-3 text-22 hover:text-yellow-400 font-light text-gray-800 ">{{ $category->DM_Ten }}</a>
        @endforeach
          <a href="{{ route('products.language', ['language' => 'vietnamese']) }}" class="px-6 py-3 text-22 hover:text-yellow-400 font-light text-gray-800 ">Sách Tiếng Việt</a>
          <a href="{{ route('products.language', ['language' => 'english']) }}" class="px-6 py-3 text-22 hover:text-yellow-400 font-light text-gray-800 ">Sách Tiếng Anh</a>
          <a href="{{route('products')}}" class="text-22 hover:text-blue-400 hover:bg-gray-200 font-semibold">Xem tất cả...</a>
      </div>
    </div>
    {{-- Search --}}
    <div class="flex-auto border-gray-300 rounded-full relative transition-all duration-100 focus-within:border-purple-600">
        {{--  --}}
      <form action="{{ route('search-products') }}" method="GET">
        {{-- @csrf --}}
        <input name="key" type="text" placeholder="Nhập từ khóa tìm kiếm..." required class="w-full px-4 p-2 rounded-full  focus-within:border-purple-300">
        <button class="bg-gray-300 text-gray-500 h-[90%]  my-0.5 px-6 absolute right-0.5 rounded-full ">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>
    <div class="flex-1"></div>
  {{-- Login & Cart --}}
  <div class="flex items-center gap-8 text-black">
    {{-- Cart --}}
    <a href="/cart" class="relative">
      <i class="text-18 fa-solid fa-cart-shopping"></i>
      {{-- <span class="bg-red-500 text-white text-12 font-medium flex items-center justify-center absolute -top-2 -right-2 w-4 h-4 rounded-full">3</span> --}}
    </a>
    {{-- Login --}}
    @if (Auth::check())
    <div class="px-10 py-2 font-medium uppercase transition-all duration-300 hover:bg-gray-100 cursor-pointer relative group ">
      <span class="">{{Auth::user()->ND_Ten}}</span>
      <span class="absolute top-0 left-0 w-[50%] h-0.5 bg-primary-300 transition-all duration-300 group-hover:w-full"></span>
      <span class="absolute top-0 left-0 w-0.5 h-[50%] bg-primary-300 transition-all duration-300 group-hover:h-full"></span>
      <span class="absolute right-0 bottom-0 w-0.5 h-[50%] bg-primary-800 transition-all duration-300 group-hover:h-full"></span>
      <span class="absolute bottom-0 right-0 w-[50%] h-0.5 bg-primary-800 transition-all duration-300 group-hover:w-full"></span>
      <ul class="bg-white w-full absolute top-10 left-0 text-14 capitalize invisible opacity-0  group-hover:visible group-hover:opacity-100 transition-all duration-500 shadow-md">
        <li class="whitespace-nowrap border-b hover:bg-gray-100 hover:text-primary-300 transition-all duration-150">
          <a href="{{route('profile-customer',['id' => Auth::user()->ND_Ma])}}" class="p-2 block">Thông tin tài khoản</a>
        </li>
        <li class="whitespace-nowrap border-b hover:bg-gray-100 hover:text-primary-300 transition-all duration-150">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="p-2 block">Đăng xuất</button>
            </form>
          
        </li>
      </ul>
    </div>
    @else
    <a href="/login" class="px-6 py-2 font-medium uppercase transition-all duration-300 hover:bg-gray-100 relative group">
      <span class="">Đăng nhập</span>
      <span class="absolute top-0 left-0 w-[50%] h-0.5 bg-primary-300 transition-all duration-300 group-hover:w-full"></span>
      <span class="absolute top-0 left-0 w-0.5 h-[50%] bg-primary-300 transition-all duration-300 group-hover:h-full"></span>
      <span class="absolute right-0 bottom-0 w-0.5 h-[50%] bg-primary-800 transition-all duration-300 group-hover:h-full"></span>
      <span class="absolute bottom-0 right-0 w-[50%] h-0.5 bg-primary-800 transition-all duration-300 group-hover:w-full"></span>
    </a>
    @endif
  </div>
</header>
