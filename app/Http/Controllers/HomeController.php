<?php

namespace Webshop\Http\Controllers;

use Webshop\Product;
use Webshop\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
	    $products = Product::orderBy('id', 'desc')->take(3)->get();
        return view('home.index', [
			'title' => config('webshop.Webshopname'), 
			'products' => $products]
		);
    }
}