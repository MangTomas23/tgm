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

Route::get('/product/create/duplicate', 'ProductController@duplicate');




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



Route::get('/inventory', 'InventoryController@index');

Route::post('/inventory/stocks/in', 'InventoryController@inStocks');

Route::get('/inventory/stocks/in/{date}/{supplier}', 'InStockController@create');

Route::post('/inventory/stocks/in/create', 'InStockController@store');
    

Route::get('/price-list', 'PriceListController@index');

Route::post('/price-list/update', 'PriceListController@update');



Route::get('/order/add', 'OrderController@create');

Route::get('/order/query', 'OrderController@query');

Route::post('/order/store', 'OrderController@store');

Route::get('/orders', 'OrderController@index');

Route::get('/order/no/{id}', 'OrderController@show');

Route::get('/order/search', 'OrderController@search');

Route::get('/order/get/id', 'OrderController@getNextID');




Route::get('/stocks/in', 'InStockController@index');

Route::get('/stocks/in/{date}', 'InStockController@showByDate');

Route::get('/stocks/in/{date}/{supplier_id}', 'InStockController@show');
    
Route::get('/test', 'ProductController@test');



Route::get('/sales/report', 'SalesReportController@index');

Route::get('/sales/report/getMonthlySales', 'SalesReportController@getMonthlySales');

Route::get('/sales/report/getDailySales', 'SalesReportController@getDailySales');





Route::get('/developer/advance/options', 'AppController@advance');

Route::post('/developer/advance/options/pass', 'AppController@advancePass');

Route::get('/developer/advance/options/home', 'AppController@advanceHome');

Route::post('/developer/advance/options/execute', 'AppController@advanceExecute');



Route::get('/returns', 'ReturnController@index');

Route::get('/return/add', 'ReturnController@create');

Route::post('/return/store', 'ReturnController@store');

Route::get('/return/nextid', 'ReturnController@getNextID');

Route::get('/return/{id}', 'ReturnController@show');

Route::get('/return/delete/{id}', 'ReturnController@delete');

Route::post('/return/destroy', 'ReturnController@destroy');



Route::get('/bad/order/add', 'BadOrderController@create');

Route::get('/bad/orders', 'BadOrderController@index');

Route::post('/bad/orders/store', 'BadOrderController@store');

Route::get('/bad/order/nextid', 'BadOrderController@getNextID');

Route::get('/bad/order/{id}', 'BadOrderController@show');

Route::get('/bad/order/delete/{id}', 'BadOrderController@delete');

Route::post('/bad/order/destroy', 'BadOrderController@destroy');



Route::get('/developer/test', 'SalesReportController@getDailySales');

Route::get('/developer/untested', 'AppController@untested');



Route::get('/customers', 'CustomerController@index');

Route::get('/customer/delete/{id}', 'CustomerController@delete');

Route::get('/customer/destroy/{id}', 'CustomerController@destroy');

Route::get('/customer/edit/{id}', 'CustomerController@edit');

Route::post('/customer/update', 'CustomerController@update');

Route::get('/customer/{id}', 'CustomerController@show');



Route::get('/lost/item/delete/{id}', 'LostItemController@delete');

Route::get('/lost/item/id', 'LostItemController@getID');

Route::resource('/lost/item', 'LostItemController');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
