<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  @vite(['./resources/css/app.css', './resources/css/app.js'])
</head>
<body>
  <div class="app">
    <header class="h-[50px] border">
      @yield('header')
    </header>
  
    <div class="mx-8 grid grid-cols-12 gap-4 bg-gradient-to-r from-blue-100 to-blue-900">
      <aside class="col-span-3">
        @yield('sidebar')
      </aside>
      
      <main class="col-span-9">
        @yield('content')
      </main>
    </div>
  
    <footer class="">
      @yield('footer')
    </footer>
  </div >

</body>
</html>