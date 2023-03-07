<div class="flex justify-between border w-full select-none h-[60px] fixed bg-gradient-to-r from-blue-900 to-blue-100">
    <div class="w-14 h-14 pt-1 ml-12">
      <a href="{{route('admin-dashboard')}}">
        <img src="{{ URL::to('/images/logo.png') }}" alt="">
      </a>
    </div>
    <div class="">
      <div class="items-center pr-8 leading-[60px]">
        <div class="flex text-white">
            <div class="relative hover:opacity-80">
              <label class="absolute bg-red-500 leading-4 w-4 h-4 top-[26%] left-5 text-center rounded-[50%] text-12 text-white">5</label>
              <a href="" class="mx-4 ">
                <i class="fa-regular fa-bell mr-1"></i>
                <span>Thông báo</span>
              </a>
            </div>
            <div class="relative hover:opacity-80">
            <label class="absolute bg-red-500 leading-4 w-4 h-4 top-[26%] left-6 text-center rounded-[50%] text-12 text-white">3</label>
              <a href="" class="mx-4">
                <i class="fa-regular fa-envelope mr-1"></i>
                <span>Email</span>
              </a>
            </div>
          <div class="inline-block pl-10 text-white">
            <div class="inline-block hover:opacity-80">
                  <i class="fa-regular fa-circle-user cursor-pointer"></i>
                  <span  class="icon-dropdown cursor-pointer">
                    Tran Van Truong
                    <i  class="icon-menudropdown fa-solid fa-chevron-down fa-chevron-up select-none ml-1"></i>
                  </span>
            </div>
            {{-- <label class="mx-2 border"></label>
            <div class="inline-block ">
              <form action="{{route('admin-logout')}}" method="post">
                @csrf
                <button type="submit" class="hover:opacity-80">Đăng xuất</button>
              </form>
            </div> --}}
            <div class="menu-dropdown bg-white top-12 absolute hidden shadow-md text-blue-200 animate-fadeIn leading-[50px] z-10">
              <ul class="">
                <li class="hover:bg-slate-200 px-2 text-center border-b transform transition-all duration-300">
                  <form action="{{ route('admin-account')}}" method="post">
                    @csrf
                    <button type="submit" class="">
                      Quản lý tài khoản
                    </button>
                  </form ><li>
                <li class="hover:bg-slate-200 px-2 text-center border-b transform transition-all duration-300">
                  <form action="logout" method="post">
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