@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Hóa Đơn Nhập')
@section('path', 'Hóa Đơn Nhập / Danh Sách Hóa Đơn Nhập')

@section('sidebar')
  @include('admin.layout.slidebar')
@endsection
@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection
    
    <div class="flex justify-between my-2 py-1 shadow-md text-gray-700 bg-primary-purple-5 bg-opacity-10 rounded-md select-none">
        <h1 class="flex items-center mx-2">Chi Tiết Hóa Đơn Nhập: </h1>
        <a href="{{route('admin-importwarehouse')}}" class="flex justify-center items-center mx-2 px-2 py-0.5 border rounded-lg">
          <i class="fa-solid fa-right-from-bracket"></i>
          <h3 class="mx-1">Trở lại</h3>
        </a>
      </div>

    <div class="gap-8 mt-4 leading-7 w-1/2">
        <div class="border p-2 rounded-xl shadow-xl">
            <div class="flex mb-1 select-none pointer-events-none">
              <img src="/storage/images/admin/info-order.png" alt="" class="w-8">
              <h1 class="py-1 mx-2 font-sora">Thông Tin Hóa Đơn Nhập</h1>
            </div>
            <p class="border-b"></p>
            <div class="flex flex-col mt-2 mx-2 text-14 font-mono">
              <div class="flex justify-between">
                <span>Mã: </span>
                <span class=" text-14">HDN{{$hoadonnhap->HDN_Ma}}</span>
              </div>
              <div class="flex justify-between">
                <span>Ngày tạo: </span>
                <span class=" text-14">
                  {{
                    date('Y-m-d', strtotime($hoadonnhap->HDN_NgayNhap)) == date('Y-m-d')
                    ? 'Hôm nay ' . date('H:i:s', strtotime($hoadonnhap->HDN_NgayNhap))
                    : $hoadonnhap->HDN_NgayNhap
                  }}
                </span>
              </div>
              <div class="flex justify-between">
                <span>Người tạo: </span>
                <span class=" text-14">{{$hoadonnhap->ND_Ten}}</span>
              </div>
              
            </div>
          </div>
    
    </div>
    {{-- <div class="gap-8 mt-4 leading-7 w-1/2">
        <div class="border p-2 rounded-xl shadow-xl">
            <div class="flex mb-1 select-none pointer-events-none">
              <img src="/storage/images/admin/info-order.png" alt="" class="w-8">
              <h1 class="py-1 mx-2 font-sora">Thông Tin Chi Tiết Hóa Đơn Nhập</h1>
            </div>
            <p class="border-b"></p>
            <div class="flex flex-col mt-2 mx-2 text-14 font-mono">
              <div class="flex justify-between">
                <span>Số lượng: </span>
                <span class=" text-14">{{$hoadonnhap->CTHDN_SoLuong}}</span>
              </div>
              <div class="flex justify-between">
                <span>Giá: </span>
                <span class=" text-14">{{$hoadonnhap->CTHDN_Gia}}</span>
                 
                </span>
              </div>
              
            </div>
          </div>
    </div> --}}
    <div class="mt-10 mb-10">
      <div class="relative">
        <div class="flex flex-wrap">
          <div class="flex-auto pt-0  shadow-xl">
            <table class="items-center w-full mb-0 align-top border-b border-collapse text-slate-500">
              <thead class="align-bottom bg-slate-200 rounded-2xl">
              <tr class="text-black uppercase text-left text-12">
             
                <th class="px-4 py-3 font-bold ">Ảnh</th>
                <th class="px-4 py-3 font-bold">Tên sản phẩm</th>
                <th class="px-4 py-3 font-bold">Danh Mục</th>
                <th class="px-4 py-3 font-bold">Giá nhập</th>
                <th class="px-4 py-3 font-bold ">Nhà Cung Cấp</th>
                <th class="px-4 py-3 font-bold ">Số lượng nhập</th>
                <th class="px-4 py-3 font-bold ">Tổng tiền</th>
                
              </tr> 
              </thead>
              <tbody>
              @foreach($bookDetails as $book)
                <tr class="border-t even:bg-gray-100 odd:bg-white">
              
                  <td class="px-4 py-3 bg-transparent text-left">
                    <div class="">
                      <img src="{{ $book->link_img}}" alt="" class="w-12">
                    </div>
                  </td>
                  <td class="px-4 py-3 bg-transparent">
                    <div class="">
                      <h6 class="mb-0 text-sm leading-normal">{{ $book->name}}</h6>
                    </div>
                  </td>
                  <td class="px-4 py-3 bg-transparent">
                    <div class="">
                      <h6 class="mb-0 text-sm leading-normal">{{ $book->danhmucsanpham}}</h6>
                    </div>
                  </td>
                  <td class="px-4 py-3 bg-transparent">
                    <div class="">
                      <h6 class="mb-0 text-sm leading-normal">{{ number_format($book->gianhap, 0, ',', '.') }}đ</h6>
                    </div>
                  </td>
                  <td class="px-4 py-3 bg-transparent">
                    <div class="">
                      <h6 class="mb-0 text-sm leading-normal">{{ $book->ncc}}</h6>
                    </div>
                  </td>
                  <td class="px-4 py-3 bg-transparent">
                    <div class="">
                      <h6 class="mb-0 text-sm leading-normal ml-8">{{ $book->soluongnhap}}</h6>
                    </div>
                  </td>
                  <td class="px-4 py-3 bg-transparent">
                    <div class="">
                      <h6 class="mb-0 text-sm leading-normal">{{ number_format($book->soluongnhap * $book->gianhap, 0, ',', '.') }}đ</h6>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            <div class="flex justify-between items-center sticky bg-white bottom-0 w-full px-6 py-3 border shadow-sm">
              <div class="text-18">
                Tổng cộng
                <span class="text-primary-purple font-semibold">{{ $totalQuantity }}</span>
                sản phẩm:
                <span class="text-primary-purple font-semibold">{{ number_format($totalPrice, 0, ',', '.') }}đ </span>
              </div>
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