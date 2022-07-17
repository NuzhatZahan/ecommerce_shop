<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;





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

Route::get('/add_category', [CategoryController::class, 'index']);
Route::get('/all_category', [CategoryController::class, 'all_category']);
Route::post('/save_category', [CategoryController::class, 'save_category']);
Route::get('/inactive_category/{category_id}', [CategoryController::class, 'inactive_category']);
Route::get('/active_category/{category_id}', [CategoryController::class, 'active_category']);
