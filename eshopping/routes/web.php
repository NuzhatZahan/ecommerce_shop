<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\OrderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('index');
});*/

                          //frontend///
Route::get('/', [IndexController::class, 'index']);
Route::get('/product-by-category/{category_id}', [IndexController::class, 'product_by_category']);
Route::get('/product-by-brand/{brand_id}', [IndexController::class, 'product_by_brand']);
Route::get('/view-product/{product_id}', [IndexController::class, 'view_product']);

///Cart Routes
Route::post('/add-to-cart', [CartController::class, 'add_to_cart']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{id}', [CartController::class, 'delete_cart']);
Route::post('/update-cart/{id}', [CartController::class, 'update_cart']);


//check-out routes//
Route::get('/check-out',[CheckOutController::class, 'index']);
Route::get('/login-check',[CheckOutController::class, 'login_check']);

//customer rotues
Route::post('/customer-register',[CustomerController::class, 'customer_register']);
Route::post('/customer-login',[CustomerController::class, 'login']);
Route::get('/customer-logout',[CustomerController::class, 'logout']);

//Shipping ROutes
Route::post('/add-shipping', [ShippingController::class, 'add_shipping']);

//Payment Routes
Route::get('/payment',[CheckOutController::class, 'payment']);
Route::post('/order-place',[CheckOutController::class, 'order_place']);

                            //backend//
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [SuperAdminController::class, 'index']);
Route::post('/admin_dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [SuperAdminController::class, 'logout']);

///category_routes//
Route::get('/add_category', [CategoryController::class, 'index']);
Route::get('/all_category', [CategoryController::class, 'all_category']);
Route::post('/save_category', [CategoryController::class, 'save_category']);
Route::get('/inactive_category/{category_id}', [CategoryController::class, 'inactive_category']);
Route::get('/active_category/{category_id}', [CategoryController::class, 'active_category']);
Route::get('/edit_category/{category_id}', [CategoryController::class, 'edit_category']);
Route::post('/update_category/{category_id}', [CategoryController::class, 'update_category']);
Route::get('/delete_category/{category_id}', [CategoryController::class, 'delete_category']);

//brand_routes//
Route::get('/add_brands', [BrandController::class, 'index']);
Route::get('/all_brands', [BrandController::class, 'all_brands']);
Route::post('/save_brands', [BrandController::class, 'save_brands']);
Route::get('/active_brands/{brand_id}', [BrandController::class, 'active_brands']);
Route::get('/inactive_brands/{brand_id}', [BrandController::class, 'inactive_brands']);
Route::get('/edit_brands/{brand_id}', [BrandController::class,  'edit_brands']);
Route::post('/update_brands/{brand_id}', [BrandController::class, 'update_brands']);
Route::get('/delete_brands/{brand_id}', [BrandController::class, 'delete_brands']);

//product_routes//
Route::get('/add_product', [ProductController::class, 'index']);
Route::get('/all_product', [ProductController::class, 'all_product']);
Route::post('/save_product', [ProductController::class, 'save_product']);
Route::get('/active_product/{product_id}', [ProductController::class, 'active_product']);
Route::get('/inactive_product/{product_id}', [ProductController::class, 'inactive_product']);
Route::get('/delete_product/{product_id}',[ProductController::class, 'delete_product']);
Route::get('/edit_product/{product_id}', [ProductController::class, 'edit_product']);
Route::post('/update_product/{product_id}',[ProductController::class,'update_product']);

//slider_routes//
Route::get('/add_slider', [SliderController::class, 'index']);
Route::get('/all_slider', [SliderController::class, 'all_slider']);
Route::post('/save_slider', [SliderController::class, 'save_slider']);
Route::get('/active_slider/{slider_id}', [SliderController::class, 'active_slider']);
Route::get('/inactive_slider/{slider_id}', [SliderController::class, 'inactive_slider']);
Route::get('/delete_slider/{slider_id}', [SliderController::class, 'delete_slider']);


//order_routes//
Route::get('/customer_order', [OrderController::class, 'index']);
Route::get('/view_order/{order_id}', [OrderController::class, 'view_order']);
Route::get('/active_order/{order_id}', [OrderController::class, 'activeorder']);
Route::get('/inactive_order/{order_id}', [OrderController::class, 'inactive_order']);
Route::get('/delete_order/{order_id}', [OrderController::class, 'delete_order']);
