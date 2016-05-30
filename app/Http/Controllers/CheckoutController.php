<?php

namespace Webshop\Http\Controllers;

use Webshop\Product;
use Webshop\Merk;
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
        return view('checkout.index', [
			'title' => trans('checkout.indextitle') . ' - ' . config('app.Webshopname'), 
			'products' => $products,
			'shipping' => $shipping]
		);
    }
}