<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('./resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section class="bg-gray-400 flex items-center justify-center max-h-screen">
        {{-- img container --}}
        <div style="background-image:url(https://images.unsplash.com/photo-1497671954146-59a89ff626ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80) " 
        class="bg-gray-200 flex max-w-3xl p-5 shadow-lg rounded-lg">
            <div class="w-1/2">
                <img src="https://plus.unsplash.com/premium_photo-1673515785719-cc32208e7571?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=327&q=80" alt="">
            </div>
            <div class="w-1/2">
                <h2>Test</h2>
            </div>
        </div>
    </section>
</body>
</html>