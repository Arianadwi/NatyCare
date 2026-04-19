<?php

use Illuminate\Support\Facades\Route;

// HOME
Route::get('/', function () {
    return view('katalog');
});

// LOGIN
Route::get('/login', function () {
    return view('login');
});

// REGISTER
Route::get('/register', function () {
    return view('register');
});