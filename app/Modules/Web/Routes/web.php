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

Route::get('/', 'HomeController@index')->name('home');

// du an
Route::get('/danh-muc-du-an', 'ProjectController@index')->name('project-index');
Route::get('/chi-tiet-du-an', 'ProjectController@detail')->name('project-detail');

// tin tuc
Route::get('/danh-muc-tin-tuc', 'PostController@index')->name('news-index');
Route::get('/chi-tiet-tin-tuc', 'PostController@detail')->name('news-detail');
Route::get('/dang-tin', 'PostController@news')->name('post-news');
