<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/login', 'Auth\AuthController@loginIndex')->name('login');
Route::get('/auth-callback', 'Auth\AuthController@login');

Route::get('/workshop', 'Workshop\WorkshopController@index');
Route::get('/workshop/{id}', 'Workshop\WorkshopController@show');

Route::middleware('auth')->group(function () {
    Route::get('/anjay', function(){
        return view('home');
    });

    /*** Profile ***/ 
    Route::get('profile', 'Profile\ProfileController@index');
    Route::put('profile', 'Profile\ProfileController@update');

    Route::prefix('workshop')->group(function () {

        /*** Workshop ***/
        Route::get('/', 'Workshop\WorkshopController@index');
        Route::get('/create', 'Workshop\WorkshopController@create');
        Route::post('/', 'Workshop\WorkshopController@store');
        Route::get('/{id}', 'Workshop\WorkshopController@show');
        Route::put('/{id}', 'Workshop\WorkshopController@update');
        Route::put('/{id}/join', 'Workshop\WorkshopController@join');

        /*** Speaker Evaluation ***/
        Route::get('/{id}/evaluation', 'Evaluations\AudienceEvaluationController@index');
        
        /*** Audience Evaluation ***/
        Route::get('/{id}/audience', 'Evaluations\AudienceEvaluationController@store');
    });

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

    /*** Logout ***/ 
    Route::get('/logout', 'Auth\AuthController@logout');
});
