@extends('admin.layout.mainprofile')

{{-- set title --}}
@section('title', 'Thông tin tài khoản')
@section('path', 'Thông tin tài khoản')


@section('content')
  <div class="mb-2">
    <div class="flex justify-between select-none items-center ml-2 mr-6 py-2">
        
      <div class="">
        <div class="text-14 text-white"><span class="text-white">Trang </span> / @yield('path')</div>
      </div>
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
            <div class="pl-4 text-white text-14">
              
              <div class="px-6 py-2 font-medium uppercase transition-all duration-300  cursor-pointer relative group ">
                <span class="">{{Auth::user()->ND_Ten}}</span>
                <span class="absolute top-0 left-0 w-[50%] h-0.5 bg-primary-300 transition-all duration-300 group-hover:w-full"></span>
                <span class="absolute top-0 left-0 w-0.5 h-[50%] bg-primary-300 transition-all duration-300 group-hover:h-full"></span>
                <span class="absolute right-0 bottom-0 w-0.5 h-[50%] bg-primary-300 transition-all duration-300 group-hover:h-full"></span>
                <span class="absolute bottom-0 right-0 w-[50%] h-0.5 bg-primary-300 transition-all duration-300 group-hover:w-full"></span>
                <ul class="bg-black w-full absolute top-10 left-0 text-14 capitalize invisible opacity-0  group-hover:visible group-hover:opacity-100 transition-all duration-500 shadow-md">
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
            </div>
          </div>
        </div>
      </div >
    </div >
    <div class="mt-6">
      <a href="/admin/homepage" class="px-4 py-2 border rounded-full text-white">Trang quản trị</a>
    </div>
    <div class="mt-[60px]">
        @if(session('add-success') || session('update-success') || session('delete-success'))
        <div id="message" class="flex absolute top-12 right-7 mt-4">
          <div  class="bg-white rounded-lg border-l-8 border-l-blue-500 opacity-80">
            <div class="py-4 text-blue-400 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
              <span class="px-4">{{ session('add-success') ? session('add-success') : (session('update-success') ? session('update-success') : session('delete-success')) }}</span>
            </div>
          </div>
        </div>
      @endif
      <div class="backdrop-blur-xl flex justify-between items-center mb-6 p-4 rounded-md shadow-md">
        <div class="flex">
          <div class="rounded-md relative">
            <img src="{{ Auth::user()->ND_avt != null ? Auth::user()->ND_avt : URL::to('/images/admin/user_default.png') }}" alt="avatar" class="w-20 h-20 rounded-md">
{{--            <a href="" class="absolute -bottom-3 -right-3 text-white py-1 px-2 bg-slate-400 rounded-full">--}}
{{--              <i class="fa-solid fa-camera"></i>--}}
{{--            </a>--}}
          </div>
          <div class="ml-6 items-center py-2">
            <h3 class="text-20 text-white font-sora mb-1">{{Auth::user()->ND_Ten}}</h3>
            <span class="text-green-400">Admin</span>
          </div>
        </div>
        <div class="relative hover:opacity-60 mr-10 text-slate-500">
          {{-- <label class="absolute bg-red-500 leading-4 w-[14px] h-[14px] top-1 left-6 text-center rounded-[50%] text-10 text-slate-200 cursor-pointer">3</label> --}}
            {{-- <a href="" class="mx-4 text-24 text-white">
              <i class="fa-solid fa-envelope mr-1"></i>
              <span>Message</span>
            </a> --}}
          </div>
        </div>

      <div class="bg-slate-100 shadow-md rounded-xl">
        <div class="py-4 px-6">
          <h4 class="mb-6 mt-4 text-slate-500 font-sora text-18">Thông tin người dùng</h4>
          @if(session('success'))
            <div id="message" class="backdrop-blur-2xl absolute top-2 left-[40%] rounded-lg border-l-8 border-l-blue-500 opacity-80">
              <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
                <span class="px-4">{{ session('success') }}</span>
              </div>
            </div>
          @endif
          <div class="">
            {{-- <h5 class="my-4 text-slate-500 uppercase">User information</h5> --}}
            <form action="" method="post">
                {{-- {{ route('edit-profile') }} --}}
              @csrf
              <div class="grid grid-cols-2 gap-4 mb-4">

                <div class="">
                  <label class="text-slate-900 text-16 font-sora italic">Tên</label> <br>
                  <input name="ND_Ten" type="text" value="{{Auth::user()->ND_Ten}}" class="mt-2 w-full py-2 p-2 border border-slate-400 rounded-md outline-none">
                </div>

                <div class="">
                  <label class="text-slate-900 text-16 font-sora italic">Số điện thoại</label><br>
                  <input name="ND_SDT" type="text" value="{{Auth::user()->ND_SDT}}" class="mt-2 w-full p-2 border border-slate-400 rounded-md outline-none">
                </div>
              </div>

              <div class="grid grid-cols-2 gap-4">
                <div class="">
                  <label class="text-slate-900 text-16 font-sora italic">Địa chỉ email</label><br>
                  <input name="ND_Email" type="text" value="{{Auth::user()->ND_Email}}" class="mt-2 w-full p-2 border border-slate-400 rounded-md outline-none">
                </div>
                <div class="">
                  <label class="text-slate-900 text-16 font-sora italic">Địa chỉ</label><br>
                  <input name="ND_DiaChi" type="text" value="{{Auth::user()->ND_DiaChi}}" class="mt-2 w-full p-2 border border-slate-400 rounded-md    outline-none">
                </div>
              </div>

              <div class="mt-4">
                <div class="inline-block relative mt-2 rounded-md">
                    <label
                        class="after:content-['']  after:absolute after:left-0 after:bg-blue-900 after:h-0 after:transition-all        after:duration-500  after:hover:h-[100%] after:top-[50%] after:hover:top-0 after:w-0.5
                        before:content-['']  before:absolute before:right-0 before:bg-blue-900 before:h-0 before:transition-all before:duration-500  before:hover:h-[100%] before:top-[50%] before:hover:top-0 before:w-0.5"
                    >
                      <button 
                        type="submit" 
                        class="border px-10 py-2 border-blue-500 text-blue-500 hover:text-blue-900 transform  transition-all duration-300
                          relative before:content-['']  before:absolute before:bottom-0 before:bg-blue-900 before:w-0 before:transition-all before:duration-500  before:hover:w-[100%] before:left-[50%] before:hover:left-0 before:h-0.5
                          after:content-['']  after:absolute after:top-0 after:bg-blue-900 after:w-0 after:transition-all after:duration-500  after:hover:w-[100%] after:left-[50%] after:hover:left-0 after:h-0.5"
                        >
                          Lưu
                      </button>
                    </label>
                  </div>
              </div>
              {{-- <button type="submit" class="float-right bg-blue-200 mt-4 mr-4 border px-6 py-2 text-white border-slate-400 rounded-md outline-none">Save</button> --}}
            </form>
          </div>


          {{-- Account - Reset password --}}
          {{-- <div class="">
            <h5 class="my-4 text-slate-500 uppercase">Account</h5>
            <div class="btn-change-password inline-block py-4 cursor-pointer">
                {{-- {{ route('change-password') }} --}}
              {{-- <a href="">
                <span class=" bg-blue-200 pl-2 pr-4 py-2 rounded-lg text-white transform transition-all duration-500 group hover:bg-blue-700">
                  <i class="fa-solid fa-retweet px-1 group-hover:rotate-90 transform transition-all duration-500"></i>
                    Change password
                </span>
              </a> --}}

        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection
