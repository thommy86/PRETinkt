<?php

namespace Webshop\Http\Controllers;

use Webshop\Zoekterm;
use Webshop\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index', [
			'title' => trans('search.indextitle') . ' - ' . config('app.Webshopename')]
		);
    }
}