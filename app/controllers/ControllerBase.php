<?php
	
class ControllerBase extends Controller
{
	protected $config;
	
	public function ControllerBase(){
		$this->config = Configuratie::find(1);
	}
}