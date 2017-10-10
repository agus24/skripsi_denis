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
    return redirect('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('brands','MerkController');
    Route::resource('produk','ProdukController');
    Route::resource('customer','CustomerController');
    Route::resource('order','OrderController');
    Route::get('order/{id}/approve','OrderController@approve');
    Route::get('order/{id}/kirim','OrderController@kirim');
    Route::get('order/{id}/reject','OrderController@reject');
});

Route::get('test', 'ProdukController@removeAllTmp');
