@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'DashBoard')

@section('header')
  @include('admin.layout.header')
@endsection

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
<div class="mb-2 mt-[68px]">
    @section('title-banner', 'Bảng điều khiên')
    @include('components.admin.banner')
    <div class="mt-2 border px-4">
      {{-- @include('components.admin.form-input') --}}
      {{-- Product --}}
      <div class="">
        <div class="grid grid-cols-4 gap-2">
          <div class="bg-red-500">
            <span>500 Products</span>
          </div>
          <div class="bg-blue-500">
            <i class="fa-solid fa-user-group"></i>
            <span>20 Customers</span>
          </div>
          <div class="bg-green-500">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>New Orders</span>
          </div>
          <div class="bg-yellow-500">
            <i class="fa-solid fa-message"></i>
            <span>New Messages</span>
          </div>
        </div>
      </div>

      
    </div>
  </div>
@endsection

{{-- 
@section('footer')
  @include('admin.layout.footer')
@endsection --}}