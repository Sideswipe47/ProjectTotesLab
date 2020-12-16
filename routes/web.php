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

// Home
Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', 'MainController@getHome')->name('home');

Route::get('/product/view/{id}', 'ProductController@getProduct')->name('product/view');
Route::get('/type/view/{id}', 'ProductTypeController@getProductType')->name('product_type/view');

// Guest
Route::middleware(['auth'])->group(function () {

    // Login
    Route::get('/login', 'AuthController@getLogin')->name('login');
    Route::post('/login', 'AuthController@postLogin');

    // Register
    Route::get('/register', 'AuthController@getRegister')->name('register');
    Route::post('/register', 'AuthController@postRegister');

});

// Authenticated
Route::middleware(['auth'])->group(function () {

    // Admin
    Route::middleware(['role:admin'])->group(function() {

        // Product
        Route::get('/product/create', 'ProductController@getCreate')->name('product/create');
        Route::post('/product/create', 'ProductController@postCreate');
        Route::get('/product/update', 'ProductController@getUpdate')->name('product/update');
        Route::patch('/product/update', 'ProductController@postUpdate');
        Route::delete('/product/delete', 'ProductController@postDelete')->name('product/delete');

        // Product Type
        Route::get('/type/create', 'ProductTypeController@getCreate')->name('product_type/create');
        Route::post('/type/create', 'ProductTypeController@postCreate');
        Route::get('/type/update', 'ProductTypeController@getUpdate')->name('product_type/update');
        Route::patch('/type/update', 'ProductTypeController@postUpdate');
        Route::delete('/type/delete', 'ProductTypeController@postDelete')->name('product_type/delete');

        // Promotion
        Route::get('/promotion/create', 'PromotionController@getCreate')->name('promotion/create');
        Route::post('/promotion/create', 'PromotionController@postCreate');
        Route::get('/promotion/update', 'PromotionController@getUpdate')->name('promotion/update');
        Route::patch('/promotion/update', 'PromotionController@postUpdate');
        Route::delete('/promotion/delete', 'PromotionController@postDelete')->name('promotion/delete');

        // Delivery Service
        Route::get('/service/create', 'DeliveryServiceController@getCreate')->name('delivery_service/create');
        Route::post('/service/create', 'DeliveryServiceController@postCreate');
        Route::get('/service/update', 'DeliveryServiceController@getUpdate')->name('delivery_service/update');
        Route::patch('/service/update', 'DeliveryServiceController@postUpdate');
        Route::delete('/service/delete', 'DeliveryServiceController@postDelete')->name('delivery_service/delete');

    });

    // Shopping Cart
    Route::middleware(['role:member'])->group(function() {

    });

});


