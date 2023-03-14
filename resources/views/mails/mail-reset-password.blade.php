{{--<div>--}}
{{--    <h2>{{ $data['title'] }}</h2>--}}
{{--    <span>{{ $data['line1'] }}</span>--}}
{{--    <span>{{ $data['url'] }}</span>--}}
{{--    <span>{{ $data['line2'] }}</span>--}}
{{--</div>--}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('./resources/css/app.css')
</head>
<body class="bg-slate-100">
   <div class="ml-[25%] mt-10">
       <div class="text-center w-[600px] h-[300px] bg-white p-4">
           <h2 class="text-32 text-blue-500 mb-6">{{ $data['title'] }}</h2>
           <span>{{ $data['line1'] }}</span><br>
           <div class="mt-4 p-4 py-4 px-0 bg-blue-100 inline-block shadow-md">
               <a
                   class="p-10"
                   href="{{ $data['url'] }}"
               >
                   Reset password
               </a>
           </div><br>
           <span class="mt-2">{{ $data['line2'] }}</span>
       </div>
   </div>
</body>
</html>
