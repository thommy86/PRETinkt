<?php

namespace Webshop\Http\Controllers;

use Log;
use App;
use Webshop\Product;
use Webshop\Beoordeling;
use Webshop\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
	    $products = array();
	    
	    try {
	    	//Get all products
	    	$products = Product::all();
	    } catch (\Exception $exception) {
			Log::error('Cannot receive products from database. Exception:'.$exception);
		}
		
		try {
			foreach($products as $product){
				//Get rating of products from cart
				$ratings = Beoordeling::where('productId', $product->id)->select('beoordeling')->get();
				
				if(count($ratings) > 0) {
					$ratingCounts = array();
					
					foreach($ratings as $rating)
					{
						array_push($ratingCounts, $rating->beoordeling);
					}
					
					$average = array_sum($ratingCounts) / count($ratingCounts);
					
					$product->rating = round($average, 1);
				} else {
					$product->rating = 0;
				}
			}
		} catch (\Exception $exception) {
			Log::error('Cannot set rating for product id: ' . $product->id . '. Exception:'.$exception);
		}
	    
        return view('product.index', [
			'title' => trans('product.indextitle') . ' - ' . config('webshop.Webshopname'), 
			'products' => $products]
		);
    }
	
	public function product($id)
    {
	    $product = new Product();
		
		//Get application language
		$lang = App::getLocale();
		
	    
	    try {
	    	$product = Product::find($id);
	    } catch (\Exception $exception) {
	    	//Get specific product
			Log::error('Cannot receive product from database. Exception:'.$exception);
		}
		
		try {
			//Get rating of product
			$ratings = Beoordeling::where('productId', $product->id)->select('beoordeling')->get();
				
			if(count($ratings) > 0) {
				$ratingCounts = array();
				
				foreach($ratings as $rating)
				{
					array_push($ratingCounts, $rating->beoordeling);
				}
				
				$average = array_sum($ratingCounts) / count($ratingCounts);
				
				$product->rating = round($average, 1);
			} else {
				$product->rating = 0;
			}
		} catch (\Exception $exception) {
			Log::error('Cannot set rating for product id: ' . $product->id . '. Exception:'.$exception);
		}
	    
        return view('product.product', [
			'title' => $product->naam . ' - ' . config('webshop.Webshopname'), 
			'product' => $product,'lang' => $lang]
		);
    }
	
	public function rate($id, $rate)
	{
		try {
			$ip = $this->getIp();
			
			$count = Beoordeling::where('productId', $id)->where('ipadres', $ip)->count();
			if($count == 0)
			{
				$rating = new Beoordeling();
				$rating->productId = $id;
				$rating->beoordeling = $rate;
				$rating->ipadres = $ip;
				
				if($rating->save())
				{
					return redirect('/product/'. $id)->with('successmessage', trans('product.productrated'));
				}
			} else {
				return redirect('/product/'. $id)->with('infomessage', trans('product.alreadyrated'));
			}
	    } catch (\Exception $exception) {
			Log::error('Cannot submit product from database. Exception:'.$exception);
		}
	}
	
	public function getIp()
	{
		//Get ip from client
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
}