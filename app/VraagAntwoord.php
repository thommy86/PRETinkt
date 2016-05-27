<?php

namespace PRETinkt;

use Illuminate\Database\Eloquent\Model;

class VraagAntwoord extends Model
{
    protected $table = 'vraagantwoord';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}