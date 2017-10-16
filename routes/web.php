<?php

Route::get('/', function() {
    return view('front.index');
});

Route::get('test', 'ProdukController@removeAllTmp');
