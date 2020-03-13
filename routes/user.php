<?php
/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Register all user related web routes for the application here.
| They will be loaded into the routes/web.php file.
*/

Route::get('/login', 'Auth\LoginController@loginForm')->name('user.login.form');
Route::post('/login', 'Auth\LoginController@login')->name('user.login');
Route::post('/signup', 'Auth\RegisterController@register')->name('user.signup');
Route::get('/logout', 'Auth\LoginController@logout')->name('user.logout');

Route::get('/customer/profile', function () {
    return "<h1>This is the customer profile page!!!</h1>";
})->name('customer.profile');
