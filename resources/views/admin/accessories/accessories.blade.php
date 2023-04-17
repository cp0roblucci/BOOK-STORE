@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Danh Sách Phụ Kiện')
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

      <div class="w-[40%] pl-4 bg-white rounded-md border-[1.5px] focus-within:border-[1.5px] focus-within:border-blue-200 my-4">
        <form action="{{ route('search-accessories') }}" method="get" class="flex justify-between">
          @csrf
          <input type="text" placeholder="Tìm kiếm..." name="accessories_name" class="caret-blue-500 rounded-md outline-none w-full bg-white" required>
          <button type="submit" class="inline-block mr-4 mt-2">
            <lord-icon
              src="https://cdn.lordicon.com/zniqnylq.json"
              trigger="click"
              style="width:24px;height:24px">
            </lord-icon>
          </button>
        </form>
      </div>

      {{-- Table --}}
      <div class="">
        <div class="flex flex-wrap -mx-3 mb-10 mt-2">
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
                      <th class="px-4 py-3 font-bold ">Giá (vnđ)</th>
                      <th class="px-4 py-3 font-bold "></th>
                      {{-- <th class="px-4 py-3 font-bold ">Số lượng</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accessories as $key => $accessory)
                      <tr class="border-t even:bg-gray-100 odd:bg-white ">
                        <td class="p-4 bg-transparent ">
                          <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ ++$key }}</h6>
                          </div>
                        </td>
                        <td class="p-4 bg-transparent">
                          <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ $accessory->accessories_type_name }}</h6>
                          </div>
                        </td>
                        <td class="p-4 bg-transparent text-left">
                          <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ $accessory->accessories_name }}</h6>
                          </div>
                        </td>
                        <td class="p-4 bg-transparent">
                          <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ number_format($accessory->accessories_price, 0, ',', '.') }}</h6>
                          </div>
                        </td>

                        <td class="flex bg-transparent mt-4 justify-center items-center">
                          <a href="accessories/{{$accessory->accessories_id}}/edit" class="text-16 mr-2 text-blue-100">
                            <i class="fa-regular fa-pen-to-square mr-2"></i>
                          </a>
                          <button class="delete-accessories text-16 mr-2 text-red-300 cursor-pointer" data-id="{{$accessory->accessories_id}}">
                            <i class="fa-regular fa-trash-can text-16"></i>
                          </button>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>

                  <div class="flex justify-between mx-4 py-4 border-t">
                    <span class="text-slate-700 text-14 font-light">1 - {{ $accessories->count() < 5 ? $accessories->count() : 5 }} of {{ $accessories->lastPage() }} entries</span>
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
