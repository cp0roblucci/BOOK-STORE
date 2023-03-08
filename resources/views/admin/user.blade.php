@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Users Management')

@section('header')
  @include('admin.layout.header')
@endsection

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mt-[68px] mb-10">
    {{-- <div class="bg-gray-200 text-blue-600 flex mb-2 shadow-sm">
      <span class="bg-blue-500 text-white py-[10px] px-4 text-20">Users</span>
      <div class="h-0 w-0 border-y-[26px] border-y-transparent border-l-[26px] border-l-blue-500 ml-[-0.001px]"></div>
    </div> --}}
    @section('title-banner', 'Tài khoản')
    @include('components.admin.banner')
    <div class="px-4 py-2 border border-slate-300">
      {{-- <div class="border-[1.5px] w-[40%] my-2 px-2 focus-within:border-[1.5px] focus-within:border-blue-500">
        <form action="" method="post" class="flex justify-between">
          @csrf
          <input type="text" placeholder="Tìm kiếm..." name="users-search" class="caret-blue-500 outline-none w-full py-2 " required>
            <button type="submit" class="inline-block bg-blue-300 w-[18%] my-1 cursor-pointer top-0.5 right-1">
              <i class="fa-solid fa-magnifying-glass text-white"></i>
            </button>
        </form>
      </div> --}}
        @include('components.admin.form-input')
        
        <table class="w-full border mt-2">
          <thead>
            <tr class="grid grid-cols-11 gap-1 mx-4 mb-4">
              <th class="col-auto">#</th>
              <th class="col-span-2">Họ Tên</th>
              <th class="col-span-2">Số Điện Thoại</th>
              <th class="col-span-2">Địa chỉ</th>
              <th class="col-span-2">Phân Quyền</th>
              <th class="col-span-2"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $key => $user)
          <tr class="grid grid-cols-11 gap-1 text-center mb-4 mx-4 py-2 border-b">
              <td>{{ $key + 1 }}</td>
              <td class="col-span-2">Trần Văn Trường {{ $key + 1 }}</td>
              <td class="col-span-2">0123456789</td>
              <td class="col-span-2">Cần Thơ</td>
              <td class="col-span-2">Admin</td>
              <td class="col-span-2">
                <div class="">
                  <a href="" class="text-blue-600 hover:underline mr-2 ">Sửa</a>
                  <a href="" class="border px-2 py-1 border-red-600 text-red-600 hover:bg-red-600 hover:text-white ml-2 transform transition-all duration-500">Xóa</a>
                </div>
              </td>
          </tr>
          @endforeach
          </tbody>
        </table>
        <div class="mt-4 mb-2 mx-4 inline-block">
          <form action="" method="post" class="relative">
            <label class="
              after:content-['']  after:absolute after:left-0 after:bg-blue-900 after:h-0 after:transition-all after:duration-500  after:hover:h-[100%] after:top-[50%] after:hover:top-0 after:w-0.5
              before:content-['']  before:absolute before:right-0 before:bg-blue-900 before:h-0 before:transition-all before:duration-500  before:hover:h-[100%] before:top-[50%] before:hover:top-0 before:w-0.5">
              <button class="border border-blue-500 text-blue-500 hover:text-blue-900 transform transition-all duration-300 px-2 py-4 
                relative before:content-['']  before:absolute before:bottom-0 before:bg-blue-900 before:w-0 before:transition-all before:duration-500  before:hover:w-[100%] before:left-[50%] before:hover:left-0 before:h-0.5
                after:content-['']  after:absolute after:top-0 after:bg-blue-900 after:w-0 after:transition-all after:duration-500  after:hover:w-[100%] after:left-[50%] after:hover:left-0 after:h-0.5">
                Add User
              </button>
            </label>
          </form>
        </div>
      </div>
    </div> 
@endsection

{{-- 
@section('footer')
  @include('admin.layout.footer')
@endsection --}}