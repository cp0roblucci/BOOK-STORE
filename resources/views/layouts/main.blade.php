<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="/storage/images/logo.png" type="image/icon type">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('./resources/css/app.css')
    @yield('scripts')
</head>
<body class="font-popins bg-bg-header relative ">
    <img class=" absolute -z-10 w-full h-screen" src="/storage/images/bg-header1.jpg" alt="">
    <header class="h-22 //bg-cyan-500">  
        {{-- bg-gradient-to-r from-cyan-600 to-cyan-300 --}}
        @yield('header')
    </header>
    <main class="min-h-[calc(100vh-132px-100px)] bg-white">
        @yield('body')
    </main>
    <footer class="h-39 bg-cyan-500">
        @yield('footer')
    </footer>
    {{-- Script --}}
</body>
</html>