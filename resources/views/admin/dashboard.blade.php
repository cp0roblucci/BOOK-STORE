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

      <div id="date-invalid" class="bg-white hidden absolute top-4 left-[35%] rounded-lg border-l-8 border-l-yellow-500 z-30 shadow-md">
        <div class="py-4 text-yellow-500 relative before:absolute before:bottom-0 before:content-[''] before:bg-yellow-500 before:h-0.5 before:w-full before:animate-before">
          <span class="px-4">Ngày không hợp lệ, Vui lòng chọn lại.</span>
        </div>
      </div>

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
                <span class="font-bold mt-6 text-20">{{ $totalNewOrder }}</span>
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
{{--        tuan truoc--}}
        <div class="last-week-chart relative col-span-3 text-center rounded-2xl shadow-md w-full">
          <canvas id="lastWeekChart"></canvas>
          <div class="loading1">
            <div class="w-12 h-12 absolute top-[38%] left-[44%] rounded-full animate-spin
                    border-y-8 border-solid border-blue-100 border-t-transparent shadow-md"></div>
            <div class="w-12 h-12 absolute top-[38%] left-[48%] rounded-full animate-spin
                    border-y-8 border-solid border-purple-400 border-b-transparent shadow-md"></div>
          </div>
        </div>

{{--        7 ngay truoc --}}
        <div class="last-seven-day-chart relative col-span-3 text-center rounded-2xl shadow-md w-full hidden">
          <canvas id="lastSevenDay"></canvas>
          <div class="loading2">
            <div class="w-12 h-12 absolute top-[38%] left-[44%] rounded-full animate-spin
                    border-y-8 border-solid border-blue-100 border-t-transparent shadow-md"></div>
            <div class="w-12 h-12 absolute top-[38%] left-[48%] rounded-full animate-spin
                    border-y-8 border-solid border-purple-400 border-b-transparent shadow-md"></div>
          </div>
        </div>
{{--        Khoang thoi gian --}}
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
              <h2 class="text-center font-thin text-20">Thống kê số lượng bán</h2>
              <div class="mt-2">
                <div class="grid grid-cols-2 gap-2">
                  <button class="btn-last-week-chart border py-1 px-2 rounded-md bg-blue-100 text-white text-slate-700  hover:opacity-60 transition-all">Tuần Trước</button>
                  <button class="btn-last-seven-day-chart border py-1 px-2 rounded-md text-slate-700  hover:opacity-60 transition-all">7 Ngày Qua</button>
                </div>
                <button class="btn-period-chart w-full mt-2 border py-1 px-2 rounded-md text-slate-700  hover:opacity-60 transition-all">Khoảng thời gian</button>
              </div>
            </div>
            <div class="form-period mt-2 hidden">
              {{-- <form action="" method="get"> --}}
                <div class="my-1">
                  <label for="" class="ml-2 w-8 inline-block">Từ:</label>
                  <input type="date" name="" id="start-date" class="border-2 cursor-pointer outline-none focus-within:border-blue-500 px-2 py-1 rounded-md">
                </div>
                <div class="">
                  <label for="" class="ml-2 w-8 inline-block">Đến:</label>
                  <input type="date" name="" id="end-date" class="border-2 cursor-pointer outline-none focus-within:border-blue-500 px-2 py-1 rounded-md">
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
                <span id="total-revenue" class="text-blue-500 w-[120px] text-right mr-2"></span>
                <p>vnđ</p>
              </div>
            </div>
          </div>


        </div>
        {{-- <div class="col-span-2 text-center rounded-2xl shadow-md w-full">
          <canvas id="barChart"></canvas>
        </div> --}}
      </div>



      <div class="mt-6">

        <div class="rounded-2xl ">
          <div class="flex flex-wrap -mx-3">
            <div class="flex flex-col w-full max-w-full px-3">
              <div class="flex flex-col w-full h-full border border-yellow-500 mb-2 shadow-md bg-slate-50 rounded-2xl">
                <div class="p-6 pt-4 pb-2">
                  <h3 class="text-[#344767] uppercase text-18 text-yellow-500 font-thin">Khách Hàng mua nhiều nhất</h3>
                </div>

                <div class="flex-auto px-0 pt-0 pb-2">
                  <div class="p-0 overflow-x-auto place-self-auto">
                    <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                      <thead class="align-bottom">
                      <tr class="text-slate-400 uppercase text-left text-12">
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">#</th>
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Họ Tên</th>
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Số điện thoại</th>
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Email</th>
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Địa chỉ</th>
                        <th class="px-4 py-3 font-bold text-yellow-500 opacity-70 text-center">Chi tiêu</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($topCustomer as $key => $customer)
                        <tr class="border-t ">
                          <td class="p-2 bg-transparent">
                            <div class="px-2 py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ ++$key }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent text-left">
                            <div class="px-2 py-1">
                              <span class="mb-0 text-sm leading-normal">{{ $customer->last_name .' '. $customer->first_name }}</span>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent text-left">
                            <div class="px-2 py-1">
                              <span class="mb-0 text-sm leading-normal">{{ $customer->phone_number }}</span>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent">
                            <div class="px-2 py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ $customer->email }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent">
                            <div class="px-2 py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ $customer->user_address }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent">
                            <div class="px-2 py-1 text-center">
                              <h6 class="mb-0 text-sm text-yellow-500 leading-normal">{{ number_format($customer->total_spent, 0, ',', '.') }}đ</h6>
                            </div>
                          </td>
                        </tr>
                      @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>




      <div class="grid grid-cols-4 gap-4 mt-2">

{{--        Cá--}}
        <div class="col-span-2 rounded-2xl ">
          <div class="flex flex-wrap -mx-3">
            <div class="flex flex-col w-full max-w-full px-3">
{{--              Bán nhiều nhất--}}
              <div class="flex flex-col w-full h-full border border-primary-blue mb-2 shadow-md bg-slate-50 rounded-2xl">
                <div class="p-6 pt-4 pb-2">
                  <h3 class="text-[#344767] uppercase text-18 text-primary-blue font-thin">Cá bán nhiều nhất</h3>
                </div>

                <div class="flex-auto px-0 pt-0 pb-2">
                  <div class="p-0 overflow-x-auto place-self-auto">
                    <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                      <thead class="align-bottom">
                      <tr class="text-slate-400 uppercase text-left text-12">
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">#</th>
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Loại</th>
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Tên</th>
                        <th class="px-4 py-3 font-bold text-red-400 opacity-70 text-center">Đã bán</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($mostFish as $key => $fish)
                        <tr class="border-t ">
                          <td class="p-2 bg-transparent">
                            <div class="px-2 py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ ++$key }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent text-left">
                            <div class="px-2 py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ $fish->fish_species }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent text-left">
                            <div class="px-2 py-1 w-[180px]">
                              <h6 class="mb-0 text-sm leading-normal truncate">{{ $fish->fish_name }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent">
                            <div class="px-2 py-1 text-center">
                              <h6 class="mb-0 text-sm text-red-400 leading-normal">{{ $fish->totalQuantity }}</h6>
                            </div>
                          </td>
                        </tr>
                      @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
{{--              Bán ít nhất--}}
              <div class="flex flex-col w-full h-full border border-primary-blue  shadow-md bg-slate-50 rounded-2xl">
                <div class="p-6 pt-4 pb-2">
                  <h3 class="text-[#344767] uppercase text-18 text-primary-blue font-thin">Cá bán ít nhất</h3>
                </div>

                <div class="flex-auto px-0 pt-0 pb-2">
                  <div class="p-0 overflow-x-auto place-self-auto">
                    <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                      <thead class="align-bottom">
                      <tr class="text-slate-400 uppercase text-left text-12">
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">#</th>
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Loại</th>
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Tên</th>
                        <th class="px-4 py-3 font-bold text-red-400 opacity-70 text-center">Đã bán</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($leastFish as $key => $fish)
                        <tr class="border-t">
                          <td class="p-2 bg-transparent">
                            <div class="px-2 py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ ++$key }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent text-left">
                            <div class="px-2 py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ $fish->fish_species }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent text-left">
                            <div class="px-2 py-1 w-[180px]">
                              <h6 class="mb-0 text-sm leading-normal truncate">{{ $fish->fish_name }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent">
                            <div class="px-2 py-1 text-center">
                              <h6 class="mb-0 text-sm text-red-400 leading-normal">{{ $fish->totalQuantity }}</h6>
                            </div>
                          </td>
                        </tr>
                      @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

{{--        Phụ kiện--}}
        <div class="col-span-2 rounded-2xl">
          <div class="flex flex-wrap -mx-3">
            <div class="flex flex-col w-full max-w-full px-3">
              {{--              Bán nhiều nhất--}}
              <div class="flex flex-col w-full h-full border border-primary-blue mb-2 shadow-md bg-slate-50 rounded-2xl">
                <div class="p-6 pt-4 pb-2">
                  <h3 class="text-[#344767] uppercase text-18 text-primary-blue font-thin">Phụ kiện bán nhiều nhất</h3>
                </div>

                <div class="flex-auto px-0 pt-0 pb-2">
                  <div class="p-0 overflow-x-auto place-self-auto">
                    <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                      <thead class="align-bottom">
                      <tr class="text-slate-400 uppercase text-left text-12">
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">#</th>
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Loại</th>
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Tên</th>
                        <th class="px-4 py-3 font-bold text-red-400 opacity-70 text-center">Đã bán</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($mostAccessories as $key => $accessories)
                        <tr class="border-t">
                          <td class="p-2 bg-transparent">
                            <div class="px-2 py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ ++$key }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent text-left">
                            <div class="px-2 py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ $accessories->accessories_type_name }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent text-left">
                            <div class="px-2 py-1 w-[180px]">
                              <h6 class="mb-0 text-sm leading-normal truncate">{{ $accessories->accessories_name }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent">
                            <div class="px-2 py-1 text-center">
                              <h6 class="mb-0 text-sm text-red-400 leading-normal">{{ $accessories->totalQuantity }}</h6>
                            </div>
                          </td>
                        </tr>
                      @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              {{--              Bán ít nhất--}}
              <div class="flex flex-col w-full h-full border border-primary-blue  shadow-md bg-slate-50 rounded-2xl">
                <div class="p-6 pt-4 pb-2">
                  <h3 class="text-[#344767] uppercase text-18 text-primary-blue font-thin">Phụ kiện bán ít nhất</h3>
                </div>

                <div class="flex-auto px-0 pt-0 pb-2">
                  <div class="p-0 overflow-x-auto place-self-auto">
                    <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                      <thead class="align-bottom">
                      <tr class="text-slate-400 uppercase text-left text-12">
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">#</th>
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Loại</th>
                        <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Tên</th>
                        <th class="px-4 py-3 font-bold text-red-400 opacity-70 text-center">Đã bán</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($leastAccessories as $key => $accessories)
                        <tr class="border-t">
                          <td class="p-2 bg-transparent">
                            <div class="px-2 py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ ++$key }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent text-left">
                            <div class="px-2 py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ $accessories->accessories_type_name }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent">
                            <div class="px-2 py-1 w-[180px]">
                              <h6 class="mb-0 text-14 leading-normal truncate ">{{ $accessories->accessories_name }}</h6>
                            </div>
                          </td>
                          <td class="p-2 bg-transparent">
                            <div class="px-2 py-1 text-center">
                              <h6 class="mb-0 text-sm text-red-400 leading-normal">{{ $accessories->totalQuantity }}</h6>
                            </div>
                          </td>
                        </tr>
                      @endforeach

                      </tbody>
                    </table>
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
