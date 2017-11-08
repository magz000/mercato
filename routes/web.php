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


Route::get('/resources/product/{id}',       'GeneralController@resources_product'  )->name('productResources');
Route::get('/resources/provider/{id}',      'GeneralController@resources_provider'  )->name('providerResources');


Route::get('/',                             'GeneralController@index'   )->name('landingPage');
Route::get('/search',                       'GeneralController@search'  )->name('resultPage');
Route::get('/page/{u}',                     'GeneralController@user_page'  )->name('userPage');
Route::post('/cart/add',                    'GeneralController@add_cart'  )->name('addCartPage');
Route::get('/checkout/{u}',                 'GeneralController@checkout'  )->name('checkoutPage');

// Providers
Route::post('/provider/login',                    'ProviderController@login'  )->name('loginProviderPage');
