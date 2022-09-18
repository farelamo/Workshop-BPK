<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/login', 'Auth\AuthController@loginIndex')->name('login');
Route::post('/login', 'Auth\AuthController@login');

Route::middleware('auth')->group(function () {
    Route::get('/anjay', function(){
        return view('home');
    });
    Route::get('/logout', 'Auth\AuthController@logout');
});
