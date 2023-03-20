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

    <div class="absolute bg-white left-[25%] mt-[8%] w-[50%] h-[22rem] text-center rounded-xl shadow-md">
        <div class="mt-4">
            <form action="" method="post">
                @csrf
                <h3 class="mb-6 text-slate-500 font-light text-18">Enter new Password</h3>
                <div class=" justify-around">
                    <input
                        type="password"
                        name="password"
                        placeholder="Enter password"
                        class="px-2 py-2 outline-none border border-slate-200 rounded-lg w-[60%]"
                    >
                    <div class="">
                        @if ($errors->has('password'))
                            @foreach ($errors->get('password') as $error)
                                <span class="text-12 ml-2 text-red-500 text-left">* {{ $error }}</span><br>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="flex flex-col justify-items-start">
                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Confirm password"
                        class="px-2 py-2 ml-48 outline-none border border-slate-200 rounded-lg w-[60%] my-2"
                    >
                   <div class="">
                       @if ($errors->has('password_confirmation'))
                           @foreach ($errors->get('password_confirmation') as $error)
                               <span id="message-confirm-password" class="text-12 ml-2 text-red-500">* {{ $error }}</span><br>
                           @endforeach
                       @endif
                   </div>
                </div>

                <input
                    type="password"
                    name="token"
                    placeholder="Confirm password"
                    class="px-2 py-2 outline-none border border-slate-200 rounded-lg w-[60%] my-2 hidden"
                    value="{{$token}}"
                >
                <div class="flex justify-around mt-4">
                    <button
                        type="submit"
                        class="px-2 py-2 border border-slate-200 w-[60%] rounded-lg bg-blue-100 text-white hover:opacity-80 uppercase"
                    >
                        Reset Password
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
