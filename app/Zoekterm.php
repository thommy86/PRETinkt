<?php

namespace PRETinkt;

use Illuminate\Database\Eloquent\Model;

class Zoekterm extends Model
{
    protected $table = 'zoekterm';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}