<?php

namespace Webshop\Http\Controllers;

use Closure, Session;
use Webshop\Http\Controllers\Controller;

class LanguageController extends Controller
{
    /**
	 * Change language.
	 *
	 * @param  App\Jobs\ChangeLocaleCommand $changeLocale
	 * @param  String $lang
	 * @return Response
	 */
	public function index($lang)
	{		
		//Edit locale session with given lang
		Session::set('locale', $lang);
		
		return redirect()->back();
	}
}