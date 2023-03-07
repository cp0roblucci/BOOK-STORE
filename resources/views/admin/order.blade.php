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
    @section('title-banner', 'Tất cả đơn hàng')
    @include('components.admin.banner')
    <div class="px-4 py-2 border border-slate-300">
        {{-- @include('components.admin.form-input') --}}
        
      
      </div>
    </div> 
@endsection

{{-- 
@section('footer')
  @include('admin.layout.footer')
@endsection --}}