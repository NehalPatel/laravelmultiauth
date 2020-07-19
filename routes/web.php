<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function(){

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