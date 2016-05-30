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
		
		$shipping = 7.95;
		
		if ($request->session()->has('cartproducts')) {
			$productIds = array_keys($request->session()->get('cartproducts'));
			
			if(count($productIds) > 0){
				$products = Product::findMany($productIds);
			}
			
			foreach($products as $product){
				$product->quantity = $request->session()->get('cartproducts')[$product->id];
			}
		}
		if ($request->session()->has('region')) {
			$region = $request->session()->get('region');
			switch($region){
				case 1:
					$shipping = config('app.Shipping1');
				break;
				case 2:
					$shipping = config('app.Shipping2');
				break;
			}
		}
        return view('cart.index', [
			'title' => trans('cart.indextitle') . ' - ' . config('app.Webshopname'), 
			'products' => $products,
			'shipping' => $shipping]
		);
    }
	
    public function set(Request $request, $id)
    {
		if ($request->session()->has('cartproducts')) {
			$productIds = $request->session()->get('cartproducts');
			
			if (array_key_exists($id, $productIds)) {
				$quantity = $productIds[$id];
				$quantity = $quantity + 1;
				$productIds[$id] = $quantity;
			} else {
				$productIds[$id] = 1;
			}
		} else {
			$productIds = array();
			$productIds[$id] = 1;
		}
		
		$request->session()->put('cartproducts', $productIds);
		
		$request->session()->put('region', 1);
		
		return redirect()->back()->with('message', trans('cart.productset'));
    }
	
    public function del(Request $request, $id)
    {
		if ($request->session()->has('cartproducts')) {
			$productIds = $request->session()->get('cartproducts');
						
			if (in_array($id, $productIds)) {
				unset($productIds[$id]);
			}
			
			$request->session()->put('cartproducts', $productIds);
		}
		
		return redirect()->back()->with('message', trans('cart.productdel'));
    }
}