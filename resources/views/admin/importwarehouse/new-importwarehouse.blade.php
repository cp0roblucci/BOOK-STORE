@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Hóa Đơn Nhập')
@section('path', 'Hóa Đơn Nhập / Danh Sách Hóa Đơn Nhập')

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
        <div class="py-4 text-blue-400 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
          <span class="px-4">{{ session('add-success') ? session('add-success') : (session('update-success') ? session('update-success') : session('delete-success')) }}</span>
        </div>
      </div>
    </div>
    @endif

    <div>
      <div class="py-4 pt-2 ml-2 text-24 font-sora text-[#5432a8]">Thêm mới Hóa Đơn Nhập</div>
      @if(session('create-success'))
          <div id="message" class="flex absolute top-12 right-7">
            <div  class="bg-slate-200 rounded-lg border-l-8 border-l-blue-500 opacity-80">
              <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
                <span class="px-4">{{ session('create-success') }}</span>
              </div>
            </div>
          </div>
        @endif
    </div>
    
    {{--  --}}
    <div class="">
        @if($errors->any())
            <div class="alert alert-danger text-red-400 text-14 ml-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="border mt-6 p-2 rounded-xl shadow-xl">
            <div class="mt-4 mb-2">
                <label
                for="HDN_NgayNhap"
                class="text-slate-500 text-14"
                >
                    Ngày
                </label><br>
                <div class="border-[1.5px] mt-1">
                <input
                    type="date"
                    name="HDN_NgayNhap"
                    placeholder="ngày tạo"
                    class="pb-2 pt-1 w-full outline-none focus-within:border-blue-500 px-3 placeholder:text-14 text-14"
                >
                </div>
            </div>
            <div class="mt-4 mb-2">
                <label
                for="HDN_Ghichu"
                class="text-slate-500 text-14"
                >
                    Ghi chú
                </label><br>
                <div class="border-[1.5px] mt-1">
                <input
                    type="text"
                    name="HDN_GhiChu"
                    placeholder="Ghi chú"
                    class="pb-6 pt-1 w-full outline-none focus-within:border-blue-500 px-3 placeholder:text-14 text-14"
                >
                </div>
            </div>
        </div>
        <div class="border mt-6 p-2 rounded-xl shadow-xl">
        
            <div class="">
                <div class="col-span-3 p-4">
                                  <!-- Mã của sản phẩm đầu tiên -->
                    <div id="product-container">
                        <div class="product-form">
                            <div class="col-span-3 border p-4">
                                  <div class="flex items-center justify-between mt-1 mb-6">
                                    <div class="w-72 h-52 mr-10">
                                      <img
                                        id="img-preview"
                                        src="{{ URL::to('/storage/images/admin/book-default.png')}}"
                                        alt="image-product"
                                        class="w-full h-full"
                                      >
                                    </div>
                        
                                    <input
                                      id="input-file-img"
                                      type="file"
                                      name="book-img[]"
                                      placeholder=""
                                      class="w-full py-8 text-14 border border-slate-500 file:ml-2 rounded-lg border-dashed text-slate-500 cursor-pointer file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-none file:bg-[#5490f0] file:text-white file:cursor-pointer file:hover:bg-blue-100"
                                    >
                                  </div>
                        
                        
                                  <div class="grid grid-cols-3 gap-4">
                                    <div class="">
                                      <label
                                        for="S_Danhmuc"
                                        class="text-slate-500 text-14"
                                      >
                                      Danh mục
                                      </label><br>
                                      <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                        <select
                                          name="S_Danhmuc[]"
                                          class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14 cursor-pointer"
                                        >
                                          @foreach($categorybook as $category)
                                            <option value="{{ $category->DM_Ma }}">{{ $category->DM_Ten }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                        
                                    <div class="">
                                      <label
                                        for="S_Ten"
                                        class="text-slate-500 text-14"
                                      >
                                        Tên sách
                                      </label><br>
                                      <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                        <input
                                          type="text"
                                          name="S_Ten[]"
                                          placeholder="Nhập tên sách"
                                          class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                                        >
                                      </div>
                                    </div>
                        
                        
                                    <div class="">
                                      <label
                                        for="S_GiaBan"
                                        class="text-slate-500 text-14"
                                      >
                                        Tên
                                      </label><br>
                                      <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                        <input
                                          type="text"
                                          name="S_GiaBan[]"
                                          placeholder="Nhập giá bán"
                                          class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                                        >
                                      </div>
                                    </div>
                                  </div>
                                  <div class="grid grid-cols-3 gap-4 mt-4">
                                    
                                    <div class="">
                                      <label
                                        for="TG_Ten"
                                        class="text-slate-500 text-14"
                                      >
                                        Tác giả
                                      </label><br>
                                      <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                        <input
                                          type="text"
                                          name="TG_Ten[]"
                                          placeholder="Nhập tên"
                                          class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                                        >
                                      </div>
                                    </div>
                                    <div class="">
                                      <label
                                        for="NCC_Ten"
                                        class="text-slate-500 text-14"
                                      >
                                        Nhà cung cấp
                                      </label><br>
                                      <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                        <select
                                          name="NCC_Ten[]"
                                          class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14 cursor-pointer"
                                        >
                                          @foreach($ncc as $ncc)
                                            <option value="{{ $ncc->NCC_Ma }}">{{ $ncc->NCC_Ten }}</option>
                                          @endforeach
                                          
                                        </select>
                                      </div>
                                    </div>
                                    <div class="">
                                      <label
                                        for="NXB_Ten"
                                        class="text-slate-500 text-14"
                                      >
                                        Nhà xuất bản
                                      </label><br>
                                      <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                        <select
                                          name="NXB_Ten[]"
                                          class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14 cursor-pointer"
                                        >
                                          @foreach($nxb as $nxb)
                                            <option value="{{ $nxb->NXB_Ma }}">{{ $nxb->NXB_Ten  }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                        
                        
                                  </div>
                        
                                <div class="grid grid-cols-4 gap-4 mt-2">
                                  <div class="">
                                    <label
                                      for="S_NamXuatBan"
                                      class="text-slate-500 text-14"
                                    >
                                      Năm xuất bản
                                    </label><br>
                                    <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                      <input
                                        type="text"
                                        name="S_NamXuatBan[]"
                                        placeholder="Nhập năm xuất bản"
                                        class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                                      >
                                    </div>
                                  </div>
                        
                                  <div class="">
                                    <label
                                      for="S_DichGia"
                                      class="text-slate-500 text-14"
                                    >
                                      Dịch giả
                                    </label><br>
                                    <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                      <input
                                        type="text"
                                        name="S_DichGia[]"
                                        placeholder="Nhập dịch giả"
                                        class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                                      >
                                    </div>
                                  </div>
                                  <div class="">
                                    <label
                                      for="S_SoTrang"
                                      class="text-slate-500 text-14"
                                    >
                                      Số trang
                                    </label><br>
                                    <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                      <input
                                        type="text"
                                        name="S_SoTrang[]"
                                        placeholder="Nhập số trang"
                                        class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                                      >
                                    </div>
                                  </div>
                                  <div class="">
                                    <label
                                      for="S_TrongLuong"
                                      class="text-slate-500 text-14"
                                    >
                                      Trọng lượng
                                    </label><br>
                                    <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                      <input
                                        type="text"
                                        name="S_TrongLuong[]"
                                        placeholder="Nhập trọng lượng"
                                        class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                                      >
                                    </div>
                                  </div>
                        
                                    
                                </div>
                                <div>
                                  <div class="mt-4 ">
                                    <label
                                      for="S_Mota"
                                      class="text-slate-500 text-14"
                                    >
                                      Mô tả
                                    </label><br>
                                    <div class="border-[1.5px] mt-1">
                                      <input
                                        type="text"
                                        name="S_Mota[]"
                                        placeholder="Nhập"
                                        class="pb-11 pt-1 w-full outline-none focus-within:border-blue-500 px-2 placeholder:text-14 text-14"
                                      >
                                    </div>
                                  </div>
                                </div>
                        
                                <div class="grid grid-cols-3 gap-4">
                                  <div class="mt-4 ">
                                    <label
                                      for="S_SoLuong"
                                      class="text-slate-500 text-14"
                                    >
                                      Số lượng
                                    </label><br>
                                    <div class="border-[1.5px] mt-1">
                                      <input
                                        type="text"
                                        name="S_SoLuong[]"
                                        placeholder="Nhập"
                                        class="pb-11 pt-1 w-full outline-none focus-within:border-blue-500 px-2 placeholder:text-14 text-14"
                                      >
                                    </div>
                                  </div>
                              </div>
                                <button class="flex border-2 border-blue-500 p-2 mb-4 px-6 mt-4 hover:bg-slate-100 " type="button" onclick="removeProductForm(this)">Xóa Sản Phẩm</button>    
                        </div>
                        
                         
                    </div> 
                   
                </div>
            </div>
        </div> 
        <div class="border p-2 rounded-xl shadow-xl w-full flex justify-end">
            <div class="mr-4">
                <button class="flex border-2 border-blue-500 p-2 mb-4 px-6 mt-4 hover:bg-slate-100 " type="button" onclick="addProductForm()">Thêm Sản Phẩm</button>
            </div>
            <div>
                <button class="flex border-2 border-blue-500 p-2 mb-4 px-6 mt-4 hover:bg-slate-100 " type="submit">Lưu Hóa Đơn Nhập</button>
            </div>
           
            
        </div>
        
    </form>
    </div>
    
@endsection

<script>
    let productCounter = 0; // Biến đếm sản phẩm
    
    function addProductForm() {
        // Clone the first product form
        var clonedForm = document.querySelector('.product-form').cloneNode(true);
    
        // Tăng biến đếm để đảm bảo id duy nhất
        productCounter++;
        
        // Reset input values in the cloned form
        var inputFields = clonedForm.querySelectorAll('input');
        inputFields.forEach(function(input) {
            input.value = '';
        });
    
        // Thay đổi id và name của input file và hình ảnh để đảm bảo sự duy nhất
        let imgPreview = clonedForm.querySelector('#img-preview');
        imgPreview.id = 'img-preview-' + productCounter;
        imgPreview.src = "{{ URL::to('/storage/images/admin/book-default.png')}}";
    
        let inputFileImg = clonedForm.querySelector('#input-file-img');
        inputFileImg.id = 'input-file-img-' + productCounter;
        inputFileImg.name = 'book-img[' + productCounter + ']';
    
        // Thêm clonedForm vào container
        document.getElementById('product-container').appendChild(clonedForm);
    
        // Thêm sự kiện change cho input mới
        inputFileImg.addEventListener('change', function(event) {
            handleImageChange(event, imgPreview);
        });
    }
    
    function removeProductForm(button) {
        // Remove the parent node of the button (which is the product form)
        button.parentNode.remove();
    }
    
    function handleImageChange(event, imgPreview) {
        const image = event.target.files[0];
    
        const url = URL.createObjectURL(image);
    
        imgPreview.src = url;
    
        imgPreview.onload = () => {
            URL.revokeObjectURL(url);
        }
    }
</script>
{{-- <script>
const inputFileImg = document.getElementById('input-file-img');
const imgPreview= document.getElementById('img-preview');


if(inputFileImg) {
  inputFileImg.addEventListener('change', function(event) {
    const image = event.target.files[0];
  
    const url = URL.createObjectURL(image);
  
    imgPreview.src = url;
  
    imgPreview.onload = () => {
      URL.revokeObjectURL(url);
    }
  
  });
}

    function addProductForm() {
        // Clone the first product form
        var clonedForm = document.querySelector('.product-form').cloneNode(true);
        
        // Reset input values in the cloned form
        var inputFields = clonedForm.querySelectorAll('input');
        inputFields.forEach(function(input) {
            input.value = '';
        });

        // Append the cloned form to the product container
        document.getElementById('product-container').appendChild(clonedForm);
    }

    function removeProductForm(button) {
        // Remove the parent node of the button (which is the product form)
        button.parentNode.remove();
    }
</script> --}}



@section('footer')
  @include('admin.layout.footer')
@endsection
