@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Products')
@section('path', 'Sản phẩm / Phụ kiện')

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection
    <div class="w-full">

      @include('components.admin.form-input')

      <div class="bg-slate-50 pt-4 mt-2 rounded-md shadow-md">
        <h2 class="px-4 uppercase font-semibold text-slate-400">Phụ kiện nổi bật</h2>
        <div class="flex space-x-2 mt-4 px-4 pb-4">
          @for ($i = 1; $i <= 5; $i++)
            <div class="flex w-[190px] shrink-0 flex-col">
              <img
                src="{{ URL::to('/storage/images/vang.png')}}"
                alt="product"
                class="rounded-2xl"
              >
              <div class="justify-between bg-white mx-4 -mt-8 rounded-xl p-2 shadow-sm">
                <h3 class="truncate">Cá vàng </h3>
                <div >
                  <span>35.000đ</span>
                  <span class="ml-8 text-12 font-light opacity-60">36+ <span class="text-red-500">sold</span></span>
                </div>
              </div>
            </div>
          @endfor
        </div>

      </div>

      {{-- Table --}}
      <div class="">
        <div class="flex flex-wrap -mx-3 mb-10 mt-6">
          <div class="flex flex-col w-full max-w-full px-3">
            <div class="flex flex-col min-w-[980px] mb-6 bg-white border-0 shadow-md rounded-lg ">
              <div class="flex p-2 py-4 items-center justify-between">
                <h3 class="text-[#344767] text-20 font-sora">Danh sách Phụ Kiện</h3>
              </div>
              <div class="flex-auto px-0 pt-0">
                <div class="p-0 overflow-x-auto place-self-auto">
                  <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                    <thead class="align-bottom bg-slate-200 rounded-2xl">
                    <tr class="text-black uppercase text-left text-12">
                      <th class="px-4 py-3 font-bold opacity">#</th>
                      <th class="px-4 py-3 font-bold ">Loại</th>
                      <th class="px-4 py-3 font-bold ">Tên</th>
                      <th class="px-4 py-3 font-bold ">Giá</th>
                      <th class="px-4 py-3 font-bold ">Số lượng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accessories as $key => $accessory)
                      <tr class="border-t hover:bg-slate-100">
                        <td class="p-4 bg-transparent ">
                          <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ ++$key }}</h6>
                          </div>
                        </td>
                        <td class="p-4 bg-transparent">
                          <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ $accessory->$accessories_type_id }}</h6>
                          </div>
                        </td>
                        <td class="p-4 bg-transparent text-left">
                          <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ $accessory->$accessories_name }}</h6>
                          </div>
                        </td>
                        <td class="p-4 bg-transparent">
                          <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ $accessory->$accessories_price }}</h6>
                          </div>
                        </td>
                        {{-- <td class="p-4 bg-transparent">
                          <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ $accessory->$accessories_quantity }}</h6>
                          </div>
                        </td> --}}
                        <td class="p-4 bg-transparent">
                          <form action="" method="post" class="px-2 py-1">
                            @csrf
                            <button class="mb-0 text-sm leading-normal text-red-300">Edit</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>

                  <div class="flex justify-between mx-4 py-4 border-t">
                    <span class="text-slate-700 text-14 font-light">1 - 5 of {{ $accessories->lastPage() }} entries</span>
                    <div class="bg-slate-100 rounded-full">
                      <ol class="pagination flex text-gray-400">

                        <li class="pagination_li hover:bg-slate-200 rounded-full">
                          <a
                            href="{{ $accessories->previousPageUrl() }}"
                            class="flex items-center h-8 px-3 rounded-full text-center"
                          >
                            <i class="fa-solid fa-angle-left"></i>
                          </a>
                        </li>
                        @for ($i = 1; $i <= $accessories->lastPage(); $i++)
                          <li
                            class="pagination_li rounded-full
                             {{ $accessories->currentPage() == $i ? 'bg-blue-500 hover:bg-blue-700 text-white' : 'hover:bg-slate-200'}}
                            "
                          >
                            <a
                              href="{{ $accessories->url($i) }}"
                              class="flex items-center h-8 px-3 rounded-full text-center"
                            >
                              {{ $i }}
                            </a>
                          </li>
                        @endfor

                        <li class="pagination_li hover:bg-slate-200 rounded-full">
                          <a
                            href="{{ $accessories->nextPageUrl() }}"
                            class="flex items-center h-8 px-3 rounded-full text-center"
                          >
                            <i class="fa-solid fa-angle-right"></i>
                          </a>
                        </li>
                      </ol>
                    </div>
                  </div>
                </div>
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
