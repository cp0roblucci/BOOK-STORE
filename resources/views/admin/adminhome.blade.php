@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Thống Kê')
@section('path', 'Thống kê')

@section('sidebar')
  @include('admin.layout.slidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection
    Trang Quản Trị
    <p class="text-red-500">VO DUC DUY</p>
    @if(Auth::check()) 
    <span  class="icon-dropdown cursor-pointer px-2">
      {{Auth::user()->username}}
    </span>
    {{-- @else 
    <span  class="icon-dropdown cursor-pointer px-2"> Admin --}}
   @endif
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection
