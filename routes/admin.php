<?php

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    // $exitCode = Artisan::call('config:cache');
});

Route::get('/phpinfo', function () {
    phpinfo();
});

Route::group(['prefix' => 'admin', 'middlewear' => 'auth:admin'], function(){

	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Admin\LoginController@login');
	Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');

	Route::get('password/confirm', 'Admin\ConfirmPasswordController@showConfirmForm')->name('admin.password.confirm');
	Route::post('password/confirm', 'Admin\ConfirmPasswordController@confirm');
	Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');
	Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::get('register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
	Route::post('register', 'Admin\RegisterController@register');

});