@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'DashBoard')
@section('path', 'Users')

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection

    <div class="">
      
    </div>

    <div class="">
      
    </div>
  </div>
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection