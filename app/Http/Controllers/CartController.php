<?php

namespace Webshop\Http\Controllers;

use Webshop\Product;
use Webshop\Merk;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(Request $request)
    {
		$productIds = $request->session()->get('cartproducts');
		if($productIds === null)
		{
			$products = array();
		} else {
			$products = Product::findMany($productIds);
		}
        return view('cart.index', [
			'title' => trans('cart.indextitle') . ' - ' . config('app.Webshopname'), 
			'products' => $products]
		);
    }
	
    public function set(Request $request, $id)
    {
		$productIds = $request->session()->get('cartproducts');
		
		if($productIds === null)
		{
			$productIds = array($id);
		} else {
			array_push($productIds, $id);
		}
		
		$request->session()->push('cartproducts', $productIds);
		
		return redirect()->back()->with('message', trans('cart.productset'));
    }
	
    public function del(Request $request, $id)
    {
		$productIds = $request->session()->get('cartproducts');
		
		if($productIds === null)
		{
			$productIds = array();
		} else {
			if (in_array($id, $productIds)) 
			{
				unset($productIds[array_search($id,$productIds)]);
			}
		}
		
		$request->session()->push('cartproducts', $productIds);
		
		return redirect()->back()->with('message', trans('cart.productdel'));
    }
}