<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    @vite(['./resources/css/app.css', './resources/js/product.js'])
</head>
<body style="font-family: 'Poppins', sans-serif; margin:0; padding:0;" class="h-screen bg-3f3f5a relative">
    <div class="box absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 w-90p h-95p rounded-lg ">
        <div class="box-img w-full h-full bg-black rounded-2xl">
            <div class="boxed w-98p h-98p blur-10 opacity-90">
<!-- //                ./img/Betta-Fish-Wallpapers.jpg8 -->
                <img class="w-full h-full rounded-2xl" id="img-bg" src="/images/product1.jpg" alt=""> 
            </div>
        </div>
        <div class="content-img">
<!-- //            ./img/Betta-Fish-Wallpapers.png8 -->
            <img class=" absolute z-10 w-112.5 h-112.5 right-25 bottom-25  " id="img-content" src="/images/product1-nobg.png" alt=""> 
        </div>
        <div class="store">
            <h1 class="absolute top-5 left-25 text-36 text-aliceblue font-bold  ">BETTA3TL.<span class="font-normal">COM</span></h1>
        </div>
        <div class="fanpage absolute bottom-5 left-25 text-aliceblue">
            <ul class="list-none flex">
                <li class="my-0 mx-2 text-24" ><span class="uppercase text-12">follow us</span></li>
                <li class="my-0 mx-2 text-24" ><ion-icon name="logo-facebook"></ion-icon></li>
                <li class="my-0 mx-2 text-24" ><ion-icon name="logo-twitter"></ion-icon></li>
                <li class="my-0 mx-2 text-24" ><ion-icon name="logo-instagram"></ion-icon></li>
                <li class="my-0 mx-2 text-24" ><ion-icon name="logo-youtube"></ion-icon></li>
            </ul>
        </div>
        <div class="nav absolute top-5 right-25">
            <ul class=" list-none flex ">
                <li class="my-0 mx-4" ><a class="uppercase text-18 no-underline text-aliceblue " href="/">Home</a></li>
                <li class="my-0 mx-4" ><a class="uppercase text-18 no-underline text-aliceblue " href="#">About</a></li>
                <li class="my-0 mx-4" ><a class="uppercase text-18 no-underline text-aliceblue " href="#">Shop</a></li>
                <li class="my-0 mx-4" ><a class="uppercase text-18 no-underline text-aliceblue " href="#">Contact</a></li>
                <li class="my-0 mx-4" >
                    <a class="icon1 icon uppercase text-18 no-underline text-aliceblue mr-3" href="#"><ion-icon name="person-outline"></ion-icon></a>
                    <a class="icon2 icon uppercase text-18 no-underline text-aliceblue" href="#"><ion-icon name="bag-outline"></ion-icon></a>
                </li>
            </ul>
        </div>
        <div class="content absolute w-30p left-25 top-1/2 -translate-y-1/2 text-aliceblue ">
            <h1 class="name uppercase text-56 ">SUPPER RED</h1>
            <h2 class="subname uppercase font-normal mb-10">HAFMOON BETTA FISH</h2>
            <p class="description my-8">Bettas are a member of the gourami family and are know to be highly territorial.</p>
            <div class="btn w-4/5 grid grid-cols-2 gap-4">
                <button class="p-4 rounded-lg bg-none border-solid border border-aliceblue hover:bg-red-500">SHOP NOW</button>
                <button class="p-4 rounded-lg bg-none border-solid border border-aliceblue hover:bg-red-500">WATCH VIDEO</button>
            </div>
        </div>
    </div>
</body>
</html>