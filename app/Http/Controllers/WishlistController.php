<?php

namespace Webshop\Http\Controllers;

use Log;
use Webshop\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Webshop\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
	    //Get wishlist cookie
		$productIds = $request->cookie('wishlistproducts');
		
		//Check if wishlist exist
		if($productIds === null)
		{
			//If cookie not exist make create array
			$products = array();
		} else {
			try {
				//Get products from database by cookie ids
				$products = Product::findMany($productIds);
			} catch (\Exception $exception) {
				Log::error('Cannot receive products from database. Exception:'.$exception);
			}
		}
		
		return view('wishlist.index', [
			'title' => trans('wishlist.indextitle') . ' - ' . config('webshop.Webshopname'),
			'products' => $products]
		);
    }
	
    public function set(Request $request, $id)
    {
	    //Get wishlist cookie
		$productIds = $request->cookie('wishlistproducts');
		
		//Check if wishlist exist
		if($productIds === null)
		{
			//If not cookie exist create new array with id
			$productIds = array($id);
		} else {
			//If product already exist skip add
			if (in_array($id, $productIds) == false) {
				array_push($productIds, $id);
				Log::info('Added product to wishlist id:' . $id);
			} else {
				Log::info('Skipped add product to wishlist id:' . $id);
			}
		}
		
		//Update cookie
		return redirect()->back()->withCookie(cookie()->forever('wishlistproducts', $productIds))->with('successmessage', trans('wishlist.productset'));
    }
	
    public function del(Request $request, $id)
    {
	    //Get wishlist cookie
		$productIds = $request->cookie('wishlistproducts');
		
		//Check if wishlist exist
		if($productIds === null)
		{
			//If cookie not exist make create array
			$productIds = array();
		} else {
			//If product exist in cookie array than delete
			if (in_array($id, $productIds)) 
			{
				unset($productIds[array_search($id,$productIds)]);
				Log::info('Remove product from wishlist id:' . $id);
			}
		}
		
		//Update cookie
		return redirect()->back()->withCookie(cookie()->forever('wishlistproducts', $productIds))->with('successmessage', trans('wishlist.productdel'));
    }
}