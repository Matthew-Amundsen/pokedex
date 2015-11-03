<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 				['as' => 'home', 'uses' => 'PagesController@home']);

// Search routes...
Route::get('search',			['as' => 'search', 'uses' => 'PokemonController@Search']);

Route::resource('comments', 'CommentsController');

// Pokemon routes...
Route::get('pokemon/{id}', 			['as' => 'pokemon.show', 'uses' => 'PokemonController@show']);
Route::get('pokemon', 				['as' => 'pokemon.index', 'uses' => 'PokemonController@index']);

// Profile routes...
Route::get('profile/show/{id}',		['as' => 'profile.show',    'uses' => 'ProfileController@show']);
Route::get('profile/edit',			['as' => 'profile.edit',    'uses' => 'ProfileController@edit']);
Route::put('profile/edit',			['as' => 'profile.update',  'uses' => 'ProfileController@update']);

// Authentication routes...
Route::get('auth/login',			['as' => 'auth.login',      'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login',			['as' => 'auth.accept',     'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout',			['as' => 'auth.logout',     'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register',			['as' => 'auth.register',   'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register',		['as' => 'auth.store',     'uses' => 'Auth\AuthController@postRegister']);
