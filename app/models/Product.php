<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    protected $table = 'product';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}