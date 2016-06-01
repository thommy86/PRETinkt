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
	    
			if(count($products) == 0){
				$zoekterm = new Zoekterm();
				$zoekterm->zoekterm = $request->input('zoekterm');
				$zoekterm->save();
			}
		
	        return view('search.index', [
				'title' => trans('search.indextitle') . ' - ' . config('webshop.Webshopname'),
				'products' => $products]
			);
		}
		else {
			return redirect('products')->withErrors($validator)->withInput();
		}
    }
}