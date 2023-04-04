<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('./resources/css/app.css')
    @yield('scripts')
</head>
<body class="bg-slate-200">
    <header class="h-25 bg-gradient-to-r from-cyan-600 to-cyan-300">
        @yield('header')
    </header>
    <main class="min-h-[calc(100vh-132px-100px)] my-2">
        @yield('body')
    </main>
    <footer class="h-36 bg-gradient-to-r from-cyan-600 to-cyan-300">
        @yield('footer')
    </footer>
    {{-- Script --}}
</body>
</html>