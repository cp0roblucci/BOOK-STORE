<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    @vite('./resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section
    style="background-image: url(https://images.unsplash.com/photo-1551244072-5d12893278ab?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80)"
    class="bg-gray-200 min-h-screen flex justify-center p-3 bg-no-repeat bg-cover">
        {{-- sign up container --}}
        <div style="background-image: url(https://images.unsplash.com/photo-1550016728-6e898923de4c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=861&q=80)" 
         class=" bg-gray-100 flex rounded-2xl shadow-lg max-w-4xl p-5 bg-no-repeat bg-cover">
       
            {{-- img --}}
            <div class="w-1/2 md:block hidden relative ml-12 ">
                 <div class="text-white mt-44">
                    <h2 class="text-4xl mb-10 font-extrabold ">SHOP CÁ CẢNH 3TL</h2>
                    <p class="font-normal">Hân hạnh đồng hành cùng bạn trong lần mua sắm này...</p>

                    <div class="flex mt-12">
                        <button class="border border-white bg-transparent py-3 px-10 rounded-xl  hover:scale-110 duration-200 hover:bg-blue-500 hover:border-blue-500 transition-all font-bold">
                            Trang Chủ
                        </button>
                        <button class="ml-7 border border-white bg-transparent py-3 px-10 rounded-xl hover:scale-110 duration-200 hover:bg-blue-500 hover:border-blue-500 transition-all font-bold">
                            Đăng Nhập
                        </button>
                    </div>

                    <div class="flex mt-12 justify-center mr-16 ">
                        <i class="fa-brands fa-facebook mx-6 text-24 hover:scale-125 duration-200"></i>
                        <i class="fa-brands fa-google text-24 hover:scale-125 duration-200"></i>
                    </div>
                 </div>
            </div>
            {{-- form --}}
            <div class="md:w-1/2 px-16 ">
                <h2 class="font-bold text-2xl text-white">Sign Up</h2>
                <p class="text-sm  mt-4 text-white">Vui lòng nhập vào các thông tin dưới đây :</p>
                <form action="#" class="flex flex-col gap-4">
                    <div class="mt-6 relative group">
                        <input type="text" name="fullName" placeholder="Họ Tên..." required
                        class="w-full border p-2 rounded-xl text-sm placeholder-gray-500 group-hover:scale-110 duration-200 hover:shadow-cyan-400 outline-none shadow-lg ">
                        <i class="fa-solid fa-pen
                         absolute text-14 -translate-y-1/2 group-hover:scale-125 duration-200 bottom-1 right-2 text-teal-400"></i>
                    </div>
                        
                    <div class="relative group">
                        <input type="email" name="email" placeholder="Email..." required
                        class="w-full p-2 border  rounded-xl text-sm placeholder-gray-500 group-hover:scale-110 duration-200 hover:shadow-cyan-400 outline-none shadow-lg">
                        <i class="fa-solid fa-envelope
                        absolute text-14 -translate-y-1/2 group-hover:scale-125 duration-200 bottom-1 right-2 text-teal-400"></i>
                    </div>
    
                    <div class="relative group">
                        <input type="text" name="username" placeholder="Tên đăng nhập..." required
                        class="w-full p-2 rounded-xl text-sm placeholder-gray-500 group-hover:scale-110 duration-200 hover:shadow-cyan-400 outline-none shadow-lg">
                        <i class="fa-solid fa-user
                        absolute text-14 -translate-y-1/2 group-hover:scale-125 duration-200 bottom-1 right-2 text-teal-400"></i>
                    </div>
                        
                    <div class="relative group ">
                        <input type="password" name="password" placeholder="Mật khẩu..." required
                        class="w-full p-2 rounded-xl text-sm placeholder-gray-500 group-hover:scale-110 duration-200 hover:shadow-cyan-400 outline-none shadow-lg ">
                        <i class="fa-solid fa-eye 
                        absolute right-2 bottom-1 text-14 -translate-y-1/2 group-hover:scale-125 duration-200 text-teal-400  "></i>
                    </div>

                    <div class="relative group">
                        <input type="password" name="confirmpassword" placeholder="Xác nhận mật khẩu..." required
                        class="w-full p-2 rounded-lg text-sm placeholder-gray-500 group-hover:scale-110 duration-200 hover:shadow-cyan-400 outline-none shadow-lg">
                        <i class="fa-solid fa-eye 
                        absolute right-2 bottom-1 text-14 -translate-y-1/2 group-hover:scale-125 duration-200 text-teal-400"></i>
                    </div>

                    {{-- <div class="relative ml-1 group text-white">
                            <input class="hover:scale-125 duration-300" type="radio" name="sex"> <label for="Boy" class="text-sm font-light mr-4">Nam</label>
                            <input class="hover:scale-125 duration-300"type="radio" name="sex" id="" > <label for="Girl" class="text-sm font-light mr-4">Nữ</label>
                            <input class="hover:scale-125 duration-300"type="radio" name="sex" id="" > <label for="Other" class="text-sm font-light">Khác</label>
                    </div>   --}}

                    <div class="relative group">
                        <input type="text" name="address" id="" placeholder="Địa chỉ..." required
                        class="w-full p-2 rounded-lg text-sm placeholder-gray-500 group-hover:scale-110 duration-200 hover:shadow-cyan-400 outline-none shadow-lg">
                        <i class="fa-solid fa-location-dot
                        absolute right-2 bottom-1 text-14 -translate-y-1/2 group-hover:scale-125 duration-200 text-teal-400"></i>
                    </div>

                    <div class="relative group">
                        <input type="tel" name="telephone" id="" pattern="[0-9]{10}" placeholder="Số điện thoại..." required
                        class="w-full p-2 rounded-lg text-sm placeholder-gray-500 group-hover:scale-110 duration-200 hover:shadow-cyan-400 outline-none shadow-lg">
                        <i class="fa-solid fa-phone
                        absolute right-2 bottom-1 text-14 -translate-y-1/2 group-hover:scale-125 duration-200 text-teal-400"></i>
                    </div>

                    <div class="relative text-white">
                        <input 
                        class="text-black hover:scale-125 duration-200"
                        type="checkbox" name="confirm" required>
                        <label 
                        class="text-sm"
                        for="">Đồng ý với điều khoản của chúng tôi</label>
                    </div>
                    <button class="border-blue-200 bg-blue-400 py-2 text-white font-bold rounded-xl hover:scale-110 duration-300 hover:shadow-cyan-400 shadow-lg">
                        Sign Up
                    </button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>