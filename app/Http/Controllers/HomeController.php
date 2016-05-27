<?php

namespace PRETinkt\Http\Controllers;

use PRETinkt\Product;
use PRETinkt\Http\Controllers\Controller;

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
        return view('home.index', ['product' => $product]);
    }
}