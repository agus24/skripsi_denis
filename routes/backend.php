<?php

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('brands','MerkController');
    Route::resource('produk','ProdukController');
    Route::resource('customer','CustomerController');
    Route::resource('order','OrderController');
    Route::resource('banner', 'BannerController');
    Route::get('banner/{id}/inactive', 'BannerController@inactive');

    Route::get('order/{id}/approve','OrderController@approve');
    Route::get('order/{id}/kirim','OrderController@kirim');
    Route::get('order/{id}/reject','OrderController@reject');

});

