<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Giao Hàng</title>
  @vite([
    './resources/css/app.css'
  ])
  <link rel="shortcut icon" sizes="114x114" href="{{  URL::to('/storage/images/logo.png') }}">
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
<body class="scrollbar-thin scroll-smooth scrollbar-thumb-rounded-lg scrollbar-thumb-blue-200 scrollbar-track-gray-100">

  {{-- <div class="fixed w-full min-h-[18.75rem]"></div> --}}
  <div class="main bg-primary-purple-1">


    {{-- <div class="bg-red-500 max-w-[100px] h-screen border">
      <div class="text-center text-56">Giao Hàng</div>
    </div> --}}
    <div class="flex justify-center">
      <div class="w-[360px] h-screen rounded-lg shadow-md border bg-primary-blue-2 relative">
        <h1 class="text-center text-24 text-primary-purple border-b border-primary-blue py-1 relative">
          <a href="/deliver"><i class="fa-solid fa-arrow-left absolute left-2 top-3"></i></a>
          Chi tiết đơn hàng
        </h1>
        <div class="">
{{--          <div class="flex flex-wrap -mx-3 mb-10">--}}
{{--            <div class="flex flex-col w-full max-w-full px-3">--}}
{{--              <div class="flex flex-col mb-6 bg-white overflow-hidden">--}}
{{--                <div class="flex-auto px-0 pt-0">--}}
{{--                  <div class="p-0 overflow-x-auto place-self-auto">--}}
                  @foreach ($productDetails as $product)
                    <div class="bg-white px-2 py-0.5 my-1 text-12 border-b rounded-tl-3xl rounded-br-3xl shadow-md transition-all">
                        <div class="flex justify-between items-center px-1 py-1 text-14">
                          <div class="flex items-center">
                            <img src="{{ $product->link_img}}" alt="" class="w-14 rounded-sm">
                            <span class="ml-2">{{ $product->name }}</span>
                          </div>
                          <div class="flex">
                            <p class="">{{ $product->quantity }} x {{ number_format($product->price, 0, ',', '.') }}đ</p>
                          </div>
                        </div>
                      </div>
                  @endforeach

                  <p class="border p-2 text-right">Thành tiền: <span class="text-primary-purple">{{ number_format($totalPrice, 0, ',', '.') }}đ</span></p>
                  <div class="bg-slate-200 mt-6 sticky bottom-0">
                    <form action="{{ route('confirm-delivery-success')}}" method="post">
                      @csrf
                      <input type="text" name="order_id" value="{{ $order->order_id }}" hidden>
                      <button class="w-full text-12 border px-2 py-2 bg-primary-purple text-white rounded-lg">Giao hàng thành công</button>
                    </form>
                  </div>

{{--                </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--      --}}
{{--      --}}
{{--            </div>--}}
{{--      --}}
{{--          </div>--}}


        </div>


        <div class="bg-white flex justify-around items-center h-10 absolute bottom-0 left-0 right-0">
          <a href="" class="text-26 text-primary-blue"><i class="fa-solid fa-house"></i></a>
          <a href="" class="text-26 text-primary-blue"><i class="fa-solid fa-user"></i></a>
        </div>

      </div>
    </div>

  </div >

</body>
</html>
