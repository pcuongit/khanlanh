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

Route::get('/', function () {
    return view('admin.dashboard');
});
Route::group(['prefix' => 'adminstrator'], function () {
    Route::get('/', 'admin\DashboardController@index')->name('adminstrator.index');
    Route::resource('/category', 'admin\CategoryController');
    Route::resource('/product', 'admin\ProductController');
    Route::group(['prefix' => 'ajax'], function () {
        Route::post('/category/create', 'admin\CategoryController@ajaxCreate')->name('ajax.category.create');
        Route::patch('/category/update/{id}', 'admin\CategoryController@ajaxUpdate')->name('ajax.category.update');
        Route::get('/category/render', 'admin\CategoryController@ajaxRender')->name('ajax.category.render');
        Route::delete('/category/destroy/{id}', 'admin\CategoryController@destroy')->name('ajax.category.destroy');
    });
});