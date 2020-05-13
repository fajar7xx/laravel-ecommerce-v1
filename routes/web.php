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

require 'admin.php';

Route::get('/', function () {
    // return view('welcome');
    return view('site.pages.homepage');
});
Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');
Route::get('/product/{slug}', 'Site\ProductController@show')->name('product.show');
Route::post('/product/add/cart', 'Site\ProductController@addToCart')->name('product.add.cart');



// Route::view('/admin', 'admin.dashboard.index');

Auth::routes([
    'verify' => true,
]);

// Route::get('/home', 'HomeController@index')->name('home');
