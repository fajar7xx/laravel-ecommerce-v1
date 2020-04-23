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


Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    // Route::get('/', function () {
    //     return view('admin.dashboard.index');
    // });

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        // settings
        Route::get('settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('settings', 'Admin\SettingController@update')->name('admin.settings.update');
        
        // category
        Route::resource('categories', 'Admin\CategoryController', [
            'as' => 'admin',
        ]);
    });


});
