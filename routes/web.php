<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [LoginController::class, 'index']);
Route::get('/registrasi', [LoginController::class, 'create']);
Route::post('/registrasi', [LoginController::class, 'store']);
Route::post('/sigIn', [LoginController::class, 'sigIn']);
Route::get('/dashboard', [DashboardController::class, 'index']);
//cutomers
Route::resource('customer', CustomerController::class);
//product
Route::resource('product', ProductController::class);
//categorie
Route::resource('category', CategoryController::class);