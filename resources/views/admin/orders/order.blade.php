@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Quản lý đơn hàng')
@section('path', 'Đơn hàng')

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mb-2">

    @section('header')
      @include('admin.layout.header')
    @endsection

    <div class="flex justify-between my-4 shadow-md rounded-xl">
      <div class="flex">
        <a
          href="{{ route('order-filter', ['data_id' => 10]) }}"
          class="btn-orders flex flex-col border-2 rounded-md px-6 py-2
          {{ request()->is('admin/orders/10') ? 'border-primary-purple text-primary-purple' : 'border-transparent'}}"
        >
          <span class="text-18">Tất cả</span>
          <span class="text-14 text-slate-400">{{ $totalNewOrders }} đơn hàng</span>
        </a>
        <a
          href="{{ route('order-filter', ['data_id' => 0]) }}"
          class="btn-orders flex flex-col border-2 rounded-md px-6 py-2
          {{ request()->is('admin/orders/0') ? 'border-primary-purple text-primary-purple' : 'border-transparent'}}"
        >
          <span class="text-18">Chờ xác nhận</span>
          <span class="text-14 text-slate-400">{{ $totalOrderWaiting }} đơn hàng</span>
        </a>
        <a
          href="{{ route('order-filter', ['data_id' => 4]) }}"
          class="btn-orders flex flex-col border-2 rounded-md px-6 py-2
          {{ request()->is('admin/orders/4') ? 'border-primary-purple text-primary-purple' : 'border-transparent'}}"
        >
          <span class="text-18">Đã gửi hàng</span>
          <span class="text-14 text-slate-400">{{ $totalOrderConfirmed }} đơn hàng</span>
        </a>
        <a
          href="{{ route('order-filter', ['data_id' => 2]) }}"
          class="btn-orders flex flex-col border-2 rounded-md px-6 py-2
          {{ request()->is('admin/orders/2') ? 'border-primary-purple text-primary-purple' : 'border-transparent'}}"
        >
          <span class="text-18">Hoàn thành</span>
          <span class="text-14 text-slate-400">{{ $totalOrderCompleted }} đơn hàng</span>
        </a>
        <a
          href="{{ route('order-filter', ['data_id' => 3]) }}"
          class="btn-orders flex flex-col border-2 rounded-md px-6 py-2
          {{ request()->is('admin/orders/3') ? 'border-primary-purple text-primary-purple' : 'border-transparent'}}"
        >
          <span class="text-18">Đã hủy</span>
          <span class="text-14 text-slate-400">{{ $totalOrderCanceled }} đơn hàng</span>
        </a>
      </div>


      {{-- <div id="toast-default" class="flex items-center w-[25%] max-w-xs h-[80%] mt-2.5 mr-2.5 p-2 text-gray-500 bg-slate-400 rounded-lg shadow" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg">

            <span class="sr-only">Fire icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">Có {{ $totalOrderWaiting }} đơn hàng mới</div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#toast-default" aria-label="Close">
            <span class="sr-only">Close</span>

        </button>
      </div> --}}

    </div>

    {{-- search --}}
    <div class="w-[40%] pl-4 bg-white rounded-md border-[1.5px] focus-within:border-[1.5px] focus-within:border-primary-purple my-4">
      <form action="{{ route('order-search') }}" method="post" class="flex justify-between">
        @csrf
        <input type="text" placeholder="Tìm hóa đơn của khách hàng" name="user-name" class="caret-blue-500 rounded-md outline-none w-full bg-white placeholder:text-14" required>
          <button type="submit" class="inline-block mr-4 mt-2">
            <lord-icon
              src="https://cdn.lordicon.com/zniqnylq.json"
              trigger="click"
              style="width:24px;height:24px">
          </lord-icon>
          </button>
      </form>
    </div>

{{--      Thong bao xac nhan thanh cong--}}
    @if(session('update-success'))
      <div id="confirm-success" class="bg-slate-200 absolute top-[8.5rem] right-7 rounded-lg border-l-8 border-l-blue-500 opacity-80">
        <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
          <span class="px-4">{{ session('confirm-success') }}</span>
        </div>
      </div>
    @endif

    <div class="flex flex-wrap -mx-3 mb-10 mt-2">
      <div class="flex flex-col w-full max-w-full px-3">
        <div class="flex flex-col min-w-[980px] mb-4 bg-white border-0 border-transparent border-solid shadow-md rounded-lg bg-clip-border overflow-hidden">
          <div class="flex p-2 py-2 items-center justify-between">
            <h3 class="text-[#344767] text-20 font-sora">Đơn Hàng</h3>
          </div>
          <div class="flex-auto px-0 pt-0">
        <div class="p-0 overflow-x-auto place-self-auto">
          <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
            <thead class="align-bottom bg-slate-200 rounded-2xl">
              <tr class="text-black uppercase text-left text-12">
                @if (request()->is('admin/orders/10'))
                  <th class="px-4 py-3 font-bold">#</th>
                @else
                  <th class="px-4 py-3 font-bold opacity">
                    <input
                      type="checkbox"
                      id="checkAll"
                      class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 focus:ring-2"
                    >
                  </th>
                @endif
                <th class="px-4 py-3 font-bold">Mã</th>
                <th class="px-4 py-3 font-bold ">Ngày Tạo</th>
                <th class="px-4 py-3 font-bold ">Khách Hàng</th>
                @if (request()->is('admin/orders/0'))
                @else
                  <th class="px-4 py-3 font-bold ">Trạng thái</th>
                @endif
                <th class="px-4 py-3 font-bold ">Giao hàng</th>
                <th class="px-4 py-3 font-bold ">Thanh toán</th>
                <th class="px-4 py-3 font-bold ">Tổng tiền</th>
                @if (request()->is('admin/orders/0'))
                  <th class="px-4 py-3 font-bold ">Xác nhận</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach ($dataOrders as $key => $order)
                {{-- hover show tooltip --}}
                <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white duration-300 bg-primary-purple rounded-lg shadow-sm tooltip opacity-0">
                  Xem chi tiết đơn hàng
                  <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <tr
                  class="order-element border-t hover:bg-gray-100 cursor-pointer
                  {{$order->status_id == 3 ? 'bg-red-50 bg-opacity-50' : ''}}"
                  data-id="{{ $order->order_id }}"
                >
                  @if (request()->is('admin/orders/10'))
                    <td data-tooltip-target="tooltip-default" class="w-10 p-4 bg-transparent">
                      <div class="py-1">
                        <h6 class="mb-0 text-12 leading-normal">{{ ++$key }}</h6>
                      </div>
                    </td>
                  @else
                    <td class="checkbox w-10 p-4 bg-transparent">
                      <div class="py-1">
                        <h6 class="mb-0 text-12 leading-normal">
                          <input
                            type="checkbox"
                            name=""
                            data-order_id="{{ $order->order_id }}"
                            class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 focus:ring-2"
                          >
                        </h6>
                      </div>
                    </td>
                  @endif

                  <td data-tooltip-target="tooltip-default" class="p-4 bg-transparent">
                    <div class="py-1">
                      <h6 class="mb-0 text-12 leading-normal">{{ $order->order_id }}</h6>
                    </div>
                  </td>
                  <td data-tooltip-target="tooltip-default" class="p-4 bg-transparent">
                    <div class="py-1">
                      <h6 class="mb-0 text-12 leading-normal">
                        {{
                            date('Y-m-d', strtotime($order->order_date)) == date('Y-m-d')
                            ? 'Hôm nay ' . date('H:i:s', strtotime($order->order_date))
                            : $order->order_date
                        }}
                      </h6>
                    </div>
                  </td>
                  <td data-tooltip-target="tooltip-default" class="p-4 bg-transparent">
                    <div class="py-1">
                      <h6 class="mb-0 text-12 leading-normal">{{ $order->last_name .' '. $order->first_name }}</h6>
                    </div>
                  </td>

                  @if (request()->is('admin/orders/0'))
                  @else
                      <div
                        id="tooltip-order-status/{{$key}}"
                        role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white duration-300 rounded-lg shadow-sm tooltip opacity-0
                        {{
                            $order->status_id == 3
                            ? 'bg-red-400'
                            : ($order->status_id == 0  ? 'bg-yellow-400'
                                : ($order->status_id == 1 ? 'bg-primary-blue'
                                : ($order->status_id == 2 ? 'bg-green-400'
                                : ($order->status_id == 4 ? 'bg-primary-purple' : ''))))
                        }}">
                        {{ $order->status_desc }}
                        <div class="tooltip-arrow" data-popper-arrow></div>
                      </div>
                    <td data-tooltip-target="tooltip-order-status/{{$key}}" class="p-4 bg-transparent">
                      <div class="py-1 flex items-center
                        {{
                            $order->status_id == 3 ? 'text-red-400'
                            : ($order->status_id == 0  ? 'text-yellow-400'
                            : ($order->status_id == 1 ? 'text-primary-blue'
                            : ($order->status_id == 2 ? 'text-green-400'
                            :  'text-primary-purple')))
                        }}">
                        <i class="fa-solid fa-circle-dot text-10 mr-1"></i>
                        <h6 class="mb-0 text-12 mt-[1px]">{{ $order->status_name }}</h6>
                      </div>
                    </td>
                  @endif
                    <div
                      id="tooltip-delivery-status/{{$key}}"
                      role="tooltip"
                      class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white duration-300 rounded-lg shadow-sm tooltip opacity-0
                      {{
                          $order->delivery_id == 0
                          ? 'bg-yellow-400'
                          : ($order->delivery_id == 1
                              ? 'bg-primary-purple'
                              : 'bg-green-400')
                      }}">
                      {{ $order->delivery_desc }}
                      <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                  <td data-tooltip-target="tooltip-delivery-status/{{$key}}" class="p-4 bg-transparent">
                    <div class="py-1 flex items-center
                      {{
                          $order->delivery_id == 0
                          ? 'text-yellow-400'
                          : ($order->delivery_id == 1
                              ? 'text-primary-purple'
                              : 'text-green-400')
                      }}">
                      <i class="fa-solid fa-circle-dot text-10 mr-1"></i>
                      <h6 class="text-12 mt-[1px] {{$order->status_id == 3 ? 'line-through' : ''}}">{{ $order->delivery_status }}</h6>
                    </div>
                  </td>

                    <div
                      id="tooltip-payment-status/{{$key}}"
                      role="tooltip"
                      class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white duration-300 rounded-lg shadow-sm tooltip opacity-0
                      {{
                          $order->payment_id == 0
                          ? 'bg-yellow-400'
                          : ($order->payment_id == 1 ? 'bg-green-400' : '')
                      }}">
                      {{ $order->payment_desc }}
                      <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                  <td data-tooltip-target="tooltip-payment-status/{{$key}}" class="p-4 bg-transparent">
                    <div class="py-1 flex items-center
                      {{
                          $order->payment_id == 0
                          ? 'text-yellow-400'
                          : ($order->payment_id == 1 ? 'text-green-400' : '')
                      }}">
                      <i class="fa-solid fa-circle-dot text-10 mr-1"></i>
                      <h6 class="text-12 mt-[1px] {{$order->status_id == 3 ? 'line-through' : ''}}">{{ $order->payment_status }}</h6>
                    </div>
                  </td>
                    <div id="tooltip-totalPrice" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white duration-300 bg-primary-purple rounded-lg shadow-sm tooltip opacity-0">
                      Giá trị đơn hàng
                      <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                  <td data-tooltip-target="tooltip-totalPrice" class="p-4 bg-transparent">
                    <div class="py-1">
                      <h6 class="text-12 leading-normal {{$order->status_id == 3 ? 'line-through' : ''}}">{{ number_format($order->totalPrice, 0, ',', '.') }}đ</h6>
                    </div>
                  </td>

                  @if (request()->is('admin/orders/0'))
                    <td class="p-2 bg-transparent">
                      <div class="py-1">
                        <form action="{{ route('confirm-order') }}" method="post">
{{--                          @csrf--}}
                          <button type="submit" class="text-12 text-primary-purple leading-normal border-2 border-primary-purple px-4 py-2 rounded-xl hover:bg-primary-purple hover:text-white transition-all duration-200">Xác nhận</button>
                        </form>
                      </div>
                    </td>
                  @endif
                </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
      </div>
    </div>

      <div class="mx-3">
        @if (request()->is('admin/orders/0'))
          <button id="confirmAll" class="border select-none px-4 py-3 text-slate-500 opacity-50 pointer-events-none">Xác nhận tất cả các mục đã chọn</button>
        @elseif(request()->is('admin/orders/3'))
          <button id="deleteAll" class="border select-none px-4 py-3 text-slate-500 opacity-50 pointer-events-none">Xóa tất cả các mục đã chọn</button>
        @endif
      </div>


    </div>

  </div>
@endsection

@section('footer')
@include('admin.layout.footer')
@endsection
