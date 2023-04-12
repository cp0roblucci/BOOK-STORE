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
      @if(session('update-success') || session('delete-success'))
        <div id="message" class="bg-slate-200 absolute top-12 right-7 rounded-lg border-l-8 border-l-blue-500 opacity-80">
          <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
            <span class="px-4">{{ session('update-success') ? session('update-success') : session('delete-success') }}</span>
          </div>
        </div>
      @elseif(session('delete-failed'))
        <div id="message" class="bg-slate-200 absolute top-12 right-7 rounded-lg border-l-8 border-l-red-500 opacity-80">
          <div class="py-4 text-red-500 relative before:absolute before:bottom-0 before:content-[''] before:bg-red-500 before:h-0.5 before:w-full before:animate-before">
            <span class="px-4">{{ session('delete-failed') }}</span>
          </div>
        </div>
      @endif
    {{-- Danh sách người dùng --}}
    <div class="flex flex-wrap -mx-3 mb-10 mt-2">
      <div class="flex flex-col w-full max-w-full px-3">
        <div class="flex flex-col min-w-[980px] mb-6 break-words bg-white border-0 border-transparent border-solid shadow-md rounded-lg bg-clip-border overflow-hidden">
          <div class="flex p-2 py-2 items-center justify-between">
            <h3 class="text-[#344767] text-20 font-sora">Danh sách người dùng</h3>
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
                  @foreach($users as $key => $user)
{{--                      @continue($user->id === Auth::user()->id)--}}
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
                        @if($user->id === Auth::user()->id )
                          <button class="delete-user text-16 mr-2 text-red-300 cursor-pointer">
                            <i class="fa-regular fa-trash-can text-16"></i>
                          </button>
                        @else
                          <button class="delete-user text-16 mr-2 text-red-300 cursor-pointer" data-id="{{$user->id}}">
                            <i class="fa-regular fa-trash-can text-16"></i>
                          </button>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>



              <div class="flex justify-between mx-4 py-4 border-t">
                <span class="text-slate-700 text-14 font-light">1 - @if($users->count() < 5) {{ $users->count() }} @else 5 @endif of {{ $users->lastPage() }} entries</span>
                <div class="bg-slate-100 rounded-full">
                  <ol class="pagination flex text-gray-400">

                    <li class="pagination_li hover:bg-slate-200 rounded-full">
                      <a
                          href="{{ $users->previousPageUrl() }}"
                        class="flex items-center h-8 px-3 rounded-full text-center"
                      >
                        <i class="fa-solid fa-angle-left"></i>
                      </a>
                    </li>
                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                      <li
                        class="pagination_li rounded-full
                        {{ $users->currentPage() == $i ? 'bg-blue-500 hover:bg-blue-700 text-white' : 'hover:bg-slate-200'}}"
                      >
                        <a
                          href="{{ $users->url($i) }}"
                          class="flex items-center h-8 px-3 rounded-full text-center"
                        >
                          {{ $i }}
                        </a>
                      </li>
                    @endfor

                    <li class="pagination_li hover:bg-slate-200 rounded-full">
                      <a
                          href="{{ $users->nextPageUrl() }}"
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

    <div class="">

    </div>
  </div>
@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection
