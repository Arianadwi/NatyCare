<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

/* PRODUK BISA DIAKSES TANPA LOGIN */
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);

/* YANG PERLU LOGIN */
Route::middleware('auth:sanctum')->group(function () {

    /* DASHBOARD ADMIN */
    Route::get('/dashboard', [DashboardController::class, 'index']);

    /* LAPORAN PENJUALAN (ADMIN) */
    Route::get('/laporan', [LaporanController::class, 'index']);

    Route::get('/profile', [AuthController::class, 'profile']);
    Route::put('/profile', [AuthController::class, 'updateProfile']);

    /* ALAMAT */
    Route::get('/addresses', [AddressController::class, 'index']);
    Route::post('/addresses', [AddressController::class, 'store']);
    Route::put('/addresses/{id}', [AddressController::class, 'update']);

    /* KERANJANG */
    Route::get('/keranjang', [KeranjangController::class, 'index']);
    Route::post('/keranjang', [KeranjangController::class, 'store']);
    Route::put('/keranjang/{id}', [KeranjangController::class, 'update']);
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy']);

    /* CHECKOUT */
    Route::post('/checkout', [CheckoutController::class, 'checkout']);
    Route::get('/checkout/{id}', [CheckoutController::class, 'show']);

    /* ORDERS */
    Route::get('/orders', [CheckoutController::class, 'index']);
    Route::get('/orders/{id}', [CheckoutController::class, 'show']);
    Route::put('/orders/{id}/status', [CheckoutController::class, 'updateStatus']);

    /* PAYMENT GATEWAY */
    Route::put('/payment/{id}', [CheckoutController::class, 'payment']);
    
    Route::post('/produk', [ProdukController::class, 'store']);
    Route::put('/produk/{id}', [ProdukController::class, 'update']);
    Route::post('/produk/{id}/update', [ProdukController::class, 'update']);
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);

});
