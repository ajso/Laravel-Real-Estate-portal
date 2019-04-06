<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';

    protected $fillable = ['name','image_name'];

 
	
	 public $timestamps = false;
    
}
