<?php

namespace Webshop\Http\Controllers;

use Log;
use Webshop\VraagAntwoord;
use Webshop\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
	    //Get all faqs
	    try {
	    	$faqs = VraagAntwoord::all();
	    } catch (\Exception $exception) {
			Log::error('Cannot receive faq from database. Exception:'.$exception);
		}
	    
        return view('faq.index', [
			'title' => trans('faq.indextitle') . ' - ' . config('webshop.Webshopname'),
			'faqs' => $faqs]
		);
    }
}