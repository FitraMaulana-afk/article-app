<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', 'Landing\PageController@index')->name('index');
Route::get('/detail/{post}', 'Landing\PageController@show')->name('show');
Route::middleware('guest')->group(function () {
    Route::get('/login', 'Landing\Auth\LoginController@create')->name('login');
    Route::post('/login', 'Landing\Auth\LoginController@store')->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout',  'Landing\Auth\LoginController@destroy')->name('logout');
});



require __DIR__ . '/auth.php';
