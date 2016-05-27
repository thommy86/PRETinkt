<?php

namespace Webshop\Http\Controllers;

use Webshop\Product;
use Webshop\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
	    $products = Product::all();
        return view('product.index', [
			'title' => trans('product.indextitle') . ' - ' . config('app.Webshopename'), 
			'products' => $products]
		);
    }
	
	public function product($id)
    {
	    $product = Product::find($id);
        return view('product.product', [
			'title' => trans('product.producttitle') . ' - ' . config('app.Webshopename'), 
			'product' => $product]
		);
    }
}