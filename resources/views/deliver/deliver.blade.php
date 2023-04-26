<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Giao Hàng</title>
  @vite([
    './resources/css/app.css',
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
      <div class="w-[360px] min-h-screen rounded-lg shadow-md border bg-primary-purple-2 relative">
        <h1 class="text-center text-24 text-primary-blue border-b border-primary-blue py-1">
          Danh sách đơn hàng
        </h1>
{{--        <button class="px-2 py-0.5 text-18 border-r border-b border-primary-blue rounded-br-2xl mb-2">{{ $groupedOrders->count() }} đơn hàng</button>--}}
        <div class="">

{{--          <div class="flex flex-wrap -mx-3 mb-10 mt-2">--}}
{{--            <div class="flex flex-col w-full max-w-full px-3">--}}
{{--              <div class="flex flex-col mb-6 bg-white overflow-hidden">--}}
{{--                <div class="flex-auto px-0 pt-0">--}}
{{--                  <div class="p-0 overflow-x-auto place-self-auto">--}}
                  @foreach ($groupedOrders as $address => $orders)
                    <div class="my-3">
                      <div class="my-1 text-14">
                        <span class="bg-primary-blue px-4 py-1 border-primary-blue rounded-tr-2xl font-sora">{{  $address }}</span>
                      </div>
                      @foreach($orders as $order)
                        <div class="bg-slate-100 mb-0.5 border-b hover:bg-slate-200 transition-all rounded-tr-3xl rounded-bl-3xl shadow-sm">
                          <a href="deliver/order-detail/{{$order->order_id}}" class="">
                            <button class="block text-10 text-left border pr-1 bg-primary-blue text-white">{{ $order->order_id }}</button>
                            <div class="flex justify-between px-2 text-12">
                              <div class="w-28">Người nhận: </div>
                              <span class="pr-4 font-normal uppercase text-primary-blue">{{ $order->full_name }}</span>
                            </div>
                            <div class="flex justify-between px-2 text-12">
                              <div class="w-28">Số điện thoại: </div>
                              <span class="pr-4 font-normal uppercase text-primary-blue">{{ $order->order_phone_number }}</span>
                            </div>
                            <div class="flex justify-between px-2 text-12">
                              <div class="w-28">Ghi chú: </div>
                              <span class="pr-4 font-normal text-slate-700">{{ $order->order_notes ? $order->order_notes : 'Không có'}}</span>
                            </div>
                          </a>
                        </div>
                      @endforeach
                    </div>
                  @endforeach

{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}


{{--            </div>--}}

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
