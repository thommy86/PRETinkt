<?php

namespace Webshop\Http\Controllers;

use Webshop\Product;
use Webshop\Merk;
use Webshop\Klant;
use Webshop\Bestelling;
use Webshop\BestellingProduct;
use Webshop\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index', [
			'title' => trans('checkout.indextitle') . ' - ' . config('app.Webshopename')]
		);
    }
}