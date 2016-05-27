<?php

namespace Webshop\Http\Controllers;

use Webshop\Product;
use Webshop\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
	    $product = Product::find(1);
        return view('home.index', ['title' => 'title', 'product' => $product]);
    }
}