<?php

namespace Webshop\Http\Controllers;

use Log;
use Validator;
use Webshop\Product;
use Webshop\Zoekterm;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
	    //Validate rules for form
	    $rules = [
			'zoekterm' => 'Required'
		];

		//Validator
		$validator = Validator::make($request->all(), $rules);

		//Check if form is valid
		if ($validator->passes()) {
			$products = array();
			
			try {
				//Get products by search string
	    		$products = Product::where('naam', 'LIKE', '%' . $request->input('zoekterm') . '%')->get();
	    	} catch (\Exception $exception) {
				Log::error('Cannot receive products from database. Exception:'.$exception);
			}
			
			//If there no products found set record in database
			if(count($products) == 0){
				try {
					$zoekterm = new Zoekterm();
					$zoekterm->zoekterm = $request->input('zoekterm');
					$zoekterm->save();
					Log::info('Added search record to database id:' . $zoekterm->id);
				} catch (\Exception $exception) {
					Log::error('Cannot add search into database. Exception:'.$exception);
				}
			}
		
	        return view('search.index', [
				'title' => trans('search.indextitle') . ' - ' . config('webshop.Webshopname'),
				'products' => $products]
			);
		}
		else {
			//Validation failed and set client back to form with validation errors and input
			return redirect('products')->withErrors($validator)->withInput();
		}
    }
}