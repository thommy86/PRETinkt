<?php

namespace Webshop\Http\Controllers;

use Log;
use App;
use Webshop\VraagAntwoord;
use Webshop\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
	    $faqs = array();
		
		//Get application language
		$lang = App::getLocale();
		
	    //Get faqs by language
	    try {
	    	$faqs = VraagAntwoord::where('taal', strtoupper($lang))->get();
	    } catch (\Exception $exception) {
			Log::error('Cannot receive faq from database. Exception:'.$exception);
		}
	    
        return view('faq.index', [
			'title' => trans('faq.indextitle') . ' - ' . config('webshop.Webshopname'),
			'faqs' => $faqs]
		);
    }
}