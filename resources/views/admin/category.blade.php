@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'DashBoard')
@section('path', 'Categories')

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection

    <div class="">
      <div class="">
        <h2>Accessories</h2>
        <h2>Products</h2>
      </div>
    </div>

    <div class=" my-6">
      
    </div>
  </div>
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection