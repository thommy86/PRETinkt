<?php

namespace Webshop\Http\Controllers;

use Webshop\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index', [
			'title' => trans('contact.indextitle') . ' - ' . config('app.Webshopename')]
		);
    }
}