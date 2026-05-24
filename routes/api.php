<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

/* PRODUK BISA DIAKSES TANPA LOGIN */
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);

/* KERANJANG */
Route::get('/keranjang', [KeranjangController::class, 'index']);
Route::post('/keranjang', [KeranjangController::class, 'store']);
Route::put('/keranjang/{id}', [KeranjangController::class, 'update']);
Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy']);

/* CHECKOUT */
Route::post('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/checkout/{id}', [CheckoutController::class, 'show']);

/*ORDERS */
Route::get('/orders', [CheckoutController::class, 'index']);
Route::get('/orders/{id}', [CheckoutController::class, 'show']);

/*PAYMENT GATEWAY*/
Route::put('/payment/{id}', [CheckoutController::class, 'payment']);

/* YANG PERLU LOGIN */
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/produk', [ProdukController::class, 'store']);
    Route::put('/produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);

});