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

    <div class="py-4 pt-2 ml-2 text-24 font-sora text-[#5432a8]">Create new User</div>
    <div class="border p-4">
      <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex items-center justify-between mt-1 mb-6">
          <div class="flex">
            <div class="w-28 h-28 mr-10">
              {{-- <img
                src="{{ URL::to('/images/admin/vtd.png')}}"
                alt="avatar"
                class="w-full h-full rounded-full"
              > --}}
              <img
                id="img-preview"
                src="{{ URL::to('/images/admin/avatar-default.png')}}"
                alt="avatar"
                class="w-full h-full rounded-full"
              >
            </div>

            <input
              id="input-file-img"
              type="file"
              name="file"
              placeholder=""
              class="py-8 text-14 border border-slate-500 file:ml-2 rounded-lg border-dashed text-slate-500 cursor-pointer file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-none file:bg-[#5490f0] file:text-white file:cursor-pointer file:hover:bg-blue-100"
            >
          </div>

          <div class="mr-20 flex flex-col font-extralight text-slate-500 uppercase">
            <div class="mb-1">
              <input
                type="radio"
                name="role"
                id="customer"
                value="0"
                class="h-4 w-4 cursor-pointer peer/customer"
                checked
              >
              <label for="customer" class="peer-checked/customer:text-blue-200">Customer</label>
            </div>
            <div class="">
              <input
                type="radio"
                name="role"
                id="admin"
                value="1"
                class="h-4 w-4 cursor-pointer peer/admin"
              >
              <label for="admin" class="peer-checked/admin:text-blue-200">Admin</label>
            </div>

          </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div class="">
            <label
              for="lastname"
              class="text-slate-500 text-14"
            >
              Last name
            </label><br>
            <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
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
              for="firstname"
              class="text-slate-500 text-14"
            >
              First name
            </label><br>
            <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
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
              for="phonenumber"
              class="text-slate-500 text-14"
            >
              Phone number
            </label><br>
            <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
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
            <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
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
            for="password"
            class="text-slate-500 text-14"
          >
            Password
          </label><br>
          <div class="border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
            <input
              type="password"
              name="password"
              placeholder="Password"
              class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
            >
          </div>
        </div>

        <div class="mt-4 ">
          <label
            for="address"
            class="text-slate-500 text-14"
          >
            Address
          </label><br>
          <div class="border-[1.5px] mt-1">
            <input
              type="text"
              name="address"
              placeholder="Address"
              class="pb-11 pt-1 w-full outline-none focus-within:border-blue-500 px-2 placeholder:text-14 text-14"
            >
          </div>
        </div>



        <button
          type="submit"
          class="border-2 border-blue-500 p-2 px-6 mt-4 flex hover:bg-slate-100"
        >
          Create
        </button>

      </form>
    </div>
  </div>

@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection
