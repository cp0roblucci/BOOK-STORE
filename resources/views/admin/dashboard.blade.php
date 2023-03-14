@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'DashBoard')
@section('path', 'Dashboard')

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
        <div class="grid grid-cols-4 gap-4">
          <div class="bg-white h-20 rounded-xl">
            <div class="p-2 flex items-center">
              <img src="{{ URL::to('/images/admin/fish.png')}}" alt="fish" class="w-16 h-16">
              <div class="flex flex-col ml-2">
                <h2 class="uppercase text-14 text-slate-500">Total Products</h2>
                <span class="font-bold text-[#344767]">1000+</span>
              </div>
            </div>
          </div>
          <div class="bg-white h-20 rounded-xl">
            <div class="p-2 flex items-center">
              <img src="{{ URL::to('/images/admin/user.png')}}" alt="user" class="w-16 h-16">
              <div class="flex flex-col ml-2">
                <h2 class="uppercase text-14 text-slate-500">New Clients</h2>
                <span class="font-bold text-[#344767]">400+</span>
              </div>
            </div>
          </div>
          <div class="bg-white h-20 rounded-xl">
            <div class="p-2 flex items-center">
              <img src="{{ URL::to('/images/admin/cart.png')}}" alt="cart" class="w-16 h-16">
              <div class="flex flex-col ml-2">
                <h2 class="uppercase text-14 text-slate-500">New Orders</h2>
                <span class="font-bold text-[#344767]">45</span>
              </div>
            </div>
          </div>
          <div class="bg-white h-20 rounded-xl">
            <div class="p-2 flex items-center">
              <img src="{{ URL::to('/images/admin/letter.png')}}" alt="message" class="w-16 h-16">
              <div class="flex flex-col ml-2">
                <h2 class="uppercase text-14 text-slate-500">Today's users</h2>
                <span class="font-bold text-[#344767]">225</span>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="grid grid-cols-4 gap-4 mt-6">
            <div class="col-span-3 w-full">
                <div class="bar-chart bg-white rounded-2xl shadow-md">
                    <canvas id="barChart"></canvas>
                </div>
                <div class="line-chart bg-white rounded-2xl hidden">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
            <div class="">
            <span class="flex flex-col bg-white h-full rounded-xl shadow-md">
              <span class="btn-bar-chart m-2 bg-slate-200 text-center rounded-xl py-2 cursor-pointer hover:opacity-80">Bar Chart</span>
              <span class="btn-line-chart m-2 mt-1 bg-slate-200 text-center rounded-xl py-2 cursor-pointer hover:opacity-80">Line Chart</span>
            </span>
            </div>
        </div>

      <div class="grid grid-cols-4 gap-4 mt-6">
        <div class="col-span-3 rounded-2xl h-full">
          <div class="flex flex-wrap -mx-3">
            <div class="flex flex-none w-full max-w-full px-3">
              <div class="relative flex flex-col w-full h-full mb-6 break-words bg-slate-100 border-0 border-transparent border-solid shadow-md rounded-2xl bg-clip-border">
                <div class="p-6 pb-2 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                  <h3 class="text-[#344767] uppercase text-14 font-thin">Customers</h3>
                </div>

                <div class="flex-auto px-0 pt-0 pb-2">
                  <div class="p-0 overflow-x-auto place-self-auto">
                    <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                      <thead class="align-bottom">
                        <tr class="text-slate-400 uppercase text-left text-12">
                          <th class="px-4 py-3 font-bold text-slate-400 opacity-70">#</th>
                          <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Name</th>
                          <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Phone number</th>
                          <th class="px-4 py-3 font-bold text-slate-400 opacity-70">Address</th>
                          <th class="px-4 py-3 font-bold text-slate-400 opacity-70"></th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr class="border-t">
                            <td class="p-2 bg-transparent">
                              <div class="px-2 py-1">
                                  <h6 class="mb-0 text-sm leading-normal">1</h6>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent">
                              <div class="px-2 py-1">
                                  <h6 class="mb-0 text-sm leading-normal">Tran Van Truong</h6>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent text-left">
                              <div class="px-2 py-1">
                                  <h6 class="mb-0 text-sm leading-normal">01234567</h6>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent">
                              <div class="px-2 py-1">
                                  <h6 class="mb-0 text-sm leading-normal">Can Tho</h6>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent">
                              <form action="" method="post" class="px-2 py-1">
                                @csrf
                                  <button class="mb-0 text-sm leading-normal text-red-300">Edit</button>
                              </form>
                            </td>
                          </tr>
                          <tr class="border-t">
                            <td class="p-2 bg-transparent">
                              <div class="px-2 py-1">
                                  <h6 class="mb-0 text-sm leading-normal">1</h6>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent">
                              <div class="px-2 py-1">
                                  <h6 class="mb-0 text-sm leading-normal">Vo Duc Duy</h6>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent text-left">
                              <div class="px-2 py-1">
                                  <h6 class="mb-0 text-sm leading-normal">0123456987</h6>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent">
                              <div class="px-2 py-1">
                                  <h6 class="mb-0 text-sm leading-normal">Kien Giang</h6>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent">
                              <form action="" method="post" class="px-2 py-1">
                                @csrf
                                  <button class="mb-0 text-sm leading-normal text-red-300">Edit</button>
                              </form>
                            </td>
                          </tr>
                          <tr class="border-t">
                            <td class="p-2 bg-transparent">
                              <div class="px-2 py-1">
                                  <h6 class="mb-0 text-sm leading-normal">1</h6>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent">
                              <div class="px-2 py-1">
                                  <h6 class="mb-0 text-sm leading-normal">Le Thanh Hung</h6>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent text-left">
                              <div class="px-2 py-1">
                                  <h6 class="mb-0 text-sm leading-normal">0123654789</h6>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent">
                              <div class="px-2 py-1">
                                  <h6 class="mb-0 text-sm leading-normal">An Giang</h6>
                              </div>
                            </td>
                            <td class="p-2 bg-transparent">
                              <form action="" method="post" class="px-2 py-1">
                                @csrf
                                  <button class="mb-0 text-sm leading-normal text-red-300">Edit</button>
                              </form>
                            </td>
                          </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="rounded-2xl">
          <div class="flex flex-wrap -mx-3">
            <div class="flex flex-none w-full max-w-full px-3">
              <div class="relative flex flex-col w-full h-full mb-6 break-words bg-slate-100 border-0 border-transparent border-solid shadow-md rounded-2xl bg-clip-border">
                <div class="p-6 pb-2 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                  <h3 class="text-[#344767] uppercase text-14 font-thin">Categories</h3>
                </div>

                <div class="flex-auto px-0 pt-0 pb-2">
                  @for ($i = 0; $i < 4; $i++)
                  <div class="flex justify-between px-4 overflow-x-auto place-self-auto">
                    <div class="p-2 bg-transparent">
                      <div class="px-2 py-1">
                          <h6 class="mb-0 text-sm leading-normal">Beta</h6>
                      </div>
                    </div>
                    <div class="p-2 bg-transparent">
                      <form action="" method="post" class="px-2 py-1">
                        @csrf
                          <button class="mb-0 text-sm leading-normal text-red-300">Edit</button>
                      </form>
                    </div>
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
