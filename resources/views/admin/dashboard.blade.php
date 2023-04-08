@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Thống Kê')
@section('path', 'Thống kê')

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection
    <div class="">
      {{-- @include('components.admin.form-input') --}}
      {{-- Product --}}

      <div class="">
        <div class="grid grid-cols-3 gap-4 bg-gradient-to-r from-[#3b82f6] to-indigo-600 py-5 px-4 rounded-xl shadow-sm">

          <div class="border border-white h-24  rounded-xl bg-gradient-to-br from-[#ffffff55] to-[#ffffff20]">
            <div class="p-2 flex items-center justify-between">
              {{-- <img src="{{ URL::to('/images/admin/fish.png')}}" alt="fish" class="w-16 h-16"> --}}
              <div class="flex flex-col text-white">
                <h2 class="uppercase text-14">Số lượng sản phẩm</h2>
                <span class="font-bold mt-6 text-20">{{ $totalProduct }}+</span>
              </div>
              <div class="mr-10">
                <i class="fa-solid fa-basket-shopping text-white text-32"></i>
              </div>
            </div>
          </div>

          <div class="border border-white h-24  rounded-xl bg-gradient-to-br from-[#ffffff55] to-[#ffffff20]">
            <div class="p-2 flex items-center justify-between">
              <div class="flex flex-col text-white">
                <h2 class="uppercase text-14">Tổng số khách hàng</h2>
                <span class="font-bold mt-6 text-20">{{ $totalCustomer }}</span>
              </div>
              <div class="mr-10">
                <i class="fa-solid fa-user text-white text-32"></i>
              </div>
              {{-- <img src="{{ URL::to('/images/admin/user.png')}}" alt="user" class="w-16 h-16 opacity-30"> --}}
            </div>
          </div>

          <div class="border border-white h-24  rounded-xl bg-gradient-to-br from-[#ffffff55] to-[#ffffff20]">
            <div class="p-2 flex items-center justify-between">
              {{-- <img src="{{ URL::to('/images/admin/cart.png')}}" alt="cart" class="w-16 h-16"> --}}
              <div class="flex flex-col text-white">
                <h2 class="uppercase text-14 ">Đơn đặt hàng mới</h2>
                <span class="font-bold mt-6 text-20">{{ $totalOrder }}</span>
              </div>
              <div class="mr-10">
                <i class="fa-solid fa-cart-shopping text-white text-32"></i>
              </div>
            </div>
          </div>

        </div>
      </div>

      {{-- Chart --}}
      <div class="grid grid-cols-4 gap-4 mt-4">
        <div class="last-week-chart col-span-3 text-center rounded-2xl shadow-md w-full">
          <canvas id="lastWeekChart"></canvas>
          <div class="loading1">
            <div class="w-12 h-12 absolute top-[35%] left-[33.5%] rounded-full animate-spin
                    border-y-8 border-solid border-blue-100 border-t-transparent shadow-md"></div>
            <div class="w-12 h-12 absolute top-[35%] left-[36.5%] rounded-full animate-spin
                    border-y-8 border-solid border-purple-400 border-b-transparent shadow-md"></div>
          </div>
        </div>
        <div class="last-seven-day-chart col-span-3 text-center rounded-2xl shadow-md w-full hidden">
          <div class="loading2">
            <div class="w-12 h-12 absolute top-[35%] left-[33.5%] rounded-full animate-spin
                    border-y-8 border-solid border-blue-100 border-t-transparent shadow-md"></div>
            <div class="w-12 h-12 absolute top-[35%] left-[36.5%] rounded-full animate-spin
                    border-y-8 border-solid border-purple-400 border-b-transparent shadow-md"></div>
          </div>
          <canvas id="lastSevenDay"></canvas>
        </div>
        <div class="period-chart relative col-span-3 text-center rounded-2xl shadow-md w-full hidden">
          <canvas id="Period"></canvas>
          <div class="loading3">
            <div class="w-12 h-12 absolute top-[40%] left-[43%] rounded-full animate-spin
                    border-y-8 border-solid border-blue-100 border-t-transparent shadow-md"></div>
            <div class="w-12 h-12 absolute top-[40%] left-[47%] rounded-full animate-spin
                    border-y-8 border-solid border-purple-400 border-b-transparent shadow-md"></div>
          </div>
        </div>
        <div class="flex flex-col p-2 rounded-2xl shadow-md">
          <div class="p-2 mb-4 rounded-2xl shadow-md">
            <div class="">
              <h2 class="text-center font-thin text-20">Thống kê</h2>
              <div class="mt-2">
                <div class="grid grid-cols-2 gap-2">
                  <button class="btn-last-week-chart border py-1 px-2 rounded-md bg-slate-50  text-slate-700  hover:bg-slate-100 hover:text-slate-500">Tuần Trước</button>
                  <button class="btn-last-seven-day-chart border py-1 px-2 rounded-md bg-slate-50  text-slate-700  hover:bg-slate-100 hover:text-slate-500">7 Ngày Qua</button>
                </div>
                <button class="btn-period-chart w-full mt-2 border py-1 px-2 rounded-md bg-slate-50  text-slate-700  hover:bg-slate-100 hover:text-slate-500">Khoảng thời gian</button>
              </div>
            </div>
            <div class="form-period mt-2 hidden">
              {{-- <form action="" method="get"> --}}
                <div class="my-1">
                  <label for="" class="ml-2 w-8 inline-block">Từ:</label>
                  <input type="date" name="" id="start-date" class="border-2 cursor-pointer outline-none focus-within:border-blue-500 px-2 rounded-md">
                </div>
                <div class="">
                  <label for="" class="ml-2 w-8 inline-block">Đến:</label>
                  <input type="date" name="" id="end-date" class="border-2 cursor-pointer outline-none focus-within:border-blue-500 px-2 rounded-md">
                </div>
              {{-- </form> --}}
            </div>
          </div>

          <div class="p-2 rounded-2xl h-full shadow-md">
            <h2 class="text-center text-20 font-thin">Doanh Thu</h2>
            <div class="flex flex-col mt-2">
              <div class="flex">
                <p class="w-20">Cá:</p>
                <span id="revenue-fish" class="text-blue-500 w-[80px] text-right mr-2"></span>
                <p>vnđ</p>
              </div>
              <div class="flex py-2">
                <p class="w-20">Phụ kiện:</p>
                <span id="revenue-accessories" class="text-blue-500 w-[80px] text-right mr-2"></span>
                <p>vnđ</p>
              </div>
              <div class="flex text-20">
                <p class="w-20">Tổng:</p>
                <span id="total-revenue" class="text-blue-500 w-[80px] text-right mr-2"></span>
                <p>vnđ</p>
              </div>
            </div>
          </div>


        </div>
        {{-- <div class="col-span-2 text-center rounded-2xl shadow-md w-full">
          <canvas id="barChart"></canvas>
        </div> --}}
      </div>

      <div class="grid grid-cols-4 gap-4 mt-6">
        <div class="col-span-3 rounded-2xl">
          <div class="flex flex-wrap -mx-3">
            <div class="flex flex-none w-full max-w-full px-3">
              <div class="flex flex-col w-full h-full mb-6 shadow-md bg-slate-50 rounded-2xl">
                <div class="p-6 pb-2">
                  <h3 class="text-[#344767] uppercase text-14 font-thin">Top products</h3>
                </div>

                <div class="flex-auto px-0 pt-0 pb-2">
                  <div class="p-0 overflow-x-auto place-self-auto">
                    <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                      <thead class="align-bottom">
                        <tr class="text-slate-400 uppercase text-left text-12">
                          <th class="px-4 py-3 font-bold text-slate-400 opacity-70">#</th>
                          <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Image</th>
                          <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Name</th>
                          <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Price</th>
                          <th class="px-4 py-3 font-bold text-slate-400 opacity-70 text-center">quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                          @for ($i = 1; $i < 4; $i++)
                          <tr class="border-t hover:bg-slate-100">
                            <td class="p-2 bg-transparent">
                              <div class="px-2 py-1">
                                  <h6 class="mb-0 text-sm leading-normal">{{ $i }}</h6>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent">
                              <div class="px-2 py-1 w-20 h-15">
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/424/759/products/ca-phuong-hoang-ngu-sac-vi-dai-2.png?v=1633224543977" alt="">
                              </div>
                            </td>
                            <td class="p-2 bg-transparent text-left">
                              <div class="px-2 py-1">
                                  <span class="mb-0 text-sm leading-normal">Cá phượng hoàng ngũ sắc lùn</span>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent">
                              <div class="px-2 py-1">
                                  <h6 class="mb-0 text-sm leading-normal">30.000đ</h6>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent">
                              <div class="px-2 py-1 text-center">
                                <h6 class="mb-0 text-sm leading-normal">20</h6>
                            </div>
                            </td>
                          </tr>
                          @endfor

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="flex flex-wrap -mx-3">
          <div class="flex flex-none w-full max-w-full px-3">
            <div class="flex flex-col w-full h-full bg-slate-50 shadow-md rounded-2xl">
              <div class="p-6 pb-2 mb-0">
                <h3 class="text-[#344767] uppercase text-14 font-thin">Categories</h3>
              </div>

              <div class="flex-auto px-0 pt-0">
                @for ($i = 0; $i < 5; $i++)
                  <div class="flex justify-between items-center px-4 my-1 text-12 pt-0.5 pb-0.5">
                    <div class="">
                      <h6 class="text-14 mb-1.5 font-sora">Beta</h6>
                      <span class="text-purple-300 ">36+ sold</span>
                    </div>
                    <a href="" class="hover:translate-x-1 transition-all p-2">
                      <i class="fa-solid fa-chevron-right"></i>
                    </a>
                  </div>
                @endfor
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection
