<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  @vite(['./resources/css/app.css', './resources/js/complete-info.js'])
  <link rel="shortcut icon" sizes="114x114" href="{{  URL::to('/images/logo.png') }}">
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

  {{-- <div class="fixed w-full min-h-[18.75rem] bg-gradient-to-r from-blue-900 to-blue-100"></div> --}}
  <div class="app p-2 h-screen relative">
    <div
      id="imageLogin1"
      style="background-image: url('/images/login/login.jpg')"
      class="w-[50%] h-[96%] mt-0.5 rounded-xl absolute z-10 bg-cover translate-x-[96%] transform transition-all ease-linear duration-700">
    </div>
    <div class="bg-white h-full ">
      <div class="grid grid-cols-2 gap-8 h-full">
        {{-- Login --}}
        <div id="formLogin" class="login flex w-[70%] h-[90%] mt-[5%] ml-8">
          <div class="p-6 w-full">
            <div class="mt-10 mb-6">
                @if(session()->has('loginGoogleSuccess'))
                    <h1 class="text-16 font-bold text-[#344767] font-sora mb-1">{{ session('loginGoogleSuccess') }}</h1>

                @endif
              <h2 class="text-16 font-bold text-[#344767] font-sora mb-1">Please provide complete information for a better experience.</h2>
            </div>
            <form action="" method="post">
              @csrf
              <div class="w-full ">
                <div class="flex flex-col w-full">
                  <label class="ml-2 mb-1 text-slate-700 font-popins">Choose your avatar</label>
                  <div class="flex items-center mb-4 mt-2">
                    <div class="mr-6 items-center">
                      <img id="img-preview" src="{{ URL::to('/images/logo.png')}}" alt="" class="h-20 w-20 rounded-full border border-slate-500">
                    </div>
                    <input
                      id="input-file-img"
                      type="file"
                      name="image"
                      class=" text-slate-500 text-14 file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-16 file:font-semibold file:text-blue-700 hover:file:bg-blue-50 hover:file:cursor-pointer"
                    >
                  </div>
                  <input
                    type="number"
                    name="phoneNumber"
                    placeholder="Phone number"
                    class="mb-4 p-[10px] text-14 outline-none placeholder:text-slate-300 rounded-lg border border-slate-300 focus-within:border-blue-500"
                  >
                </div>
                <div class="w-full relative">
                  <input
                    type="text"
                    name="address"
                    placeholder="Your Address"
                    class="mb-4 p-[10px] text-14 outline-none placeholder:text-slate-300 rounded-lg border border-slate-300 focus-within:border-blue-500 w-full"
                  >

                </div>
              </div>

                <div class="grid grid-cols-2 gap-4 text-center">
                  <button
                    type="submit"
                    class="bg-blue-200 w-full rounded-lg py-[10px] font-bold text-14 text-slate-100 transform transition-all duration-300 active:shadow-none active:translate-y-[5px] hover:bg-blue-400"
                  >
                    Continue
                  </button>
                  <a
                    href="/"
                    class="border border-blue-200 w-full rounded-lg py-[10px] font-bold text-14 text-slate-500 transform transition-all duration-300 active:shadow-none active:translate-y-[5px] hover:bg-blue-400 hover:text-white"
                  >
                    Skip
                  </a>
                </div >
            </form>

          </div>
        </div>

      </div>
    </div>


  </div>

</body>
</html>

