@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Users')
@section('path', 'Người dùng')

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection

      <div class="w-[40%] pl-4 bg-white rounded-md border-[1.5px] focus-within:border-[1.5px] focus-within:border-blue-200 my-4">
        <form action="{{route('admin-search-user-by-name')}}" method="get" class="flex justify-between">
          <input type="text" placeholder="Tìm kiếm..." name="user-name" class="caret-blue-500 rounded-md outline-none w-full bg-white" required>
            <button type="submit" class="inline-block mr-4 mt-2">
              {{-- <i class="fa-solid fa-magnifying-glass text-slate-500"></i> --}}
              <lord-icon
                src="https://cdn.lordicon.com/zniqnylq.json"
                trigger="click"
                style="width:24px;height:24px">
            </lord-icon>
            </button>
        </form>
      </div>

    {{-- Kết quả tìm kiếm --}}
    <div class="flex flex-wrap -mx-3 mb-10 mt-2">
      <div class="flex flex-col w-full max-w-full px-3">
        <div class="flex flex-col min-w-[980px] mb-6 break-words bg-white border-0 border-transparent border-solid shadow-md rounded-lg bg-clip-border overflow-hidden">
          @if($results->count() == 0)
            <h2 class="ml-2 my-4 text-20 font-sora">Không tìm thấy người dùng có tên "{{$name}}"</h2>
          @else
            <div class="flex p-2 py-2 items-center justify-between">
              <h3 class="text-[#344767] text-20 font-sora">Kết quả tìm kiếm cho "{{$name}}"</h3>
            </div>
            <div class="flex-auto px-0 pt-0">
              <div class="p-0 overflow-x-auto place-self-auto">
                <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                  <thead class="align-bottom bg-slate-200 rounded-2xl">
                    <tr class="text-black uppercase text-left text-12">
                      <th class="px-4 py-3 font-bold opacity">#</th>
                      <th class="px-4 py-3 font-bold ">Họ Tên</th>
                      <th class="px-4 py-3 font-bold ">Số điện thoại</th>
                      <th class="px-4 py-3 font-bold ">Email</th>
                      <th class="px-4 py-3 font-bold ">Địa chỉ</th>
                      <th class="px-4 py-3 font-bold text-center">Phân quyền</th>
                      <th class="px-4 py-3 font-bold w-[100px] "></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($results as $key => $user)
                      <tr class="border-t even:bg-gray-100 odd:bg-white">
                        <td class="p-4 bg-transparent ">
                          <div class="py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ ++$key }}</h6>
                          </div>
                        </td>
                        <td class="p-4 bg-transparent">
                          <div class="py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ $user->last_name . ' ' . $user->first_name }}</h6>
                          </div>
                        </td>
                        <td class="p-4 bg-transparent text-left">
                          <div class="py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ $user->phone_number }}</h6>
                          </div>
                        </td>
                        <td class="p-4 bg-transparent">
                          <div class="py-1">
                              <h6 class="mb-0 text-sm leading-normal truncate">{{ $user->email }}</h6>
                          </div>
                        </td>
                        <td class="p-4 bg-transparent">
                          <div class="py-1">
                              <h6 class="mb-0 text-sm leading-normal truncate">{{ $user->user_address }}</h6>
                          </div>
                        </td>
                        <td class="p-4 bg-transparent text-center">
                          <div class="px-2 py-1 rounded-full {{ $user->id === Auth::user()->id  ? 'bg-purple-400 text-white' : ($user->role_id == 1 ? 'bg-blue-100 text-white' :  '')}}">
                              <h6 class="text-sm leading-normal capitalize"> {{ $user->role_name }}</h6>
                          </div>
                        </td>
                        <td class="flex bg-transparent mt-4 justify-center items-center">
                          <a href="users/{{$user->id}}/edit" class="text-16 mr-2 text-blue-100">
                            <i class="fa-regular fa-pen-to-square mr-2"></i>
                          </a>
                          <button class="delete-user text-16 mr-2 text-red-300 cursor-pointer" data-id="{{$user->id}}">
                            <i class="fa-regular fa-trash-can text-16"></i>
                          </button>
                        </td>

                      </tr>
                    @endforeach
                  </tbody>
                </table>



                <div class="flex justify-between mx-4 py-4 border-t">
                  <span class="text-slate-700 text-14 font-light">1 - 5 of {{ $results->lastPage() }} entries</span>
                  <div class="bg-slate-100 rounded-full">
                    <ol class="pagination flex text-gray-400">

                      <li class="pagination_li hover:bg-slate-200 rounded-full">
                        <a
                            href="{{ $results->previousPageUrl() }}"
                          class="flex items-center h-8 px-3 rounded-full text-center"
                        >
                          <i class="fa-solid fa-angle-left"></i>
                        </a>
                      </li>
                      @for ($i = 1; $i <= $results->lastPage(); $i++)
                        <li
                          class="pagination_li rounded-full
                          {{ $results->currentPage() == $i ? 'bg-blue-500 hover:bg-blue-700 text-white' : 'hover:bg-slate-200'}}"
                        >
                          <a
                            href="{{ $results->url($i) }}"
                            class="flex items-center h-8 px-3 rounded-full text-center"
                          >
                            {{ $i }}
                          </a>
                        </li>
                      @endfor

                      <li class="pagination_li hover:bg-slate-200 rounded-full">
                        <a
                            href="{{ $results->nextPageUrl() }}"
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
          @endif
        </div>


      </div>

    </div>

    <div class="">

    </div>
  </div>
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection