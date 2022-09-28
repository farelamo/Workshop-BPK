<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/login', 'Auth\AuthController@loginIndex')->name('login');
Route::post('/login', 'Auth\AuthController@login');

Route::get('/v2/login/', function () {
    return Socialite::driver('keycloak')->scopes(['profile'])->redirect();
});

Route::get('/auth-callback', function () {
    try {
        $response = Socialite::driver('keycloak')->stateless()->user();
    }catch (Exception $e){
        return redirect('/login');
    }
    $data = $response;
    dd($data);
    $user = User::updateOrCreate([
        'fullname'  => $data['name'],
        'NIP'       => $data['nip'],
        'email'     => $data['email'],
    ]);
 
    Auth::login($user);
 
    return redirect('/hahaha');
});

// Logout V2
Route::get('v2/logout', function(){
    return redirect(Socialite::driver('keycloak')->getLogoutUrl('logged-out'));
});

Route::middleware('auth')->group(function () {
    Route::get('/anjay', function(){
        return view('home');
    });

    /*** Profile ***/ 
    Route::get('profile', 'Profile\ProfileController@index');
    Route::put('profile', 'Profile\ProfileController@update');

    //Workshop
    Route::get('workshop', 'Workshop\WorkshopController@index');
    Route::get('create', 'Workshop\WorkshopController@create');
    Route::post('workshop', 'Workshop\WorkshopController@store');
    Route::get('workshop/{id}', 'Workshop\WorkshopController@show');
    Route::put('workshop/{id}', 'Workshop\WorkshopController@update');
    Route::put('workshop/{id}/join', 'Workshop\WorkshopController@join');

    Route::get('workshop/{id}/evaluation', 'Evaluations\AudienceEvaluationController@index');
    Route::get('workshop/{id}/audience', 'Evaluations\AudienceEvaluationController@store');

    // Topic
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
