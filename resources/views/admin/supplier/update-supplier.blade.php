@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Update Nhà cung cấp')
@section('path', 'Cập nhật / Nhà cung cấp')

@section('sidebar')
  @include('admin.layout.slidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection
    
    @if(session('add-success') || session('update-success') || session('delete-success'))
        <div id="message" class="flex absolute top-12 right-7">
          <div  class="bg-slate-200 rounded-lg border-l-8 border-l-blue-500 opacity-80">
            <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
              <span class="px-4">{{ session('add-success') ? session('add-success') : (session('update-success') ? session('update-success') : session('delete-success')) }}</span>
            </div>
          </div>
        </div>
      @endif

    <div class="py-4 pt-2 ml-2 text-24 font-sora text-[#5432a8]">Cập nhật Nhà cung cấp</div>
    <div class="">
      <div class="col-span-3 border p-4">
        <form action="" method="post" enctype="multipart/form-data">
          @csrf
          <div class="grid grid-cols-1 gap-4">
            <div class="">
                <label
                  for="NCC_Ten"
                  class="text-slate-500 text-14"
                >
                  Tên Nhà Cung Cấp
                </label><br>
                <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200"> 
                <input
                type="text"
                name="NCC_Ten"
                placeholder=""
                class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                value = "{{$ncc->NCC_Ten}}"
              >
              
           
                </div>
            </div>

            <div class="">
                <label
                  for="NCC_Diachi"
                  class="text-slate-500 text-14"
                >
                  Địa Chỉ Nhà Cung Cấp
                </label><br>
                <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200"> 
                <input
                type="text"
                name="NCC_Diachi"
                placeholder=""
                class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                value = "{{$ncc->NCC_Diachi}}"
              >
              
           
                </div>
            </div>

            <div class="">
                <label
                  for="NCC_Email"
                  class="text-slate-500 text-14"
                >
                  Email Nhà Cung Cấp
                </label><br>
                <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200"> 
                <input
                type="text"
                name="NCC_Email"
                placeholder=""
                class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                value = "{{$ncc->NCC_Email}}"
              >
              
           
                </div>
            </div>

            <div class="">
                <label
                  for="NCC_SDT"
                  class="text-slate-500 text-14"
                >
                  Số Điện Thoại Nhà Cung Cấp
                </label><br>
                <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200"> 
                <input
                type="text"
                name="NCC_SDT"
                placeholder=""
                class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                value = "{{$ncc->NCC_SDT}}"
              >
              
           
                </div>
            </div>
          </div>
          <button
            type="submit"
            class="border-2 border-blue-500 p-2 px-6 mt-4 flex hover:bg-slate-100"
          >
            Cập Nhật
          </button>
        </form>
      </div>

    </div >
  </div>

@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection