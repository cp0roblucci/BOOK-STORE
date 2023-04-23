@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Create new Accessories type')
@section('path', 'Tạo mới / Loại phụ kiện')

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection

    <div class="py-4 pt-2 ml-2 text-24 font-sora text-primary-purple">Thêm loại phụ kiện mới</div>
    <div class="border p-4 grid grid-cols-3  gap-8">
      <div class="col-span-2">
        <form action="" method="post">
          @csrf

          <div class="mt-4 ">
            <label
              for="accessories-type"
              class="text-slate-500 text-14"
            >
            Tên loại phụ kiện
            </label><br>
            <div class="border-[1.5px] mt-1">
              <input
                type="text"
                name="accessories-type"
                placeholder="Nhập"
                class="pb-6 pt-1 w-full outline-none focus-within:border-blue-500 px-2 placeholder:text-14 text-14"
              >
            </div>
          </div>


          <button
            type="submit"
            class="border-2 border-blue-500 p-2 px-6 mt-4 flex hover:bg-slate-100"
          >
            Thêm
          </button>

        </form>
      </div>

      <div class="border">
        <h2 class="text-24 text-center font-sora text-primary-purple">Danh sách loại phụ kiện</h2>
        <div class="mx-2 leading-8">
          @foreach ($accessoriesTypes as $key => $accessoriesType)
            <div class="flex">
              <h2 class="mr-2">{{ ++$key }}.</h2>
              <h4 class="font-medium">{{ $accessoriesType->accessories_type_name }}</h4>
            </div>
          @endforeach
        </div>
      </div>

    </div >
  </div>

@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection
