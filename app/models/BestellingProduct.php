<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class BestellingProduct extends Eloquent
{
    protected $table = 'bestellingproduct';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}