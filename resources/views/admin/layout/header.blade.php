<div class="select-none items-center ml-2 mr-6 py-2.5">

  <div class="flex items-center justify-between">
    <div class="">
      <div class="text-14 text-slate-400"><span class="text-slate-300">Trang </span> / @yield('path')</div>
    </div>
    <div class="items-center">
      <div class="flex text-slate-500">
          
        <div class="pl-4 text-[#848484] text-14">
          <div class="flex icon-dropdown ">
            <div class="w-7 h-7 mr-2 mt-1">
              {{-- <img src="{{Auth::user()->link_avt}}" alt=""> --}}
              <img
                src="{{ Auth::user()->ND_avt!= null ?  Auth::user()->ND_avt : URL::to('/images/admin/user_default.png')}}"
                alt="avatar"
                class="w-full h-full rounded-full "
              >
            </div>
            @if (Auth::check())
              <div class="px-6 py-2 font-medium uppercase transition-all duration-300  cursor-pointer relative group ">
                <span class="">{{Auth::user()->ND_Ten}}</span>
                <span class="absolute top-0 left-0 w-[50%] h-0.5 bg-primary-300 transition-all duration-300 group-hover:w-full"></span>
                <span class="absolute top-0 left-0 w-0.5 h-[50%] bg-primary-300 transition-all duration-300 group-hover:h-full"></span>
                <span class="absolute right-0 bottom-0 w-0.5 h-[50%] bg-primary-800 transition-all duration-300 group-hover:h-full"></span>
                <span class="absolute bottom-0 right-0 w-[50%] h-0.5 bg-primary-800 transition-all duration-300 group-hover:w-full"></span>
                <ul class="bg-white w-full absolute top-10 left-0 text-14 capitalize invisible opacity-0  group-hover:visible group-hover:opacity-100 transition-all duration-500 shadow-md">
                  <li class="whitespace-nowrap border-b hover:bg-gray-100 hover:text-primary-300 transition-all duration-150">
                    <a href="{{route('profile-users',['id' => Auth::user()->ND_Ma])}}" class="p-2 block">Thông tin tài khoản</a>
                  </li>
                  <li class="whitespace-nowrap border-b hover:bg-gray-100 hover:text-primary-300 transition-all duration-150">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="p-2 block">Đăng xuất</button>
                    </form>
                </li>
                </ul>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div >
</div >
