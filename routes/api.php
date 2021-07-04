<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('menu/image/upload', 'API\ProdukImageController@upload');
Route::patch('menu/{menuId}/image/{imageId}', 'API\ProdukImageController@setPrimary');
Route::delete('menu/{menuId}/image/{imageId}', 'API\ProdukImageController@delete');
