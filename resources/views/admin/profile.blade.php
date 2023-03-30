@extends('admin.layout.mainprofile')

{{-- set title --}}
@section('title', 'DashBoard')
@section('path', 'Profile')
{{--
@section('sidebar')
  @include('admin.layout.sidebar')
@endsection --}}

@section('content')
  <div class="mb-2">
    <div class="flex justify-between select-none items-center ml-2 mr-6 py-2">

      <div class="">
        <div class="text-14 text-slate-400"><span class="text-slate-300">Pages </span> / @yield('path')</div>
      </div>

{{--      <div class="flex col-span-2 items-center justify-between">--}}
{{--        <div class="w-[60%] leading-8 pl-4 bg-white opacity-60 rounded-md border-[1.5px] focus-within:border-[1.5px] focus-within:border-blue-500">--}}
{{--          <form action="" method="post" class="flex justify-between relative">--}}
{{--            @csrf--}}
{{--            <input type="text" placeholder="Search..." name="users-search" class="caret-blue-500 rounded-md outline-none w-full bg-white opacity-60" required>--}}
{{--              <button type="submit" class="inline-block top-1.5 absolute right-4">--}}
{{--                --}}{{-- <i class="fa-solid fa-magnifying-glass text-slate-500"></i> --}}
{{--                <lord-icon--}}
{{--                  src="https://cdn.lordicon.com/zniqnylq.json"--}}
{{--                  trigger="click"--}}
{{--                  style="width:24px;height:24px">--}}
{{--              </lord-icon>--}}
{{--              </button>--}}
{{--          </form>--}}
{{--        </div>--}}
        <div class="items-center">
          <div class="flex text-slate-500">
              <div class="relative hover:opacity-80">
                {{-- <label class="absolute bg-red-500 leading-4 w-4 h-4 top-2 left-5 text-center rounded-[50%] text-10 text-slate-200 cursor-pointer">5</label> --}}
{{--                 animation notifycation--}}
                <span class="absolute inline w-2 h-2 -left-3 rounded-full bg-blue-500"></span>
                <span class="absolute inline w-2 h-2 -left-3 rounded-full animate-ping bg-blue-500"></span>

                  <a href="" class="mx-4 absolute -top-1 -left-10 p-1">
                    <lord-icon
                      src="https://cdn.lordicon.com/psnhyobz.json"
                      trigger="hover"
                      colors="primary:#848484"
                      style="width:18px;height:18px">
                    </lord-icon>
                  </a>
              </div>
            <div class="pl-4 text-[#848484] text-14">
              <div class="hover:opacity-80 flex items-center icon-dropdown">
                @if(!Auth::check())
                  <i class="fa-solid fa-circle-user cursor-pointer"></i>
                @else
                  <div class="rounded-md">
                    <img src="{{ Auth::user()->link_avt != null ? Auth::user()->link_avt : URL::to('/images/admin/avatar-default.png') }}" alt="avatar" class="w-[18px] h-[18px] rounded-md">
                  </div>
                @endif
                <span  class="icon-dropdown cursor-pointer px-2">
                  {{ Auth::user()->last_name . ' ' . Auth::user()->first_name }}
                </span>
              </div>
              {{-- <label class="mx-2 border"></label>
              <div class="inline-block ">
                <form action="{{route('admin-logout')}}" method="post">
                  @csrf
                  <button type="submit" class="hover:opacity-80">Đăng xuất</button>
                </form>
              </div> --}}

              <div class="menu-dropdown bg-slate-50 min-w-[130px] top-10 absolute hidden shadow-md text-blue-900 animate-topToBottom leading-[40px] rounded-sm z-10">
                <ul class="">
                  <li class="hover:bg-slate-200 hover:rounded-sm px-2 text-center border-b transform transition-all duration-300">
                      <a href="{{ route('admin-profile') }}" type="submit" class="">
                        My Account
                      </a>
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
    <div class="mt-6">
      <a href="/admin/dashboard" class="px-4 py-2 border rounded-full text-white">DashBoard</a>
    </div>
    <div class="mt-[60px]">

      <div class="backdrop-blur-xl flex justify-between items-center mb-6 p-4 rounded-md shadow-md">
        <div class="flex">
          <div class="rounded-md relative">
            <img src="{{ Auth::user()->link_avt }}" alt="avatar" class="w-20 h-20 rounded-md border border-white">
{{--            <a href="" class="absolute -bottom-3 -right-3 text-white py-1 px-2 bg-slate-400 rounded-full">--}}
{{--              <i class="fa-solid fa-camera"></i>--}}
{{--            </a>--}}
          </div>
          <div class="ml-6 items-center py-2">
            <h3 class="text-20 text-white font-sora mb-1">{{ Auth::user()->last_name . ' ' . Auth::user()->first_name}}</h3>
            <span class="text-white">Admin</span>
          </div>
        </div>
        <div class="relative hover:opacity-60 mr-10 text-slate-500">
          {{-- <label class="absolute bg-red-500 leading-4 w-[14px] h-[14px] top-1 left-6 text-center rounded-[50%] text-10 text-slate-200 cursor-pointer">3</label> --}}
            <a href="" class="mx-4 text-24 text-white">
              <i class="fa-solid fa-envelope mr-1"></i>
              <span>Message</span>
            </a>
          </div>
        </div>

      <div class="bg-slate-100 shadow-md rounded-xl">
        <div class="py-4 px-6">
          <h4 class="mb-6 mt-4 text-slate-500 font-sora italic">Edit Profile</h4>
          @if(session('success'))
            <div id="message" class="backdrop-blur-2xl absolute top-2 left-[40%] rounded-lg border-l-8 border-l-blue-500 opacity-80">
              <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
                <span class="px-4">{{ session('success') }}</span>
              </div>
            </div>
          @endif
          <div class="">
            <h5 class="my-4 text-slate-500 uppercase">User information</h5>
            <form action="{{ route('edit-profile') }}" method="post">
              @csrf
              <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="">
                  <label class="text-slate-900 text-14">Last name</label> <br>
                  <input type="text" value="{{Auth::user()->last_name}}" class="mt-2 w-full py-2 p-2 border border-slate-400 rounded-md outline-none">
                </div>

                <div class="">
                  <label class="text-slate-900 text-14">First name</label> <br>
                  <input type="text" value="{{Auth::user()->first_name}}" class="mt-2 w-full py-2 p-2 border border-slate-400 rounded-md outline-none">
                </div>

                <div class="">
                  <label class="text-slate-900 text-14">Phone number</label><br>
                  <input type="text" value="{{Auth::user()->phone_number}}" class="mt-2 w-full p-2 border border-slate-400 rounded-md outline-none">
                </div>
              </div>

              <div class="grid grid-cols-2 gap-4">
                <div class="">
                  <label class="text-slate-900 text-14">Email address</label><br>
                  <input type="text" value="{{Auth::user()->email}}" class="mt-2 w-full p-2 border border-slate-400 rounded-md outline-none">
                </div>
                <div class="">
                  <label class="text-slate-900 text-14">Address</label><br>
                  <input type="text" value="{{Auth::user()->user_address}}" class="mt-2 w-full p-2 border border-slate-400 rounded-md    outline-none">
                </div>
              </div>

              <div class="mt-4">
                @include('components.btn')
              </div>
              {{-- <button type="submit" class="float-right bg-blue-200 mt-4 mr-4 border px-6 py-2 text-white border-slate-400 rounded-md outline-none">Save</button> --}}
            </form>
          </div>


          {{-- Account - Reset password --}}
          <div class="">
            <h5 class="my-4 text-slate-500 uppercase">Account</h5>
            <div class="btn-change-password inline-block py-4 cursor-pointer">
              <a href="{{ route('change-password') }}">
                <span class=" bg-blue-200 pl-2 pr-4 py-2 rounded-lg text-white transform transition-all duration-500 group hover:bg-blue-700">
                  <i class="fa-solid fa-retweet px-1 group-hover:rotate-90 transform transition-all duration-500"></i>
                     Change password
                </span>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection
