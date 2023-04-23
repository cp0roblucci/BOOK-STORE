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
      <div class="flex w-full justify-between">
        @foreach ($orderQuantityByStatus as $key => $value)
          @foreach ($value as $order_status => $quantity)
            <a
              href="{{ route('order-filter', ['data_id' => $key]) }}"
              class="btn-orders flex flex-col border-2 rounded-md px-6 py-2 hover:bg-primary-purple-1
              {{
                request()->segment(3) == $key ? 'border-primary-purple text-primary-purple' : 'border-transparent'
              }}"
            >
              <span class="text-16">{{ $order_status }}</span>
              <span class="text-14 text-slate-400">{{ $quantity }} đơn hàng</span>
            </a>
          @endforeach
        @endforeach
      </div>


    </div>

    {{-- search --}}
    <div class="w-[40%] pl-4 bg-white rounded-md border-[1.5px] focus-within:border-[1.5px] focus-within:border-primary-purple my-4">
      <form action="{{ route('order-search') }}" method="post" class="flex justify-between">
        @csrf
        <input
          type="text"
          name="status_id"
          value="{{ request()->segment(3) }}"
          hidden
        >
        <input
          type="text"
          placeholder="Tìm hóa đơn của khách hàng"
          name="user_name"
          required
          class="caret-blue-500 rounded-md outline-none w-full bg-white placeholder:text-14"
        >
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
    @if(session('confirm-success'))
      <div id="message" class="flex absolute top-[8.5rem] right-7">
        <div id=""
             class="bg-slate-200 flex justify-between rounded-lg border-l-8 opacity-80
          {{
            request()->segment(3) == 4 ? 'border-l-red-400'
            : (request()->segment(3) == 3 ? 'border-l-green-400'
            : (request()->segment(3) == 1 || request()->segment(3) == 0 ? 'border-l-yellow-400'
            : (request()->segment(3) == 2 ? 'border-l-primary-purple' : '')))
          }}"
        >
          <div class="py-4 relative before:absolute before:bottom-0 before:content-[''] before:h-0.5 before:w-full before:animate-before
            {{
            request()->segment(3) == 4 ? 'text-red-400 before:bg-red-400'
            : (request()->segment(3) == 3 ? 'text-green-400 before:bg-green-400'
            : (request()->segment(3) == 1 || request()->segment(3) == 0 ? 'text-yellow-400 before:bg-yellow-400'
            : (request()->segment(3) == 2 ? 'text-primary-purple before:bg-primary-purple': '')))
          }}"
          >
            <span class="px-4">{{ session('confirm-success') }}</span>
          </div>
        </div>
      </div>
    @endif

    @if ($dataOrders->count() == 0 )
      <div class="flex flex-wrap -mx-3 mb-10 mt-2">
        <div class="flex flex-col w-full max-w-full px-3">
          <div class="flex flex-col min-w-[980px] mb-4 bg-white border-0 border-transparent border-solid shadow-md rounded-lg bg-clip-border overflow-hidden">
            <div class="flex p-2 py-2 items-center justify-between">
              @if ($userName == '' && request()->segment(3) == 3)
                <h3 class="text-[#344767] text-20 font-sora">Tất cả đơn hàng đã bị xóa hoặc được lưu trữ.</h3>
              @elseif($userName != '')
                <h3 class="text-[#344767] text-20 font-sora">Không tìm thấy đơn hàng nào của người dùng có tên "{{ $userName }}".</h3>
              @else
                <h3 class="text-[#344767] text-20 font-sora">Không có đơn hàng nào đang trong trạng thái này.</h3>
              @endif
            </div>
            <div class="flex-auto px-0 pt-0">
            </div>
          </div>
        </div>
        @else
          <div class="flex flex-wrap -mx-3 mb-10 mt-2">
            <div class="flex flex-col w-full max-w-full px-3">
              <div class="flex flex-col min-w-[980px] mb-4 bg-white border-0 border-transparent border-solid shadow-md rounded-lg bg-clip-border overflow-hidden">
                <div class="flex p-2 py-2 items-center justify-between">
                  <h3 class="text-[#344767] text-20 font-sora">{{ $userName ? 'Các đơn hàng của người dùng tên "' . $userName .'"' : 'Đơn Hàng'}}</h3>
                </div>
                <div class="flex-auto px-0 pt-0">
                  <div class="p-0 overflow-x-auto place-self-auto">
                    <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                      <thead class="align-bottom bg-slate-200 rounded-2xl">
                      <tr class="text-black uppercase text-left text-12">

                        @if (request()->segment(3) == 10)
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

                        @if (request()->segment(3) == 10)
                          <th class="px-4 py-3 font-bold ">Trạng thái</th>
                        @else
                        @endif

                        <th class="px-4 py-3 font-bold ">Giao hàng</th>
                        <th class="px-4 py-3 font-bold ">Thanh toán</th>
                        <th class="px-4 py-3 font-bold ">Tổng tiền</th>

                        @if (request()->segment(3) == 0)
                          <th class="px-4 py-3 font-bold text-center">Xác nhận</th>
                        @elseif(request()->segment(3) == 1)
                          <th class="px-4 py-3 font-bold text-center">Xác nhận gửi hàng</th>
                        @elseif(request()->segment(3) == 2)
                          <th class="px-4 py-3 font-bold text-center">Xác nhận hoàn tất</th>
                        @elseif(request()->segment(3) == 3)
                          <th class="px-4 py-3 font-bold text-center">Hành động</th>
                        @elseif(request()->segment(3) == 4 || request()->segment(3) == 5)
                          <th class="px-4 py-3 font-bold text-center">Xóa</th>
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
                    {{$order->status_id == 4 ? 'bg-red-50 bg-opacity-50' : ''}}"
                          data-id="{{ $order->order_id }}"
                        >
                          @if (request()->segment(3) == 10)
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
                                    id="checkBox"
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

                          @if (request()->segment(3) == 10)
                            <div
                              id="tooltip-order-status/{{$key}}"
                              role="tooltip"
                              class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white duration-300 rounded-lg shadow-sm tooltip opacity-0
                        {{
                            $order->status_id == 4
                            ? 'bg-red-400'
                            : ($order->status_id == 0  ? 'bg-yellow-400'
                                : ($order->status_id == 1 ? 'bg-primary-blue'
                                : ($order->status_id == 3 ? 'bg-green-400'
                                : ($order->status_id == 2 ? 'bg-primary-purple' : 'bg-orange-400'))))
                        }}">
                              {{ $order->status_desc }}
                              <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <td data-tooltip-target="tooltip-order-status/{{$key}}" class="p-4 bg-transparent">
                              <div class="py-1 flex items-center
                        {{
                            $order->status_id == 4 ? 'text-red-400'
                            : ($order->status_id == 0  ? 'text-yellow-400'
                            : ($order->status_id == 1 ? 'text-primary-blue'
                            : ($order->status_id == 3 ? 'text-green-400'
                            : ($order->status_id == 2 ? 'text-primary-purple'
                            :  'text-orange-400'))))
                        }}">
                                <i class="fa-solid fa-circle-dot text-10 mr-1"></i>
                                <h6 class="mb-0 text-12 mt-[1px]">{{ $order->status_name }}</h6>
                              </div>
                            </td>
                          @else
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
                              <h6 class="text-12 mt-[1px] {{$order->status_id == 4 ? 'line-through' : ''}}">{{ $order->delivery_status }}</h6>
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
                              <h6 class="text-12 mt-[1px] {{$order->status_id == 4 ? 'line-through' : ''}}">{{ $order->payment_status }}</h6>
                            </div>
                          </td>
                          <div id="tooltip-totalPrice" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white duration-300 bg-primary-purple rounded-lg shadow-sm tooltip opacity-0">
                            Giá trị đơn hàng
                            <div class="tooltip-arrow" data-popper-arrow></div>
                          </div>

                          <td data-tooltip-target="tooltip-totalPrice" class="p-4 bg-transparent">
                            <div class="py-1">
                              <h6 class="text-12 leading-normal {{$order->status_id == 4 ? 'line-through' : ''}}">{{ number_format($order->totalPrice, 0, ',', '.') }}đ</h6>
                            </div>
                          </td>

                          @if (request()->segment(3) == 0)
                            <td class="p-2 bg-transparent">
                              <div class="py-1 text-center">
                                <form action="{{ route('confirm-order') }}" method="post">
                                  @csrf
                                  <label hidden="">
                                    <input name="order_id" value="{{ $order->order_id }}">
                                    <input name="status_id" value="{{ $order->status_id }}">
                                  </label>
                                  <button type="submit" class="text-12 text-yellow-400 leading-normal border-2 border-yellow-400 px-4 py-2 rounded-xl hover:bg-yellow-400 hover:text-white transition-all duration-200">Xác nhận</button>
                                </form>
                              </div>
                            </td>
                          @elseif (request()->segment(3) == 1)
                            <td class="p-2 bg-transparent">
                              <div class="py-1 text-center">
                                <form action="{{ route('confirm-order') }}" method="post">
                                  @csrf
                                  <label hidden="">
                                    <input name="order_id" value="{{ $order->order_id }}">
                                    <input name="status_id" value="{{ $order->status_id }}">
                                  </label>
                                  <button type="submit" class="text-12 text-primary-blue leading-normal border-2 border-primary-blue  px-4 py-2 rounded-xl hover:bg-primary-blue  hover:text-white transition-all duration-200">Xác nhận gửi hàng</button>
                                </form>
                              </div>
                            </td>
                          @elseif (request()->segment(3) == 2)
                            <td class="p-2 bg-transparent">
                              <div class="py-1 text-center">
                                <form action="{{ route('confirm-order') }}" method="post">
                                  @csrf
                                  <label hidden="">
                                    <input name="order_id" value="{{ $order->order_id }}">
                                    <input name="status_id" value="{{ $order->status_id }}">
                                  </label>
                                  <button type="submit" class="text-12 text-primary-purple leading-normal border-2 border-primary-purple  px-4 py-2 rounded-xl hover:bg-primary-purple hover:text-white transition-all duration-200">Xác nhận hoàn thành</button>
                                </form>
                              </div>
                            </td>
                          @elseif (request()->segment(3) == 3)
                            <td class="p-2 bg-transparent">
                              <div class="flex justify-around py-1 text-center">
                                <form action="{{ route('confirm-order') }}" method="post">
                                  @csrf
                                  <label hidden="">
                                    <input name="order_id" value="{{ $order->order_id }}">
                                    <input name="status_id" value="{{ $order->status_id }}">
                                  </label>
                                  <button type="submit" class="text-12 text-green-400 leading-normal border-2 border-green-400  px-4 py-2 rounded-xl hover:bg-green-400  hover:text-white transition-all duration-200">Lưu trữ</button>
                                </form>
                              </div>
                            </td>
                          @elseif (request()->segment(3) == 4)
                            <td class="p-2 bg-transparent">
                              <div class="py-1 text-center">
                                <form action="{{ route('confirm-order') }}" method="post">
                                  @csrf
                                  <label hidden="">
                                    <input name="order_id" value="{{ $order->order_id }}">
                                    <input name="status_id" value="{{ $order->status_id }}">
                                  </label>
                                  <button type="submit" class="text-12 text-red-400 leading-normal border-2 border-red-400  px-4 py-2 rounded-xl hover:bg-red-400  hover:text-white transition-all duration-200">Xóa</button>
                                </form>
                              </div>
                            </td>
                            @elseif (request()->segment(3) == 5)
                              <td class="p-2 bg-transparent">
                                <div class="py-1 text-center">
                                  <form action="{{ route('confirm-order') }}" method="post">
                                    @csrf
                                    <label hidden="">
                                      <input name="order_id" value="{{ $order->order_id }}">
                                      <input name="status_id" value="{{ $order->status_id }}">
                                    </label>
                                    <button type="submit" class="text-12 text-red-400 leading-normal border-2 border-red-400  px-4 py-2 rounded-xl hover:bg-red-400  hover:text-white transition-all duration-200">Xóa</button>
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
              @if (request()->segment(3) == 0)
                <button
                  id="confirm-all-waiting-orders"
                  class="border select-none px-4 py-3 text-slate-500 opacity-50 pointer-events-none"
                  data-status_id="{{ request()->segment(3) }}"
                >
                  Xác nhận các mục đã chọn
                </button>
              @elseif(request()->segment(3) == 1)
                <button
                  id="confirm-all-processing-orders"
                  class="border select-none px-4 py-3 text-slate-500 opacity-50 pointer-events-none"
                  data-status_id="{{ request()->segment(3) }}"
                >
                  Xác nhận các mục đã chọn
                </button>
              @elseif(request()->segment(3) == 2)
                <button
                  id="confirm-all-sent-orders"
                  class="border select-none px-4 py-3 text-slate-500 opacity-50 pointer-events-none"
                  data-status_id="{{ request()->segment(3) }}"
                >
                  Xác nhận các mục đã chọn
                </button>
              @elseif(request()->segment(3) == 3)
                <button
                  id="archived-all-orders"
                  class="border select-none px-4 py-3 text-slate-500 opacity-50 pointer-events-none"
                >
                  Lưu trữ các mục đã chọn
                </button>
              @elseif(request()->segment(3) == 4)
                <button
                  id="delete-all-orders"
                  class="border select-none px-4 py-3 text-slate-500 opacity-50 pointer-events-none"
                  data-status_id="{{ request()->segment(3) }}"
                >
                  Xóa các mục đã chọn
                </button>
              @elseif(request()->segment(3) == 5)
                <button
                  id="delete-all-archived-orders"
                  class="border select-none px-4 py-3 text-slate-500 opacity-50 pointer-events-none"
                  data-status_id="{{ request()->segment(3) }}"
                >
                  Xóa các mục đã chọn
                </button>
              @endif
            </div>

            @endif

          </div>

      </div>
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection
