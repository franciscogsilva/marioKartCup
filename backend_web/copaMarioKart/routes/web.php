<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Route::group(['middleware' => ['web','auth']], function () {	

	Route::get('/', 'HomeController@index')->name('home');

	Route::resource('cups', 'CupController', ['except' => ['delete']]);

	Route::resource('tournaments', 'TournamentController', ['except' => ['delete']]);

	Route::resource('users', 'UserController', ['except' => ['delete']]);

});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');