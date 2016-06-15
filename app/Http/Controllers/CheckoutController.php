<?php

namespace Webshop\Http\Controllers;

use Log;
use Validator;
use Mail;
use Webshop\Product;
use Webshop\Klant;
use Webshop\Bestelling;
use Webshop\BestellingProduct;
use Illuminate\Http\Request;
use Webshop\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
		$products = array();
		
		//Default shipping
		$shipping = config('webshop.Shipping1');
		
		//Check if cart session exist
		if ($request->session()->has('cartproducts')) {
			//Get product ids from cart session
			$productIds = array_keys($request->session()->get('cartproducts'));
			
			if(count($productIds) == 0) {
				return redirect('/');
			}
			
			if(count($productIds) > 0){
				//Get products from database by product ids from the cart
				try {
					$products = Product::findMany($productIds);
				} catch (\Exception $exception) {
					Log::error('Cannot receive products from database. Exception:'.$exception);
				}
			}
			
			foreach($products as $product){
				//Get quantity of products from cart
				$product->quantity = $request->session()->get('cartproducts')[$product->id];
			}
		} else {
			return redirect('/');
		}
		
		//Check if region session exist
		if ($request->session()->has('region')) {
			//Get region from cart session
			$region = $request->session()->get('region');
			switch($region){
				case 1:
					$shipping = config('webshop.Shipping1');
				break;
				case 2:
					$shipping = config('webshop.Shipping2');
				break;
			}
		}
		
        return view('checkout.index', [
			'title' => trans('checkout.indextitle') . ' - ' . config('webshop.Webshopname'), 
			'products' => $products,
			'shipping' => $shipping]
		);
    }
    
    public function post(Request $request)
    {
		//Check if customer has a cart and region selected
		if ($request->session()->has('cartproducts') == false) {
			return redirect('/');
		}
		
		if ($request->session()->has('region') == false) {
			return redirect('/');
		}
		
	    //Validate rules for form
	    $rules = [
			'firstname' => 'required',
			'lastname' => 'required',
			'street' => 'required',
			'number' => 'required',
			'city' => 'required',
			'zip' => 'required',
			'country' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
			'birthday' => 'required|date',
		];

		//Validator
		$validator = Validator::make($request->all(), $rules);

		//Check if form is valid
		if ($validator->passes()) {
			try {
				//Create new customer object
				$klant = new Klant();
				$klant->voornaam = $request->input('firstname');
				$klant->tussenvoegsel = $request->input('prefix');
				$klant->achternaam = $request->input('lastname');
				$klant->straat = $request->input('street');
				$klant->huisnummer = $request->input('number');
				$klant->toevoeging = $request->input('number');
				$klant->plaats = $request->input('city');
				$klant->postcode = $request->input('zip');
				$klant->land = $request->input('country');
				$klant->email = $request->input('email');
				$klant->telefoon = $request->input('phone');
				$klant->geboortedatum = $request->input('birthday');
				
				//Save new customer
				if($klant->save()){
					//Create new order object
					$bestelling = new Bestelling();
					$bestelling->klantId = $klant->id;
					$bestelling->datumtijd = date('Y-m-d H:i:s');
					//Get region from cart session
					$region = $request->session()->get('region');
					switch($region){
						case 1:
							$bestelling->regio = "EU";
							$bestelling->verzendkosten = config('webshop.Shipping1');
						break;
						case 2:
							$bestelling->regio = "World";
							$bestelling->verzendkosten = config('webshop.Shipping2');
						break;
					}
					$bestelling->verzendwijze = $request->input('sent_method');
					//Set status to ordered
					$bestelling->status = 1;
					//Save order to database
					if($bestelling->save()){
						//Get product ids from cart session
						$productIds = array_keys($request->session()->get('cartproducts'));
						
						//Get products from database by product ids from the cart
						$products = Product::findMany($productIds);
						
						//Add productorders to order
						foreach($products as $product){
							$bestellingProduct = new BestellingProduct();
							$bestellingProduct->bestellingId = $bestelling->id;
							$bestellingProduct->productId = $product->id;
							//Get quantity of products from cart
							$bestellingProduct->aantal = $request->session()->get('cartproducts')[$product->id];
							$bestellingProduct->BTW = $product->BTW;
							$bestellingProduct->prijs = $product->prijs;
							$bestellingProduct->save();
						}
							
						//Set order mail data
						$data = ['name' => $request->input('firstname') . " " . $request->input('prefix') . " " . $request->input('lastname'),
						'email' => $request->input('email'),
						'subject' => trans('checkout.order'),
						'baseUrl' => config('app.url'),
						'sentMethod' => $request->input('sent_method'),
						'products' => $products,
						'paylink' => 'cart/checkout/pay/' . $bestelling->id . '/' . $request->input('payment_method')];	
						
						//Sent order mail to customer
						Mail::send('emails.order', $data, function ($message) use ($data) {
							//Set from data
							$message->from(config('webshop.Email'), config('webshop.Webshopname'));
				
							//Set to data
							$message->to($data['email'], $data['name'])->subject(trans('checkout.order'));
							Log::info('Sent order mail to customer email:' . $data['email']);
						});
					} else {
						return redirect('/cart/checkout')->with('errormessage', trans('checkout.error'))->withInput();
					}
				}
				
				//Empty cart
				$request->session()->forget('cartproducts');
				
				return redirect('/cart/checkout/pay/' . $bestelling->id . '/' . $request->input('payment_method'))->with('successmessage', trans('checkout.success'));			
	        } catch (\Exception $exception) {
				Log::error('Cannot add order. Exception:'.$exception);
			}
	    } else {
			//Validation failed and set client back to form with validation errors and input
			return redirect('cart/checkout')->withErrors($validator)->withInput();
		}
    }
	
	public function pay(Request $request, $id, $type)
    {
		//Get order
		$bestelling = Bestelling::find($id);
		
		//Check if order already has been payed
		if($bestelling->status == 2){
			return redirect('/')->with('infomessage', trans('checkout.alreadycomplete'));
		}
		
		return view('checkout.pay', [
			'title' => trans('checkout.paytitle') . ' - ' . config('webshop.Webshopname'),
			'bestelling' => $bestelling]
		);
	}
	
	public function payPost(Request $request)
    {
		//Validate rules for form
	    $rules = [
			'id' => 'required',
		];

		//Validator
		$validator = Validator::make($request->all(), $rules);

		//Check if form is valid
		if ($validator->passes()) {
			//Get order from database
			$bestelling = Bestelling::find($request->input('id'));
			
			//Set status to payed
			$bestelling->status = 2;
			
			//Save changes
			$bestelling->save();
			
			return redirect('/')->with('successmessage', trans('checkout.complete'));
		} else {
			//Validation failed and set client back to form with validation errors and input
			return redirect('/')->withErrors($validator)->withInput();
		}
	}
}