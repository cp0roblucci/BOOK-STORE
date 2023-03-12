<div class="grid grid-cols-3 gap-2 select-none pb-8">
  <div class="ml-12 leading-8">
      <div class="text-14 text-white"><span class="text-slate-300">Pages </span> / @yield('path')</div>
  </div>
    <div class="flex col-span-2 justify-between">
      @include('components.admin.form-input')
      <div class="items-center pr-8">
        <div class="flex text-white leading-8">
            <div class="relative hover:opacity-80">
              {{-- <label class="absolute bg-red-500 leading-4 w-4 h-4 top-2 left-5 text-center rounded-[50%] text-10 text-slate-200 cursor-pointer">5</label> --}}
              <a href="" class="mx-4 absolute top-1 -left-16">
                <lord-icon
                  src="https://cdn.lordicon.com/msetysan.json"
                  trigger="hover"
                  colors="primary:#ffffff"
                  style="width:18px;height:18px">
                </lord-icon>
              </a>
            </div>
          <div class="pl-4 text-white text-14">
            <div class="hover:opacity-80 icon-dropdown">
                  <i class="fa-solid fa-circle-user cursor-pointer"></i>
                  <span  class="icon-dropdown cursor-pointer px-2">
                    Tran Van Truong
                  </span>
            </div>
            {{-- <label class="mx-2 border"></label>
            <div class="inline-block ">
              <form action="{{route('admin-logout')}}" method="post">
                @csrf
                <button type="submit" class="hover:opacity-80">Đăng xuất</button>
              </form>
            </div> --}}
            <div class="menu-dropdown bg-slate-50 min-w-[130px] top-8 absolute hidden shadow-md text-blue-900 animate-fadeIn leading-[40px] rounded-sm z-10">
              <ul class="">
                <li class="hover:bg-slate-200 hover:rounded-sm px-2 text-center border-b transform transition-all duration-300">
                  <form action="{{ route('admin-profile')}}" method="post">
                    @csrf
                    <button type="submit" class="">
                      My Account
                    </button>
                  </form ><li>
                <li class="hover:bg-slate-200 hover:rounded-sm px-2 text-center transform transition-all duration-300">
                  <form action="{{ route('admin-logout')}}" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </div >
</div >