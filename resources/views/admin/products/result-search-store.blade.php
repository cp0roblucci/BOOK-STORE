@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Bảng giá Cá')
@section('path', 'Sản phẩm / Kho hàng')

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
        <form action="{{ route('search-quantity') }}" method="get" class="flex justify-between">
          <input type="text" placeholder="Tìm kiếm..." name="product-type" class="caret-blue-500 rounded-md outline-none w-full bg-white" required>
          <button type="submit" class="inline-block mr-4 mt-2">
            <lord-icon
              src="https://cdn.lordicon.com/zniqnylq.json"
              trigger="click"
              style="width:24px;height:24px">
            </lord-icon>
          </button>
        </form>
      </div>

      @if(session('update-quantity-success'))
        <div id="message" class="bg-slate-200 absolute top-12 right-7 rounded-lg border-l-8 border-l-blue-500 opacity-80">
          <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
            <span class="px-4">{{ session('update-quantity-success') }}</span>
          </div>
        </div>
      @endif

      @if($typeProduct != null)
        <h1>Cá</h1>
        <div class="flex flex-wrap -mx-3 mb-10 mt-4">
          <div class="w-full max-w-full px-3">
            <div class="flex flex-col bg-white border-0 shadow-md rounded-xl">
              <div class="p-2 py-2">
                <h3 class="text-[#344767] text-20 font-sora"> {{ $typeProduct->fish_species }}</h3>
              </div>
              <div class="flex-auto px-0 pt-0">
                <div class="p-0 overflow-x-auto place-self-auto">
                  <table class="items-center w-full mb-0 align-top border-collapse text-slate-500 rounded-xl">
                    <thead class="align-bottom bg-slate-200 rounded-2xl">
                    <tr class="text-slate-600 uppercase text-left text-12">
                      <th class="px-4 py-3 font-bold">Tên cá</th>
                      <th class="px-4 py-3 font-bold">Số lượng</th>
                      <th class="px-4 py-3 font-bold "></th>
                    </tr>
                    </thead>
                    <tbody class="rounded-2xl">
                    @foreach($data as $key => $value)
                      <tr class="border-t">
                        <td class="px-4 py-4 bg-transparent text-left">
                          <div class="px-2">
                            <h6 class="mb-0 text-sm leading-normal">{{ $value->fish_name }}</h6>
                          </div>
                        </td>
                        <td class="px-4 bg-transparent ">
                          <div class="px-2">
                            <h6 class="mb-0 text-sm leading-normal text-purple-400">{{ $value->quantity  }}</h6>
                          </div>
                        </td>
                        <td class="bg-transparent justify-center">
                          <button class="update-quantity text-16 mr-2 text-blue-100 underline cursor-pointer" data-fish_name="{{ $value->fish_name }}" data-fish_id="{{ $value->fish_id }}" data-quantity="{{ $value->quantity}}">
                            Cập nhật số lượng
                          </button>
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

      @else
        <h1>Phụ kiện</h1>
        <div class="flex flex-wrap -mx-3 mb-10 mt-4">
          <div class="w-full max-w-full px-3">
              <div class="flex flex-col bg-white border-0 shadow-md rounded-xl">
                <div class="p-2 py-2">
                  <h3 class="text-[#344767] text-20 font-sora"> {{ $typeAccessories->accessories_type_name}}</h3>
                </div>
                <div class="flex-auto px-0 pt-0">
                  <div class="p-0 overflow-x-auto place-self-auto">
                    <table class="items-center w-full mb-0 align-top border-collapse text-slate-500 rounded-xl">
                      <thead class="align-bottom bg-slate-200 rounded-2xl">
                      <tr class="text-slate-600 uppercase text-left text-12">
                        <th class="px-4 py-3 font-bold">Tên phụ kiện</th>
                        <th class="px-4 py-3 font-bold">Số lượng</th>
                        <th class="px-4 py-3 font-bold "></th>
                      </tr>
                      </thead>
                      <tbody class="rounded-2xl">
                      @foreach($data as $key => $value)
                        <tr class="border-t">
                          <td class="px-4 py-4 bg-transparent text-left">
                            <div class="px-2">
                              <h6 class="mb-0 text-sm leading-normal">{{ $value->accessories_name }}</h6>
                            </div>
                          </td>
                          <td class="px-4 bg-transparent ">
                            <div class="px-2">
                              <h6 class="mb-0 text-sm leading-normal text-purple-400">{{ $value->quantity }}</h6>
                            </div>
                          </td>
                          <td class="bg-transparent justify-center">
                            <button class="update-quantity text-16 mr-2 text-blue-100 underline cursor-pointer" data-accessories_name="{{ $value->accessories_name }}" data-accessories_id="{{ $value->accessories_id }}" data-quantity="{{ $value->quantity}}">
                              Cập nhật số lượng
                            </button>
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

      @endif

    </div>


  </div>
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection
