<?php

namespace Webshop\Http\Controllers;

use Log;
use Validator;
use Webshop\Product;
use Webshop\BestellingProduct;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;
use Excel;

class ProductManageController extends Controller
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
		
	    $products = array();
	    
	    try {
	    	//Get all products
	    	$products = Product::all();
	    } catch (\Exception $exception) {
			Log::error('Cannot receive products from database. Exception:'.$exception);
		}
	    
        return view('productmanage.index', [
			'title' => trans('productmanage.indextitle') . ' - ' . config('webshop.Webshopname'), 
			'products' => $products]
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
		
        return view('productmanage.add', [
			'title' => trans('productmanage.addtitle') . ' - ' . config('webshop.Webshopname')]
		);
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
			'name' => 'required',
			'brand' => 'required',
			'omschrijving' => 'required',
			'description' => 'required',
			'colour' => 'required',
			'type' => 'required',
			'capacity' => 'required|numeric',
			'btw' => 'required|numeric',
			'price' => 'required|numeric',
			'stock' => 'required|numeric',
			'image' => 'required|image|mimes:jpeg,png',
		];

		//Validator
		$validator = Validator::make($request->all(), $rules);

		//Check if form is valid
		if ($validator->passes()) {
			try {
				//Create new product object to add to the database
				$product = new Product();
				$product->naam = $request->input('name');
				$product->merk = $request->input('brand');
				$product->omschrijving = $request->input('omschrijving');
				$product->description = $request->input('description');
				$product->kleur = $request->input('colour');
				$product->type = $request->input('type');
				$product->capaciteit = $request->input('capacity');
				$product->BTW = $request->input('btw');
				$product->prijs = $request->input('price');
				$product->voorraad = $request->input('stock');
				
				//Get image from form
				$image = $request->file('image');
				
				$fileName = date('YmdHis') . "-imageUpload-" . $image->getClientOriginalName();
				$destinationPath = "imageUpload/";
				
				$product->afbeelding = $fileName;
				
				//Move image from temp to website public folder
				if($image->move($destinationPath, $fileName))
				{
					//Add new product to database
					if($product->save()){
						return redirect('/admin/products')->with('successmessage', trans('productmanage.productadded'));
					} else {
						return redirect('admin/product/add')->with('errormessage', trans('productmanage.error'))->withInput();
					}
				} else {
					return redirect('admin/product/add')->with('errormessage', trans('productmanage.error'))->withInput();
				}
			} catch (\Exception $exception) {
				Log::error('Cannot add product. Exception:'.$exception);
			}
		} else {
			//Validation failed and set client back to form with validation errors and input
			return redirect('admin/product/add')->withErrors($validator)->withInput();
		}
    }
	
	public function edit(Request $request, $id)
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
		
	    $product = new Product();
	    
	    try {
	    	$product = Product::find($id);
	    } catch (\Exception $exception) {
	    	//Get specific product
			Log::error('Cannot receive product from database. Exception:'.$exception);
		}
	    
        return view('productmanage.edit', [
			'title' => trans('productmanage.edittitle') . ' - ' . config('webshop.Webshopname'), 
			'product' => $product]
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
			'id' => 'required',
			'name' => 'required',
			'brand' => 'required',
			'omschrijving' => 'required',
			'description' => 'required',
			'colour' => 'required',
			'type' => 'required',
			'capacity' => 'required',
			'btw' => 'required',
			'price' => 'required',
			'stock' => 'required',
			'image' => 'image|mimes:jpeg,png',
		];

		//Validator
		$validator = Validator::make($request->all(), $rules);

		//Check if form is valid
		if ($validator->passes()) {
			try {
				//Get existing product object from database to edit
				$product = Product::find($request->input('id'));
				$product->naam = $request->input('name');
				$product->merk = $request->input('brand');
				$product->omschrijving = $request->input('omschrijving');
				$product->description = $request->input('description');
				$product->kleur = $request->input('colour');
				$product->type = $request->input('type');
				$product->capaciteit = $request->input('capacity');
				$product->BTW = $request->input('btw');
				$product->prijs = $request->input('price');
				$product->voorraad = $request->input('stock');
				
				//Check is an image has uploaded
				if($request->file('image') != null) {
					//Get image from form
					$image = $request->file('image');
					
					$fileName = date('YmdHis') . "-imageUpload-" . $image->getClientOriginalName();
					$destinationPath = "imageUpload/";
					
					$product->afbeelding = $fileName;
					
					//Move image from temp to website public folder
					if($image->move($destinationPath, $fileName))
					{
						//Save changes to database
						if($product->save()){
							return redirect('/admin/products')->with('successmessage', trans('productmanage.productupdated'));
						} else {
							return redirect('admin/product/'.$request->input('id'))->with('errormessage', trans('productmanage.error'))->withInput();
						}
					} else {
						return redirect('admin/product/'.$request->input('id'))->with('errormessage', trans('productmanage.error'))->withInput();
					}	
				} else {
					//Save changes to database
					if($product->save()){
						return redirect('/admin/products')->with('successmessage', trans('productmanage.productupdated'));
					} else {
						return redirect('admin/product/'.$request->input('id'))->with('errormessage', trans('productmanage.error'))->withInput();
					}
				}		
			} catch (\Exception $exception) {
				Log::error('Cannot update product. Exception:'.$exception);
			}
		} else {
			//Validation failed and set client back to form with validation errors and input
			return redirect('admin/product/'.$request->input('id'))->withErrors($validator)->withInput();
		}
    }
	
	public function upload(Request $request)
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
		
        return view('productmanage.upload', [
			'title' => trans('productmanage.indextitle') . ' - ' . config('webshop.Webshopname')]
		);
	}
	
	public function uploadPost(Request $request)
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
			'file' => 'required',
		];

		//Validator
		$validator = Validator::make($request->all(), $rules);

		//Check if form is valid
		if ($validator->passes())
		{
			try {
				//Get file from form
				$file = $request->file('file');
				
				$fileName = date('YmdHis') . "-productImport-" . $file->getClientOriginalName();
				$destinationPath = "productImport/";
				
				//Check file extension
				if($file->getClientOriginalExtension() == "csv")
				{
					//Move file from temp to website public folder
					if($file->move($destinationPath, $fileName))
					{
						//Load excel from upload
						Excel::load($destinationPath . $fileName, function($reader) {
							foreach($reader->get() as $value) {
								if($value->id != null){
									//Update existing products
									$product = Product::find($value->id);
									$product->naam = $value->naam;
									$product->merk = $value->merk;
									Log::debug($value);
									Log::debug($value->omschrijving);
									Log::debug($value->description);
									$product->omschrijving = $value->omschrijving;
									$product->description = $value->description;
									$product->kleur = $value->kleur;
									$product->type = $value->type;
									$product->capaciteit = $value->capaciteit;
									$product->BTW = $value->btw;
									$product->prijs = $value->prijs;
									$product->voorraad = $value->voorraad;
									if($value->afbeelding != null){
										$product->afbeelding = $value->afbeelding;
									}
									$product->save();
									Log::info('Updated product from csv import');
								} else {
									//Add new products
									$product = new Product();
									$product->naam = $value->naam;
									$product->merk = $value->merk;
									$product->omschrijving = $value->omschrijving;
									$product->description = $value->description;
									$product->kleur = $value->kleur;
									$product->type = $value->type;
									$product->capaciteit = $value->capaciteit;
									$product->BTW = $value->btw;
									$product->prijs = $value->prijs;
									$product->voorraad = $value->voorraad;
									if($value->afbeelding != null){
										$product->afbeelding = $value->afbeelding;
									} else {
										$product->afbeelding = config('webshop.DefaultImage');
									}
									$product->save();
									Log::info('Created new product from csv import');
								}
							}
						});
						return redirect('/admin/products')->with('successmessage', trans('productmanage.productsupdated'));
					} else {
						return redirect('admin/product/upload')->with('errormessage', trans('productmanage.error'))->withInput();
					}
				} else {
					return redirect('admin/product/upload')->with('errormessage', trans('productmanage.filenotsupported'));
				}
			} catch (\Exception $exception) {
				Log::error('Cannot update products. Exception:'.$exception);
			}
		} else {
			//Validation failed and set client back to form with validation errors and input
			return redirect('admin/product/upload')->withErrors($validator)->withInput();
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
			//Check if product is used by any order
			$count = BestellingProduct::where('productId', $id)->count();
			
			if($count > 0)
			{
				return redirect('admin/products')->with('errormessage', trans('productmanage.productused'));
			} else {
				//Find product by id
				$product = Product::find($id);
				
				//Delete product record
				$product->delete();
				Log::info('Delete product id:' . $id);
			}
		} catch (\Exception $exception) {
			Log::error('Cannot product search from database. Exception:'.$exception);
		}
		
		return redirect('admin/products')->with('successmessage', trans('productmanage.productdel'));
	}
}