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


Route::get('/resources/product/{id}',       'GeneralController@resources_product'       )->name('productResources');
Route::get('/resources/provider/{id}',      'GeneralController@resources_provider'      )->name('providerResources');


Route::get('/',                             'GeneralController@index'                   )->name('landingPage');
Route::get('/search',                       'GeneralController@search'                  )->name('resultPage');
Route::get('/page/{u}',                     'GeneralController@user_page'               )->name('userPage');
Route::post('/cart/add',                    'GeneralController@add_cart'                )->name('addCartPage');

Route::get('/checkout/{u}',                 'GeneralController@checkout'                )->name('checkoutPage');
Route::post('/checkout/{u}/process',        'GeneralController@checkout_process'        )->name('checkoutProcess');

Route::get('/payment/{oid}/{uid}/{rand}',   'GeneralController@payment'                )->name('paymentPage');
Route::post('/payment/{oid}/{uid}/{rand}/process',   'GeneralController@payment_process'                )->name('paymentProcess');
Route::get('/payment/{oid}/{uid}/{rand}/success',   'GeneralController@payment_success'                )->name('paymentSuccessPage');
Route::get('/payment/{oid}/success',   'GeneralController@payment_success_message'                )->name('paymentSuccessMessagePage');
Route::get('/payment/{oid}/{uid}/{rand}/cancelled',   'GeneralController@payment_cancelled'                )->name('paymentCancelledPage');

// Users
Route::post('/user/login',                    'UserController@login'            )->name('loginUserPage');
Route::get('/user/logout',                    'UserController@logout'            )->name('logoutUserPage');

Route::get('/user/dashboard',                    'UserController@dashboard'            )->name('userDashboardPage');
Route::get('/user/orders',                    'UserController@orders'            )->name('userOrderPage');
Route::get('/user/profile',                    'UserController@profile'            )->name('userProfilePage');
