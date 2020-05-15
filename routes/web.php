<?php

use Illuminate\Support\Facades\Route;

// defaults
Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

// new madadjus
Route::get('ثبت-نام/{type}/{step?}', 'SignupController@form')->name('signup')->where('type', '[1-4]');
Route::post('wizard/{type}/{step}', 'SignupController@wizard')->name('wizard');
