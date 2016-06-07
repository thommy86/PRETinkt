<?php

namespace Webshop\Http\Controllers;

use Log;
use Validator;
use Webshop\VraagAntwoord;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class FaqManageController extends Controller
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
		
	    //Get all faqs
	    try {
	    	$faqs = VraagAntwoord::all();
	    } catch (\Exception $exception) {
			Log::error('Cannot receive faq from database. Exception:'.$exception);
		}
	    
        return view('faqmanage.index', [
			'title' => trans('faqmanage.indextitle') . ' - ' . config('webshop.Webshopname'),
			'faqs' => $faqs]
		);
    }
	
	public function add(Request $request)
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

		return view('faqmanage.add', [
		'title' => trans('faqmanage.addtitle') . ' - ' . config('webshop.Webshopname')]);
	}

	public function submit(Request $request)
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
		
		//Validate rules for form
		$rules = [
			'vraag' => 'Required',
			'antwoord' => 'Required',
			'taal' => 'Required'
		];

		//Validator
		$validator = Validator::make($request->all(), $rules);

		//Check if form is valid
		if ($validator->passes()) {
			
			//If there no faq found set record in database
				try {
					$faq = new VraagAntwoord();
					$faq->vraag = $request->input('vraag');
					$faq->antwoord = $request->input('antwoord');			
					$faq->taal = $request->input('taal');			
					$faq->save();
					Log::info('Added question to database id:' . $faq->id);	
				} catch (\Exception $exception) {
					Log::error('Cannot add question into database. Exception:'.$exception);
				}

			return redirect('admin/faq');
		}
		else {
			//Validation failed and set client back to form with validation errors and input
			return redirect('admin/faq/add')->withErrors($validator)->withInput();
		}
	}
	
	public function del(Request $request, $id)
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
		
		try{
			//Find search by id
			$faq = VraagAntwoord::find($id);
			
			//Delete search
			$faq->delete();
			Log::info('Delete faq id:' . $id);
		} catch (\Exception $exception) {
			Log::error('Cannot delete faq from database. Exception:'.$exception);
		}
		
		return redirect('admin/faq')->with('successmessage', trans('faqmanage.faqdel'));
	}
}