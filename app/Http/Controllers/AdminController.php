<?php

namespace Webshop\Http\Controllers;

use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(Request $request)
    {
		if ($request->session()->has('isAuthenticated')) {
			$isAuthenticated = $request->session()->get('isAuthenticated');
			if($isAuthenticated === false) {
				return redirect('/');
			}
		} else {
			return redirect('/');
		}
		
		return view('admin.index', [
			'title' => trans('cart.indextitle') . ' - ' . config('app.Webshopname')]
		);
    }
}