<?php

namespace Webshop\Http\Controllers;

use Webshop\Product;
use Webshop\Beoordeling;
use Webshop\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
	    //Get all products
	    $products = Product::all();
	    
        return view('product.index', [
			'title' => trans('product.indextitle') . ' - ' . config('webshop.Webshopname'), 
			'products' => $products]
		);
    }
	
	public function product($id)
    {
	    //Get specific product
	    $product = Product::find($id);
	    
        return view('product.product', [
			'title' => $product->naam . ' - ' . config('webshop.Webshopname'), 
			'product' => $product]
		);
    }
}