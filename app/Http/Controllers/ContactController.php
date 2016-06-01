<?php

namespace Webshop\Http\Controllers;

use Mail;
use Validator;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index', [
			'title' => trans('contact.indextitle') . ' - ' . config('webshop.Webshopname')]
		);
    }
    
    public function post(Request $request)
    {
	    $rules = [
			'name' => 'required',
			'email' => 'required|email',
			'subject' => 'required',
			'message' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->passes()) {
			$data = ['name' => $request->input('name'),
	    	'email' => $request->input('email'),
	    	'subject' => $request->input('subject'),
	    	'comment' => $request->input('message')];
			
	    	Mail::send('emails.contact', $data, function ($message) use ($data) {
	            $message->from(config('webshop.Email'), config('webshop.Webshopname'));
	
	            $message->to(config('webshop.Email'), config('webshop.Webshopname'))->subject(trans('contact.contact'));
	        });
			
			Mail::send('emails.contactconfirm', $data, function ($message) use ($data) {
	            $message->from(config('webshop.Email'), config('webshop.Webshopname'));
	
	            $message->to($data['email'], $data['name'])->subject(trans('contact.contactconfirm'));
	        });
	    
	        return redirect('contact')->with('message', trans('contact.emailsend'));
		}
		else {
			return redirect('contact')->withErrors($validator)->withInput();
		}
    }
}