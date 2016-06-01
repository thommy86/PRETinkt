<?php

namespace Webshop\Http\Controllers;

use Log;
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
		
		//Default shipping
		$shipping = config('webshop.Shipping1');
		
		//Check if cart session exist
		if ($request->session()->has('cartproducts')) {
			//Get product ids from cart session
			$productIds = array_keys($request->session()->get('cartproducts'));
			
			if(count($productIds) == 0) {
				return redirect('/');
			}
			
			if(count($productIds) > 0){
				//Get products from database by product ids from the cart
				try {
					$products = Product::findMany($productIds);
				} catch (\Exception $exception) {
					Log::error('Cannot receive products from database. Exception:'.$exception);
				}
			}
			
			foreach($products as $product){
				//Get quantity of products from cart
				$product->quantity = $request->session()->get('cartproducts')[$product->id];
			}
		} else {
			return redirect('/');
		}
		
		//Check if region session exist
		if ($request->session()->has('region')) {
			//Get region from cart session
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