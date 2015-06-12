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
Route::model('product_categories', 'App\ProductCategory');

Route::get('/', 'AppController@index');

Route::get('/home', 'HomeController@index');

Route::get('/products', 'ProductController@index');

Route::get('/product/add', 'ProductController@create');

Route::post('/product/create', 'ProductController@store');

Route::get('/product/{product}', 'ProductController@show');

Route::get('/product/delete/{product}', 'ProductController@delete');

Route::get('/product/destroy/{id}', 'ProductController@destroy');

Route::post('/product/update', 'ProductController@update');

Route::post('/products/search', 'ProductController@search');

Route::get('/products/search/{query}', 'ProductController@searchResults');




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

Route::get('/emp/designation/{designation}', 'DesignationController@edit');

Route::post('/emp/designation/update', 'DesignationController@update');


Route::get('/product_categories', 'ProductCategoryController@index');

Route::post('/product_categories/create', 'ProductCategoryController@store');

Route::get('/product_categories/delete/{product_categories}', 'ProductCategoryController@delete');

Route::get('/product_categories/destroy/{id}', 'ProductCategoryController@destroy');
    
Route::get('/product_categories/edit/{product_categories}', 'ProductCategoryController@edit');

Route::post('/product_categories/update/', 'ProductCategoryController@update');
    

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
