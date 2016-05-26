<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Configuratie extends Eloquent
{
    protected $table = 'configuratie';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}