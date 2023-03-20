@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Create new User')
@section('path', 'Users / New User')

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection

    <div class="grid grid-cols-3 gap-8">
      <div class="col-span-2">
        <div class="py-4 ml-2 text-24 font-sora text-[#5432a8]">Create new User</div>
        <div class="border p-4">
          <form action="" method="post">
            <div class="grid grid-cols-2 gap-4">
              <div class="">
                <label 
                  for="firstname"
                  class="text-slate-500 text-14"
                >
                  First name
                </label><br>
                <div class="flex items-center border mt-1 rounded-lg focus-within:border-blue-200">
                  <i class="fa-regular fa-user px-2 group"></i>
                  <input 
                    type="text" 
                    name="firstname" 
                    placeholder="First name"
                    class="py-1.5 w-full outline-none rounded-lg placeholder:text-14 text-14" 
                  >
                </div>
              </div>
      
              <div class="">
                <label 
                  for="lastname" 
                  class="text-slate-500 text-14"
                >
                  Last name
                </label><br>
                <div class="flex items-center border mt-1 rounded-lg focus-within:border-blue-200">
                  <i class="fa-regular fa-user px-2"></i>
                  <input 
                    type="text" 
                    name="lastname" 
                    placeholder="Last name"
                    class="py-1.5 w-full outline-none rounded-lg placeholder:text-14 text-14" 
                  >
                </div>
              </div>
      
              <div class="">
                <label
                  for="phonenumber"
                  class="text-slate-500 text-14"
                >
                  Phone number
                </label><br>
                <div class="flex items-center border mt-1 rounded-lg focus-within:border-blue-200">
                  <i class="fa-solid fa-mobile-screen px-2"></i>
                  <input 
                    type="number"
                    name="phonenumber"
                    placeholder="(012) 345-6789"
                    class="py-1.5 w-full outline-none rounded-lg placeholder:text-14 text-14" 
                  >
                </div>
              </div>
              
              <div class="">
                <label
                  for="email"
                  class="text-slate-500 text-14"
                >
                  Email
                </label><br>
                <div class="flex items-center border mt-1 rounded-lg focus-within:border-blue-200">
                  <i class="fa-regular fa-envelope px-2"></i>
                  <input 
                    type="email"
                    name="email"
                    placeholder="Email address"
                    class="py-1.5 w-full outline-none rounded-lg placeholder:text-14 text-14"
                  >
                </div>
              </div>
            </div>
    
            <div class="mt-4 ">
              <label 
                for="address"
                class="text-slate-500 text-14"
              >
                Address
              </label><br>
              <div class="border mt-1">
                <input 
                  type="text"
                  name="address"
                  placeholder="Address"
                  class="pb-11 pt-1 w-full outline-none focus-within:border-blue-500 px-2 placeholder:text-14 text-14"
                >
              </div>
            </div>
    
    
            <div class="mt-4">
              <div class="border mt-1">
                <input 
                  type="file"
                  name="avatar"
                  placeholder=""
                  class="py-4 text-14"
                >
              </div>
              </div>
          </form>
        </div>
      </div>

      <div class="border">

      </div>
    </div>      

  </div>
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection