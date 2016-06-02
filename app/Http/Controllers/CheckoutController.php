<?php

namespace Webshop\Http\Controllers;

use Log;
use Validator;
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
    
    public function post(Request $request)
    {
	    //Validate rules for form
	    $rules = [
			'firstname' => 'required',
			'prefix' => 'required',
			'lastname' => 'required',
			'street' => 'required',
			'number' => 'required',
			'city' => 'required',
			'zip' => 'required',
			'country' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
		];

		//Validator
		$validator = Validator::make($request->all(), $rules);

		//Check if form is valid
		if ($validator->passes()) {
			//TODO
			try {
				
	        } catch (\Exception $exception) {
				Log::error('Cannot sent mail. Exception:'.$exception);
			}
	    
	        return redirect('/cart/checkout/pay')->with('successmessage', trans('checkout.success'));
		} else {
			//Validation failed and set client back to form with validation errors and input
			return redirect('cart/checkout')->withErrors($validator)->withInput();
		}
    }
}