@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'DashBoard')
@section('path', 'Users')

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection

    {{-- Customers --}}
    <div class="flex flex-wrap -mx-3">
      <div class="flex flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-[980px] mb-6 break-words bg-slate-100 border-0 border-transparent border-solid shadow-md rounded-2xl bg-clip-border">
          <div class="p-6 pb-2 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h3 class="text-[#344767]">Customers</h3>
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
                  @for ($i = 1; $i <= 5; $i++)
                    <tr class="border-t">
                      <td class="p-2 bg-transparent">
                        <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ $i }}</h6>
                        </div>
                      </td>
                      <td class="p-2 bg-transparent">
                        <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">Tran Van Truong {{ $i }}</h6>
                        </div>
                      </td>
                      <td class="p-2 bg-transparent text-left">
                        <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">0123456798</h6>
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
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Employee --}}
    <div class="flex flex-wrap -mx-3">
      <div class="flex flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-[980px] mb-6 break-words bg-slate-100 border-0 border-transparent border-solid shadow-md rounded-2xl bg-clip-border">
          <div class="p-6 pb-2 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h3 class="text-[#344767]">Employee</h3>
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
                  @for ($i = 1; $i <= 5; $i++)
                    <tr class="border-t">
                      <td class="p-2 bg-transparent">
                        <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ $i }}</h6>
                        </div>
                      </td>
                      <td class="p-2 bg-transparent">
                        <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">Tran Van Truong {{ $i }}</h6>
                        </div>
                      </td>
                      <td class="p-2 bg-transparent text-left">
                        <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">0123456798</h6>
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
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Admin --}}
    <div class="flex flex-wrap -mx-3">
      <div class="flex flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-[980px] mb-6 break-words bg-slate-100 border-0 border-transparent border-solid shadow-md rounded-2xl bg-clip-border">
          <div class="p-6 pb-2 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h3 class="text-[#344767]">Customers</h3>
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
                  @for ($i = 1; $i <= 5; $i++)
                    <tr class="border-t">
                      <td class="p-2 bg-transparent">
                        <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ $i }}</h6>
                        </div>
                      </td>
                      <td class="p-2 bg-transparent">
                        <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">Tran Van Truong {{ $i }}</h6>
                        </div>
                      </td>
                      <td class="p-2 bg-transparent text-left">
                        <div class="px-2 py-1">
                            <h6 class="mb-0 text-sm leading-normal">0123456798</h6>
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
                  @endfor
                </tbody>
              </table>
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