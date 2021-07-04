<?php

use Illuminate\Support\Facades\Route;

Route::get('register', 'AuthController@registerView');
Route::post('register', 'AuthController@registerProcess');
Route::get('login', 'AuthController@loginView');
Route::post('login', 'AuthController@loginProcess');
Route::get('logout', 'AuthController@logoutProcess');

Route::get('/', 'FrontendController@dashboard');
Route::get('menu', 'FrontendController@menu');
Route::get('menu/{menuId}', 'FrontendController@detailMenu');
Route::get('keranjang', 'FrontendController@keranjang');
Route::post('keranjang', 'FrontendController@tambahKeranjang');
Route::get('keranjang/hapus/{menuId}', 'FrontendController@hapusKeranjang');
Route::get('checkout', 'FrontendController@checkout');
Route::post('checkout', 'FrontendController@checkoutProcess');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'check.role:Admin']], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('user', 'UserController')->except('show');
    Route::resource('alat', 'AlatController')->except('show');
    Route::resource('kategori', 'KategoriController')->except('show');
    Route::resource('menu', 'MenuController')->except('show');
});
