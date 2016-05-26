<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Merk extends Eloquent
{
    protected $table = 'merk';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}