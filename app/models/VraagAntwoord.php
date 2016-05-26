<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class VraagAntwoord extends Eloquent
{
    protected $table = 'vraagantwoord';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}