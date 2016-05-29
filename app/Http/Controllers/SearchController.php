<?php

namespace Webshop\Http\Controllers;

use Webshop\Product;
use Webshop\Zoekterm;
use Webshop\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index', [
			'title' => trans('search.indextitle') . ' - ' . config('app.Webshopname')]
		);
    }
    
    public function result()
    {
	    $rules = array(
			'zoekterm' => 'Required'
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->passes()) {
	    	$producten = Product::where('productnaam', $request->input('zoekterm'));
	    
	        return view('search.result', [
				'title' => trans('search.resulttitle') . ' - ' . config('app.Webshopname'),
				'producten' => $producten]
			);
		}
		else {
			$request->flash();
			return Redirect::to('search.index')->withErrors($validator);
		}
    }
}