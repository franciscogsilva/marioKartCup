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

	Route::resource('tournaments', 'TournamentController', ['except' => ['delete']]);
	Route::get('tournaments/{tournament}/cups/create', 'CupController@create')->name('cups.create');

	Route::get('cups/{cup}', 'CupController@show')->name('cups.show');
	Route::get('cups/{cup}/edit', 'CupController@edit')->name('cups.edit');
	Route::get('cups/{cup}/races/create', 'RaceController@create')->name('races.create');
	Route::post('cups/{cup}/participations', 'ParticipationController@store')->name('participations.store');
	Route::put('participations/{cup}', 'ParticipationController@update')->name('participations.update');
	Route::get('participations/{participation}', 'ParticipationController@destroy')->name('participations.delete');

	Route::get('races/{race}', 'RaceController@show')->name('races.show');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
