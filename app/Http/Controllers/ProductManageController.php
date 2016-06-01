<?php

namespace Webshop\Http\Controllers;

use Webshop\Product;
use Webshop\Http\Controllers\Controller;

class ProductManageController extends Controller
{
    public function index()
    {
	    //Get all products
	    $products = Product::all();
	    
        return view('productmanage.index', [
			'title' => trans('productmanage.indextitle') . ' - ' . config('webshop.Webshopname'), 
			'products' => $products]
		);
    }
	
	public function product($id)
    {
	    //Get specific product
	    $product = Product::find($id);
	    
        return view('productmanage.product', [
			'title' => trans('productmanage.producttitle') . ' - ' . config('webshop.Webshopname'), 
			'product' => $product]
		);
    }
}