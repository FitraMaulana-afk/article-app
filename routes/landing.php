<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Landing\PageController@index')->name('index');
Route::get('/detail/{post}', 'Landing\PageController@show')->name('show');
Route::get('/search', 'Landing\PageController@search')->name('search');

Route::resource('/teknologi', 'Landing\TeknologiController')->only('index');
Route::resource('/bisnis', 'Landing\BusinesController')->only('index');
Route::resource('/olahraga', 'Landing\SportController')->only('index');
Route::resource('/profile', 'Landing\ProfileController');

// Route::middleware('guest')->group(function () {
//     Route::get('/login', 'Landing\Auth\LoginController@create')->name('login');
//     Route::post('/login', 'Landing\Auth\LoginController@store')->name('login');
//     Route::get('/register', 'Landing\Auth\RegisterController@index')->name('register');
//     Route::post('/register', 'Landing\Auth\RegisterController@register')->name('registerUser');
// });

// Route::middleware('auth')->group(function () {
//     Route::post('/logout',  'Landing\Auth\LoginController@destroy')->name('logout');
// });

require __DIR__ . '/auth.php';
