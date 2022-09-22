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

    /*** Profile ***/ 
    Route::get('profile', 'Profile\ProfileController@index');
    Route::put('profile', 'Profile\ProfileController@update');

    /*** Topic ***/ 
    // Route::get('topic', 'Workshop\TopicController@index');
    // Route::post('topic', 'Workshop\TopicController@store');
    // Route::update('topic/{id}', 'Workshop\TopicController@update');
    // Route::delete('topic/{id}', 'Workshop\TopicController@destroy');

    /*** Link ***/ 
    // Route::get('link', 'Workshop\LinkController@index');
    // Route::post('link', 'Workshop\LinkController@store');
    // Route::update('link/{id}', 'Workshop\LinkController@update');
    // Route::delete('link/{id}', 'Workshop\LinkController@destroy');

    Route::prefix('workshop')->group(function () {

        /*** Workshop ***/ 
        Route::get('/', 'Workshop\WorkshopController@index');
        Route::get('/create', 'Workshop\WorkshopController@create');
        Route::post('/', 'Workshop\WorkshopController@store');
        Route::get('{id}', 'Workshop\WorkshopController@show');
        Route::put('{id}', 'Workshop\WorkshopController@update');
        Route::put('{id}/join', 'Workshop\WorkshopController@join');

        /*** Audience Evaluation ***/
        Route::get('/{id}/audience', 'Workshop\Evaluation\AudienceEvaluationController@show');
    });

    /*** Logout ***/ 
    Route::get('/logout', 'Auth\AuthController@logout');
});
