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

Route::get('/', 'AppController@index');

Route::get('/home', 'HomeController@index');

Route::get('/products', 'ProductController@index');

Route::get('/product/add', 'ProductController@create');

Route::post('/product/create', 'ProductController@store');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
