<?php

namespace Webshop\Http\Controllers;

use Log;
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
	    //Validate rules for form
	    $rules = [
			'name' => 'required',
			'email' => 'required|email',
			'subject' => 'required',
			'message' => 'required',
		];

		//Validator
		$validator = Validator::make($request->all(), $rules);

		//Check if form is valid
		if ($validator->passes()) {
			//Set data from form into array for mail data
			$data = ['name' => $request->input('name'),
	    	'email' => $request->input('email'),
	    	'subject' => $request->input('subject'),
	    	'comment' => $request->input('message')];
			
			//Mail message to webshop owner
			try {
		    	Mail::send('emails.contact', $data, function ($message) use ($data) {
			    	//Set from data
		            $message->from(config('webshop.Email'), config('webshop.Webshopname'));
		
					//Set to data
		            $message->to(config('webshop.Email'), config('webshop.Webshopname'))->subject(trans('contact.contact'));
		            Log::info('Sent contact mail to webshop owner');
		        });
			} catch (\Exception $exception) {
				Log::error('Cannot sent mail. Exception:'.$exception);
			}
			
			//Mail message to customer
			try {
				Mail::send('emails.contactconfirm', $data, function ($message) use ($data) {
					//Set from data
		            $message->from(config('webshop.Email'), config('webshop.Webshopname'));
		
					//Set to data
		            $message->to($data['email'], $data['name'])->subject(trans('contact.contactconfirm'));
		            Log::info('Sent contact mail to customer email:' . $data['email']);
		        });
	        } catch (\Exception $exception) {
				Log::error('Cannot sent mail. Exception:'.$exception);
			}
	    
	        return redirect('contact')->with('message', trans('contact.emailsend'));
		} else {
			//Validation failed and set client back to form with validation errors and input
			return redirect('contact')->withErrors($validator)->withInput();
		}
    }
}