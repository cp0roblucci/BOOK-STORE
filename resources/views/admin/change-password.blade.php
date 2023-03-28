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
    <div class="grid grid-cols-3 gap-2 select-none items-center ml-2 mr-6 py-2">

      <div class="">
        <div class="text-14 text-slate-400"><span class="text-slate-300">Pages </span> / @yield('path')</div>
      </div>

      <div class="flex col-span-2 items-center justify-between">
        <div class="w-[60%] leading-8 pl-4 bg-white opacity-60 rounded-md border-[1.5px] focus-within:border-[1.5px] focus-within:border-blue-500">
          <form action="" method="post" class="flex justify-between relative">
            @csrf
            <input type="text" placeholder="Search..." name="users-search" class="caret-blue-500 rounded-md outline-none w-full bg-white opacity-60" required>
            <button type="submit" class="inline-block top-1.5 absolute right-4">
              {{-- <i class="fa-solid fa-magnifying-glass text-slate-500"></i> --}}
              <lord-icon
                src="https://cdn.lordicon.com/zniqnylq.json"
                trigger="click"
                style="width:24px;height:24px">
              </lord-icon>
            </button>
          </form>
        </div>
        <div class="items-center">
          <div class="flex text-slate-500">
            <div class="relative hover:opacity-80">
              {{-- <label class="absolute bg-red-500 leading-4 w-4 h-4 top-2 left-5 text-center rounded-[50%] text-10 text-slate-200 cursor-pointer">5</label> --}}
              <span class="absolute inline w-2 h-2 -left-2 rounded-full bg-blue-500"></span>
              <span class="absolute inline w-2 h-2 -left-2 rounded-full animate-ping bg-blue-500"></span>
              <a href="" class="mx-4 absolute -left-10 p-1">
                <lord-icon
                  src="https://cdn.lordicon.com/psnhyobz.json"
                  trigger="hover"
                  colors="primary:#848484"
                  style="width:18px;height:18px">
                </lord-icon>
              </a>
            </div>
            <div class="pl-4 text-[#848484] text-14">
              <div class="hover:opacity-80 icon-dropdown">
                <i class="fa-solid fa-circle-user cursor-pointer"></i>
                <span  class="icon-dropdown cursor-pointer px-2">
                      {{ Auth::user()->last_name . ' ' . Auth::user()->first_name}}
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
    <div class="mt-6">
      <a href="{{ route('admin-profile') }}"  class="px-4 py-2 border rounded-full text-white">Back</a>
    </div>
    <div class="mt-[60px]">

      <div class="bg-slate-100 shadow-md rounded-xl text-center">
        <div class="py-4 px-6">
          <div class="">
            <h5 class="my-4 text-slate-500 uppercase">Change Password</h5>
            <form action="" method="post">
              @csrf
              <div class="">
                {{-- <label class="text-slate-900 text-14">Last name</label> <br> --}}
                <input type="email" value="{{Auth::user()->email}}" hidden>
                <input type="password" name="old_password" placeholder="Enter your password" class="w-[40%] mt-2 py-2 p-2 border border-slate-400 rounded-md outline-none">
                <div class="">
                  @if ($errors->has('old_password'))
                    @foreach ($errors->get('old_password') as $error)
                      <span class="text-12 ml-2 text-red-500 text-left">* {{ $error }}</span><br>
                    @endforeach
                  @endif
                </div>
              </div>
              <div class="">
                {{-- <label class="text-slate-900 text-14">First name</label> <br> --}}
                <input type="password" name="new_password" placeholder="New password" class="w-[40%] mt-2 py-2 p-2 border border-slate-400 rounded-md outline-none">
                <div class="">
                  @if ($errors->has('new_password'))
                    @foreach ($errors->get('new_password') as $error)
                      <span class="text-12 ml-2 text-red-500 text-left">* {{ $error }}</span><br>
                    @endforeach
                  @endif
                </div>
              </div>
              <div class="">
                {{-- <label class="text-slate-900 text-14">Phone number</label><br> --}}
                <input type="password" name="confirm_password" placeholder="Confirm new password" class="w-[40%] mt-2 p-2 border border-slate-400 rounded-md outline-none">
                <div class="">
                  @if ($errors->has('confirm_password'))
                    @foreach ($errors->get('confirm_password') as $error)
                      <span class="text-12 ml-2 text-red-500 text-left">* {{ $error }}</span><br>
                    @endforeach
                  @endif
                </div>
              </div>

              <div class="mt-4">
                @include('components.btn')
              </div>
              {{-- <button type="submit" class="float-right bg-blue-200 mt-4 mr-4 border px-6 py-2 text-white border-slate-400 rounded-md outline-none">Save</button> --}}
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection
