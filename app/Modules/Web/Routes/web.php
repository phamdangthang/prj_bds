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
Route::get('/dang-nhap', function () {
    return redirect('/');
});

// du an
Route::get('danh-muc-du-an/{slug}/{id}', 'ProjectController@projectCategory')->name('project-of-category');
Route::get('/chi-tiet-du-an/{slug}/{id}', 'ProjectController@detail')->name('project-detail');

// tin tuc
Route::get('/danh-muc-tin-tuc/{slug}/{id}', 'PostController@newsCategory')->name('news-of-category');
Route::get('/chi-tiet-tin-tuc/{slug}/{id}', 'PostController@detail')->name('news-detail');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dang-tin', 'ProjectController@news')->name('project-news');
    Route::post('/dang-tin', 'ProjectController@postNews')->name('project-news.store');
    Route::get('/dat-mua/{id}', 'ProjectController@order')->name('project-news.order');
});
