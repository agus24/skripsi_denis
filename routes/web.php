<?php

Route::get('/', "FrontController@index");
Route::get('about-us','FrontController@aboutus');
Route::get('termcondition','FrontController@termcondition');
Route::get('addCart/{id}','FrontController@addCart');
Route::post('modifyCart/{id}','FrontController@modifyCart');
Route::get('removeCart/{id}','FrontController@removeCart');

Route::get('test', 'ProdukController@removeAllTmp');
Route::post('/login','Front\\AuthController@login');
Route::get('/logout','Front\\AuthController@logout');

