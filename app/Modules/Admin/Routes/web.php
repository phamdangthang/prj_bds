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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', 'AdminController@login')->name('login');
    Route::post('/login', 'AdminController@signIn')->name('signIn');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        // Thành viên
        Route::group(['prefix' => 'member'], function(){
            Route::get('/', 'MemberController@index')->name('member.index');
            Route::get('/add', 'MemberController@create')->name('member.create');
            Route::post('/add', 'MemberController@store')->name('member.store');
            Route::get('/edit/{id}', 'MemberController@edit')->name('member.edit');
            Route::post('/edit/{id}', 'MemberController@update')->name('member.update');
            Route::get('/destroy/{id}', 'MemberController@destroy')->name('member.destroy');
        });

        // Vai trò
        Route::group(['prefix' => 'role'], function(){
            Route::get('/', 'RoleController@index')->name('role.index');
            Route::get('/create', 'RoleController@create')->name('role.create');
            Route::post('/store', 'RoleController@store')->name('role.store');

            Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit');
            Route::post('/edit/{id}', 'RoleController@update')->name('role.update');
            Route::get('/destroy/{id}', 'RoleController@destroy')->name('role.destroy');

            Route::get('/getAll', 'RoleController@getAllRole');
            Route::post('/getPermissionOfRole', 'RoleController@getPermissionOfRole');
        });

        // Quyền hạn
        Route::group(['prefix' => 'permission'], function(){
            Route::get('/', 'PermissionController@index')->name('permission.index');
            Route::get('/create', 'PermissionController@create')->name('permission.create');
            Route::post('/store', 'PermissionController@store')->name('permission.store');

            Route::get('/edit/{id}', 'PermissionController@edit')->name('permission.edit');
            Route::post('/edit/{id}', 'PermissionController@update')->name('permission.update');
            Route::get('/destroy/{id}', 'PermissionController@destroy')->name('permission.destroy');

            Route::get('/getAll', 'PermissionController@getAllRole')->name('permission.getAll');
        });
    });
});
