<?php

namespace Webshop\Http\Controllers;

use Log;
use Webshop\Zoekterm;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class SearchManageController extends Controller
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
			$search = Zoekterm::find($id);
			
			//Delete search record
			$search->delete();
			Log::info('Delete search id:' . $id);
		} catch (\Exception $exception) {
			Log::error('Cannot delete search from database. Exception:'.$exception);
		}
		
		return redirect('admin/search')->with('successmessage', trans('searchmanage.searchdel'));
	}
}