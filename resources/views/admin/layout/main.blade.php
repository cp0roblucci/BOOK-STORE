<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  @vite(['./resources/css/app.css', './resources/js/app.js', './resources/js/admin/dashboard.js'])
  <link rel="shortcut icon" sizes="114x114" href="{{  URL::to('/images/logo.png') }}">
</head>
<body class="scrollbar-thin scrollbar-thumb-rounded-lg scrollbar-thumb-blue-200 scrollbar-track-gray-100">
  <div class="app bg-slate-50">
    <header>
      @yield('header')
    </header>
  
    <div class="grid grid-cols-5 gap-4 mx-2">
      <aside class="col-span-1">
        @yield('sidebar')
      </aside>
      
      <main class="col-span-4">
        @yield('content')
      </main>
    </div>
  
    <footer class="">
      @yield('footer')
    </footer>
  </div >

</body>
</html>