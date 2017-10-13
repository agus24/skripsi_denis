<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, X-XSRF-TOKEN, Authorization');
header('Access-Control-Allow-Methods: GET,PUT,POST,DELETE');

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('produk/img', 'ProdukController@image');

Route::post('login/customer', 'ApiController@loginCustomer');
Route::get('produk/all', 'ApiController@getProduk');
