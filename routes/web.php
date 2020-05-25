<?php

use Illuminate\Support\Facades\Route;

// defaults
Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

// signups & madadjus
Route::get('ثبت-نام-کارفرما', 'SignupController@organ_form')->name('organ.signup');
Route::get('organ/uid/{uid}', 'SignupController@organ_finished')->name('organ.finished');
Route::post('organ/signup', 'SignupController@organ_register')->name('organ.register');
Route::get('ثبت-نام/{type}/{step?}', 'SignupController@form')->name('signup')->where('type', '[1-3]');
Route::post('wizard/{type}/{step}', 'SignupController@wizard')->name('wizard');
Route::get('madadjus/{type}', 'MadadjuController@index')->name('madadjus');
Route::delete('apply/{type}/{id}', 'MadadjuController@destroy')->name('apply.destroy');
Route::post('apply/accept/{type}/{id}', 'SignupController@accept')->name('apply.accept');
Route::post('apply/reject/{type}/{id}', 'SignupController@reject')->name('apply.reject');


// resources
Route::resource('expert', 'ExpertController')->except('show');
Route::resource('organ', 'OrganController')->only(['index', 'destroy']);
