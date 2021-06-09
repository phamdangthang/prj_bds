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
        Route::get('/logout', 'AdminController@logout')->name('logout');
        Route::get('/profile', 'AdminController@profile')->name('profile');
        Route::post('/profile', 'AdminController@updateProfile')->name('profile.update');

        // Danh mục (Dự án + Tin tức)
        Route::group(['prefix' => 'category'], function () {
            Route::get('/index', 'CategoryController@index')->name('category.index');

            Route::get('/create', 'CategoryController@create')->name('category.create');
            Route::post('/create', 'CategoryController@store')->name('category.store');

            Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
            Route::post('/update/{id}', 'CategoryController@update')->name('category.update');

            Route::get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
        });

        // Dự án
        Route::group(['prefix' => 'project'], function () {
            Route::get('/index', 'ProjectController@index')->name('project.index');

            Route::get('/create', 'ProjectController@create')->name('project.create');
            Route::post('/create', 'ProjectController@store')->name('project.store');

            Route::get('/edit/{id}', 'ProjectController@edit')->name('project.edit');
            Route::post('/update/{id}', 'ProjectController@update')->name('project.update');

            Route::get('/delete/{id}', 'ProjectController@delete')->name('project.delete');
            
            Route::get('/approved/{id}', 'ProjectController@approved')->name('project.approved');
            Route::get('/cancel/{id}', 'ProjectController@cancel')->name('project.cancel');
        });

        // Tin tức
        Route::group(['prefix' => 'blog'], function () {
            Route::get('/index', 'BlogController@index')->name('blog.index');

            Route::get('/create', 'BlogController@create')->name('blog.create');
            Route::post('/create', 'BlogController@store')->name('blog.store');

            Route::get('/edit/{id}', 'BlogController@edit')->name('blog.edit');
            Route::post('/update/{id}', 'BlogController@update')->name('blog.update');

            Route::get('/delete/{id}', 'BlogController@delete')->name('blog.delete');
        });

        // Khách hàng
        Route::group(['prefix' => 'customer'], function(){
            Route::get('/', 'CustomerController@index')->name('customer.index');
            Route::get('/view/{id}', 'CustomerController@view')->name('customer.view');
        });

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

        // Hợp đồng
        Route::group(['prefix' => 'contract'], function(){
            Route::get('/', 'ContractController@index')->name('contract.index');
            Route::get('/contract-detail/{id}', 'ContractController@show')->name('contract.contract-detail');
            Route::get('/cancel/{id}', 'ContractController@cancel')->name('contract.cancel');
        });

        // Giao dịch
        Route::group(['prefix' => 'transaction'], function(){
            Route::get('/', 'TransactionController@index')->name('transaction.index');
            Route::post('/confirm/{id}', 'TransactionController@confirm')->name('transaction.confirm');
            Route::get('/create/{id}', 'TransactionController@create')->name('transaction.create');
            Route::get('/edit/{id}', 'TransactionController@edit')->name('transaction.edit');
            Route::post('/update/{id}', 'TransactionController@update')->name('transaction.update');
            Route::post('/store/{id}', 'TransactionController@store')->name('transaction.store');
            Route::delete('/destroy/{id}', 'TransactionController@destroy')->name('transaction.destroy');
        });

        // Thống kê
        Route::group(['prefix' => 'statistic'], function(){
            Route::get('/', 'StatisticController@index')->name('statistic.index');
        });
    });
});
