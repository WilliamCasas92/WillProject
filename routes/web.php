<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//*** RUTAS DE LOGIN GOOGLE ***
Route::get('social/{provider?}', 'SocialController@getSocialAuth');

Route::get('social/callback/{provider?}', 'SocialController@getSocialAuthCallback');
