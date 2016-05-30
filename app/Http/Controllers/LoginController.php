<?php

namespace Webshop\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index(Request $request)
    {
		$rules = [
			'username' => 'required',
			'password' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->passes()) {
			if(config('app.Username') == $request->input('username') && config('app.Password') == $request->input('password')){
				$request->session()->push('isAuthenticated', true);
				return redirect()->back()->with('message', trans('login.success'));
			} else {
				return redirect()->back()->with('message', trans('login.failed'));
			}
		} else {
			return redirect('contact')->withErrors($validator)->withInput();
		}
    }
	
	public function off(Request $request)
    {
		$request->session()->forget('isAuthenticated');
		
		return redirect()->back()->with('message', trans('login.logoff'));
	}
}