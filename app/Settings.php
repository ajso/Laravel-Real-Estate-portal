<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    protected $fillable = ['site_style','site_name', 'site_email', 'site_logo', 'site_favicon','site_description','site_header_code','site_footer_code','site_copyright','addthis_share_code','disqus_comment_code'];

 
	
	 public $timestamps = false;
    
}
