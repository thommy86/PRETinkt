<?php

namespace Webshop\Http\Controllers;

use Validator;
use Webshop\Product;
use Webshop\Zoekterm;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
	    $rules = [
			'zoekterm' => 'Required'
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->passes()) {
	    	$products = Product::where('naam', 'LIKE', '%' . $request->input('zoekterm') . '%')->get();
	    
	        return view('search.index', [
				'title' => trans('search.indextitle') . ' - ' . config('app.Webshopname'),
				'products' => $products]
			);
		}
		else {
			return redirect('products')->withErrors($validator)->withInput();
		}
    }
}