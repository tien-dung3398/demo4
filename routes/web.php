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
/* --------------------------------------FRONTEND------------------------------------------- */

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('danh-muc', 'HomeController@category')->name('category.show');
    Route::get('thương-hiệu', 'HomeController@brand')->name('brand.show');
});

/* --------------------------------------END BACKEND------------------------------------------ */

/* --------------------------------------------------------------------------------------------- */

/* -------------------------------------BACKEND---------------------------------------------- */

Route::group(['prefix' => 'admin'], function () {
    Route::get('/trangquantri', 'AccountController@index')->name('admin.index')->middleware('user');
    Route::get('/logout', 'AccountController@logout')->name('admin.logout');
    Route::group(['middleware' => 'logout_admin'], function () {
        Route::get('/', 'AccountController@login')->name('admin.login');
        Route::post('/post-login', 'AccountController@postlogin')->name('post.login');
        Route::get('/register', 'AccountController@register')->name('admin.register');
        Route::post('/create', 'AccountController@create')->name('admin.create');
    });
});

/* BRAND */
Route::group(['prefix' => 'admin', 'middleware' => 'user'], function () {
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/create', 'BrandController@create')->name('brand.create');
        Route::post('/store', 'BrandController@store')->name('brand.store');
        Route::get('/index', 'BrandController@index')->name('brand.index');
        Route::get('/edit/{id}', 'BrandController@edit')->name('brand.edit');
        Route::post('/update', 'BrandController@update')->name('brand.update');
        Route::get('/delete', 'BrandController@destroy')->name('brand.delete');
    });

    /* USER */
    Route::group(['prefix' => 'user',  'middleware' => 'permission'], function () {
        Route::get('/create', 'UserController@create')->name('user.create');
        Route::get('/index', 'UserController@index')->name('user.index');
        Route::get('/edit', 'UserController@edit')->name('user.edit');
        Route::post('/store', 'UserController@store')->name('user.store');
        Route::post('/update', 'UserController@update')->name('user.update');
        Route::get('/delete', 'UserController@destroy')->name('user.delete');
    });

    /* CATEGORY */
    Route::group(['prefix' => 'category'], function () {
        Route::get('/create', 'CategoryController@create')->name('category.create');
        Route::get('/index', 'CategoryController@index')->name('category.index');
        Route::post('/store', 'CategoryController@store')->name('category.store');
        Route::post('/update', 'CategoryController@update')->name('category.update');
        Route::get('/edit', 'CategoryController@edit')->name('category.edit');
        Route::get('/delete', 'CategoryController@destroy')->name('category.delete');
    });

    /* PRODUCT */
    Route::group(['prefix' => 'product'], function () {
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::get('/index', 'ProductController@index')->name('product.index');
        Route::get('/edit', 'ProductController@edit')->name('product.edit');
        Route::post('/store', 'ProductController@store')->name('product.store');
        Route::post('/update', 'ProductController@update')->name('product.update');
        Route::get('/delete', 'ProductController@destroy')->name('product.delete');
        Route::get('/show-product','ProductController@show')->name('product.show');
    });
});
/* -------------------------------END BACKEND--------------------------------------- */
