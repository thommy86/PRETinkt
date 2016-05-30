<?php

namespace Webshop\Http\Controllers;

use Webshop\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Webshop\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
		$productIds = $request->cookie('wishlistproducts');
		if($productIds === null)
		{
			$products = array();
		} else {
			$products = Product::findMany($productIds);
		}
		return view('wishlist.index', [
			'title' => trans('wishlist.indextitle') . ' - ' . config('app.Webshopname'),
			'products' => $products]
		);
    }
	
    public function set(Request $request, $id)
    {
		$productIds = $request->cookie('wishlistproducts');
		
		if($productIds === null)
		{
			$productIds = array($id);
		} else {
			array_push($productIds, $id);
		}
		
		return redirect()->back()->withCookie(cookie()->forever('wishlistproducts', $productIds))->with('message', trans('wishlist.productset'));
    }
	
    public function del(Request $request, $id)
    {
		$productIds = $request->cookie('wishlistproducts');
		
		if($productIds === null)
		{
			$productIds = array();
		} else {
			if (in_array($id, $productIds)) 
			{
				unset($productIds[array_search($id,$productIds)]);
			}
		}
		
		return redirect()->back()->withCookie(cookie()->forever('wishlistproducts', $productIds))->with('message', trans('wishlist.productdel'));
    }
}