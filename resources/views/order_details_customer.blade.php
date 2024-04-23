@component('components.head', ['title' => 'Thông tin người dùng', 'manga_category' => $manga_category, 'danhmuc' => $danhmuc])
@endcomponent
<main class="max-w-[1360px] mx-auto px-16 my-10 mt-[137px] grid-cols-2">
  <div class="max-w-[960px] mx-auto">
    {{--  --}}
    @if(session('add-success') || session('update-success') || session('delete-success'))
    <div id="message" class="flex absolute top-12 right-7">
      <div  class="bg-white rounded-lg border-l-8 border-l-blue-500 opacity-80">
        <div class="py-4 text-blue-400 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
          <span class="px-4">{{ session('add-success') ? session('add-success') : (session('update-success') ? session('update-success') : session('delete-success')) }}</span>
        </div>
      </div>
    </div>
    @endif
    <div class="flex justify-between my-2 py-1 shadow-md text-gray-700 bg-white bg-opacity-10 rounded-md select-none">
        <h1 class="flex items-center mx-2 text-18">Chi Tiết Đơn Hàng:</span></h1>
        <a href="{{route('profile-customer',['id' => $donhang->ND_Ma])}}" class="flex justify-center items-center mx-2 px-2 py-0.5 border rounded-lg">
          <i class="fa-solid fa-right-from-bracket"></i>
          <h3 class="mx-1">Trở lại</h3>
        </a>
      </div>
    {{--  --}}
    <div class="backdrop-blur-xl flex justify-between items-center mb-6 p-4 rounded-md shadow-md">
   
        <div class="flex">
          <div class="rounded-md relative">
            <img
            id="img-preview"
            src="{{$donhang->ND_avt}}"
            alt="avatar"
            class="w-32 h-32 rounded-md"
        
          >
          </div>
          <div class="ml-6 items-center py-2">
            <h3 class="text-20 mb-1">{{Auth::user()->ND_Ten}}</h3>
            <span class="text-green-400 ">Khách Hàng</span>
            
          </div>
        </div>
    </div>


   
    <div class="backdrop-blur-xl items-center mb-6 p-4 rounded-md shadow-md">
      <div class="py-4 px-6">
        <h4 class="mb-6 text-slate-700 font-semibold text-20">Chi Tiết Đơn Hàng</h4>
        <div class="flex-auto pt-0  shadow-xl">
            <table class="items-center w-full mb-0 align-top border-b border-collapse text-slate-500">
              <thead class="align-bottom bg-slate-200 rounded-2xl">
              <tr class="text-black uppercase text-left text-12">
                {{--                      <th class="px-4 py-3 font-bold ">Loại sản phẩm</th>--}}
                <th class="px-4 py-3 font-bold ">Ảnh</th>
                <th class="px-4 py-3 font-bold">Tên sản phẩm</th>
                <th class="px-4 py-3 font-bold">Số lượng</th>
                <th class="px-4 py-3 font-bold">Đơn giá</th>
                <th class="px-4 py-3 font-bold ">Thành tiền</th>
              </tr>
              </thead>
              <tbody>
              @foreach($productDetails as $product)
                <tr class="border-t even:bg-gray-100 odd:bg-white">
                  {{--                        <td class="p-4 bg-transparent text-left">--}}
                  {{--                          <div class="">--}}
                  {{--                            <h6 class="mb-0 text-sm leading-normal">Cá</h6>--}}
                  {{--                          </div>--}}
                  {{--                        </td>--}}
                  <td class="px-4 py-3 bg-transparent text-left">
                    <div class="">
                      <img src="{{ $product->S_HinhAnh }}" alt="" class="w-12">
                    </div>
                  </td>
                  <td class="px-4 py-3 bg-transparent">
                    <div class="">
                      <h6 class="mb-0 text-sm leading-normal">{{ $product->S_Ten }}</h6>
                    </div>
                  </td>
                  <td class="px-4 py-3 bg-transparent">
                    <div class="">
                      <h6 class="mb-0 text-sm leading-normal ml-5">{{ $product->CTDH_SoLuong }}</h6>
                    </div>
                  </td>
                  <td class="px-4 py-3 bg-transparent">
                    <div class="">
                      <h6 class="mb-0 text-sm leading-normal"> {{ number_format($product->CTDH_DonGia, 0, ',', '.') }}</h6>
                    </div>
                  </td>
                  <td class="px-4 py-3 bg-transparent">
                    <div class="">
                      <h6 class="mb-0 text-sm leading-normal">{{ number_format($product->CTDH_SoLuong * $product->CTDH_DonGia, 0, ',', '.') }}đ</h6>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>

            <div class="flex justify-between items-center sticky bg-white bottom-0 w-full px-6 py-3 shadow-sm mt-10">
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
  
</main>

<x-footer  :js-file="'resources/js/info-user.js'" />
