@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Products Management')

@section('header')
  @include('admin.layout.header')
@endsection

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mb-2 mt-[68px]">
    @section('title-banner', 'Sản phẩm')
    @include('components.admin.banner')
    <div class="px-4 py-2 border border-slate-300">
      @include('components.admin.form-input')
    </div>
  </div>
@endsection

{{-- 
@section('footer')
  @include('admin.layout.footer')
@endsection --}}