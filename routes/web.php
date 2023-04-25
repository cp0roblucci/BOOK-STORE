<?php

use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\AccessoriesTypeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\FishController;
use App\Http\Controllers\PHController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductsDetailController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clients\CartController;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\clients\TransactionController;
use App\Http\Controllers\clients\ProfileUserController;
//use App\Http\Controllers\clients\ProductDetailController;

use \App\Http\Controllers\Auth\GoogleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'getHome']);

// Route::get('/home', function () {
//     return view('homepage');
// })->name('home');

Route::get('/home', [HomeController::class, 'getHome'])->name('home');


Route::get('/products', [ProductsController::class, 'index']);
//Route::get('/products/{fish_species}',[ProductsController::class, 'filterProductsBySpecies'])->name('filter-products-by-species');
Route::get('/products/{category_id}/filter-condition/{price_filter}', [ProductsController::class, 'filterProductsByPrice'])->name('filter-products-by-price');
Route::get('/products/{category_id}',[ProductsController::class, 'getProducts'])->name('get-product');
Route::get('/products/{category_id}/filter-product-fish/{fish_species}',[ProductsController::class, 'filterProductsByFish'])->name('filter-products-by-fish');
Route::get('/products/{category_id}/filter-products-accessories/{accessories_type_name}',[ProductsController::class, 'filterProductsByAccessories'])->name('filter-products-by-accessories');
//products details route
Route::get('/products_detail/{id}', [ProductsDetailController::class, 'getProductsDetail'])->name('get-products-detail');
// Route::get('/products_detail', function () {
//     return view('products_detail');
// });

Route::get('/products', function () {
    return view('products');
});


Route::get('/cart', [CartController::class, 'getCart'])->name('cart');
Route::post('/cart', [CartController::class, 'postbill'])->name('handlecart');
Route::get('/cart/update-quantity/{id_cart}/{product_id}/{quantity}', [CartController::class, 'updatequantity'])->name('update-quantity-cart');
Route::get('/cart/delete-quantity/{id_cart}/{product_id}', [CartController::class, 'deleteitem'])->name('delete-item-cart');

Route::get('/transaction', [TransactionController::class, 'getTransaction'])->name('transaction');
Route::post('/transaction', [TransactionController::class, 'postTransaction'])->name('order');

Route::get('/ordered/{order_id}', [TransactionController::class, 'getOrderSuccess'])->name('ordered');

Route::get('/profile-user', [ProfileUserController::class, 'getprofileUser'])->name('profileUser');
Route::post('profile-user-upload-avt', [ProfileUserController::class, 'getprofileUserUploadAvt'])->name('upload-avt-user');
Route::post('/profile-user/updatename', [ProfileUserController::class, 'updatename'])->name('updatename');
Route::post('/profile-user/updatephone', [ProfileUserController::class, 'updatephonenumber'])->name('updatephone');
Route::post('/profile-user/updateaddress', [ProfileUserController::class, 'updateaddress'])->name('updateaddress');
Route::post('/profile-user/updateemail', [ProfileUserController::class, 'updateemail'])->name('updateemail');
Route::post('/profile-user/updatestatus', [ProfileUserController::class, 'updatestatus'])->name('updatestatus');


Route::get('/header', function () {
    return view('header');
});

Route::group( ['middleware' => 'auth'], function() {

});
// auth

// login
Route::get('login', [AuthController::class, 'getLogin'])->name('login');
Route::post('login', [AuthController::class, 'postLogin']);

// register
Route::get('register', [AuthController::class, 'getRegister'])->name('register');
Route::post('register', [AuthController::class, 'postRegister']);

// forgot password
Route::get('/forgot-password', [ResetPasswordController::class, 'getForgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [ResetPasswordController::class, 'sendMail']);
Route::get('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password', [ResetPasswordController::class, 'reset']);


// logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// 403
Route::view('/403', '403')->name('403');


// google login
Route::get('/get-google-sign-in', [GoogleController::class, 'getGoogleSignIn'])->name('login-google');
Route::get('/callback', [GoogleController::class, 'loginCallback']);

// admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::post('logout', [AdminController::class, 'logout'])->name('admin-logout');

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

    Route::get('accessories', [AdminController::class, 'accessories'])->name('admin-accessories');

    Route::get('fish', [AdminController::class, 'fish'])->name('admin-fish');

    Route::get('list-price', [FishController::class, 'listPriceProduct'])->name('admin-list-price');

    Route::get('store', [AdminController::class, 'store'])->name('admin-store');

    Route::get('orders', [OrderController::class, 'index'])->name('admin-orders');

    Route::get('categories', [AdminController::class, 'category'])->name('admin-categories');

    Route::get('users', [AdminController::class, 'users'])->name('admin-users');

    Route::get('profile', function () {
        return view('admin.profile');
    })->name('admin-profile');
    Route::post('profile', [UserController::class, 'editProfile'])->name('edit-profile');

    Route::get('change-password', function () {
        return view('admin.change-password');
    })->name('change-password');
    Route::post('change-password', [UserController::class, 'changePassword']);

    //  USER
    // new user
    Route::get('create-new-user', function() {
        return view('admin.user.new-user');
    })->name('new-user');
    Route::post('create-new-user', [UserController::class, 'createUser']);

    Route::get('users/{id}/edit', [UserController::class, 'editUser'])->name('edit-user');
    Route::post('users/{id}/edit', [UserController::class, 'updateUser']);

    Route::get('search-user', [UserController::class, 'searchByName'])->name('admin-search-user-by-name');

    Route::post('delete-user', [UserController::class, 'delete'])->name('delete-user');

    // PRODUCT

    // Accessories
    // accessories type
    Route::get('create-new-accessories-type', function() {
        return view('admin.accessories.new-accessories-type');
    })->name('new-accessories-type');
    Route::post('create-new-accessories-type', [AccessoriesTypeController::class, 'create']);

    // accessories
    Route::get('create-new-accessory', function() {
        return view('admin.accessories.new-accessory');
    })->name('new-accessory');
    Route::post('create-new-accessory', [AccessoriesController::class, 'create']);

    // edit accessories
    Route::get('accessories/{id}/edit', [AccessoriesController::class, 'editAccessories']);
    // search accessories
    Route::get('search-accessories', [AccessoriesController::class, 'searchAccessories'])->name('search-accessories');
    // delete accessories
    Route::post('delete-accessories', [AccessoriesController::class, 'delete'])->name('delete-accessories');

    // Fish
    // new product
    Route::get('create-new-fish', [FishController::class, 'newFish'])->name('new-fish');
    Route::post('create-new-fish', [FishController::class, 'create']);
    // edit fish
    Route::get('fish/{id}/edit', [FishController::class, 'editFish']);


    // new species
    Route::get('create-new-species', function() {
        return view('admin.fish.new-species');
    })->name('new-species');
    Route::post('create-new-species', [SpeciesController::class, 'create']);

    // new ph
    Route::get('create-new-ph', function() {
        return view('admin.fish.new-ph');
    })->name('new-ph');
    Route::post('create-new-ph', [PHController::class, 'create']);

    // new color
    Route::get('create-new-color', function() {
        return view('admin.fish.new-color');
    })->name('new-color');
    Route::post('create-new-color', [ColorController::class, 'create']);

    // update price
    Route::post('update-price', [FishController::class, 'updatePrice'])->name('update-price');
    // update quantity
    Route::post('update-quantity', [AdminController::class, 'updateQuantity'])->name('update-quantity');

    // search fish
    Route::get('search-fish', [FishController::class, 'searchFish'])->name('search-fish');
    // search price
    Route::get('search-price-fish', [FishController::class, 'searchPriceFish'])->name('search-price');
    // search quantity
    Route::get('search-quantity', [AdminController::class, 'searchQuantity'])->name('search-quantity');


    // delete fish
    Route::post('delete-fish', [FishController::class, 'delete'])->name('delete-fish');


    //  Statistics
    Route::get('/last-week', [StatisticsController::class, 'dataLastWeek']);
    Route::get('/last-seven-days', [StatisticsController::class, 'dataLastSevenDays']);
    Route::post('/period', [StatisticsController::class, 'dataPeriod']);

    // ORDER
    Route::get('orders/{data_id}', [OrderController::class, 'filter'])->name('order-filter');
    // order detail
    Route::get('orders/order-detail/{order_id}', [OrderController::class, 'orderDetail'])->name('order-detail');
    // search
    Route::post('order-search', [OrderController::class, 'searchOrder'])->name('order-search');

    // confirm an order
    Route::post('/confirm-order', [OrderController::class, 'confirmOrder'])->name('confirm-order');
    // confirm orders
    Route::post('/confirm-orders', [OrderController::class, 'confirmAllOrder']);
    // delete order
    Route::post('/delete-order', [OrderController::class, 'deleteOrder']);

});

