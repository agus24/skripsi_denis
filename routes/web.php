<?php

Route::get('/', "FrontController@index");

Route::get('test', 'ProdukController@removeAllTmp');
