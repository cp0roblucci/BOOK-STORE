<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reset Password</title>
  @vite(['./resources/css/app.css', './resources/js/login.js'])
  <link rel="shortcut icon" sizes="114x114" href="{{  URL::to('/images/logo.png') }}">
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
</head>
<body>
  <div class="relative bg-slate-100">
    <div class="header w-full h-[100px] bg-gradient-to-b from-blue-900 to-blue-100 text-center shadow-md">
      <div class="pt-4 text-32">
        <img src="" alt="">
        <h2 class="font-sora text-slate-300">Reset Password</h2>
      </div>
    </div>

    <div class="absolute bg-white left-[25%] mt-[8%] w-[50%] h-[20rem] text-center rounded-xl shadow-md">
      <div class="mt-4">
          <div class="text-right ml-6 transform rotate-180">
              <a href="/login">
                  <lord-icon
                      src="https://cdn.lordicon.com/zmkotitn.json"
                      trigger="hover"
                      style="width:32px;height:32px">
                  </lord-icon>
              </a>
          </div>

        <form action="" method="post" class="">
            @csrf
            <h3 class="mb-6 text-slate-500 font-light text-18">Please enter your email</h3>
            @if(session()->has('message-success'))
                <h4 class="mb-6 text-green-500 font-light text-18 mt-2">{{ session()->get('message-success') }}</h4>
            @endif
            @if(session()->has('message-error'))
                <h4 class="mb-6 text-red-500 font-light text-18 mt-2">{{ session()->get('message-error') }}</h4>
            @endif
            @if(session()->has('message-expired'))
                <h4 class="mb-6 text-slate-500 font-light text-18 mt-2">{{ session()->get('message-expired') }}</h4>
            @endif

          <input
            id="reset-password"
            type="email"
            name="email"
            placeholder="Enter your email"
            class="px-2 py-2 outline-none border border-slate-200 rounded-lg w-[60%]"
          >
            @error('email')
            <h4 class="mb-2 text-red-500 font-light text-18 mt-2">{{ $message }}</h4>
            @enderror
          <div class="flex justify-around mt-6">
            <button
              type="submit"
              class="px-2 py-2 border border-slate-200 w-[60%] rounded-lg bg-blue-100 text-white hover:opacity-80 uppercase"
            >
              Continue
            </button>

          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
