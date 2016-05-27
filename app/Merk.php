<?php

namespace PRETinkt;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $table = 'merk';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}