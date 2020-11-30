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

Route::get('/', 'home\HomeController@index')->name('home.index');
Route::get('/san-pham/{slug}', 'home\ProductController@index')->name('home.products');
Route::get('/san-pham/{slug_cate}/{slug_product}','home\ProductController@detailProduct')->name('product.detail_product');
Route::group(['prefix' => 'ajax'], function () {
    Route::get('render-product', 'home\HomeController@ajaxGetProducts')->name('ajax.product.render');
});
Route::group(['prefix' => 'adminstrator'], function () {
    Route::get('/', 'admin\DashboardController@index')->name('adminstrator.index');
    Route::resource('/category', 'admin\CategoryController');
    Route::resource('/product', 'admin\ProductController');
    Route::get('/order', 'admin\OrderController@index')->name('order.index');
    Route::get('/aboutme', 'admin\AboutMeController@index')->name('aboutme.index');
    Route::get('/contact', 'admin\ContactController@index')->name('contact.index');
    Route::group(['prefix' => 'ajax'], function () {
        Route::post('/aboutme', 'admin\AboutMeController@createOrUpdate');
        Route::post('/contact', 'admin\ContactController@createOrUpdate');
        Route::group(['prefix' => 'category'], function () {
            Route::post('create', 'admin\CategoryController@ajaxCreate')->name('ajax.category.create');
            Route::patch('update/{id}', 'admin\CategoryController@ajaxUpdate')->name('ajax.category.update');
            Route::get('render', 'admin\CategoryController@ajaxRender')->name('ajax.category.render');
            Route::delete('destroy/{id}', 'admin\CategoryController@destroy')->name('ajax.category.destroy');
        });
        Route::group(['prefix' => 'product'], function () {
            Route::post('create', 'admin\ProductController@ajaxCreate')->name('ajax.product.create');
            Route::patch('update/{id}', 'admin\ProductController@ajaxUpdate')->name('ajax.product.update');
            Route::get('render', 'admin\ProductController@ajaxRender')->name('ajax.product.render');
            Route::delete('destroy/{id}', 'admin\ProductController@destroy')->name('ajax.product.destroy');
            Route::get('render_edit/{id}', 'admin\ProductController@ajaxRenderEdit')->name('ajax.product.render_edit');
        });
        Route::group(['prefix' => 'order'], function () {
            Route::get('render', 'admin\OrderController@ajaxRender')->name('ajax.order.render');
        });
    });
});