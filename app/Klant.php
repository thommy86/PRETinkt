<?php

namespace PRETinkt;

use Illuminate\Database\Eloquent\Model;

class Klant extends Model
{
    protected $table = 'klant';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}