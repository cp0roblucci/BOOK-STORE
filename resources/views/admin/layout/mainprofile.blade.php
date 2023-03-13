<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  @vite(['./resources/css/app.css', './resources/js/app.js', './resources/js/admin/dashboard.js'])
  <link rel="shortcut icon" sizes="114x114" href="{{  URL::to('/images/logo.png') }}">
  <link
  href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700;800&display=swap"
  rel="stylesheet"
/>
<link
  href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
  rel="stylesheet"
/>
</head>
<body class="scrollbar-thin scroll-smooth scrollbar-thumb-rounded-lg scrollbar-thumb-slate-400 scrollbar-track-gray-100 bg-slate-200">

  <div 
    style="background-image: url('/images/admin/cover-image-profile.jpg")
    class="absolute w-full min-h-[50%] bg-cover">
  </div>
  <div class="app p-4">
    <div class="grid grid-cols-5 gap-16 mx-2">

      <aside class="col-span-1">
        @yield('sidebar')
      </aside>
      
      <main class="col-span-4 relative">
        {{-- Header --}}
        <header>
          @yield('header')
        </header>

        {{-- Content --}}
        @yield('content')

        {{-- Footer --}}
        <footer class="">
          @yield('footer')
        </footer>

      </main>

    </div>
  
  </div >

</body>
</html>