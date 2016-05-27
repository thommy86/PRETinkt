<?php

namespace PRETinkt;

use Illuminate\Database\Eloquent\Model;

class BestellingProduct extends Model
{
    protected $table = 'bestellingproduct';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}