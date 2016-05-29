<?php

namespace Webshop\Http\Controllers;

use Webshop\Zoekterm;
use Webshop\Http\Controllers\Controller;

class SearchManageController extends Controller
{
    public function index()
    {
        return view('searchmanage.index', [
			'title' => trans('searchmanage.indextitle') . ' - ' . config('app.Webshopname')]
		);
    }
}