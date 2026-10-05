<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookController2;

Route::get('/', function () {
    return view('welcome');
});

// Modul 4 Resource Route
Route::resource('books', BookController2::class);
