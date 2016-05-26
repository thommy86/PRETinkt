<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Klant extends Eloquent
{
    protected $table = 'klant';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}