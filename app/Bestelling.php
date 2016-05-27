<?php

namespace PRETinkt;

use Illuminate\Database\Eloquent\Model;

class Bestelling extends Model
{
    protected $table = 'bestelling';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}