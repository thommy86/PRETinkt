<?php

namespace Webshop\Http\Controllers;

use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index', [
			'title' => trans('contact.indextitle') . ' - ' . config('app.Webshopname')]
		);
    }
    
    public function post(Request $request)
    {
	    $rules = array(
			'name' => 'Required',
			'email' => 'Required',
			'subject' => 'Required',
			'message' => 'Required',
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->passes()) {
			$data = ['name' => $request->input('name'),
	    	'email' => $request->input('email'),
	    	'subject' => $request->input('subject'),
	    	'message' => $request->input('message')];
			
	    	Mail::send('emails.contact', $data, function ($message) use ($data) {
	            $m->from(config('app.email'), config('app.Webshopname'));
	
	            $m->to($data['email'], $data['name'])->subject(trans('contact.contact'));
	        });
	    
	        return view('contact.index', [
				'title' => trans('contact.indextitle') . ' - ' . config('app.Webshopname')]
			)->with('message', array('success', 'Succes', trans('contact.emailsend')));
		}
		else {
			$request->flash();
			return Redirect::to('contact.index')->withErrors($validator);
		}
    }
}