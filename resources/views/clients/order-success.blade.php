@extends('layouts.main')

@section('header')
    @include('layouts.header')
@endsection

@section('body')
    <div class="font-popins mx-20 py-2">
        <div class="status-order bg-slate-100 py-2">
            <div class=" flex justify-center items-center text-32 text-green-400"> 
                <div class="check"><i class="fa-solid fa-circle-check p-2 "></i></div>
                <div class="title"><h1 class="capitalize px-5 py-5">Đặt hàng thành công</h1></div>
            </div>
           
            @switch($infor[0]->status_id)
                @case(0)
                    <div class="status w-3/4 m-auto grid grid-cols-6 mb-3 text-center">
                        <div class="">Đặt hàng thành công</div>
                        <div class="relative active before:absolute before:h-1 before:w-1/2 before:translate-x-1/2 before:bg-green-400 before:border-2 before:border-green-400 before:-bottom-1 before:left-0 before:rounded-full  ">Chờ xác nhận</div>
                        <div class="">Đang xử lý</div>
                        <div class="">Đã gửi hàng</div>
                        <div class="">Hoàn thành</div>
                        <div class="">Đã hủy</div>
                    </div>
                    <div class="line_status relative before:absolute before:top-0 before:left-1/8 before:w-[31.25%]  before:border-2 before:border-green-400 "></div>
                    @break
                    @case(1)
                        <div class="status w-3/4 m-auto grid grid-cols-6 mb-3 text-center">
                            <div class="">Đặt hàng thành công</div>
                            <div class="">Chờ xác nhận</div>
                            <div class="relative active before:absolute before:h-1 before:w-1/2 before:translate-x-1/2 before:bg-green-400 before:border-2 before:border-green-400 before:-bottom-1 before:left-0 before:rounded-full  ">Đang xử lý</div>
                            <div class="">Đã gửi hàng</div>
                            <div class="">Hoàn thành</div>
                            <div class="">Đã hủy</div>
                        </div>
                        <div class="line_status relative before:absolute before:top-0 before:left-1/8 before:w-[43.75%]  before:border-2 before:border-green-400 "></div>
                    @break
                    @case(2)
                        <div class="status w-3/4 m-auto grid grid-cols-6 mb-3 text-center">
                            <div class="">Đặt hàng thành công</div>
                            <div class="">Chờ xác nhận</div>
                            <div class="">Đang xử lý</div>
                            <div class="relative active before:absolute before:h-1 before:w-1/2 before:translate-x-1/2 before:bg-green-400 before:border-2 before:border-green-400 before:-bottom-1 before:left-0 before:rounded-full  ">Đã gửi hàng</div>
                            <div class="">Hoàn thành</div>
                            <div class="">Đã hủy</div>
                        </div>
                        <div class="line_status relative before:absolute before:top-0 before:left-1/8 before:w-[56.25%]  before:border-2 before:border-green-400 "></div>
                    @break
                    @case(3)
                        <div class="status w-3/4 m-auto grid grid-cols-6 mb-3 text-center">
                            <div class="">Đặt hàng thành công</div>
                            <div class="">Chờ xác nhận</div>
                            <div class="">Đang xử lý</div>
                            <div class="">Đã gửi hàng</div>
                            <div class="relative active before:absolute before:h-1 before:w-1/2 before:translate-x-1/2 before:bg-green-400 before:border-2 before:border-green-400 before:-bottom-1 before:left-0 before:rounded-full  ">Hoàn thành</div>
                            <div class="">Đã hủy</div>
                        </div>
                        <div class="line_status relative before:absolute before:top-0 before:left-1/8 before:w-[68.75%]  before:border-2 before:border-green-400 "></div>
                    @break
                    @case(4)
                        <div class="status w-3/4 m-auto grid grid-cols-6 mb-3 text-center">
                            <div class="">Đặt hàng thành công</div>
                            <div class="">Chờ xác nhận</div>
                            <div class="">Đang xử lý</div>
                            <div class="">Đã gửi hàng</div>
                            <div class="">Hoàn thành</div>
                            <div class="relative active before:absolute before:h-1 before:w-1/2 before:translate-x-1/2 before:bg-green-400 before:border-2 before:border-green-400 before:-bottom-1 before:left-0 before:rounded-full  ">Đã hủy</div>
                        </div>
                        <div class="line_status relative before:absolute before:top-0 before:left-1/8 before:w-[80.25%] before:border-2 before:border-green-400 "></div>
                    @break
                    @default 
                        <div class="status w-3/4 m-auto mb-3 text-center">
                            <div class="relative active before:absolute before:h-1 before:w-1/2 before:translate-x-1/2 before:bg-red-500 before:border-2 before:border-red-500 before:-bottom-1  before:rounded-full before:left-0 "><h1 class="text-24 text-red-400">{{$infor[0]->status_name}}</h1></div>
                        </div>
                        
                @endswitch
            {{-- </div>
            <div class="line_status relative before:absolute before:top-0 before:left-1/8 before:w-[31.25%] before:animate-line0 before:border-2 before:border-green-400 "></div> --}}
        </div>
        <div class="infor-order bg-slate-100 mt-1 py-2 px-2">
            <div class="text-center text-32">
                <h1 class="capitalize font-bold">Thông tin đơn hàng</h1>
                @if($infor[0]->payment_id == 0)
                    <div class=""><span class="capitalize text-18 px-4 py-2 border border-red-500 text-red-500">chưa thanh toán</span></div>
                @else
                    <div class=""><span class="capitalize text-18 px-4 py-2 border border-green-500 text-green-500">Đã thanh toán</span></div>
                @endif
            </div>
            <div class="">
                <h2 class="capitalize font-semibold">Thông tin người nhận:</h2>
                <div class="capitalize px-2">
                    <div class="leading-[2] text-14 "><span class="font-semibold">Họ và tên:</span> {{$infor[0]->full_name}}</div>
                    <div class="leading-[2] text-14 "><span class="font-semibold">Số điện thoại:</span> {{$infor[0]->order_phone_number}}</div>
                    <div class="leading-[2] text-14 "><span class="font-semibold">Địa chỉ:</span> {{$infor[0]->order_delivery_address}}</div>
                    <div class="leading-[2] text-14 "><span class="font-semibold">Lời nhắn:</span> {{$infor[0]->order_notes}}</div>
                </div>
            </div>
            <div class=" w-full">
                <table class="w-full capitalize mx-2">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>loại</th>
                        <th>giá</th>
                        <th>số lượng</th>
                        <th>thành tiền</th>
                    </tr>
                    @foreach($bill as $item)
                        @if($item[0]->category_id == 1)
                            <tr class="">
                                <td class="flex items-center">
                                    <img class="min-h-10 w-20" src="{{$item[0]->fish_link_img}}" alt="">
                                    <p class="ml-5">{{$item[0]->fish_name}}</p>
                                </td>
                                <td class="text-center">Size {{$item[0]->fish_size}}</td>
                                <td class="text-center"><span>{{number_format($item[0]->price, 0, '', '.')}} VND</span></td>
                                <td class="text-center">{{$item[0]->quantity}}</td>
                                <td class="text-center">{{number_format(($item[0]->quantity)*($item[0]->price), 0, '', '.')}} VND</td>
                            </tr>
                        @else
                            <tr class="">
                                <td class="flex items-center">
                                    <img class="h-10 w-20" src="{{$item[0]->accessories_link_img}}" alt="">
                                    <p class="ml-5">{{$item[0]->accessories_name}}</p>
                                </td>
                                <td class="text-center">Loại: {{$item[0]->accessories_type_name}}</td>
                                <td class="text-center"><span>{{number_format($item[0]->price, 0, '', '.')}} VND</span></td>
                                <td class="text-center">{{$item[0]->quantity}}</td>
                                <td class="text-center">{{number_format(($item[0]->quantity)*($item[0]->price), 0, '', '.')}} VND</td>
                            </tr>
                        @endif
                    @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-green-500">Đơn Vị Vận Chuyển:</td>
                                <td><h2 class="font-bold">Giao Hàng tiết Kiệm</h2>   <span class="text-14 opacity-80">Nhận hàng vào {{date("d")}} Th{{date("m")}} - @if(date("d") + 3 > 30) {{date("d") + 3 -30}} @else {{date("d") + 3}} @endif Th{{date("m")}}</span></td>
                                <td class="text-center"><span>{{number_format(30000, 0, '', '.')}} VND</span></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="font-bold">Tổng Tiền: <span class="ml-5">{{number_format($total+30000, 0, '', '.')}} VND</span></td>
                            </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('header')
    @include('layouts.footer')
@endsection

