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
});
