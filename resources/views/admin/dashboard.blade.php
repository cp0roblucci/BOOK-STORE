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
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection
