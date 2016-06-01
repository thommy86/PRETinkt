<?php

namespace Webshop\Http\Controllers;

use Webshop\Zoekterm;
use Webshop\Http\Controllers\Controller;

class SearchManageController extends Controller
{
    public function index()
    {
		$searches = Zoekterm::all();
        return view('searchmanage.index', [
			'title' => trans('searchmanage.indextitle') . ' - ' . config('webshop.Webshopname'),
			'searches' => $searches]
		);
    }
	
	public function del($id)
	{
		$search = Zoekterm::find($id);
		
		$search->delete();
		
		return redirect('admin/search')->with('message', trans('searchmanage.searchdel'));
	}
}