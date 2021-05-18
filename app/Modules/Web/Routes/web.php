<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/dang-ky', 'UserController@register')->name('register');
Route::post('/dang-ky', 'UserController@postRegister')->name('submit-register');

Route::get('/dang-nhap', 'UserController@login')->name('login');
Route::post('/dang-nhap', 'UserController@postLogin')->name('submit-login');

Route::get('/dang-xuat', 'UserController@logout')->name('logout');

Route::get('/cap-nhat-thong-tin', 'UserController@profile')->name('profile');
Route::post('/cap-nhat-thong-tin', 'UserController@updateProfile')->name('profile.update');

Route::get('/', 'HomeController@index')->name('home');

// du an
Route::get('/danh-muc-du-an', 'ProjectController@index')->name('project-index');
Route::get('/chi-tiet-du-an', 'ProjectController@detail')->name('project-detail');

// tin tuc
Route::get('/danh-muc-tin-tuc', 'PostController@index')->name('news-index');
Route::get('/chi-tiet-tin-tuc', 'PostController@detail')->name('news-detail');
Route::get('/dang-tin', 'PostController@news')->name('post-news');
