<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ImageController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/produk/{id}', [FrontendController::class, 'produk'])->name('produk.detail');
Route::post('/checkout/{id}', [FrontendController::class, 'checkout'])->name('checkout');
Route::get('/success', [FrontendController::class, 'success'])->name('success');
Route::post('/callback', [FrontendController::class, 'callback']); // Tripay callback

// Route untuk gambar
Route::get('/gambar/{path}', [ImageController::class, 'show'])->name('gambar.show')->where('path', '.*');
