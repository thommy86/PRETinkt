<?php

namespace Webshop\Http\Controllers;

use Log;
use App;
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

		//Get application language
		$lang = App::getLocale();
		
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
			'title' => trans('faqmanage.addtitle') . ' - ' . config('webshop.Webshopname'),
			'lang' => $lang]	
		);
    }
	
	public function edit(Request $request, $id)
    {
		
		//Get application language
		$lang = App::getLocale();
		
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
		
	    $faqs = new VraagAntwoord();
	    
	    try {
	    	$faqs = VraagAntwoord::find($id);
	    } catch (\Exception $exception) {
	    	//Get specific product
			Log::error('Cannot receive product from database. Exception:'.$exception);
		}
	    
        return view('faqmanage.edit', [
			'title' => trans('faqmanage.edittitle') . ' - ' . config('webshop.Webshopname'), 
			'faq' => $faqs]
		);
    }	
	
	public function editPost(Request $request)
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
			'id' => 'Required',
			'vraag' => 'Required',
			'antwoord' => 'Required',
			'taal' => 'Required'
		];

		//Validator
		$validator = Validator::make($request->all(), $rules);

		//Check if form is valid
		if ($validator->passes()) {
			try {
				//Get existing faq object from database to edit
				$faq = VraagAntwoord::find($request->input('id'));
				$faq->vraag = $request->input('vraag');
				$faq->antwoord = $request->input('antwoord');			
				$faq->taal = $request->input('taal');	
				
				//Save changes to database
				if($faq->save()){
					return redirect('/admin/faq')->with('successmessage', trans('faqmanage.productupdated'));
				} else {
					return redirect('admin/faq/'.$request->input('id'))->with('errormessage', trans('faqmanage.error'))->withInput();
				}
			} catch (\Exception $exception) {
				Log::error('Cannot update product. Exception:'.$exception);
			}
		} else {
			//Validation failed and set client back to form with validation errors and input
			return redirect('admin/faq/'.$request->input('id'))->withErrors($validator)->withInput();
		}
    }	

	public function addPost(Request $request)
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

			return redirect('admin/faq')->with('successmessage', trans('faqmanage.faqadded'));
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