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
    {{--  --}}
    <div class="backdrop-blur-xl flex justify-between items-center mb-6 p-4 rounded-md shadow-md">
    <form action="" method="post" enctype="multipart/form-data">
            {{-- {{ route('edit-profile') }} --}}
        @csrf
        <div class="flex">
          <div class="rounded-md relative">
            <img
            id="img-preview"
            src="{{ $user->ND_avt ? $user->ND_avt : URL::to('images/admin/user_default.png') }}"
            alt="avatar"
            class="w-32 h-32 rounded-md"
        
          >
          </div>
          <div class="ml-6 items-center py-2">
            <h3 class="text-20 mb-1">{{Auth::user()->ND_Ten}}</h3>
            <span class="text-green-400 ">Khách Hàng</span>
            <div class="px-4 py-2 border-2 rounded-md hover:bg-black hover:text-white transition-all duration-300 cursor-pointer mt-2 ">
                <label for="input-file-img" class="cursor-pointer inline-block rounded-lg ">
                  Chọn ảnh
                </label>
              </div>
              <input
                id="input-file-img"
                type="file"
                name="user-img"
                hidden
                accept="input-file-img/*"
                class="py-8 text-14 border border-slate-500 file:ml-2  border-dashed text-slate-500 cursor-pointer file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-none file:bg-[#5490f0] file:text-white file:cursor-pointer file:hover:bg-blue-100"
              >
          </div>
          @if(session('add-success') || session('update-success') || session('delete-success'))
                <div id="message" class="flex absolute top-12 right-7">
                    <div  class="bg-slate-200 rounded-lg border-l-8 border-l-blue-500 opacity-80">
                        <div class="py-4 text-blue-400 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
                            <span class="px-4">{{ session('add-success') ? session('add-success') : (session('update-success') ? session('update-success') : session('delete-success')) }}</span>
                         </div>
                    </div>
                 </div>
            @endif
        </div>
    </div>

    <div class="backdrop-blur-xl items-center mb-6 p-4 rounded-md shadow-md">
        <div class="py-4 px-6">
            <h4 class="mb-6  text-slate-700 font-semibold  text-20">Thông tin người dùng</h4>
            
            <div class="">
              {{-- <h5 class="my-4 text-slate-500 uppercase">User information</h5> --}}
              
                <div class="grid grid-cols-2 gap-4 mb-4">
  
                  <div class="">
                    <label class="text-slate-700 text-16 ">Tên</label> <br>
                    <input name="ND_Ten" type="text" value="{{Auth::user()->ND_Ten}}" class="mt-2 w-full py-2 p-2 border border-slate-400 rounded-md outline-none">
                  </div>
  
                  <div class="">
                    <label class="text-slate-700 text-16 ">Số điện thoại</label><br>
                    <input name="ND_SDT" type="text" value="{{Auth::user()->ND_SDT}}" class="mt-2 w-full p-2 border border-slate-400 rounded-md outline-none">
                  </div>
                </div>
  
                <div class="grid grid-cols-2 gap-4 mb-4">
                  <div class="">
                    <label class="text-slate-700 text-16 ">Email</label><br>
                    <input name="ND_Email" type="text" value="{{Auth::user()->ND_Email}}" class="mt-2 w-full p-2 border border-slate-400 rounded-md outline-none">
                  </div>
                  <div class="">
                    <label class="text-slate-700 text-16">Địa chỉ</label><br>
                    <input name="ND_DiaChi" type="text" value="{{Auth::user()->ND_DiaChi}}" class="mt-2 w-full p-2 border border-slate-400 rounded-md    outline-none">
                  </div>
                </div>
  
                <div class="mt-4">
                  <div class="inline-block relative mt-2 rounded-md">
                      <label
                          class="after:content-['']  after:absolute after:left-0 after:bg-blue-900 after:h-0 after:transition-all        after:duration-500  after:hover:h-[100%] after:top-[50%] after:hover:top-0 after:w-0.5
                          before:content-['']  before:absolute before:right-0 before:bg-blue-900 before:h-0 before:transition-all before:duration-500  before:hover:h-[100%] before:top-[50%] before:hover:top-0 before:w-0.5"
                      >
                        <button 
                          type="submit" 
                          class="border px-10 py-2 border-blue-500 text-blue-500 hover:text-blue-900 transform  transition-all duration-300
                            relative before:content-['']  before:absolute before:bottom-0 before:bg-blue-900 before:w-0 before:transition-all before:duration-500  before:hover:w-[100%] before:left-[50%] before:hover:left-0 before:h-0.5
                            after:content-['']  after:absolute after:top-0 after:bg-blue-900 after:w-0 after:transition-all after:duration-500  after:hover:w-[100%] after:left-[50%] after:hover:left-0 after:h-0.5"
                          >
                            Cập Nhật
                        </button>
                      </label>
                    </div>
                </div>
              
            </div>
          </div>
    </div>
   
    </form>
    <div class="backdrop-blur-xl items-center mb-6 p-4 rounded-md shadow-md">
      <div class="py-4 px-6">
        <h4 class="mb-6 text-slate-700 font-semibold text-20">Đơn hàng của bạn</h4>

        <div class="p-0 overflow-x-auto place-self-auto">
          <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
            <thead class="align-bottom bg-slate-200 rounded-2xl">
              <tr class="text-black uppercase text-left text-12">
                <th class="px-6 py-3 font-bold opacity">#</th>
                <th class="px-4 py-3 font-bold">Ngày Đặt</th>
                <th class="px-4 py-3 font-bold">Trạng Thái</th>
                <th class="px-4 py-3 font-bold">Tổng Tiền</th>
                <th class="px-4 py-3 font-bold text-center"></th>
                {{-- <th class="px-4 py-3 font-bold "></th> --}}
              </tr>
            </thead>
            <tbody>
              @if ($donhang->isEmpty())
              <p>Bạn chưa có đơn hàng nào.</p>
            @else
              <ul>
                  @foreach ($donhang as $key => $dh)
                      <tr class="border-t even:bg-gray-100 odd:bg-white">
                        <td class="p-4 bg-transparent ">
                          <div class="px-2 py-1">
                              <h6 class="mb-0 text-sm leading-normal">{{ ++$key }}</h6>
                          </div>
                        </td>
                        <td class="p-4 bg-transparent text-left">
                          <div class=" py-1">
                            <h6 class="mb-0 text-12 leading-normal">
                              {{
                                  date('Y-m-d', strtotime($dh->DH_NgayTao)) == date('Y-m-d')
                                  ? 'Hôm nay ' . date('H:i:s', strtotime($dh->DH_NgayTao))
                                  : $dh->DH_NgayTao
                              }}
                            </h6>
                          </div>
                        </td>
                        <td class="p-4 bg-transparent text-left">
                          <div class=" py-1 ml-1">
                            <h6 class="mb-0 text-12 leading-normal">{{$dh->TT_Ten}}</h6>
                          </div>
                        </td>
                        <td class="p-4 bg-transparent text-left">
                          <div class=" py-1 ml-1">
                            <h6 class="mb-0 text-12 leading-normal ">{{ number_format($dh->TongTien, 0, ',', '.') }}đ</h6>
                          </div>
                        </td>
                        <td class="flex bg-transparent mt-4 justify-center items-center ">
                          {{-- {{route('importwarehouse-details',['id' => $hdn->HDN_Ma])}} --}}
                          <a href="{{route('order-customer',['id' => $dh->DH_Ma])}}" class="text-16  text-blue-500">
                              <button type="submit" class="text-12 text-primary-blue leading-normal border-2 border-blue-400 hover:border-red-400  px-4 py-2 rounded-xl hover:bg-red-500  hover:text-white transition-all duration-200">Xem Chi Tiết</button>
                          </a>
                          {{-- {{route('update-importwarehouse',['id' => $hdn->HDN_Ma])}} --}}
                        </td>
                      </tr>
                     
                  @endforeach
              </ul>
            @endif
            </tbody>
          </table>
          {{-- phan trang --}}
          


        </div>
      </div>
    </div>
  </div>
  
</main>

<x-footer  :js-file="'resources/js/info-user.js'" />
