@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Users')
@section('path', 'Người dùng / Danh Sách Người Dùng')

@section('sidebar')
  @include('admin.layout.slidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection

    {{-- search --}}
   
    <div class="w-[40%] pl-4 bg-white rounded-md focus-within:to-blue-300 -ml-3 my-4 ">
      {{-- <form action="{{ route('search-fish') }}" method="get" class="flex justify-between"> --}}
      <form action="{{route('search-users')}}" method="get" class="flex justify-between w-full">
        @csrf
        <input type="text" placeholder="Tìm kiếm..." name="ND_Ten" class="focus:border-red-500 rounded-md outline-none w-full bg-white " required>
        <button type="submit" class="inline-block mr-4 mt-2">
          <i class="fa-solid fa-magnifying-glass text-22 text-gray-500 relative -left-8 bottom-1"></i>
        </button>
      </form>
    </div>

    @if(session('create-success') || session('update-success'))
        <div id="message" class="flex absolute top-16 right-7">
          <div  class="bg-slate-200 rounded-lg border-l-8 border-l-blue-500 opacity-80">
            <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
              <span class="px-4">{{ session('update-success') ? session('update-success') : session('create-success') }}</span>
            </div>
          </div>
        </div>
    @elseif(session('delete-failed'))
      <div id="message" class="bg-slate-200 absolute top-16 right-7 rounded-lg border-l-8 border-l-red-500 opacity-80">
        <div class="py-4 text-red-500 relative before:absolute before:bottom-0 before:content-[''] before:bg-red-500 before:h-0.5 before:w-full before:animate-before">
          <span class="px-4">{{ session('delete-failed') }}</span>
        </div>
      </div>
      @elseif(session('delete-success'))
        <div id="message" class="flex absolute top-12 right-7">
          <div  class="bg-slate-200 rounded-lg border-l-8 border-l-blue-500 opacity-80">
            <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
              <span class="px-4">{{ session('update-success') ? session('update-success') : session('delete-success') }}</span>
            </div>
          </div>
          {{-- <button id="btn-rollback" class="border px-4 ml-2 rounded-lg hover:bg-slate-200 hover:text-primary-blue transition-all">Hoàn tác</button> --}}
        </div>
    @endif
    {{-- Danh sách người dùng --}}
    <div class="flex flex-wrap -mx-3 mb-10 mt-2">
      <div class="flex flex-col w-full max-w-full px-3">
        <div class="flex flex-col min-w-[980px] mb-6 break-words bg-white border-0 border-transparent border-solid shadow-md rounded-lg bg-clip-border overflow-hidden">
          <div class="flex p-2 py-2 items-center justify-between">
            <div class="flex p-2 py-2 items-center justify-between mb-1 mt-1">
              <h3 class="text-[#344767] text-20 font-sora">Danh sách Người dùng</h3>
            </div>
            <a href="{{route('admin-new-user')}}" class="border pr-4 pl-2 py-2 hover:bg-slate-100 hover:text-primary-blue transition-all">
              <i class="fa-solid fa-plus mx-1"></i>
              <span class="">Tạo mới</span>
            </a>
          </div>
          <div class="flex-auto px-0 pt-0">
            <div class="p-0 overflow-x-auto place-self-auto">
              <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                <thead class="align-bottom bg-slate-200 rounded-2xl">
                  <tr class="text-black uppercase text-left text-12">
                    <th class="px-3 py-3 font-bold opacity">#</th>
                    <th class="px-3 py-3 font-bold ">Họ Tên</th>
                    <th class="px-3 py-3 font-bold ">Địa Chỉ</th>
                    <th class="px-3 py-3 font-bold ">Email</th>
                    <th class="px-3 py-3 font-bold ">Số Điện Thoại</th>
                    <th class="px-3 pl-14 py-3 font-bold ">Vai Trò</th>
                    <th class="px-3 py-3 font-bold "></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key => $ndung)
                    <tr class="border-t even:bg-gray-100 odd:bg-white ">
                      <td class="py-4 px-3 bg-transparent ">
                        <div class="py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ ++$key }}</h6>
                        </div>
                      </td>
                      <td class="py-4 px-3 bg-transparent ">
                        <div class="py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{$ndung ->ND_Ten}}</h6>
                        </div>
                      </td>
                      <td class="py-4 px-3 bg-transparent ">
                        <div class="py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{$ndung ->ND_DiaChi}}</h6>
                        </div>
                      </td>
                      <td class="py-4 px-3 bg-transparent ">
                        <div class="py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{$ndung ->ND_Email}}</h6>
                        </div>
                      </td>
                      <td class="py-4 px-3 bg-transparent">
                        <div class="py-1">
                            <h6 class="mb-0  text-sm leading-normal">{{$ndung ->ND_SDT}}</h6>
                        </div>
                      </td>
                      <td class="py-4 px-3 bg-transparent">
                        <div class="px-1 py-1 rounded-full {{ $ndung->ND_Ma === Auth::user()->ND_Ma  ? 'bg-fuchsia-400 text-white' : ($ndung->VT_Ma == 1 ? 'bg-cyan-400 text-white' :  '')}}">
                            <h6 class="text-sm leading-normal capitalize text-center"> {{ $ndung->VT_Ten}}</h6>
                        </div>
                      </td>
                      <td class="flex px-1 bg-transparent mt-4 justify-center ">
                        {{-- {{route('update-portfolio',['id' => $portfolio->DM_STT])}} --}}
                       
                        <a href="{{route('admin-update-user',['id' => $ndung->ND_Ma])}}" class="text-16  mr-4 text-blue-500">
                          <button type="submit" class="text-12 text-yellow-600 leading-normal border-2 border-yellow-400 hover:border-red-400  px-3 py-2 rounded-xl hover:bg-red-500  hover:text-white transition-all duration-200">Cập Nhật</button>
                        </a>
                        {{-- <button class="delete-fish text-16 mr-2 text-red-300 cursor-pointer" data-id="{{$fish->fish_id}}"> --}}
                          <button class="delete-user text-12 text-red-400 leading-normal border-2 border-red-400  px-4 py-2 rounded-xl hover:bg-red-400  hover:text-white transition-all duration-200 " data-id="{{$ndung->ND_Ma}}">Xóa</button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>



              <div class="flex justify-between mx-4 py-4 border-t">
                <span class="text-slate-700 text-14 font-light">1 - @if($data->count() < 5) {{ $data->count() }} @else 5 @endif of {{ $data->lastPage() }} entries</span>
                <div class="bg-slate-100 rounded-full">
                  <ol class="pagination flex text-gray-400">

                    <li class="pagination_li hover:bg-slate-200 rounded-full">
                      <a
                          href="{{ $data->previousPageUrl() }}"
                        class="flex items-center h-8 px-3 rounded-full text-center"
                      >
                        <i class="fa-solid fa-angle-left"></i>
                      </a>
                    </li>
                    @for ($i = 1; $i <= $data->lastPage(); $i++)
                      <li
                        class="pagination_li rounded-full
                        {{ $data->currentPage() == $i ? 'bg-blue-500 hover:bg-blue-700 text-white' : 'hover:bg-slate-200'}}"
                      >
                        <a
                          href="{{ $data->url($i) }}"
                          class="flex items-center h-8 px-3 rounded-full text-center"
                        >
                          {{ $i }}
                        </a>
                      </li>
                    @endfor

                    <li class="pagination_li hover:bg-slate-200 rounded-full">
                      <a
                          href="{{ $data->nextPageUrl() }}"
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
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection
