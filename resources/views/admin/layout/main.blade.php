<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  @vite([
    './resources/css/app.css',
    './resources/js/app.js',
    './resources/js/user.js',
    './resources/js/admin/dashboard.js',
    './resources/js/admin/chart.js',
    './resources/js/admin/user.js',
    './resources/js/admin/slidebar.js',
    './resources/js/complete-info.js',
  ])
  <link rel="shortcut icon" sizes="114x114" href="{{  URL::to('/storage/images/logo.png') }}">
  <link
  href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700;800&display=swap"
  rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
    rel="stylesheet"
  />
  <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
</head>
<body class="scrollbar-thin scroll-smooth scrollbar-thumb-rounded-lg scrollbar-thumb-blue-200 scrollbar-track-gray-100">

  {{-- <div class="fixed w-full min-h-[18.75rem]"></div> --}}
  <div class="app">

      <div class="flex relative">

        <aside class="slide-bar max-h-[100vh] w-[18%] bg-white sticky top-0 transform transition-all duration-500">
          @yield('sidebar')
        </aside>


        <div class="content bg-white w-full ml-auto mr-auto transform transition-all duration-500">

          {{-- Header --}}
          <header class="bg-white sticky top-0 border-b z-10">
            @yield('header')
          </header>

          {{-- Content --}}
          <main class="mt-2 mx-6 mb-10">
            @yield('content')
          </main>

          {{-- Footer --}}
          <footer class="mb-2 mx-6 fixed bottom-0 right-0">
            @yield('footer')
          </footer>

        </div>

        {{-- overlay delete user --}}
        <div class="overlay-delete-user hidden fixed inset-0 bg-black bg-opacity-20 z-40 transition-all animate-fadeIn duration-500"></div>
        <div class="modal-delete-user hidden fixed top-[25%] left-[35%] bg-white p-6 py-10 min-h-[120px] rounded-lg z-50 animate-fadeIn">
          <h2 class="text-18 mb-10">Bạn có chắc chắn muốn xóa người dùng này?</h2>
          <form action="{{ route('delete-user')}}" method="post">
            @csrf
            <input id="idUser" type="text" name="user_id" hidden>
            <div class="flex justify-around">
              <span
                class="cancel-delete-user border border-blue-100 text-blue-100 px-6 py-2 cursor-pointer hover:text-blue-900 hover:bg-slate-100"
              >
                Hủy
              </span>
              <button
                type="submit"
                class="border px-6 py-2 bg-slate-100 hover:text-red-500 hover:border-red-500"
              >
                Xóa
              </button>
            </div>
          </form>
        </div>

        <div class="modal-delete-user hidden fixed top-[25%] left-[35%] bg-white p-6 py-10 min-h-[120px] rounded-lg z-50 animate-fadeIn">
          <h2 class="text-18 mb-10">Bạn có chắc chắn muốn xóa phụ kiện này?</h2>
          <form
            {{-- action="{{ route('delete-accessories')}}"  --}}
            method="post"
          >
            @csrf
            <input id="idUser" type="text" name="user_id" hidden>
            <div class="flex justify-around">
              <span
                class="cancel-delete-user border px-6 py-2 cursor-pointer hover:text-blue-900 hover:bg-slate-100"
              >
                Hủy
              </span>
              <button
                type="submit"
                class="border px-6 py-2 bg-slate-100 hover:text-red-500 hover:border-red-500"
              >
                Xóa
              </button>
            </div>
          </form>
        </div>

        <div class="modal-delete-user hidden fixed top-[25%] left-[35%] bg-white p-6 py-10 min-h-[120px] rounded-lg z-50 animate-fadeIn">
          <h2 class="text-18 mb-10">Bạn có chắc chắn muốn xóa sản phẩm cá này này?</h2>
          <form
            {{-- action="{{ route('delete-fish')}}"  --}}
            method="post"
          >
            @csrf
            <input id="idUser" type="text" name="user_id" hidden>
            <div class="flex justify-around">
              <span
                class="cancel-delete-user border px-6 py-2 cursor-pointer hover:text-blue-900 hover:bg-slate-100"
              >
                Hủy
              </span>
              <button
                type="submit"
                class="border px-6 py-2 bg-slate-100 hover:text-red-500 hover:border-red-500"
              >
                Xóa
              </button>
            </div>
          </form>
        </div>


      </div>
    </div>

  </div >

</body>
</html>
