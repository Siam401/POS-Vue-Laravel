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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->name('admin.home');

Route::get('/category', 'AdminController@category')->name('admin.category');
Route::get('/company', 'AdminController@company')->name('admin.company');
Route::get('/stock', 'AdminController@stock')->name('admin.stock');
Route::get('/sale', 'AdminController@saleview')->name('admin.saleview');
Route::get('/stock/add/sale/{id}', 'AdminController@addForSale')->name('admin.addForSale');
Route::get('/stock/remove/sale/{id}', 'AdminController@removeFromTamp')->name('admin.removeFromTamp');
Route::put('/stock/update/sale/{id}', 'AdminController@updateFromTamp')->name('admin.updateFromTamp');
//API
Route::get('/stocks', 'AdminController@stocks')->name('all.stock');
