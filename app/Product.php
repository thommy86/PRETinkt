<?php

namespace Webshop;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}