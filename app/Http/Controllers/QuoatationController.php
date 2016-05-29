<?php

namespace Webshop\Http\Controllers;

use Webshop\Http\Controllers\Controller;

class QuoatationController extends Controller
{
    public function index()
    {
        return view('quoatation.index', [
			'title' => trans('quoatation.indextitle') . ' - ' . config('app.Webshopname')]
		);
    }
}