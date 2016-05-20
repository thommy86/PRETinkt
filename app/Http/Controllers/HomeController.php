<?php

namespace Webshop\Http\Controllers;

use Log;
use Webshop\Product;
use Webshop\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
	    $products = array();
	    
	    try{
	    	//Get products ordered by id and max 3
	    	$products = Product::orderBy('id', 'desc')->take(3)->get();
	    } catch (\Exception $exception) {
		    Log::error('Cannot receive products from database. Exception:'.$exception);
	    }
	    
        return view('home.index', [
			'title' => config('webshop.Webshopname'), 
			'products' => $products]
		);
    }
}