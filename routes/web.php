<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AdminCustomersController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PrintController;

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
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index']);
//cutomers
Route::resource('customer', CustomerController::class);
//product
Route::resource('product', ProductController::class);
//categorie
Route::resource('category', CategoryController::class);
Route::resource('pemesanan', PesananController::class);
Route::resource('history', HistoryController::class);
Route::resource('adminCustomers', AdminCustomersController::class);
Route::resource('report', ReportController::class);
Route::get('/printPdf/{tglAwal}/{tglAhir}', [PrintController::class, 'PrintPdf']);