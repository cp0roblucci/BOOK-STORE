<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    @vite('./resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <section 
        style="background-image: url(https://images.unsplash.com/photo-1551244072-5d12893278ab?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80)"
        class="bg-gray-100 min-h-screen flex items-center justify-center bg-no-repeat bg-cover">
        {{-- Login container --}}
        <div 
        style="background-image: url(https://images.unsplash.com/photo-1473091734859-44ec098bdd22?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80)"
        class=" bg-gray-100 flex rounded-2xl shadow-lg max-w-4xl p-5 bg-no-repeat bg-cover">
            {{-- form --}}
            <div class="md:w-1/2 px-16">
                <h2 class="font-bold text-3xl text-white">Login</h2>
                <p class="text-sm mt-4 text-white">Nếu bạn đã có tài khoản, đăng nhập với :</p>

                <form action="" class="flex flex-col gap-4">
                    <div class="relative mb-3 group mt-8">
                        <input class="group p-2 rounded-xl w-full text-sm  group-hover:scale-110 duration-200 hover:shadow-cyan-400 outline-none shadow-lg "
                         type="text" name="username" placeholder="Username... ">
                        <i class="fa-solid fa-user
                        absolute text-14 -translate-y-1/2 group-hover:scale-125 duration-200 bottom-1 right-3 text-blue-400"></i>
                    </div>
                    <div class="relative mb-3 group ">
                        <input class="group p-2 rounded-xl border w-full text-sm group-hover:scale-110 duration-200 hover:shadow-cyan-400 outline-none shadow-lg" type="password" name="password" placeholder="Mật khẩu...">
                        <i class="fa-solid fa-eye 
                        absolute right-3 bottom-1 text-14 -translate-y-1/2 group-hover:scale-125 duration-200 text-blue-400  "></i>
                    </div>
                    <button class="border-blue-200 bg-blue-400 py-2 text-white font-bold rounded-xl hover:scale-110 duration-300 hover:shadow-cyan-400 shadow-lg">
                    Login
                    </button>
                </form>

                <div class="mt-10 grid grid-cols-3 items-center text-white">
                    <hr class="border-white">
                    <p class="text-center text-sm">OR</p>
                    <hr class="border-white">
                </div>

                <div class="relative text-sm group text-white ">
                    <i class="fa-brands fa-google absolute left-8 top-2.5 text-20 group-hover:scale-110 duration-200 "></i>
                    <button 
                    class="bg-transparent border-gray-300 border py-2 w-full rounded-xl mt-5 flex justify-center group-hover:scale-110 hover:bg-transparent duration-200 hover:bg-blue-500 hover:border-blue-500 hover:shadow-cyan-400 shadow-lg">
                        Login with Google
                    </button>
                </div>
                
                <p class="mt-5 text-xs text-center text-white">Shop cá cảnh online 3TL cam kết bảo mật và không bao giờ đăng hay chia sẻ thông tin mà chưa có được sự đồng ý của bạn.</p>

                <p class="mt-5 text-xs text-teal-100 pt-2 hover:text-red-300 hover:scale-110 duration-200 ">Quên mật khẩu ?</p>

                <div class="mt-3 text-xs flex justify-between items-center text-white">
                    <p class="text-teal-100 py-4 border-t border-gray-400">Bạn chưa có tài khoản ?</p>
                    <button class="py-2 px-5 bg-blue-400 border-blue-200 text-white font-bold rounded-xl hover:scale-125 duration-200 hover:shadow-cyan-400 shadow-lg ">Đăng Ký</button>
                </div>
            </div>
            {{-- img --}}
            <div class="w-1/2 md:block hidden relative ml-12 ">
                <div class="text-white mt-44">
                   <h2 class="text-4xl mb-10 font-extrabold text-white">SHOP CÁ CẢNH 3TL</h2>
                   <p class="font-normal text-white">Hân hạnh đồng hành cùng bạn trong lần mua sắm này...</p>

                   <div class="flex mt-12">
                       <button class="border border-white bg-transparent py-3 px-10 rounded-xl
                        hover:scale-110 duration-200 hover:bg-blue-500 hover:border-blue-500 transition-all font-bold hover:shadow-cyan-400 outline-none shadow-lg">
                           Trang Chủ
                       </button>
                       <button class="ml-7 border border-white bg-transparent py-3 px-10 rounded-xl
                        hover:scale-110 duration-200 hover:bg-blue-500 hover:border-blue-500 transition-all font-bold hover:shadow-cyan-400 outline-none shadow-lg">
                           Xem Sản Phẩm
                       </button>
                   </div>

                </div>
           </div>
        </div>
    </section>
</body>
</html>