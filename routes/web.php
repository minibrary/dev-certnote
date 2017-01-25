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

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
//Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
//Route::get('/callback/{provider}', 'SocialAuthController@callback');
Route::get('/dashboard', 'DashboardController@index');

Route::group(['middleware' => ['web', 'auth']], function() {
    Route::resource('/list', 'CertificateController');
    Route::get('/list/warning', 'CertificateController@warning');
    Route::get('/list/danger', 'CertificateController@danger');
});
