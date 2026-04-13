<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// HALAMAN LOGIN
Route::get('/login', function () {
    return view('login');
});

// HALAMAN REGISTER
Route::get('/register', function () {
    return view('register');
});