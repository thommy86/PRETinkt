<?php

namespace Webshop\Http\Controllers;

use Webshop\VraagAntwoord;
use Webshop\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
	    //Get all faqs
	    $faqs = VraagAntwoord::all();
	    
        return view('faq.index', [
			'title' => trans('faq.indextitle') . ' - ' . config('webshop.Webshopname'),
			'faqs' => $faqs]
		);
    }
}