<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/contact-us', function () {
    return view('contact_us');
});
