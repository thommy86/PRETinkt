<?php

class Home extends Controller
{
	public function index()
	{
		$user = User::find(1);
		
		$this->view('home/index', ['user' => $user]);
	}
	
	public function test()
	{
		$user = User::find(2);
		
		$this->view('home/index', ['user' => $user]);
	}

	public function create($username = '', $email = ''){
		$user = new User();
		$user->username = 'newtest';
		$user->email = 'newtestemail';
		
		$user->save();
	}
}