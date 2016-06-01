<?php

namespace Webshop\Http\Controllers;

use Mail;
use Validator;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class QuoatationController extends Controller
{
    public function index()
    {
        return view('quoatation.index', [
			'title' => trans('quoatation.indextitle') . ' - ' . config('webshop.Webshopname')]
		);
    }
    
    public function post(Request $request)
    {
	    $rules = [
			'name' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
			'message' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->passes()) {
			$data = ['name' => $request->input('name'),
	    	'email' => $request->input('email'),
	    	'phone' => $request->input('phone'),
	    	'comment' => $request->input('message')];
			
	    	Mail::send('emails.quoatation', $data, function ($message) use ($data) {
	            $message->from(config('webshop.Email'), config('webshop.Webshopname'));
	
	            $message->to(config('webshop.Email'), config('webshop.Webshopname'))->subject(trans('quoatation.quoatation'));
	        });
			
			Mail::send('emails.quoatationconfirm', $data, function ($message) use ($data) {
	            $message->from(config('webshop.Email'), config('webshop.Webshopname'));
	
	            $message->to($data['email'], $data['name'])->subject(trans('quoatation.quoatationconfirm'));
	        });
	    
	        return redirect('quoatation')->with('message', trans('quoatation.emailsend'));
		}
		else {
			return redirect('quoatation')->withErrors($validator)->withInput();
		}
    }
}