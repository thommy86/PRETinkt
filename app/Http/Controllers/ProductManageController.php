<?php

namespace Webshop\Http\Controllers;

use Log;
use Webshop\Product;
use Webshop\Http\Controllers\Controller;

class ProductManageController extends Controller
{
    public function index()
    {
	    $products = array();
	    
	    try {
	    	//Get all products
	    	$products = Product::all();
	    } catch (\Exception $exception) {
			Log::error('Cannot receive products from database. Exception:'.$exception);
		}
	    
        return view('productmanage.index', [
			'title' => trans('productmanage.indextitle') . ' - ' . config('webshop.Webshopname'), 
			'products' => $products]
		);
    }
	
	public function product($id)
    {
	    $product = new Product();
	    
	    try {
	    	$product = Product::find($id);
	    } catch (\Exception $exception) {
	    	//Get specific product
			Log::error('Cannot receive product from database. Exception:'.$exception);
		}
	    
        return view('productmanage.product', [
			'title' => trans('productmanage.producttitle') . ' - ' . config('webshop.Webshopname'), 
			'product' => $product]
		);
    }
}