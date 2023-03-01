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
  <span>Content</span>
@endsection


@section('footer')
  @include('admin.layout.footer')
@endsection