<?php

namespace Webshop\Http\Controllers;

use Webshop\Product;
use Webshop\Klant;
use Webshop\Bestelling;
use Webshop\BestellingProduct;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
		$products = array();
		
		$shipping = config('webshop.Shipping1');
		
		if ($request->session()->has('cartproducts')) {
			$productIds = array_keys($request->session()->get('cartproducts'));
			
			if(count($productIds) == 0) {
				return redirect('/');
			}
			
			if(count($productIds) > 0){
				$products = Product::findMany($productIds);
			}
			
			foreach($products as $product){
				$product->quantity = $request->session()->get('cartproducts')[$product->id];
			}
		} else {
			return redirect('/');
		}
		
		if ($request->session()->has('region')) {
			$region = $request->session()->get('region');
			switch($region){
				case 1:
					$shipping = config('webshop.Shipping1');
				break;
				case 2:
					$shipping = config('webshop.Shipping2');
				break;
			}
		}
        return view('checkout.index', [
			'title' => trans('checkout.indextitle') . ' - ' . config('webshop.Webshopname'), 
			'products' => $products,
			'shipping' => $shipping]
		);
    }
}