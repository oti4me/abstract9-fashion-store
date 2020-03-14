<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Register all admin related web routes for the application here.
| They will be loaded into the routes/web.php file.
*/

Route::get('admin/login', 'Auth\AdminLoginController@loginForm')->name('admin.login.show');
Route::get('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
Route::get('admin/products', 'AdminController@products')->name('admin.products');
Route::get('admin/approve/{product}', 'AdminController@approveProduct')->name('admin.approve');
Route::get('admin/reject/{product}', 'AdminController@rejectProduct')->name('admin.reject');
