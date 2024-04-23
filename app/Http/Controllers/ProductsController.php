<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use App\Models\Nhacungcap;
use App\Models\Nhaxuatban;
use App\Models\Danhmucsanpham;
use App\Models\Tacgia;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
class ProductsController extends Controller
{
    function index() {
        $manga_category = DB::table('sach')->where('DM_Ma', 12)->get()->toArray();
        $danhmuc = DB::table('Danhmucsanpham')
        ->select('Danhmucsanpham.*')
        ->get()
        ->toArray();
       
        $products = DB::table('sach')->get()->toArray();
        // dd($products);
        

        $page = 10;

        $currentPage = request()->get('page', 1);

        $panigator = new LengthAwarePaginator(
            array_slice($products, ($currentPage - 1) * $page, $page),
            count($products),
            $page,
            $currentPage,
            ['path' => request()->url()]
        );
        // $data = DB::table('products')->paginate(10);
        return view('products', ['products' => $panigator, 'title_search' => null],compact('manga_category','danhmuc'));
    }

    function product_detail($productId) {
        $product = DB::table('sach')
            ->join('nhaxuatban', 'nhaxuatban.NXB_Ma', '=', 'sach.NXB_Ma')
            ->join('nhacungcap', 'nhacungcap.NCC_Ma', '=', 'sach.NCC_Ma')
            ->join('Tacgia', 'tacgia.TG_Ma', '=', 'sach.TG_Ma')
            ->join('Danhmucsanpham', 'Danhmucsanpham.DM_Ma', '=', 'sach.DM_Ma')
            ->select('sach.*', 'nhacungcap.NCC_Ten', 'nhaxuatban.NXB_Ten', 'Tacgia.TG_Ten', 'DM_Ten')
            ->where('S_Ma', $productId)->first();
    
        // Gọi API
        $response = Http::get('http://127.0.0.1:5555/api?id=' . $productId);
       
    
        // ktql
        if ($response->ok()) {
            $recommendedProducts = $response->json()['san pham goi y'];
            // dd($recommendedProducts);
        } else {
         //gọi api fail
            $recommendedProducts = [];
        }
    
        $manga_category = DB::table('sach')->where('DM_Ma', 12)->get()->toArray();
        $danhmuc = DB::table('Danhmucsanpham')
            ->select('Danhmucsanpham.*')
            ->get()
            ->toArray();
    
        return view('products_details', compact('product', 'manga_category', 'danhmuc', 'recommendedProducts'));
    }
    


    function search(Request $request) {
        $manga_category = DB::table('sach')->where('DM_Ma', 12)->get()->toArray();
        $danhmuc = DB::table('Danhmucsanpham')
        ->select('Danhmucsanpham.*')
        ->get()
        ->toArray();
        // dd($request);
        $searchTerm = $request->input('key');
       
        $results = DB::table('sach')
                        ->where('S_Ten', 'like', '%' . $searchTerm . '%')
                        ->get()->toArray();
        $page = 10;

        $currentPage = request()->get('page', 1);

        $panigator = new LengthAwarePaginator(
            array_slice($results, ($currentPage - 1) * $page, $page),
            count($results),
            $page,
            $currentPage,
            ['path' => request()->url()]
        );
        
        return view('products', ['products' => $panigator, 'title_search' => 'Kết quả tìm kiếm'],compact('manga_category','danhmuc'));
    }

   
    public function showByCategory(Request $request, $category)
{
    $manga_category = DB::table('sach')->where('DM_Ma', 12)->get()->toArray();
    $danhmuc = DB::table('Danhmucsanpham')->select('Danhmucsanpham.*')->get()->toArray();
    $categoryInfo = DB::table('Danhmucsanpham')->where('DM_Ma', $category)->first();
    // Lấy ra sản phẩm theo danh mục
    $products = DB::table('sach')->where('DM_Ma', $category)->get();

    $page = 10;
    $currentPage = $request->get('page', 1);
    $productsArray = $products->toArray(); 

    $paginator = new LengthAwarePaginator(
        array_slice($productsArray, ($currentPage - 1) * $page, $page),
        count($productsArray),
        $page,
        $currentPage,
        ['path' => $request->url()]
    );

    // Truyền dữ liệu sản phẩm và danh mục sang view
    return view('products', [
        'products' => $paginator,
        'title_search' => $categoryInfo->DM_Ten, // Chỉnh title tại đây
        'category' => $category,
        'manga_category' => $manga_category,
        'danhmuc' => $danhmuc
    ]);
}

    public function showByLanguage(Request $request, $language)
    {
        $manga_category = DB::table('sach')->where('DM_Ma', 12)->get()->toArray();
        $danhmuc = DB::table('Danhmucsanpham')->select('Danhmucsanpham.*')->get()->toArray();

    // Lấy danh mục phân cấp cho sách tiếng Việt và tiếng Anh tương ứng
        $vietnameseCategory = DB::table('Danhmucsanpham')->where('DM_PhanCap', 1)->get()->toArray();
        $englishCategory = DB::table('Danhmucsanpham')->where('DM_PhanCap', 2)->get()->toArray();

    // Chọn danh mục phân cấp tương ứng với ngôn ngữ
        $selectedCategory = ($language == 'vietnamese') ? $vietnameseCategory : $englishCategory;
        $selectedCategoryName = ($language == 'vietnamese') ? 'Sách Tiếng Việt' : 'Sách Tiếng Anh';
    // Lấy ra sản phẩm theo danh mục và ngôn ngữ
        $selectedCategoryIds = array_column($selectedCategory, 'DM_Ma');

        $products = DB::table('sach')
            ->join('Danhmucsanpham', 'Danhmucsanpham.DM_Ma', '=', 'sach.DM_Ma')
            ->whereIn('Danhmucsanpham.DM_Ma', $selectedCategoryIds)
            ->select('sach.*')
            ->get();

        $page = 10;
        $currentPage = $request->get('page', 1);
        $productsArray = $products->toArray();

        $paginator = new LengthAwarePaginator(
        array_slice($productsArray, ($currentPage - 1) * $page, $page),
        count($productsArray),
        $page,
        $currentPage,
        ['path' => $request->url()]
    );

    // Chuyển hướng người dùng đến trang sản phẩm với danh mục tương ứng
    return view('products', [
        'products' => $paginator,
        'title_search' => $selectedCategoryName,
        'category' => $selectedCategory,
        'manga_category' => $manga_category,
        'danhmuc' => $danhmuc
    ]);
    }

    public function addToCart(Request $request)
    {
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');

    // Kiểm tra nếu giỏ hàng không tồn tại, tạo mới
    if (!Session::has('cart')) {
        Session::put('cart', []);
    }

    // Lấy thông tin sản phẩm từ database
    $product = DB::table('sach')->where('S_Ma', $productId)->first();

    // Lấy giỏ hàng từ session
    $cart = Session::get('cart');

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    if (array_key_exists($productId, $cart)) {
        // Nếu tồn tại, cập nhật số lượng
        $cart[$productId]['quantity'] += $quantity;
    } else {
        // Nếu chưa tồn tại, thêm mới vào giỏ hàng
        $cart[$productId] = [
            'id' => $productId,
            'name' => $product->S_Ten,
            'price' => $product->S_GiaBan,
            'image' => $product->S_HinhAnh,
            'quantity' => $quantity,
        ];
    }
    // $cart[$productId]['total'] = $cart[$productId]['quantity'] * $cart[$productId]['price'];
    // Lưu giỏ hàng vào session
    Session::put('cart', $cart);
    
    // Redirect về trang chi tiết sản phẩm với thông báo thành công
    return redirect()->route('products.detail', ['id' => $productId])->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }

   
    public function filter(Request $request)
    {
             $manga_category = DB::table('sach')->where('DM_Ma', 12)->get()->toArray();
        $danhmuc = DB::table('Danhmucsanpham')->select('Danhmucsanpham.*')->get()->toArray();
        $filterPrice = $request->input('filter_price');
        $filterName = $request->input('filter_name');

        // Lấy danh sách sản phẩm
        $productsQuery = DB::table('sach');

        // Gọi hàm filterProducts để xử lý lọc
        $this->filterProducts($productsQuery, $filterPrice, $filterName);

        // Lấy danh sách sản phẩm đã lọc
        $products = $productsQuery->paginate(10);

        // Trả về view với danh sách sản phẩm đã lọc
        return view('products', [
                    'products' => $products,
                    'title_search' => null,
                    'manga_category' => $manga_category,
                    'danhmuc' => $danhmuc
                ]);
    }

    private function filterProducts($query, $filterPrice, $filterName)
    {
        if ($filterPrice == 'price_asc') {
            $query->orderBy('S_GiaBan');
        } elseif ($filterPrice == 'price_desc') {
            $query->orderByDesc('S_GiaBan');
        }

        if ($filterName == 'name_asc') {
            $query->orderBy('S_Ten');
        } elseif ($filterName == 'name_desc') {
            $query->orderByDesc('S_Ten');
        }
    }
}
