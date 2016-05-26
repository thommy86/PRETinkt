<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Zoekterm extends Eloquent
{
    protected $table = 'zoekterm';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}