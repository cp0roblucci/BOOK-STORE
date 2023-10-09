@extends('layouts.main')


@section('title')
    HomePage
@endsection

@section('scripts')
    
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('body')
<h1 class = "text-red-500">Trang Chủ</h1>
@if (Auth::check())
<span  class="icon-dropdown cursor-pointer px-2">
 
 {{ Auth::user()->ND_Ten}}

</span>
@else
<span  class="icon-dropdown cursor-pointer px-2"> Admin
@endif
@endsection

@section('footer')

@endsection 