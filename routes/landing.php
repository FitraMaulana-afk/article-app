<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', 'Landing\PageController@index')->name('home');

require __DIR__ . '/auth.php';
