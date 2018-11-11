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

Route::get('/', 'WelcomeController@index')->name('news');

Auth::routes();

Route::get('/user/logout', 'Auth\LoginController@logout')->name('user.logout');

Route::prefix('admin')->group(function() {
  Route::get('/', 'AdminController@index')->name('admin');
  Route::get('/posts', 'AdminController@indexPosts')->name('admin.posts');
  Route::get('/users', 'AdminController@indexUsers')->name('admin.users');
  Route::get('/mail', 'AdminController@indexMail')->name('admin.mail');
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile', 'ProfileController@update_setting')->name('update.setting');

Route::resource('/post', 'PostsController');
