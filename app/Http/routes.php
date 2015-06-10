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

Use App\Product;

Route::model('product', 'App\Product');
Route::model('supplier', 'App\Supplier');
Route::model('employee', 'App\Employee');
Route::model('designation', 'App\Designation');

Route::get('/', 'AppController@index');

Route::get('/home', 'HomeController@index');

Route::get('/products', 'ProductController@index');

Route::get('/product/add', 'ProductController@create');

Route::post('/product/create', 'ProductController@store');

Route::get('/product/{product}', 'ProductController@show');

Route::get('/product/delete/{product}', 'ProductController@delete');

Route::get('/product/destroy/{id}', 'ProductController@destroy');




Route::get('/suppliers', 'SupplierController@index');

Route::get('/supplier/add', 'SupplierController@create');

Route::post('/supplier/create', 'SupplierController@store');

Route::get('/supplier/{supplier}', 'SupplierController@show');

Route::post('/supplier/update', 'SupplierController@update');

Route::get('/supplier/delete/{supplier}', 'SupplierController@delete');

Route::get('/supplier/destroy/{id}', 'SupplierController@destroy');
    


Route::get('/employees', 'EmployeeController@index');

Route::get('/employee/add', 'EmployeeController@create');

Route::post('/employee/create', 'EmployeeController@store');

Route::get('/employee/{employee}', 'EmployeeController@show');

Route::post('/employee/update', 'EmployeeController@update');

Route::get('/employee/delete/{employee}', 'EmployeeController@delete');

Route::get('/employee/destroy/{id}', 'EmployeeController@destroy');



Route::get('/emp/designations', 'DesignationController@index');

Route::post('/emp/designation/create', 'DesignationController@store');

Route::get('/emp/designation/delete/{designation}', 'DesignationController@delete');

Route::get('/emp/designation/destroy/{id}', 'DesignationController@destroy');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
