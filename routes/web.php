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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'back'], function () {
    Route::get('/', 'Admin\DashboardController@index');
    Route::get('/category', 'Admin\CategoryController@index');
    Route::get('/category/create', 'Admin\CategoryController@create');
});