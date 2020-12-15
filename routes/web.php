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
Route::get('/gioi-thieu', 'home\AboutmeController@index')->name('home.aboutme.index');
Route::get('/lien-he', 'home\ContactController@index')->name('home.contact.index');
Route::group(['prefix' => 'ajax'], function () {
    Route::get('render-product', 'home\HomeController@ajaxGetProducts')->name('ajax.product.render');
    Route::post('find-product', 'home\ProductController@ajaxFindProduct')->name('ajax.product.find');
});
Route::group(['prefix' => 'adminstrator'], function () {
    Route::get('/login', 'admin\LoginController@index')->name('adminstrator.login.index');
    Route::post('/login', 'admin\LoginController@login')->name('adminstrator.login.post');
    Route::post('/logout', 'admin\LoginController@logout')->name('adminstrator.logout.post');
    Route::middleware('auth')->group(function() {
        Route::get('/', 'admin\DashboardController@index')->name('adminstrator.index');
        Route::resource('/category', 'admin\CategoryController');
        Route::resource('/product', 'admin\ProductController');
        Route::get('/order', 'admin\OrderController@index')->name('order.index');
        Route::get('/aboutme', 'admin\AboutMeController@index')->name('aboutme.index');
        Route::get('/contact', 'admin\ContactController@index')->name('contact.index');
        Route::get('/banner', 'admin\BannerController@index')->name('banner.index');
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
            Route::group(['prefix' => 'banner'], function () {
                Route::post('create', 'admin\BannerController@ajaxCreate')->name('ajax.banner.create');
                Route::get('render', 'admin\BannerController@ajaxRender')->name('ajax.banner.render');
                Route::delete('destroy/{id}', 'admin\BannerController@destroy')->name('ajax.banner.destroy');
                Route::get('render_edit/{id}', 'admin\BannerController@ajaxRenderEdit')->name('ajax.banner.render_edit');
                Route::patch('update/{id}', 'admin\BannerController@ajaxUpdate')->name('ajax.banner.update');
            });
        });
    });
});