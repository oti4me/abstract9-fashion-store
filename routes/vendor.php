<?php
/*
|--------------------------------------------------------------------------
| Vendor Routes
|--------------------------------------------------------------------------
|
| Register all user related web routes for the application here.
| They will be loaded into the routes/web.php file.
*/

Route::get('/login', 'Auth\LoginController@loginForm')->name('user.login.form');
Route::post('/login', 'Auth\LoginController@login')->name('user.login');
Route::post('/signup', 'Auth\RegisterController@register')->name('user.signup');
Route::get('/logout', 'Auth\LoginController@logout')->name('user.logout');

Route::get('/vendor/dashboard', 'VendorController@dashboard')->name('vendor.dashboard');
Route::get('/vendor/add-product-form', 'VendorController@addProductForm')->name('vendor.add.form');
Route::post('/vendor/add-product', 'VendorController@addProduct')->name('vendor.product.add');
