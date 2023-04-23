@extends('layouts.main')

@section('header')
    @include('layouts.header')
@endsection

@section('body')
    <h1>{{$user_id}}</h1>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection