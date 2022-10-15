<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/login', 'Auth\AuthController@loginIndex')->name('login');
Route::get('/auth-callback', 'Auth\AuthController@login');

Route::resource('/workshop', 'Workshop\WorkshopController');
Route::put('workshop/{id}/join', 'Workshop\WorkshopController@join');
    
/*** Speaker Evaluation ***/
Route::get('workshop/{id}/evaluation', 'Evaluations\AudienceEvaluationController@index');

/*** Audience Evaluation ***/
Route::get('workshop/{id}/audience', 'Evaluations\AudienceEvaluationController@store');

Route::middleware('auth')->group(function () {
    
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
