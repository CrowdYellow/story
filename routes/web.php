<?php

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

Route::get('/', 'ArticlesController@index');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');

// 用户
Route::get('/users/{user}', 'UsersController@show')->name('users.show');
// 修改密码
Route::get('/users/{user}/password', 'UsersController@password')->name('users.password');
Route::post('/users/{user}/password', 'UsersController@updatePassword');
// 修改头像
Route::get('/users/{user}/avatar', 'UsersController@avatar')->name('users.avatar');
Route::post('/users/{user}/avatar', 'UsersController@updateAvatar');
// 修改名称
Route::get('/users/{user}/name', 'UsersController@name')->name('users.name');
Route::post('/users/{user}/name', 'UsersController@updateName');




// 用户身份验证相关的路由
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// 用户注册相关路由
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// 密码重置相关路由
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email 认证相关路由
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
