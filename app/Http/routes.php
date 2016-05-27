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

Route::get('home', 'HomeController@index');

Route::get('products', 'ProductController@index');

Route::get('product/{id}', 'ProductController@product');

Route::get('cart', 'CartController@index');

Route::get('quoatation', 'QuoatationController@index');

Route::get('contact', 'ContactController@index');

Route::get('wishlist', 'WishlistController@index');