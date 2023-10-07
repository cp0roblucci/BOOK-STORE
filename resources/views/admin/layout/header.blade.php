<div class="select-none items-center ml-2 mr-6 py-2.5">

    <div class="flex items-center justify-between">
      <div class="">
        <div class="text-14 text-slate-400"><span class="text-slate-300">Trang </span> / @yield('path')</div>
      </div>
      <div class="items-center">
        <div class="flex text-slate-500">
            {{-- <div class="relative hover:opacity-80">
              <a href="" class="mx-4 absolute -left-10 p-1">
                <lord-icon
                  src="https://cdn.lordicon.com/psnhyobz.json"
                  trigger="hover"
                  colors="primary:#848484"
                  style="width:18px;height:18px">
                </lord-icon>
              </a> --}}
            </div>
          <div class="pl-4 text-[#848484] text-14">
            <div class="flex hover:opacity-80 icon-dropdown">
              {{-- @if (Auth::check())
                <div class="w-6 h-6">
                  {{-- <img src="{{Auth::user()->link_avt}}" alt=""> --}}
                  {{-- <img
                    src="{{ Auth::user()->link_avt != null ?  Auth::user()->link_avt : URL::to('/images/admin/avatar-default.png')}}"
                    alt="avatar"
                    class="w-full h-full rounded-full"
                  >
                </div> --}}
              {{-- @else --}} 
                <i class="fa-solid fa-circle-user cursor-pointer text-20"></i>
              {{-- @endif --}}
              <span  class="icon-dropdown cursor-pointer px-2">
                {{-- {{ Auth::user()->last_name . ' ' . Auth::user()->first_name}} --}}Vo Duc Duy
              </span>
            </div>
  
            <div class="menu-dropdown bg-slate-50 min-w-[116px] top-8 right-6 absolute hidden shadow-md text-blue-900 animate-topToBottom leading-[40px] rounded-sm z-10 mt-2">
              <ul class="">
                <li class="hover:bg-slate-200 hover:rounded-sm px-2 text-center border-b transform transition-all duration-300">
                    {{-- <a href="{{ route('admin-profile') }}" type="submit" class=""> --}}
                    <a href="" type="submit" class="text-black"> 
                      Tài khoản của tôi
                    </a>
                  </form >
                </li>
                <li class="hover:bg-slate-200 hover:rounded-sm px-2 text-center transform transition-all duration-300">
                  {{-- <form action="{{ route('admin-logout')}}" method="post">   --}}
                  <form action="" method="post">
                      @csrf
                    <button type="submit">Đăng xuất</button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div >
  </div >
  