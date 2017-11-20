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
Route::get('/login',                       'GeneralController@catcher'                  )->name('login');
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
Route::post('/user/create',                    'UserController@create'            )->name('createUserProcess');

Route::get('/user/dashboard',                    'UserController@dashboard'            )->name('userDashboardPage');
Route::get('/user/orders',                    'UserController@orders'            )->name('userOrderPage');
Route::get('/user/profile',                    'UserController@profile'            )->name('userProfilePage');
Route::get('/user/ratings',                    'UserController@profile'            )->name('userRatingPage');
Route::post('/user/ratings/process/{oid}/{uid}/{rand}',                    'UserController@rating_process'            )->name('userRatingProcess');


// Providers
Route::get('/p/logout',                    'ProviderController@logout'            )->name('logoutProviderPage');
Route::get('/p/dashboard',                    'ProviderController@dashboard'            )->name('providerDashboardPage');

Route::get('/p/orders',                    'ProviderController@orders'            )->name('providerOrderPage');
Route::post('/p/orders/status',                    'ProviderController@orders_status_process'            )->name('order.content.update');

Route::get('/p/profile',                    'ProviderController@profile'            )->name('providerProfilePage');

Route::get('/p/products',                    'ProviderController@products'            )->name('providerProductPage');
Route::get('/p/product/add',                    'ProviderController@product_add'            )->name('providerProductAddPage');
Route::post('/p/product/process',                    'ProviderController@product_add_process'            )->name('providerProductAddProcess');


// Admin
Route::get('/admin/logout',                       'AdminController@logout'               )->name('admin.logout');
Route::get('/admin',                              'AdminController@index'               )->name('admin.index');
Route::post('/admin/login',                        'AdminController@login'               )->name('admin.login.process');
Route::get('/admin/dashboard',                    'AdminController@dashboard'            )->name('admin.dashboard');
Route::get('/admin/orders',                    'AdminController@orders'            )->name('admin.orders');
Route::get('/admin/products',                    'AdminController@products'            )->name('admin.products');
Route::get('/admin/ratings',                    'AdminController@ratings'            )->name('admin.ratings');
Route::get('/admin/profile',                    'AdminController@profile'            )->name('admin.profile');

Route::get('/admin/providers',                    'AdminController@providers'            )->name('admin.providers');
Route::get('/admin/providers/{id}',                    'AdminController@provider_view'            )->name('admin.provider.profile');
Route::get('/admin/providers/{id}/products',                    'AdminController@provider_products'            )->name('admin.provider.products');
Route::get('/admin/providers/{id}/orders',                    'AdminController@provider_orders'            )->name('admin.provider.orders');
Route::get('/admin/providers/{id}/activities',                    'AdminController@provider_activities'            )->name('admin.provider.activities');

Route::get('/admin/clients',                    'AdminController@clients'            )->name('admin.clients');
Route::get('/admin/clients/{id}',                    'AdminController@client_view'            )->name('admin.client.profile');
Route::get('/admin/clients/{id}/orders',                    'AdminController@client_orders'            )->name('admin.client.orders');
Route::get('/admin/clients/{id}/activities',                    'AdminController@client_activities'            )->name('admin.client.activities');

Route::get('/admin/category',                    'AdminController@category'            )->name('admin.category');
Route::get('/admin/category/add',                    'AdminController@category_add'            )->name('admin.category.add');
Route::post('/admin/category/add',                    'AdminController@category_add_process'            )->name('admin.category.add.process');
Route::get('/admin/category/{id}/edit',                    'AdminController@category_edit'            )->name('admin.category.edit');
Route::post('/admin/category{id}/edit',                    'AdminController@category_process'            )->name('admin.category.edit.process');
