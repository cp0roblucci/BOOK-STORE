@section('footer')

<div style="background-image: url(/storage/images/fish.jpg); height:full; width:10000px"  class="footer py-3">
    <div class="content-footer mx-20 /bg-red-600 h-auto flex  relative">
        <div class="footer-item ">
            <div class="title mb-3">
                <h1 class="uppercase font-bold text-16 mt-2 text-white">Liên hệ</h1>
            </div>
            <div class="list">
                <ul>
                    <li><a class="hover:text-slate-300 text-white mt-2 " >132/DD85, KV2, An Khánh, Ninh Kiều, Cần Thơ</a></li>
                    <li><a class="hover:text-slate-300 mt-10 text-white" >Office: 024 382 43210</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-item ml-72">
            <div class="title mb-3">
                <h1 class="uppercase font-bold text-16 mt-2 text-white">thông tin</h1>
            </div>
            <div class="list">
                <ul>
                    <li><a class="hover:text-slate-300 text-white" href="/">Trang chủ</a></li>
                    <li><a class="hover:text-slate-300 text-white" href="{{route('get-product', ['category_id' => 1])}}">Sản Phẩm</a></li>
                    {{-- <li><a class="hover:text-slate-300" href="#"></a></li> --}}
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection