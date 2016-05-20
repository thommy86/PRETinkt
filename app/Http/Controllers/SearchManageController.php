<?php

namespace Webshop\Http\Controllers;

use Log;
use Webshop\Zoekterm;
use Webshop\Http\Controllers\Controller;

class SearchManageController extends Controller
{
    public function index()
    {
	    $search = array();
	    
	    try{
		    //Get searches
			$searches = Zoekterm::all(); 
		} catch (\Exception $exception) {
			Log::error('Cannot receive searches from database. Exception:'.$exception);
		}
		
        return view('searchmanage.index', [
			'title' => trans('searchmanage.indextitle') . ' - ' . config('webshop.Webshopname'),
			'searches' => $searches]
		);
    }
	
	public function del($id)
	{
		try{
			//Find search by id
			$search = Zoekterm::find($id);
			
			//Delete search
			$search->delete();
			Log::info('Delete search id:' . $id);
		} catch (\Exception $exception) {
			Log::error('Cannot delete search from database. Exception:'.$exception);
		}
		
		return redirect('admin/search')->with('successmessage', trans('searchmanage.searchdel'));
	}
}