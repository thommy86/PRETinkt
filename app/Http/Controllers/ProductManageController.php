<?php

namespace Webshop\Http\Controllers;

use Webshop\Product;
use Webshop\Merk;
use Webshop\Http\Controllers\Controller;

class ProductManageController extends Controller
{
    public function index()
    {
	    $products = Product::all();
        return view('productmanage.index', [
			'title' => trans('productmanage.indextitle') . ' - ' . config('app.Webshopename'), 
			'products' => $products]
		);
    }
	
	public function product($id)
    {
	    $product = Product::find($id);
        return view('productmanage.product', [
			'title' => trans('productmanage.producttitle') . ' - ' . config('app.Webshopename'), 
			'product' => $product]
		);
    }
}