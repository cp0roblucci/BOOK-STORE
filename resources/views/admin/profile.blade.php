@extends('admin.layout.mainprofile')

{{-- set title --}}
@section('title', 'DashBoard')
@section('path', 'Profile')

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection
    <div class="mt-[180px]">
      <div class="bg-slate-100 flex justify-between items-center mb-6 p-4 rounded-md shadow-md">
        <div class="flex">
          <div class="rounded-md">
            <img src="{{ URL::to('/images/admin/vtd.png')}}" alt="avatar" class="w-20 h-20 rounded-md">
          </div>
          <div class="ml-6 items-center py-2">
            <h3 class="text-20 text-gray-800 font-sora mb-1">Tran Van Truong</h3>
            <span class="text-gray-500">Admin</span>
          </div>
        </div>
        <div class="relative hover:opacity-60 mr-10 text-slate-500">
          {{-- <label class="absolute bg-red-500 leading-4 w-[14px] h-[14px] top-1 left-6 text-center rounded-[50%] text-10 text-slate-200 cursor-pointer">3</label> --}}
            <a href="" class="mx-4 text-24">
              <i class="fa-solid fa-envelope mr-1"></i>
              <span>Message</span>
            </a>
          </div>
        </div>

      <div class="bg-slate-100 shadow-md rounded-xl">
        <div class="py-4 px-6">
          <h4 class="mb-6 mt-4 text-slate-500 font-sora italic">Edit Profile</h4>

          <div class="">
            <h5 class="my-4 text-slate-500 uppercase">User information</h5>
            <form action="" method="post">
              <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="">
                  <label class="text-slate-900 text-14">Last name</label> <br>
                  <input type="text" value="Tran Van" class="mt-2 w-full py-2 p-2 border border-slate-400 rounded-md outline-none">
                </div>

                <div class="">
                  <label class="text-slate-900 text-14">First name</label> <br>
                  <input type="text" value="Truong" class="mt-2 w-full py-2 p-2 border border-slate-400 rounded-md outline-none">
                </div>
  
                <div class="">
                  <label class="text-slate-900 text-14">Phone number</label><br>
                  <input type="text" value="0123456789" class="mt-2 w-full p-2 border border-slate-400 rounded-md outline-none">
                </div>
              </div>


              <div class="grid grid-cols-2 gap-4">
                <div class="">
                  <label class="text-slate-900 text-14">Email address</label><br>
                  <input type="text" value="vantruong@gmail.com" class="mt-2 w-full p-2 border border-slate-400 rounded-md outline-none">
                </div>
                <div class="">
                  <label class="text-slate-900 text-14">Address</label><br>
                  <input type="text" value="Nvc, An Khanh, Ninh Kieu, Can Tho" class="mt-2 w-full p-2 border border-slate-400 rounded-md    outline-none">
                </div>
              </div>
              
              <div class="inline-block relative mt-6 rounded-md">
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
                      Save
                  </button>
                </label>
              </div>
              {{-- <button type="submit" class="float-right bg-blue-200 mt-4 mr-4 border px-6 py-2 text-white border-slate-400 rounded-md outline-none">Save</button> --}}
            </form>
          </div>


          {{-- Account - Reset password --}}
          <div class="">
            <h5 class="my-4 text-slate-500 uppercase">Account</h5>
            <div class="btn-change-password py-4 cursor-pointer">
              <span class="bg-blue-200 pl-2 pr-4 py-2 rounded-lg text-white transform transition-all duration-500 group hover:bg-blue-700">
                <i class="fa-solid fa-retweet px-1 group-hover:rotate-90 transform transition-all duration-700"></i>
                Change password
              </span>
            </div> 
            <form action="" method="post" class="form-change-password animate-fadeIn hidden">
                <div class="">
                  {{-- <label class="text-slate-900 text-14">Last name</label> <br> --}}
                  <input type="password" placeholder="Enter your password" class="w-[40%] mt-2 py-2 p-2 border border-slate-400 rounded-md outline-none">
                </div>
                <div class="">
                  {{-- <label class="text-slate-900 text-14">First name</label> <br> --}}
                  <input type="password" placeholder="New password" class="w-[40%] mt-2 py-2 p-2 border border-slate-400 rounded-md outline-none">
                </div>
                <div class="">
                  {{-- <label class="text-slate-900 text-14">Phone number</label><br> --}}
                  <input type="password" placeholder="Confirm new password" class="w-[40%] mt-2 p-2 border border-slate-400 rounded-md outline-none">
                </div>

                <div class="inline-block relative mt-4 rounded-md">
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
                        Save
                    </button>
                  </label>
                </div>
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