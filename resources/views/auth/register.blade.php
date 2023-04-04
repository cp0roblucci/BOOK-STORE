<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Đăng Ký</title>
  @vite(['./resources/css/app.css', './resources/js/login.js'])
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
      id="imageLogin2"
      style="background-image: url('/storage/images/login/login2.jpg')"
      class="w-[50%] h-[96%] mt-0.5 rounded-xl absolute bg-cover translate-x-2 transform transition-all ease-linear duration-700">
    </div>

    <div class="bg-white h-full ">
      <div class="grid grid-cols-2 gap-8 h-full">
        {{-- Login --}}
        <div id="formLogin" class="login flex w-[70%] h-[90%] mt-[5%] ml-8">

        </div>

        {{-- Register --}}
        <div id="formRegister" class="register flex w-[70%] h-full mx-[148px] ">
          <div class="px-6 py-2 w-full">
            <div class="mb-4">
              <h2 class="text-24 text-center font-bold text-[#344767] font-sora mb-1">
                Đăng Ký
                <span class="text-14 text-slate-400">với</span >
              </h2>
              <div class="flex justify-center">
                <a href="{{ route('login-google') }}" class="inline-block border px-4 py-2 rounded-lg">
                  <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
                    <path d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267" fill="#4285F4"></path>
                    <path d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667" fill="#34A853"></path>
                    <path d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782" fill="#FBBC05"></path>
                    <path d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769" fill="#EB4335"></path>
                    </g>
                    </g>
                    </svg>
                </a>
              </div>
              <h6 class="text-16 text-center text-slate-400 mb-2">Hoặc</h6>
                @if(session()->has('email-exists'))
                    <span class="text-16 text-red-400 ml-1">
                        Tài khoản đã tồn tại.
                        <a href="/login" class="text-purple-400 ml-2 p-1 rounded-lg border hover:bg-purple-50">Đăng nhập ngay</a>
                    </span>
                @endif

            </div>
            <form action="" method="post">
              @csrf
              {{-- <h3 class="flex text-12 justify-end mb-1 text-red-500 mr-2">* required</h3> --}}
              <div class="flex flex-col w-full">
                <div class="grid grid-cols-2 gap-2 mb-2">
                  <div class="flex flex-col">
                    <input
                      id="last-name"
                      type="text"
                      name="lastname"
                      placeholder="Họ"
                      class="input-register p-[10px] w-full text-14 outline-none placeholder:text-slate-300 rounded-lg border {{ $errors->has('email') ? 'border-red-500' : 'border-slate-300 focus-within:border-purple-500' }}"
                    >
                    @if ($errors->has('lastname'))
                      @foreach ($errors->get('lastname') as $error)
                        <span id="message-lastname" class="text-10 ml-2 text-red-500">* {{ $error }}</span>
                      @endforeach
                    @endif
                  </div>
                  <div class="flex flex-col">
                    <input
                    id="first-name"
                    type="text"
                    name="firstname"
                    placeholder="Tên"
                    class="input-register p-[10px] w-full text-14 outline-none placeholder:text-slate-300 rounded-lg border {{ $errors->has('email') ? 'border-red-500' : 'border-slate-300 focus-within:border-purple-500' }}"
                  >
                  @if ($errors->has('firstname'))
                  @foreach ($errors->get('firstname') as $error)
                    <span id="message-firstname" class="text-10 ml-2 text-red-500">* {{ $error }}</span>
                  @endforeach
                  @endif
                  </div>
                </div>
                <div class="flex flex-col mb-2">
                  <input
                    id="email-register"
                    type="email"
                    name="email"
                    placeholder="Email"
                    class="input-register p-[10px] w-full text-14 outline-none placeholder:text-slate-300 rounded-lg border {{ $errors->has('email') ? 'border-red-500' : 'border-slate-300 focus-within:border-purple-500' }}"
                  >
                  @if ($errors->has('email'))
                  @foreach ($errors->get('email') as $error)
                    <span id="message-email-register" class="text-10 ml-2 text-red-500">* {{ $error }}</span>
                  @endforeach
                  @endif
                </div>
                <div class="w-full relative mb-2">
                  <input
                    id="password-register"
                    type="password"
                    name="password"
                    placeholder="Mật khẩu"
                    class="input-register p-[10px] w-full text-14 outline-none placeholder:text-slate-300 rounded-lg border {{ $errors->has('email') ? 'border-red-500' : 'border-slate-300 focus-within:border-purple-500' }}"
                  >
                  <div id="message-password-register"   class="" >
                  @if ($errors->has('password'))
                      @foreach ($errors->get('password') as $error)
                        <span class="text-10 ml-2 text-red-500">* {{ $error }}</span><br>
                      @endforeach
                  @endif
                </div>
                  <i id="iconHidePassRegister" class="fa-regular fa-eye-slash absolute text-14 right-6 top-4 cursor-pointer text-slate-500"></i>
                  <i id="iconShowPassRegister" class="fa-regular fa-eye hidden absolute text-14 right-6 top-4 cursor-pointer text-slate-500"></i>
                </div>
                <div class="w-full relative mb-2">
                  <input
                    id="confirm-password-register"
                    type="password"
                    name="password_confirmation"
                    placeholder="Xác nhận mật khẩu"
                    class="input-register p-[10px] w-full text-14 outline-none placeholder:text-slate-300 rounded-lg border {{ $errors->has('email') ? 'border-red-500' : 'border-slate-300 focus-within:border-purple-500' }}"
                  >
                  @if ($errors->has('password_confirmation'))
                      @foreach ($errors->get('password_confirmation') as $error)
                        <span id="message-confirm-password" class="text-10 ml-2 text-red-500">* {{ $error }}</span><br>
                      @endforeach
                  @endif
                  <i id="iconHideConfirmPass" class="fa-regular fa-eye-slash absolute text-14 right-6 top-4 cursor-pointer text-slate-500"></i>
                  <i id="iconShowConfirmPass" class="fa-regular fa-eye hidden absolute text-14 right-6 top-4 cursor-pointer text-slate-500"></i>
                </div>
              </div>
                <div class="mb-2">
                    <div id="condition-btn" class="flex relative">
                        <input
                            id="condition"
                            name="condition_register"
                            type="checkbox"
                            class="appearance-none w-10 h-5 rounded-[10px] bg-zinc-700/10 border transform transition-all after:content[''] after:bg-white after:w-4 after:h-4 after:rounded-[10px] after:shadow-2xl after:duration-[250ms] relative after:absolute after:top-[1px] after:left-[1px] checked:after:translate-x-5 checked:bg-purple-400 checked:border-slate-300 cursor-pointer"
                        >
                        <label for="condition" class="text-slate-600 text-14 ml-2">
                          Tôi đồng ý với các <span class="font-bold">Điều khoản và Điều kiện</span>
                        </label>
                    </div>

                    @if ($errors->has('condition_register'))
                        @foreach ($errors->get('condition_register') as $error)
                            <span id="message-condition" class="text-10 ml-2 text-red-500">* {{ $error }}</span><br>
                        @endforeach
                    @endif
                </div>
                <button
                  type="submit"
                  class="bg-purple-400 w-full rounded-lg py-[10px] font-bold text-14 text-slate-100 transform transition-all duration-300 active:shadow-none active:translate-y-[5px] hover:bg-purple-500"
                >
                  Đăng Ký
                </button>
            </form>

            <div class="mt-2 text-center text-14">
              <h4>
                Bạn đã có tài khoản?
                <a href="/login" id="sign-in" class="text-purple-400">Đăng nhập</a>
              </h4>
            </div>

          </div>
        </div>


      </div>
    </div>


  </div>

</body>
</html>

