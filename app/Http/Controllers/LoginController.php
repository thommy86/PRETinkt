<?php

namespace Webshop\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index(Request $request)
    {
	    //Validate rules for form
		$rules = [
			'username' => 'required',
			'password' => 'required',
		];

		//Validator
		$validator = Validator::make($request->all(), $rules);

		//Check if form is valid
		if ($validator->passes()) {
			//Check if login data are known
			if(config('webshop.Username') == $request->input('username') && config('webshop.Password') == $request->input('password')){
				$request->session()->push('isAuthenticated', true);
				return redirect('admin')->with('successmessage', trans('login.success'));
			} else {
				return redirect()->back()->with('successmessage', trans('login.failed'));
			}
		} else {
			//Validation failed and set client back to form with validation errors and input
			return redirect()->back()->withErrors($validator)->withInput();
		}
    }
	
	public function off(Request $request)
    {
	    //Remove auth session
		$request->session()->forget('isAuthenticated');
		
		return redirect()->back()->with('successmessage', trans('login.logoff'));
	}
}