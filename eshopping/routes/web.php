<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;




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

Route::get('/', [IndexController::class, 'index']);



//backend//
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
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
