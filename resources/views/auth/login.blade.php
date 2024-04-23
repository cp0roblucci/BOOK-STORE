<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Đăng nhập</title>
  @vite(['./resources/css/app.css',
        './resources/js/app.js',
  ])
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
<body class="relative">
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
           
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <a href="/">
                      <img class="h-52 ml-28" src="/storage/images/logo.png" alt=""></a>
                  </div>
                <div class="ml-8 pt-6 -mb-6">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white mb-2">
                        Đăng nhập
                    </h1>
                    @if(session('create-win'))
                        <span class="text-blue-500 text-18">{{ session('create-win') }}</span>
                    @endif
                    <p class="text-12 font-light"> Nhập email và mật khẩu của bạn để đăng nhập </p>
                </div>
                <div class="space-y-4 md:space-y-6 sm:p-8">
                    
                    <form method="POST" class="space-y-4 md:space-y-6" action="{{route('login')}}">
                        @csrf
                        <div>
                            {{-- <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label> --}}
                            <input type="email" name="email" id="email" 
                            class=" p-[10px] w-full text-14 outline-none placeholder:text-slate-300 rounded-lg border {{ $errors->has('email') ? 'border-red-500' : 'border-slate-300 focus-within:border-blue-500' }}" 
                            placeholder="Nhập email (ví dụ như duyttbt@gmail.com)"
                            >
                            @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $error)
                            <span id="message-email-login" class="text-12 ml-2 text-red-500">* {{ $error }}</span>
                            @endforeach
                            @endif
                            @if(session()->has('account-not-exists') || session()->has('account-blocked'))
                            <span id="message-password-login" class="text-12 ml-2 text-red-500">* {{ session()->get('account-not-exists') ? session()->get('account-not-exists') : session()->get('account-blocked') }}</span>
                            @endif
                        </div>
                        <div class="relative">
                            {{-- <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label> --}}
                            <input type="password" name="password" id="password" 
        placeholder="Mật khẩu" 
        class="p-[10px] w-full text-14 outline-none placeholder:text-slate-300 rounded-lg border {{ $errors->has('email') ? 'border-red-500' : 'border-slate-300 focus-within:border-blue-500' }}"
    >
    <i id="iconHideConfirmPass" class="fa-regular fa-eye-slash absolute text-14 right-6 top-4 cursor-pointer text-slate-500" onclick="togglePassword()"></i>
    <i id="iconShowConfirmPass" class="fa-regular fa-eye hidden absolute text-14 right-6 top-4 cursor-pointer text-slate-500" onclick="togglePassword()"></i>
                            @if ($errors->has('password'))
                            @foreach ($errors->get('password') as $error)
                                <span id="message-password-login" class="text-12 ml-2 text-red-500">* {{ $error }}</span>
                            @endforeach
                            @endif
                            @if(session()->has('incorect-password'))
                                <span id="message-password-login" class="text-12 ml-2 text-red-500">* {{ session()->get('incorect-password') }}</span>
                            @endif
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex text-14 relative ">
                                <input class="remember text-red-500 focus:ring-red-500 focus:bg-red-500  focus:text-red-500" type="checkbox" name="remember" id="">
                                <p class="relative bottom-0.5 ml-2">Ghi nhớ lần đăng nhập này</p>
                            </div>
                           
                            <a href="/login" class="relative bottom-0.5 text-sm font-medium text-red-500 hover:underline dark:text-primary-500">Quên mật khẩu?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-red-500 hover:bg-black focus:ring-1 focus:outline-none focus:ring-black font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Đăng Nhập</button>
                        <div class="relative mt-6 mr-2">
                            <div class="w-full border-b h-0.5 text-center">
                            </div>
                            <label class=""></label>
                            <span class="inline px-2 bg-white absolute left-[45%] -top-3 text-12 font-light">
                                Hoặc
                            </span>
                        </div>

                        
                    </form>
                    <button type="submit" class="w-full text-black border-black border  focus:ring-1 focus:outline-none focus:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <i class="fa-brands fa-google text-18 relative top-0.5 mr-2"></i>
                        Đăng nhập với Google
                    </button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                       Bạn chưa có tài khoản? <a href="{{route('register')}}" class="font-medium text-red-500 hover:underline dark:text-primary-500">Đăng ký ngay</a>
                    </p>
                </div>
            </div>
        </div>
      </section>
</body>
</html>

<script>
    function togglePassword() {
      var passwordField = document.getElementById('password');
      var iconHide = document.getElementById('iconHideConfirmPass');
      var iconShow = document.getElementById('iconShowConfirmPass');
  
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        iconHide.style.display = 'none';
        iconShow.style.display = 'block';
      } else {
        passwordField.type = 'password';
        iconHide.style.display = 'block';
        iconShow.style.display = 'none';
      }
    }
  </script>
