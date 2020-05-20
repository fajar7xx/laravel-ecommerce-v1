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

        // attribute values
        // Route::group(['prefix' => 'attributes'], function(){
        // });

        // attributes
        Route::resource('attributes', 'Admin\AttributeController', [
            'as' => 'admin'
        ]);

        Route::post('get-values', 'Admin\AttributeValueController@getValues');
        Route::post('add-values', 'Admin\AttributeValueController@addValues');
        Route::post('update-values', 'Admin\AttributeValueController@updateValues');
        Route::post('delete-values', 'Admin\AttributeValueController@deleteValues');

        Route::resource('brands', 'Admin\BrandController', [
            'as' => 'admin'
        ]);

        Route::resource('products', 'Admin\ProductController', [
            'as' => 'admin'
        ]);

        Route::post('images/upload', 'Admin\ProductImageController@upload')->name('admin.products.images.upload');
        Route::delete('images/{id}/delete', 'Admin\ProductImageController@delete')->name('admin.products.images.delete');

        Route::group(['prefix' => 'products'], function(){
            // load attributes on the page load
            Route::get('attributes/load', 'Admin\ProductAttributeController@loadAttributes');
            // load product attributes on the page load
            Route::post('attributes', 'Admin\ProductAttributeController@productAttributes');
            // load option values for a attributes
            Route::post('attributes/values', 'Admin\ProductAttributeController@loadValues');
            // add product attributes to the current product
            Route::post('attributes/add', 'Admin\ProductAttributeController@addAttribute');
            // delete product attribute drom the current product
            Route::post('attributes/delete', 'Admin\ProductAttributeController@deleteAttribute');
        });
        
        Route::group(['prefix' => 'orders'], function(){
            Route::get('/', 'Admin\OrderController@index')->name('admin.orders.index');
            Route::get('/{order}/show', 'Admin\OrderController@show')->name('admin.orders.show');
        });

    });


});
