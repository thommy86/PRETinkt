<?php

namespace Webshop\Http\Controllers;

use Log;
use Validator;
use Webshop\VraagAntwoord;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class FaqManageController extends Controller
{
    public function index()
    {
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
	
		public function add()
		{

			return view('faqmanage.add', [
			'title' => trans('faqmanage.addtitle') . ' - ' . config('webshop.Webshopname')]);
		}
	
		public function submit(Request $request)
	    {
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
	
	public function del($id)
	{
		
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