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

Route::get('quoatation', 'QuoatationController@index');

Route::get('contact', 'ContactController@index');

Route::get('wishlist', 'WishlistController@index');

Route::get('wishlist/set/{id}', 'WishlistController@set');

Route::get('wishlist/del/{id}', 'WishlistController@del');

Route::get('checkout', 'CheckoutController@index');

Route::get('faq', 'FaqController@index');

Route::get('privacypolicy', 'PrivacyPolicyController@index');

Route::get('shipping', 'ShippingController@index');

Route::get('search', 'SearchController@index');

Route::get('manage/faq', 'FaqManageController@index');

Route::get('manage/products', 'ProductManageController@index');

Route::get('manage/search', 'SearchManageController@index');

Route::get('language/{lang}', 'LanguageController@index')->where('lang', '[A-Za-z_-]+');

Route::post('contact', 'ContactController@post');

Route::post('quoatation', 'QuoatationController@post');