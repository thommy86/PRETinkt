<?php

namespace Webshop;

use Illuminate\Database\Eloquent\Model;

class Beoordeling extends Model
{
    protected $table = 'beoordeling';

    protected $primaryKey = 'id';
    
	public $timestamps = false;
}