<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Bestelling extends Eloquent
{
    protected $table = 'bestelling';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}