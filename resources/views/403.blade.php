<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rất tiếc, bạn không có quyền!!!</title>
  @vite(['./resources/css/app.css',
        './resources/js/app.js',
  ])
</head>
<body class="items-center">
  <div class="text-center ml-60 items-center">
      <img class="h-64 ml-96" src="/storage/images/logo.png" alt=""></a>
      <h1 class="text-center -ml-72 text-26 font-sora font-bold mt-4">Rất tiếc, bạn không có quyền truy cập đường dẫn này!!!</h1>
      <h2 class="-ml-72 text-24 mt-2 font-sora font-bold">Bạn có thể quay lại trang chủ </h2>
      <a href="{{route('home')}}" class="">
        <h3 class= "-ml-72 text-24 mt-2 font-sora text-blue-600 font-bold text-decoration-line: underline">
          <i class="fa-solid fa-arrow-left relative right-1 top-0.5"></i>
          Quay lại
        </h3>     
  </div>
</body>
</html>
