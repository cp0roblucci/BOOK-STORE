@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Update Category Book')
@section('path', 'Cập Nhật / Danh mục sản phẩm')

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

    <div class="py-4 pt-2 ml-2 text-24 font-sora text-[#5432a8]">Cập nhật danh mục</div>
    <div class="">
      <div class="col-span-3 border p-4">
        <form action="" method="post" enctype="multipart/form-data">
          @csrf
          <div class="grid grid-cols-1 gap-4">
            <div class="">
                <label
                  for="DM_Ten"
                  class="text-slate-500 text-14"
                >
                  Tên Danh Mục
                </label><br>
                <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200"> 
                <input
                type="text"
                name="DM_Ten"
                placeholder=""
                class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                value = "{{$categorybook -> DM_Ten}}"
              >
              
           
                </div>
            </div>

            <div class="">
              <label
                for="DM_PhanCap"
                class="text-slate-500 text-14"
              >
              Danh Mục Cha
              </label><br>
              <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                <select
                name="DM_PhanCap"
                class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14 cursor-pointer"
                >
                <option value="1" {{ $categorybook->DM_PhanCap == 1 ? 'selected' : '' }}>Sách Tiếng Việt</option>
                <option value="2" {{ $categorybook->DM_PhanCap == 2 ? 'selected' : '' }}>Sách Tiếng Anh</option>
                </select>
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
