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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Productos
Route::resource('products', 'ProductController');
Route::put('products-delete','ProductController@productDelete');
Route::get('products-list','ProductController@productsList');
Route::get('product-detail/{sku}','ProductController@productBySku');

//Ventas
Route::resource('sales', 'SaleController');
Route::get('sales-list','SaleController@salesList');