<?php

namespace Webshop\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(Request $request)
    {
	    //Check if is logged in
		if ($request->session()->has('isAuthenticated')) {
			$isAuthenticated = $request->session()->get('isAuthenticated');
			if($isAuthenticated === false) {
				Log::info('Unauthorized admin page request');
				return redirect('/');
			}
		} else {
			Log::info('Unauthorized admin page request');
			return redirect('/');
		}
		
		return view('admin.index', [
			'title' => trans('cart.indextitle') . ' - ' . config('webshop.Webshopname')]
		);
    }
}