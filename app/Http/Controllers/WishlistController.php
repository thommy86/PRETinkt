<?php

namespace Webshop\Http\Controllers;

use Webshop\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index()
    {
        return view('wishlist.index', [
			'title' => trans('quoatation.indextitle') . ' - ' . config('app.Webshopename')]
		);
    }
}