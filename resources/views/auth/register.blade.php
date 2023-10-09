<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Đăng ký</title>
  @vite(['./resources/css/app.css',
        './resources/js/app.js',
  ])
  {{-- <link
    href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700;800&display=swap"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
    rel="stylesheet"
  /> --}}
  <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
</head>
<body class="relative">
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <a href="/">
                        <img class="h-52 ml-28" src="/storage/images/logo.png" alt="">
                    </a>
                </div>
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                  <div>
                    <h1 class="text-xl font-bold text-gray-900 md:text-2xl dark:text-white">
                      Đăng Ký
                  </h1>
                  </div>
                  @if(session()->has('email-exists'))
                  <span class="text-16 text-red-400 ml-1">
                      Tài khoản đã tồn tại.
                      <a href="/login" class="text-purple-400 ml-2 p-1 rounded-lg border hover:bg-purple-50">Đăng nhập ngay</a>
                  </span>
                  @endif
                  
                    <form class="space-y-4 md:space-y-6" action="" method="POST" id="Formregister" name="Formregister" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input type="fullname" name="fullname" 
                            id="fullname" 
                            class="input-register p-[10px] w-full text-14 outline-none placeholder:text-slate-300 rounded-lg border {{ $errors->has('email') ? 'border-red-500' : 'border-slate-300 focus-within:border-purple-500' }}" 
                            placeholder="Vui lòng nhập họ tên" 
                            >
                            @if ($errors->has('fullname'))
                            @foreach ($errors->get('fullname') as $error)
                              <span id="message-fullname" class="text-10 ml-2 text-red-500">* {{ $error }}</span>
                            @endforeach
                            @endif
                        </div>
                        <div>
                            <input type="email" name="email" 
                            id="email" 
                            class="input-register p-[10px] w-full text-14 outline-none placeholder:text-slate-300 rounded-lg border {{ $errors->has('email') ? 'border-red-500' : 'border-slate-300 focus-within:border-purple-500' }}" 
                            placeholder="Vui lòng nhập email" 
                            >
                            @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $error)
                              <span id="message-password" class="text-10 ml-2 text-red-500">* {{ $error }}</span>
                            @endforeach
                            @endif
                        </div>
                        <div class="group">
                            <div class="mb-6 group:">
                                <input type="password" name="password" 
                                id="password" placeholder="Vui lòng nhập mật khẩu" 
                                class="input-register p-[10px] w-full text-14 outline-none placeholder:text-slate-300 rounded-lg border {{ $errors->has('email') ? 'border-red-500' : 'border-slate-300 focus-within:border-purple-500' }}"
                                >
                                @if ($errors->has('password'))
                                @foreach ($errors->get('password') as $error)
                                  <span id="message-password" class="text-10 ml-2 text-red-500">* {{ $error }}</span>
                                @endforeach
                                @endif
                            </div>
                            <div class="group">
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
                        </div>
                        
                        <input type="hidden" value = "3" name ="role">
                        <button type="submit" class="w-full text-white bg-red-500 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                          Đăng ký
                        </button>
                    </form>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Bạn đã có tài khoản ? <a href="{{route('login')}}" class="font-medium text-red-500 hover:underline dark:text-primary-500">Đăng nhập</a>
                        </p>

                        <div class="py-0">
                          <p class="text-12 font-light ml-10">
                            Bằng việc đăng ký, bạn đã đồng ý với SunnyBookStore về       
                        </p>
                        <p class="text-12 font-light text-center">
                          <a class="text-red-500 hover:text-blue-400" href="">Điều khoản dịch vụ  &  Chính sách bảo mật</a>
                          
                        </p>
                        </div>
                </div>
                @csrf
            </div>
        </div>
        
      </section>
</body>
</html>