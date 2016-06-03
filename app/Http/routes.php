<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('products', 'ProductController@index');

Route::get('product/{id}', 'ProductController@product')->where(['id' => '[0-9]+']);

Route::get('cart', 'CartController@index');

Route::get('cart/set/{id}/{quantity}', 'CartController@set')->where(['id' => '[0-9]+','quantity' => '[0-9]+']);

Route::get('cart/del/{id}', 'CartController@del')->where(['id' => '[0-9]+']);

Route::get('cart/selectregion/{id}/{quantity}', 'CartController@selectRegion')->where(['id' => '[0-9]+','quantity' => '[0-9]+']);

Route::get('quoatation', 'QuoatationController@index');

Route::get('contact', 'ContactController@index');

Route::get('wishlist', 'WishlistController@index');

Route::get('wishlist/set/{id}', 'WishlistController@set')->where(['id' => '[0-9]+']);

Route::get('wishlist/del/{id}', 'WishlistController@del')->where(['id' => '[0-9]+']);

Route::get('cart/checkout', 'CheckoutController@index');

Route::get('faq', 'FaqController@index');

Route::get('privacypolicy', 'PrivacyPolicyController@index');

Route::get('shipping', 'ShippingController@index');

Route::get('admin/faq', 'FaqManageController@index');

Route::get('admin/faq/add', 'FaqManageController@add');

Route::get('admin/faq/del/{id}', 'FaqManageController@del')->where(['id' => '[0-9]+']);

Route::get('admin/products', 'ProductManageController@index');

Route::get('admin/search', 'SearchManageController@index');

Route::get('admin/search/del/{id}', 'SearchManageController@del')->where(['id' => '[0-9]+']);

Route::get('language/{lang}', 'LanguageController@index')->where('lang', '[A-Za-z_-]+');

Route::get('login/off', 'LoginController@off');

Route::get('admin', 'AdminController@index');

Route::post('contact', 'ContactController@post');

Route::post('quoatation', 'QuoatationController@post');

Route::post('search', 'SearchController@index');

Route::post('login', 'LoginController@index');

Route::post('cart/update', 'CartController@update');

Route::post('cart/selectregion/{id}/{quantity}', 'CartController@selectRegionPost')->where(['id' => '[0-9]+','quantity' => '[0-9]+']);

Route::post('cart/checkout', 'CheckoutController@post');

Route::post('admin/faq/add', 'FaqManageController@submit');

Route::post('cart/add', 'CartController@add');
