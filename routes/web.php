<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/product-detail/{id}/{slug}', 'HomeController@viewProduct')->name('product-details');

Auth::routes();
Route::view('/register', 'auth.login')->name('register');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/', 'UserController@dashboard')->name('user.dashboard');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'Admin\AdminController@dashboard')->name('admin.dashboard');
    Route::get('/add-product', 'Admin\ProductController@create')->name('admin.add-product');
    Route::post('/add-product', 'Admin\ProductController@store')->name('admin.store-product');
    Route::get('/add-category', 'Admin\CategoryController@create')->name('admin.add-category');
    Route::post('/upload-category', 'Admin\CategoryController@store')->name('admin.upload-category');
    Route::get('/view-product', 'Admin\ProductController@show')->name('admin.view-product');
    Route::get('/edit-product/{product}', 'Admin\ProductController@edit')->name('admin.edit-product');
    Route::put('/update/{product}', 'Admin\ProductController@update')->name('admin.update-product');


});
