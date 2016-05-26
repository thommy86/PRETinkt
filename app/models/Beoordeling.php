<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Beoordeling extends Eloquent
{
    protected $table = 'beoordeling';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}