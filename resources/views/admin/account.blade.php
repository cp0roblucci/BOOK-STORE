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
    @section('title-banner', 'Thông tin tài khoản')
    @include('components.admin.banner')
    <div class="px-4 py-2 border border-slate-300">
      <div class="grid grid-cols-5">
        <div class="">
          <div class="py-4">Tên tài khoản</div>
          <div class="py-4">Email</div>
          <div class="py-4">Mật khẩu</div>
          <div class="py-4">Phân quyền</div>
        </div>
        <div class="">
          <div class="py-4 font-semibold">Trần Văn Trường</div>
          <div class="py-4">vantruong@gmail.com</div>
          <div class="py-4">
            <a href="" class="bg-blue-200 pl-2 pr-4 py-2 rounded-lg text-white transform transition-all duration-500 group hover:bg-blue-700">
              <i class="fa-solid fa-retweet px-1 group-hover:rotate-90 transform transition-all duration-700"></i>
              Đổi mật khẩu
            </a>
          </div>
          <div class="font-bold py-4">Quản trị viên</div>
        </div>
      </div>
    </div>
  </div> 
@endsection

{{-- 
@section('footer')
  @include('admin.layout.footer')
@endsection --}}