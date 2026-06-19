<?php

use Illuminate\Support\Facades\Route;

// HOME
Route::get('/katalog', function () {
    return view('katalog');
});

// LOGIN
Route::get('/login', function () {
    return view('login');
})->name('login');

// REGISTER
Route::get('/register', function () {
    return view('register');
});

// KERANJANG
Route::get('/keranjang', function () {
    return view('keranjang');
});

// CHECKOUT
Route::get('/checkout', function () {
    return view('checkout');
});

// PROFILE
Route::get('/profile', function () {
    return view('profile');
});

// ======================
// HALAMAN ADMIN
// ======================

// DASHBOARD ADMIN
Route::get('/admin', function () {
    return view('admin');
});

// KATALOG PRODUK ADMIN
Route::get('/adminproduk', function () {
    return view('adminproduk');
});

// TRANSAKSI ADMIN
Route::get('/transaksiadmin', function () {
    return view('transaksiadmin');
});
