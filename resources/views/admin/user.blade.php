@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Users')
@section('path', 'Users')

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection
    @include('components.admin.form-input')
    <div class="flex flex-wrap -mx-3 mb-10 mt-2">
      <div class="flex flex-col w-full max-w-full px-3">
        <div class="flex flex-col min-w-[980px] mb-6 break-words bg-white border-0 border-transparent border-solid shadow-md rounded-lg bg-clip-border overflow-hidden">
          <div class="flex p-2 py-2 items-center justify-between">
            <h3 class="text-[#344767] text-20 font-sora">Users</h3>
          </div>
          <div class="flex-auto px-0 pt-0">
            <div class="p-0 overflow-x-auto place-self-auto">
              <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                <thead class="align-bottom bg-slate-200 rounded-2xl">
                  <tr class="text-black uppercase text-left text-12">
                    <th class="px-4 py-3 font-bold opacity">#</th>
                    <th class="px-4 py-3 font-bold ">Name</th>
                    <th class="px-4 py-3 font-bold ">Phone number</th>
                    <th class="px-4 py-3 font-bold ">Address</th>
                    <th class="px-4 py-3 font-bold text-center">Role</th>
                    <th class="px-4 py-3 font-bold "></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $key => $user)
                    <tr class="border-t hover:bg-slate-100">
                      <td class="p-4 bg-transparent ">
                        <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ ++$key }}</h6>
                        </div>
                      </td>
                      <td class="p-4 bg-transparent">
                        <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ $user->last_name . ' ' . $user->first_name }}</h6>
                        </div>
                      </td>
                      <td class="p-4 bg-transparent text-left">
                        <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ $user->phone_number }}</h6>
                        </div>
                      </td>
                      <td class="p-4 bg-transparent">
                        <div class="px-2 py-1 w-56">
                            <h6 class="mb-0 text-sm leading-normal truncate">{{ $user->user_address }}</h6>
                        </div>
                      </td>
                      <td class="p-4 bg-transparent text-center">
                        <div class="px-2 py-1 rounded-full {{ $user->role_id == 1  ? 'bg-blue-100 text-white' : ''}}">
                            <h6 class="mb-0 text-sm leading-normal capitalize"> {{ $user->role_name }}</h6>
                        </div>
                      </td>
                      <td class="p-4 bg-transparent">
                        <a href="users/{{$user->id}}/edit" class="mb-0 text-sm leading-normal text-red-300">Edit</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="flex justify-between mx-4 py-4 border-t">
                <span class="text-slate-700 text-14 font-light">1 - 5 of {{ $users->lastPage() }} entries</span>
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
