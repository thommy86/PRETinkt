<?php

namespace Webshop\Http\Controllers;

use Log;
use Webshop\Zoekterm;
use Webshop\Http\Controllers\Controller;

class SearchManageController extends Controller
{
    public function index()
    {
	    //Get searches
		$searches = Zoekterm::all();
		
        return view('searchmanage.index', [
			'title' => trans('searchmanage.indextitle') . ' - ' . config('webshop.Webshopname'),
			'searches' => $searches]
		);
    }
	
	public function del($id)
	{
		//Find search by id
		$search = Zoekterm::find($id);
		
		//Delete search
		$search->delete();
		Log::info('Delete search id:' . $id);
		
		return redirect('admin/search')->with('message', trans('searchmanage.searchdel'));
	}
}