<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    @vite('./resources/css/app.css')
</head>
<body>
    <section 
        class="bg-gray-200 min-h-screen flex items-center justify-center bg-no-repeat bg-cover">
        {{-- Login container --}}
        <div 
        class=" bg-gray-100 flex rounded-2xl shadow-lg max-w-4xl p-5 bg-no-repeat bg-cover ">
            {{-- form --}}
            <div class="md:w-1/2 px-16">
                <h2 class="font-bold text-3xl ">Login</h2>
                <p class="text-sm mt-4 ">Welcome Back, Please login to your account.</p>

                <form action="" class="flex flex-col gap-4">
                    <div class="relative mb-3 group mt-8">
                        <input
                        class="group p-2 rounded-xl w-full text-sm group-hover:scale-105 duration-150 hover:shadow-cyan-400 outline-none shadow-lg "
                        type="text" name="username" placeholder="Username... ">
                        <i class="fa-solid fa-user
                        absolute text-14 -translate-y-1/2 group-hover:scale-105 duration-150 bottom-1 right-3 text-blue-400"></i>
                    </div>
                    <div class="relative mb-3 group ">
                        <input class="group p-2 rounded-xl border w-full text-sm group-hover:scale-105 duration-150 hover:shadow-cyan-400 outline-none shadow-lg" type="password" name="password" placeholder="Password...">
                        <i class="fa-solid fa-eye 
                        absolute right-3 bottom-1 text-14 -translate-y-1/2 group-hover:scale-105 duration-150 text-blue-400  "></i>
                    </div>
                    <button type="submit" class="text-white border-blue-200 bg-blue-400 py-2  font-bold rounded-xl hover:scale-105 duration-150 hover:shadow-cyan-400 shadow-lg">
                    Login
                    </button>
                </form>

                <div class="mt-10 grid grid-cols-3 items-center ">
                    <hr class="border-black">
                    <p class="text-center text-sm">OR</p>
                    <hr class="border-black">
                </div>

                <div class="relative text-sm group  ">
                    <i class="fa-brands fa-google absolute left-8 top-2.5 text-20 group-hover:scale-105 duration-150 "></i>
                    <button 
                    class="bg-transparent border-gray-400 border py-2 w-full rounded-xl mt-5 flex justify-center group-hover:scale-105 duration-150 hover:bg-transparent hover:bg-blue-500 hover:border-blue-500 hover:shadow-cyan-400 shadow-lg">
                        Login with Google
                    </button>
                </div>
                
                <p class="mt-5 text-xs text-center text-black">3TL online ornamental fish shop guarantees the security and will never post or share any information without your prior consent.</p>

                <p class="mt-5 text-xs text-black pt-2 hover:text-red-500 ">Forgot Password ?</p>

                <div class="mt-3 text-xs flex justify-between items-center text-white">
                    <p class="text-black py-4 border-t border-gray-400">Don't have an account ?</p>
                    <button type="button" class="py-2 px-5 bg-blue-400 border-blue-200 font-bold rounded-xl hover:scale-105 duration-150 hover:shadow-cyan-400 shadow-lg ">
                    <a href="signup">Register</a>
                    </button>
                </div>
            </div>
                <div 
                class="md:block hidden w-1/2 relative">
                <div class="">
                    <img src="/images/sign_in_1.jpg"
                    class=" rounded-xl h-600 w-600" alt="" >
                </div>
                    
                <div class="absolute top-10 ml-5">
                <img class="w-32 ml-32 mb-14" src="images/logo.png" alt="">
                <h2 class="text-4xl mb-6 ml-5 font-extrabold text-white">SHOP CÁ CẢNH 3TL</h2>
                <p class="font-normal text-white ml-5">Glad to accompany you on this shopping trip...</p>

                   <div class="flex mt-8 text-white ml-5">
                       <button class="border border-white bg-transparent py-2.5 px-7 rounded-xl
                        hover:scale-105 duration-150 hover:bg-blue-500 hover:border-blue-500 transition-all font-semibold hover:shadow-cyan-400 outline-none shadow-lg">
                           <a href="homepage">HOME PAGE</a>
                       </button>
                       <button class="ml-7 border border-white bg-transparent py-2.5 px-8 rounded-xl
                        hover:scale-105 duration-150 hover:bg-blue-500 hover:border-blue-500 transition-all font-semibold hover:shadow-cyan-400 outline-none shadow-lg">
                            <a class="text-sm" href="product">VIEW PRODUCTS</a>
                       </button> 
                    

                    </div>

                </div>
           </div>
        </div>
    </section>
</body>

<script>
function signinArlert() {
    arlert("Đăng nhập thành công!");
};
</script>
</html>