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
Route::middleware(['guest'])->group(function () {

    // Login
    Route::get('/login', 'AuthController@getLogin')->name('login');
    Route::post('/login', 'AuthController@postLogin');

    // Register
    Route::get('/register', 'AuthController@getRegister')->name('register');
    Route::post('/register', 'AuthController@postRegister');

});

// Authenticated
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', 'AuthController@postLogout')->name('logout');

    // Admin
    Route::middleware(['role:admin'])->group(function() {

        // Product
        Route::get('/product/create', 'ProductController@getCreate')->name('product/create');
        Route::post('/product/create', 'ProductController@postCreate');
        Route::get('/product/update/{id}', 'ProductController@getUpdate')->name('product/update');
        Route::patch('/product/update/{id}', 'ProductController@postUpdate');
        Route::delete('/product/delete/{id}', 'ProductController@postDelete')->name('product/delete');

        // Promotion
        Route::get('/promotion/create', 'PromotionController@getCreate')->name('promotion/create');
        Route::post('/promotion/create', 'PromotionController@postCreate');
        Route::get('/promotion/update/{id}', 'PromotionController@getUpdate')->name('promotion/update');
        Route::patch('/promotion/update/{id}', 'PromotionController@postUpdate');
        Route::delete('/promotion/delete/{id}', 'PromotionController@postDelete')->name('promotion/delete');

        // Delivery Service
        Route::get('/service/create', 'DeliveryServiceController@getCreate')->name('delivery_service/create');
        Route::post('/service/create', 'DeliveryServiceController@postCreate');
        Route::get('/service/update/{id}', 'DeliveryServiceController@getUpdate')->name('delivery_service/update');
        Route::patch('/service/update/{id}', 'DeliveryServiceController@postUpdate');
        Route::delete('/service/delete/{id}', 'DeliveryServiceController@postDelete')->name('delivery_service/delete');

    });

    // Shopping Cart
    Route::middleware(['role:member'])->group(function() {

        Route::patch('/cart/update/{id}', 'ShoppingCartController@postUpdateItem')->name('cart/update');

        Route::get('/cart', 'ShoppingCartController@getPage1')->name('cart/page/1');
        Route::get('/delivery', 'ShoppingCartController@getPage2')->name('cart/page/2');
        Route::patch('/delivery', 'ShoppingCartController@postPage2');
        Route::get('/payment', 'ShoppingCartController@getPage3')->name('cart/page/3');
        Route::patch('/payment', 'ShoppingCartController@postPage3');
        Route::get('/confirmation', 'ShoppingCartController@getPage4')->name('cart/page/4');
        Route::patch('/confirmation', 'ShoppingCartController@postPage4')->name('cart/page/4');
        Route::get('/product/detail/id={id}', 'ProductController@viewDetail');

        Route::get('/transaction', 'TransactionController@getAll')->name('transaction');
        Route::get('/track/{id}', 'TransactionController@getTrack')->name('track');
        Route::post('/cart/add/{id}', 'ShoppingCartController@postAdd')->name('cartAdd');
        
    });

});


