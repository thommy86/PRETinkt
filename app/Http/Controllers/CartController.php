<?php

namespace Webshop\Http\Controllers;

use Log;
use Validator;
use Webshop\Product;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class CartController extends Controller
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
			
			if(count($productIds) > 0){
				//Get products from database by product ids from the cart
				$products = Product::findMany($productIds);
			}
			
			foreach($products as $product){
				//Get quantity of products from cart
				$product->quantity = $request->session()->get('cartproducts')[$product->id];
			}
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
		
        return view('cart.index', [
			'title' => trans('cart.indextitle') . ' - ' . config('webshop.Webshopname'), 
			'products' => $products,
			'shipping' => $shipping]
		);
    }
	
    public function set(Request $request, $id)
    {
		//Check if cart session exist
		if ($request->session()->has('cartproducts')) {
			//Get products from cart session
			$productIds = $request->session()->get('cartproducts');
			
			//If product already exist set quantity + 1
			if (array_key_exists($id, $productIds)) {
				//Get product from cart array by id
				$quantity = $productIds[$id];
				//Add quantity + 1
				$quantity = $quantity + 1;
				//Adjust quantity in cart array
				$productIds[$id] = $quantity;
				Log::info('Added existing product to cart id:' . $id);
			} else {
				//If product doesn't exist add to cart array
				$productIds[$id] = 1;
				Log::info('Added new product to cart id:' . $id);
			}
		} else {
			//If session not exist add new session with new cart array
			$productIds = array();
			$productIds[$id] = 1;
		}
		
		//Update session
		$request->session()->put('cartproducts', $productIds);
		
		//TODO: Has to be choosen by user
		$request->session()->put('region', 1);
		
		return redirect()->back()->with('message', trans('cart.productset'));
    }
	
    public function del(Request $request, $id)
    {
	    //Check if cart session exist
		if ($request->session()->has('cartproducts')) {
			//Get products from cart session
			$productIds = $request->session()->get('cartproducts');
				
			//If product exist remove from cart array		
			if (array_key_exists($id, $productIds)) {
				unset($productIds[$id]);
				Log::info('Delete product from cart id:' . $id);
			}
			
			//Update session
			$request->session()->put('cartproducts', $productIds);
		}
		
		return redirect()->back()->with('message', trans('cart.productdel'));
    }
	
	public function update(Request $request)
	{
		//Validate rules for form
		$rules = [
			'ids' => 'required',
			'quantities' => 'required',
		];

		//Validator
		$validator = Validator::make($request->all(), $rules);

		//Check if form is valid
		if ($validator->passes()) {
			//Check if cart session exist
			if ($request->session()->has('cartproducts')) {
				//Get products from cart session
				$productIds = $request->session()->get('cartproducts');
				
				//For loop though all ids from the form
				for ($i = 0; $i < count($request->input('ids')); $i++) {
					//Check is form product id exist is cart array
					if (array_key_exists($request->input('ids')[$i], $productIds)) {
						//Set new values from form into the cart array
						$quantity = $request->input('quantities')[$i];
						$productIds[$request->input('ids')[$i]] = $quantity;
					}
				}
				Log::info('Updated cart');
				
				//Update session
				$request->session()->put('cartproducts', $productIds);
			}
						
			return redirect('cart')->with('message', trans('cart.updated'));
		} else {
			//Validation failed and set client back to form with validation errors and input
			return redirect('cart')->withErrors($validator)->withInput();
		}
	}
}