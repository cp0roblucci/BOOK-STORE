@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Quản lý đơn hàng')
@section('path', 'Đơn hàng / Chi tiết đơn hàng')

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mb-16 select-none">

    @section('header')
      @include('admin.layout.header')
    @endsection

    <div class="flex justify-between my-2 py-1 shadow-md text-gray-700 bg-primary-purple-5 bg-opacity-10 rounded-md select-none">
      <h1 class="flex items-center mx-2">Chi Tiết Đơn Hàng: <span class="mx-1 underline">{{ $order->order_id }}</span></h1>
      <a href="/admin/orders/{{$order->status_id ?? 10}}" class="flex justify-center items-center mx-2 px-2 py-0.5 border rounded-lg">
        <i class="fa-solid fa-right-from-bracket"></i>
        <h3 class="mx-1">Trở lại</h3>
      </a>
    </div>

    <div class="grid grid-cols-3 gap-8 mt-4 leading-7">

      <div class="border p-2 rounded-xl shadow-xl">
        <div class="flex mb-1 select-none pointer-events-none">
          <img src="/storage/images/admin/info-order.png" alt="" class="w-8">
          <h1 class="py-1 mx-2 font-sora">Thông Tin Đơn Hàng</h1>
        </div>
        <p class="border-b"></p>
        <div class="flex flex-col mt-2 mx-2 text-14 font-mono">
          <div class="flex justify-between">
            <span>Mã: </span>
            <span class=" text-14">{{ $order->order_id }}</span>
          </div>
          <div class="flex justify-between">
            <span>Ngày tạo: </span>
            <span class=" text-14">
              {{
                date('Y-m-d', strtotime($order->order_date)) == date('Y-m-d')
                ? 'Hôm nay ' . date('H:i:s', strtotime($order->order_date))
                : $order->order_date
              }}
            </span>
          </div>
          <div class="flex justify-between">
            <span>Trạng thái đơn hàng:</span>
            <span class="text-14
            {{
                $order->status_id == 0 ? 'text-yellow-400'
                : ($order->status_id == 1 ? 'text-primary-blue'
                : ($order->status_id == 2 ? 'text-primary-purple'
                : ($order->status_id == 3 ? 'text-green-400'
                : ($order->status_id == 4 ? 'text-red-400' : 'text-orange-400'))))
            }}">
              {{ $order->status_name }}
            </span>
          </div>

          <div class="flex justify-between">
            <span>Trạng thái giao hàng:</span>
            <span class=" text-14
            {{
                $order->delivery_id == 0 ? 'text-yellow-400'
                : ($order->delivery_id == 1 ? 'text-primary-purple'
                :  'text-green-400')
            }}">
              {{ $order->delivery_status }}
            </span>
          </div>

          <div class="flex justify-between">
            <span>Trạng thái thanh toán:</span>
            <span class=" text-14
            {{
              $order->payment_id == 0
              ? 'text-yellow-400'
              : ($order->payment_id == 1 ? 'text-green-400' : '')
            }}">
              {{ $order->payment_status }}
            </span>
          </div>
        </div>
      </div>

      <div class="border p-2 rounded-xl shadow-xl">
        <div class="flex mb-1 select-none pointer-events-none">
          <img src="/storage/images/admin/info-customer.png" alt="" class="w-8 pointer-events-none select-none">
          <h1 class="py-1 mx-2 font-sora">Thông Tin Khách Hàng</h1>
        </div>
        <p class="border-b"></p>
        <div class="flex flex-col mt-2 mx-2 font-mono">
          <div class="flex justify-between text-14">
            <span class="text-14">Họ tên: </span>
            <span class=" text-14">{{ $order->last_name .' '. $order->first_name }}</span>
          </div>
          <div class="flex justify-between">
            <span class="text-14">Sđt: </span>
            <span class=" text-14">{{ $order->phone_number }}</span>
          </div>
          <div class="flex justify-between">
            <span class="text-14">Địa chỉ:</span>
            <span class=" text-14">
              {{ $order->user_address }}
            </span>
          </div>
        </div>
      </div>

      <div class="border p-2 rounded-xl shadow-xl">
        <div class="flex mb-1 select-none pointer-events-none">
          <img src="/storage/images/admin/info-delivery.png" alt="" class="w-8 pointer-events-none select-none">
          <h1 class="py-1 mx-2 font-sora">Thông Tin Giao Hàng</h1>
        </div>
        <p class="border-b"></p>
        <div class="flex flex-col mt-2 mx-2 font-mono">
          <div class="flex justify-between text-14">
            <span>Họ tên: </span>
            <span class="">{{ $order->full_name }}</span>
          </div>
          <div class="flex justify-between text-14">
            <span>Sđt: </span>
            <span class="">{{ $order->order_phone_number }}</span>
          </div>
          <div class="flex justify-between text-14">
            <span>Địa chỉ: </span>
            <span class="">{{ $order->order_delivery_address }}</span>
          </div>
          <div class="flex justify-between text-14">
            <span>Ghi chú: </span>
            <span class="">{{ $order->order_notes }}</span>
          </div>
        </div>
      </div>
    

    </div>

    <div class="mt-10 mb-10">
      <div class="relative">
        <div class="flex flex-wrap">
          <div class="flex-auto pt-0  shadow-xl">
            <table class="items-center w-full mb-0 align-top border-b border-collapse text-slate-500">
              <thead class="align-bottom bg-slate-200 rounded-2xl">
              <tr class="text-black uppercase text-left text-12">
                {{--                      <th class="px-4 py-3 font-bold ">Loại sản phẩm</th>--}}
                <th class="px-4 py-3 font-bold ">Ảnh</th>
                <th class="px-4 py-3 font-bold">Tên sản phẩm</th>
                <th class="px-4 py-3 font-bold">Số lượng</th>
                <th class="px-4 py-3 font-bold">Đơn giá</th>
                <th class="px-4 py-3 font-bold ">Thành tiền</th>
              </tr>
              </thead>
              <tbody>
              @foreach($productDetails as $product)
                <tr class="border-t even:bg-gray-100 odd:bg-white">
                  {{--                        <td class="p-4 bg-transparent text-left">--}}
                  {{--                          <div class="">--}}
                  {{--                            <h6 class="mb-0 text-sm leading-normal">Cá</h6>--}}
                  {{--                          </div>--}}
                  {{--                        </td>--}}
                  <td class="px-4 py-3 bg-transparent text-left">
                    <div class="">
                      <img src="{{ $product->link_img }}" alt="" class="w-12">
                    </div>
                  </td>
                  <td class="px-4 py-3 bg-transparent">
                    <div class="">
                      <h6 class="mb-0 text-sm leading-normal">{{ $product->name }}</h6>
                    </div>
                  </td>
                  <td class="px-4 py-3 bg-transparent">
                    <div class="">
                      <h6 class="mb-0 text-sm leading-normal">{{ $product->quantity }}</h6>
                    </div>
                  </td>
                  <td class="px-4 py-3 bg-transparent">
                    <div class="">
                      <h6 class="mb-0 text-sm leading-normal"> {{ number_format($product->price, 0, ',', '.') }}</h6>
                    </div>
                  </td>
                  <td class="px-4 py-3 bg-transparent">
                    <div class="">
                      <h6 class="mb-0 text-sm leading-normal">{{ number_format($product->quantity * $product->price, 0, ',', '.') }}đ</h6>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>

            <div class="flex justify-between items-center sticky bg-white bottom-0 w-full px-6 py-3 border shadow-sm">
              <div class="text-18">
                Tổng cộng
                <span class="text-primary-purple font-semibold">{{ count($productDetails) }}</span>
                sản phẩm:
                <span class="text-primary-purple font-semibold">{{ number_format($totalPrice, 0, ',', '.') }}đ </span>
              </div>

              {{-- @if ($order->status_id == 0)
              <div>
                <form action="" method="post">
                  <button type="submit" class="border px-4 py-1.5 text-18 border-primary-blue text-primary-blue">Xác nhận đơn hàng</button>
                </form>
              </div>
              @endif --}}


              @if ($order->status_id == 0)
                <form action="{{ route('confirm-order') }}" method="post">
                  @csrf
                  <label hidden="">
                    <input name="order_id" value="{{ $order->order_id }}">
                    <input name="status_id" value="{{ $order->status_id }}">
                  </label>
                  <button type="submit" class="text-12 text-yellow-400 leading-normal border-2 border-yellow-400 px-4 py-2 rounded-xl hover:bg-yellow-400 hover:text-white transition-all duration-200">Xác nhận</button>
                </form>
              @elseif ($order->status_id == 1)
                <form action="{{ route('confirm-order') }}" method="post">
                  @csrf
                  <label hidden="">
                    <input name="order_id" value="{{ $order->order_id }}">
                    <input name="status_id" value="{{ $order->status_id }}">
                  </label>
                  <button type="submit" class="text-12 text-primary-blue leading-normal border-2 border-primary-blue  px-4 py-2 rounded-xl hover:bg-primary-blue  hover:text-white transition-all duration-200">Xác nhận gửi hàng</button>
                </form>
              @elseif ($order->status_id == 2)
                <form action="{{ route('confirm-order') }}" method="post">
                  @csrf
                  <label hidden="">
                    <input name="order_id" value="{{ $order->order_id }}">
                    <input name="status_id" value="{{ $order->status_id }}">
                  </label>
                  <button type="submit" class="text-12 text-primary-purple leading-normal border-2 border-primary-purple  px-4 py-2 rounded-xl hover:bg-primary-purple hover:text-white transition-all duration-200">Xác nhận hoàn thành</button>
                </form>
              @elseif ($order->status_id == 3)
                <div class="flex justify-between">
                  <form action="{{ route('confirm-order') }}" method="post" class="ml-2">
                    @csrf
                    <label hidden="">
                      <input name="order_id" value="{{ $order->order_id }}">
                      <input name="status_id" value="{{ $order->status_id }}">
                    </label>
                    <button type="submit" class="text-12 text-green-400 leading-normal border-2 border-green-400  px-4 py-2 rounded-xl hover:bg-green-400  hover:text-white transition-all duration-200">Lưu trữ</button>
                  </form>
                </div>
              @elseif ($order->status_id == 4)
                <form action="{{ route('confirm-order') }}" method="post">
                  @csrf
                  <label hidden="">
                    <input name="order_id" value="{{ $order->order_id }}">
                    <input name="status_id" value="{{ $order->status_id }}">
                  </label>
                  <button type="submit" class="text-12 text-red-400 leading-normal border-2 border-red-400  px-4 py-2 rounded-xl hover:bg-red-400  hover:text-white transition-all duration-200">Xóa</button>
                </form>
              @elseif ($order->status_id == 5)
                    <form action="{{ route('confirm-order') }}" method="post">
                      @csrf
                      <label hidden="">
                        <input name="order_id" value="{{ $order->order_id }}">
                        <input name="status_id" value="{{ $order->status_id }}">
                      </label>
                      <button type="submit" class="text-12 text-red-400 leading-normal border-2 border-red-400  px-4 py-2 rounded-xl hover:bg-red-400  hover:text-white transition-all duration-200">Xóa</button>
                    </form>
              @endif

            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection
