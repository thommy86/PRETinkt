<?php

namespace Webshop\Http\Controllers;

use Validator;
use Webshop\Product;
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
						
			if (array_key_exists($id, $productIds)) {
				unset($productIds[$id]);
			}
			
			$request->session()->put('cartproducts', $productIds);
		}
		
		return redirect()->back()->with('message', trans('cart.productdel'));
    }
	
	public function update(Request $request)
	{
		$rules = [
			'ids' => 'required',
			'quantities' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->passes()) {
			if ($request->session()->has('cartproducts')) {
				$productIds = $request->session()->get('cartproducts');
				
				for ($i = 0; $i < count($request->input('ids')); $i++) {
					if (array_key_exists($request->input('ids')[$i], $productIds)) {
						$quantity = $request->input('quantities')[$i];
						$productIds[$request->input('ids')[$i]] = $quantity;
					}
				}
				
				$request->session()->put('cartproducts', $productIds);
			}
						
			return redirect('cart')->with('message', trans('cart.updated'));
		} else {
			return redirect('cart')->withErrors($validator)->withInput();
		}
	}
}