<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/login', 'Auth\AuthController@loginIndex')->name('login');
Route::post('/login', 'Auth\AuthController@login');

Route::get('/v2/login/', function () {
    return Socialite::driver('keycloak')->redirect();
});

Route::get('/sso/callback', function (Request $request) {
    $response = Socialite::driver('keycloak')->user();
    $data = $response->getRaw()['info'];

    $user = User::updateOrCreate([
        'name'  => $data['name'],
        'NIP'   => $data['nip'],
        'email' => $data['email'],
    ]);
 
    Auth::login($user);
 
    return redirect('/');
});

Route::middleware('auth')->group(function () {
    Route::get('/anjay', function(){
        return view('home');
    });

    //Profile
    Route::get('profile', 'Profile\ProfileController@index');
    Route::put('profile', 'Profile\ProfileController@update');

    //Workshop
    Route::get('workshop', 'Workshop\WorkshopController@index');
    Route::get('create', 'Workshop\WorkshopController@create');
    Route::post('workshop', 'Workshop\WorkshopController@store');
    Route::get('workshop/{id}', 'Workshop\WorkshopController@show');
    Route::put('workshop/{id}', 'Workshop\WorkshopController@update');
    Route::put('workshop/{id}/join', 'Workshop\WorkshopController@join');

    // Topic
    // Route::get('topic', 'Workshop\TopicController@index');
    // Route::post('topic', 'Workshop\TopicController@store');
    // Route::update('topic/{id}', 'Workshop\TopicController@update');
    // Route::delete('topic/{id}', 'Workshop\TopicController@destroy');

    // Link
    // Route::get('link', 'Workshop\LinkController@index');
    // Route::post('link', 'Workshop\LinkController@store');
    // Route::update('link/{id}', 'Workshop\LinkController@update');
    // Route::delete('link/{id}', 'Workshop\LinkController@destroy');

    // Logout
    Route::get('/logout', 'Auth\AuthController@logout');

    // Logout V2
    Route::get('v2/logout', function(){
        Auth::logout();
        return redirect(Socialite::driver('keycloak')->getLogoutUrl('/'));
    });
});
