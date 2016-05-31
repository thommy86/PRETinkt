<?php

namespace Webshop\Http\Controllers;

use Webshop\VraagAntwoord;
use Webshop\Http\Controllers\Controller;

class FaqManageController extends Controller
{
    public function index()
    {
        return view('faqmanage.index', [
			'title' => trans('faqmanage.indextitle') . ' - ' . config('app.Webshopname')]
		);
    }
}