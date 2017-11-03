<?php

Route::get('/', "FrontController@index");
Route::get('about-us','FrontController@aboutus');
Route::get('termcondition','FrontController@termcondition');
Route::get('addCart/{id}','FrontController@addCart');
Route::post('modifyCart/{id}','FrontController@modifyCart');
Route::get('removeCart/{id}','FrontController@removeCart');

Route::get('checkout', 'FrontController@checkout');
Route::get('process/cart', 'FrontController@processCart');
Route::get('user/transaction', 'FrontController@transaction');
Route::get('user/profile', 'FrontController@profile');
Route::get('user/profile/edit', 'FrontController@profileEdit');
Route::post('user/profile', 'FrontController@profileUpdate');

Route::get('test', 'ProdukController@removeAllTmp');
Route::post('/login','Front\\AuthController@login');
Route::get('/logout','Front\\AuthController@logout');

