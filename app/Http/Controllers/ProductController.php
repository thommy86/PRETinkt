<?php

namespace Webshop\Http\Controllers;

use Webshop\Product;
use Webshop\Merk;
use Webshop\Beoordeling;
use Webshop\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
	    $products = Product::all();
        return view('product.index', [
			'title' => trans('product.indextitle') . ' - ' . config('app.Webshopname'), 
			'products' => $products]
		);
    }
	
	public function product($id)
    {
	    $product = Product::find($id);
        return view('product.product', [
			'title' => $product->naam . ' - ' . config('app.Webshopname'), 
			'product' => $product]
		);
    }
}