<?php

namespace Webshop\Http\Controllers;

use Webshop\VraagAntwoord;
use Webshop\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
	    $faq = VraagAntwoord::all();
        return view('faq.index', [
			'title' => trans('faq.indextitle') . ' - ' . config('app.Webshopname'),
			'faq' => $faq]
		);
    }
}