<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController')->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/profile', 'ProfileController@update')->name('profile.update');
    Route::delete('/profile', 'ProfileController@destroy')->name('profile.destroy');
    Route::resource('/post', 'PostController');
    Route::resource('/post-category', 'PostCategoryController');
});
