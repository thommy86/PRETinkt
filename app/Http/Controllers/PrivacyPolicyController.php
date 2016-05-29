<?php

namespace Webshop\Http\Controllers;

use Webshop\Http\Controllers\Controller;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        return view('privacypolicy.index', [
			'title' => trans('privacypolicy.indextitle') . ' - ' . config('app.Webshopname')]
		);
    }
}