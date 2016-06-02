<?php

namespace Webshop\Http\Controllers;

use Log;
use Webshop\VraagAntwoord;
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
	
		public function submit()
		{
			
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