<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', 'Landing\PageController@index')->name('index');
Route::get('/detail/{post}', 'Landing\PageController@show')->name('show');


require __DIR__ . '/auth.php';