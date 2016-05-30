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
		$products = array();
		
		if ($request->session()->has('cartproducts')) {
			$productIds = $request->session()->get('cartproducts');
			
			if(count($productIds) > 0){
				$products = Product::findMany($productIds);
			}
		}
        return view('cart.index', [
			'title' => trans('cart.indextitle') . ' - ' . config('app.Webshopname'), 
			'products' => $products]
		);
    }
	
    public function set(Request $request, $id)
    {
		if ($request->session()->has('cartproducts')) {
			$productIds = $request->session()->get('cartproducts');
			
			if (in_array($id, $productIds) == false) {
				array_push($productIds, $id);
			}
		} else {
			$productIds = array($id);
		}
		
		$request->session()->put('cartproducts', $productIds);
		
		return redirect()->back()->with('message', trans('cart.productset'));
    }
	
    public function del(Request $request, $id)
    {
		if ($request->session()->has('cartproducts')) {
			$productIds = $request->session()->get('cartproducts');
						
			if (in_array($id, $productIds)) {
				unset($productIds[array_search($id,$productIds)]);
			}
			
			$request->session()->put('cartproducts', $productIds);
		}
		
		return redirect()->back()->with('message', trans('cart.productdel'));
    }
}