<?php

namespace Webshop\Http\Controllers;

use Webshop\Product;
use Webshop\Merk;
use Webshop\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
	    $products = Product::all();
        return view('cart.index', [
			'title' => trans('cart.indextitle') . ' - ' . config('app.Webshopename'), 
			'products' => $products]
		);
    }
}