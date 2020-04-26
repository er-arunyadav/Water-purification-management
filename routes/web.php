<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home'); 

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    // Authentication Routes...
   	
Route::get('/dashboard',[
	'uses' => 'DashboardController@index',
	'as' => 'dashboard'
]);

Route::get('/customer/create',[
	'uses' => 'CustomerController@create',
	'as' => 'customer.create'
]);

Route::post('/customer/store',[
	'uses' => 'CustomerController@store',
	'as' => 'customer.store'
]);

Route::get('/customer',[
	'uses' => 'CustomerController@index',
	'as' => 'customer'
]);

Route::get('/customer/edit/{id}',[
	'uses' => 'CustomerController@edit',
	'as' => 'customer.edit'
]);

Route::post('/customer/update/{id}',[
	'uses' => 'CustomerController@update',
	'as' => 'customer.update'
]);

Route::get('/customer/delete/{id}',[
	'uses' => 'CustomerController@destroy',
	'as' => 'customer.destroy'
]);


// Product Route Start

Route::get('/product',[
	'uses' => 'ProductController@index',
	'as' => 'product'
]);

Route::get('/product/edit/{id}',[
	'uses' => 'ProductController@edit',
	'as' => 'product.edit'
]);

Route::get('/product/delete/{id}',[
	'uses' => 'ProductController@destroy',
	'as' => 'product.destroy'
]);

Route::get('/product/create',[
	'uses' => 'ProductController@create',
	'as' => 'product.create'
]);

Route::post('/product/store',[
	'uses' => 'ProductController@store',
	'as' => 'product.store'
]);

Route::post('/product/update/{id}',[
	'uses' => 'ProductController@update',
	'as' => 'product.update'
]);

// Purchase Route Start

Route::get('/purchase',[
	'uses' => 'PurchaseController@index',
	'as' => 'purchase'
]);

Route::get('/purchase/create',[
	'uses' => 'PurchaseController@create',
	'as' => 'purchase.create'
]);

Route::get('/purchase/edit/{id}',[
	'uses' => 'PurchaseController@edit',
	'as' => 'purchase.edit'
]);

Route::get('/purchase/delete/{id}',[
	'uses' => 'PurchaseController@destroy',
	'as' => 'purchase.destroy'
]);

Route::post('/purchase/store',[
	'uses' => 'PurchaseController@store',
	'as' => 'purchase.store'
]);

Route::post('/purchase/update/{id}',[
	'uses' => 'PurchaseController@update',
	'as' => 'purchase.update'
]);

Route::post('/purchase/status',[
	'uses' => 'PurchaseController@status',
	'as' => 'purchase.status'
]);

// Report Route Start

// -----------------------Customer wise Report-----------------------------
Route::get('/report/customer',[
	'uses' => 'ReportController@customer',
	'as' => 'report.customer'
]);

Route::post('/report/customer/details',[
	'uses' => 'ReportController@findcustomer',
	'as' => 'report.customerfind'
]);

// -----------------------Prodcut wise Report-----------------------------
Route::get('/report/product',[
	'uses' => 'ReportController@product',
	'as' => 'report.product'
]);

Route::post('/report/product/details',[
	'uses' => 'ReportController@findproduct',
	'as' => 'report.productfind'
]);

// -----------------------Date wise Report-----------------------------

Route::get('/report/datewise',[
	'uses' => 'ReportController@datewise',
	'as' => 'report.datewise'
]);

Route::post('/report/datewise/details',[
	'uses' => 'ReportController@datewisefind',
	'as' => 'report.datewisefind'
]);

Route::post('/dashboard/datewise/details',[
	'uses' => 'DashboardController@datewisefind',
	'as' => 'dashboard.datewisefind'
]);

});




