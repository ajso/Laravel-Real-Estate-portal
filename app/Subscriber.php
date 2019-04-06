<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $table = 'subscriber';

    protected $fillable = ['email','ip'];
 
	
	 public $timestamps = false;
    
}
