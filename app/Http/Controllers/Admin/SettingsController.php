<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Settings;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 

class SettingsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
         
    }
    public function settings()
    { 
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        
        $settings = Settings::findOrFail('1');
        
        return view('admin.pages.settings',compact('settings'));
    }	 
    
    public function settingsUpdates(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	    $rule=array(
		        'site_name' => 'required',
		        'site_email' => 'required'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
	    

	    $inputs = $request->all();
		
		$icon = $request->file('site_logo');
		
		$icon_favicon = $request->file('site_favicon');
		 
		//Logo
		 
        if($icon){
            
            $icon->move(public_path().'/upload/', 'logo.png');
             
            $settings->site_logo = 'logo.png';
             
        }       
        
        //Favicon
        if($icon_favicon){
        	
        	$icon_favicon->move(public_path().'/upload/', 'favicon.png');
             
            $settings->site_favicon = 'favicon.png';
             
        }
       
		$settings->site_style = $inputs['site_style'];
		$settings->site_name = $inputs['site_name']; 
		$settings->site_email = $inputs['site_email'];
		$settings->site_description = $inputs['site_description'];
		$settings->site_copyright = $inputs['site_copyright'];
		$settings->footer_widget1 = $inputs['footer_widget1'];
		$settings->footer_widget2 = $inputs['footer_widget2'];
		$settings->footer_widget3 = $inputs['footer_widget3'];
		
		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function addthisdisqus(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		 
		 
		$settings->disqus_comment_code = $inputs['disqus_comment_code'];
		 		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function headfootupdate(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		
		 
		$settings->site_header_code = $inputs['site_header_code']; 
		$settings->site_footer_code = $inputs['site_footer_code'];
		 
		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    } 
    	
}
