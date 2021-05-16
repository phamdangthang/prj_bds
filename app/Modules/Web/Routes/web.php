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
Route::get('/danh-muc-tin-tuc', 'HomeController@newsCategory')->name('news-category');
Route::get('/danh-muc-du-an', 'HomeController@projectCategory')->name('project-category');
Route::get('/chi-tiet-du-an', 'HomeController@projectDetail')->name('project-detail');
Route::get('/chi-tiet-tin-tuc', 'HomeController@newstDetail')->name('news-detail');
Route::get('/dang-tin', 'HomeController@postNews')->name('post-news');
