<?php

namespace Webshop\Http\Controllers;

use Webshop\Http\Controllers\Controller;

class ShippingController extends Controller
{
    public function index()
    {
        return view('shipping.index', [
			'title' => trans('shipping.indextitle') . ' - ' . config('app.Webshopname')]
		);
    }
}