<?php

use App\Http\Controllers\admin\orderController;
use App\Http\Controllers\admin\UserConTroller;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Fontend\HomeController;
use App\Http\Controllers\ImportwarehouseController;
use App\Http\Controllers\NXBController;
use App\Http\Controllers\SuplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\CategorybookController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
//clients routes 

// Route::get('/home',function () {
//    return view ('home');
// });

Route::get('/',[HomeController::class,'getHomePage'])->name('home');
// Route::get('components',[HomeController::class,'getComponents'])->name('components');
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/search', [ProductsController::class, 'search'])->name('search-products');

Route::get('/product/detail/{id}', [ProductsController::class, 'product_detail'])->name('products.detail');
Route::get('/products/{category}', [ProductsController::class,'showByCategory'])->name('products.category');
Route::get('/products/language/{language}',[ProductsController::class,'showByLanguage'])->name('products.language');
//cart

Route::post('/product/detail/{id}', [ProductsController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/update-quantity-cart', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
//
//Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/checkout', [CheckoutController::class, 'checkoutindex'])->name('checkout.index');
Route::post('/create-order',[CheckoutController::class, 'createOrder'])->name('create.order');
//
Route::get('/order-success', [CheckoutController::class, 'orderSuccess'])->name('order-success');

Route::get('profile/{id}/users', [ProfileController::class, 'getProfile'])->name('profile-users');
Route::post('profile/{id}/users', [ProfileController::class, 'editProfile']);

Route::get('profile/{id}/customers', [ProfileController::class,'getProfileCustomer'])->name('profile-customer');
Route::post('profile/{id}/customers', [ProfileController::class,'editProfileCustomer']);

//
Route::get('order_customer/{id}/order', [ProfileController::class, 'orderCustomer'])->name('order-customer');
//
Route::post('/create-ordernow',[CheckoutController::class, 'createOrderNow'])->name('create-now');
Route::get('/checkoutnow', [CheckoutController::class, 'buyNowView'])->name('checkoutnowview');
Route::post('checkoutnow', [CheckoutController::class,'checkoutTransaction'])->name('checkoutTransaction');

Route::get('/contact',[HomeController::class,'contact'])->name('contact');

Route::post('/products/filter', [ProductsController::class, 'filter'])->name('products.filter');
// Route::post('checkout')

//error routes
Route::view('/403', '403')->name('403');
//admin routes



Route::group(['prefix' => 'admin','middleware' => ['auth','admin']],function() {
   Route::get('homepage',[AdminController::class,'getAdminPage'])->name('admin-homepage');
//categorybook
   Route::get('categorybook',[AdminController::class,'categorybook'])->name('admin-categorybook');
   Route::get('new-categorybook',[CategorybookController::class,'newCategorybook'])->name('admin-new-categorybook');
   Route::post('new-categorybook',[CategorybookController::class,'createCategorybook']);
   //update categorybook
   Route::get('update-categorybook/{id}/update',[CategorybookController::class,'getUpdateCategorybook'])->name('admin-update-categorybook');
   Route::post('update-categorybook/{id}/update',[CategorybookController::class,'updateCategorybook'])->name('update-categorybook');
   //delete categorybook
   Route::post('delete-categorybook', [CategorybookController::class, 'delete'])->name('delete-categorybook');
//book
   Route::get('book',[AdminController::class,'book'])->name('admin-book');
   Route::get('new-book',[BookController::class,'newBook'])->name('admin-new-book');
      //createBook
   Route::post('new-book',[BookController::class,'createnewBook']);
      //updateBook 
   Route::get('book/{id}/update-book', [BookController::class, 'getUpdateBook'])->name('update-book');
   Route::post('book/{id}/update-book', [BookController::class, 'postUpdateBook']);
      //deleteBook
   Route::post('delete-book', [BookController::class, 'delete'])->name('delete-book');
//supplier
   Route::get('supplier',[AdminController::class,'supplier'])->name('admin-supplier');
   Route::get('new-supplier',[SuplierController::class,'newSupplier'])->name('admin-new-supplier');
   Route::post('new-supplier',[SuplierController::class,'createSupplier']);
   //update supplier
   Route::get('update-supplier/{id}/update',[SuplierController::class,'getUpdateSupplier'])->name('admin-update-supplier');
   Route::post('update-supplier/{id}/update',[SuplierController::class,'updateSupplier'])->name('update-supplier');
   //delete supplier
   Route::post('delete-supplier', [SuplierController::class, 'delete'])->name('delete-supplier');
//nxb
   Route::get('nxb',[AdminController::class,'nxb'])->name('admin-nxb');
   Route::get('new-nxb',[NXBController::class,'newNxb'])->name('admin-new-nxb');
   Route::post('new-nxb',[NXBController::class,'createNXB']);
   //update nxb
   Route::get('update-nxb/{id}/update',[NXBController::class,'getUpdateNXB'])->name('admin-update-nxb');
   Route::post('update-nxb/{id}/update',[NXBController::class,'updateNXB'])->name('update-nxb');
   //delete nxb
   Route::post('delete-nxb', [NXBController::class, 'delete'])->name('delete-nxb');
//user
   Route::get('users',[AdminController::class,'users'])->name('admin-users');
   //new user
   Route::get('new-user',[UserConTroller::class,'newUser'])->name('admin-new-user');
   Route::post('new-user',[UserConTroller::class,'createUser']);
   //update user
   Route::get('update-user/{id}/update',[UserConTroller::class,'getUpdateuser'])->name('admin-update-user');
   Route::post('update-user/{id}/update',[UserConTroller::class,'updateUser']);
   //delete
   Route::post('delete-user', [UserConTroller::class, 'delete'])->name('delete-user');
//importwarehouse
   Route::get('importwarehouse',[ImportwarehouseController::class,'importWarehouse'])->name('admin-importwarehouse');
      //create
   Route::get('new-importwarehouse',[ImportwarehouseController::class,'newImportwarehouse'])->name('admin-new-importwarehouse');
   Route::post('new-importwarehouse',[ImportwarehouseController::class,'createImportwareHouse']);
      //update
   Route::get('update-importwarehouse/{id}/update',[ImportwarehouseController::class,'getUpdateImportwarehouse'])->name('admin-update-importwarehouse');
   Route::post('update-importwarehouse/{id}/update',[ImportwarehouseController::class,'updateImportwareHouse']);
      //details 
   Route::get('/importwarehouse/{id}/details', [ImportwarehouseController::class, 'getImportwarehouseDetails'])->name('importwarehouse-details');
      //delete
   Route::post('delele-importwarehouse', [ImportwarehouseController::class, 'deleteImportwarehouse'])->name('delete-importwarehouse');
// api
   Route::get('/last-week', [StatisticsController::class, 'dataLastWeek']);
   Route::get('/last-seven-days', [StatisticsController::class, 'dataLastSevenDays']);
   Route::post('/period', [StatisticsController::class, 'dataPeriod']);



   Route::get('search-users', [UserController::class,'searchUser'])->name('search-users');
   Route::get('search-product', [BookController::class, 'searchProduct'])->name('search-product');
   //order
   // Route::get('orders', [OrderController::class, 'index'])->name('admin-orders');
   Route::get('orders', [OrderController::class, 'index'])->name('admin-order');
   Route::get('orders/{data_id}/{user_name?}', [OrderController::class, 'filter'])->name('order-filter');
   Route::post('orders-search', [OrderController::class, 'searchOrder'])->name('order-search');
   Route::get('order-detail/{order_id}', [OrderController::class, 'orderDetail'])->name('order-detail');

   Route::post('/confirm-order', [OrderController::class, 'confirmOrder'])->name('confirm-order');

   
   Route::post('/confirm-waiting-orders', [OrderController::class, 'confirmOrders']);
   // confirm orders
   Route::post('/confirm-processing-orders', [OrderController::class, 'confirmOrders']);
   // delete orders
   Route::post('/delete-archived-orders', [OrderController::class, 'confirmOrders']);
   // delete orders
   Route::post('/archived-orders', [OrderController::class, 'confirmOrders']);
   // delete orders
   Route::post('/delete-orders', [OrderController::class, 'confirmOrders']);
   // return request
   Route::post('/return-request', [OrderController::class, 'confirmOrders']);
   // accept return request
   Route::post('/accept-return-request', [OrderController::class, 'confirmOrders']);
});

//login

Route::get('login', [AuthController::class, 'getLogin'])->name('login');
Route::post('login', [AuthController::class, 'postLogin']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
// register
Route::get('register', [AuthController::class, 'getRegister'])->name('register');
Route::post('register', [AuthController::class, 'postRegister']);

// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
//    Route::get('admin/adminhome',[AdminController::class,'getAdminPage'])->name('adminhome');
// });
//auth routes
// Route::group(['middleware' => ['auth', 'admin']], function () {
//   
// });


//
// routes/web.php





