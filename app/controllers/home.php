<?php

class Home extends Controller
{
	public function index()
	{
		$product = Product::find(1);
		
		$this->view('home/index', ['product' => $product]);
	}
	
	public function test()
	{
		$product = Product::find(2);
		
		$this->view('home/index', ['product' => $product]);
	}

	public function create($username = '', $email = ''){
		$user = new User();
		$user->username = 'newtest';
		$user->email = 'newtestemail';
		
		$user->save();
	}
}