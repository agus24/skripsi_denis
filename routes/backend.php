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
    Route::resource('user', 'UserController');
    Route::get('banner/{id}/inactive', 'BannerController@inactive');

    Route::get('order/{id}/approve','OrderController@approve');
    Route::get('order/{id}/kirim','OrderController@kirim');
    Route::get('order/{id}/reject','OrderController@reject');

    Route::get('laporan/penjualan','LaporanController@penjualan');
    Route::post('laporan/penjualan','LaporanController@penjualanPrint');

    Route::get('laporan/penjualan/perbulan', 'LaporanController@penjualanPerbulan');
    Route::get('laporan/barang/perbulan', 'LaporanController@barangPerbulan');
    Route::get('laporan/penjualan/customer/{id}', 'LaporanController@penjualanCustomer');
    Route::get('laporan/pembelian/customer', 'LaporanController@pembelianCustomer');
    Route::post('laporan/pembelian/customer', 'LaporanController@pembelianCustomerPrint');
    Route::get('laporan/order/belumApprove', 'LaporanController@orderBelumApprove');

    Route::get("order/batal/{id}", "OrderController@batal");
    Route::post("order/batal/{id}", "OrderController@batalKan");
});

