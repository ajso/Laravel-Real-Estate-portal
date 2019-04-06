<?php

namespace App\Http\Controllers;

use App\User;
use App\Properties;
use App\Testimonials;
use App\Subscriber;
use App\Partners;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
	 

    public function index()
    {  
    	if(!$this->alreadyInstalled()) {
            return redirect('install');
        }
    
		$propertieslist = Properties::orderBy('id', 'desc')->take(8)->get();
		
		$testimonials = Testimonials::orderBy('id', 'desc')->get();
		
		$partners = Partners::orderBy('id', 'desc')->get();
							   
        return view('pages.index',compact('propertieslist','testimonials','partners'));
    }
    
    public function subscribe(Request $request)
    {
    	
    	$data =  \Input::except(array('_token')) ;
	    
	    $inputs = $request->all();
	    
	    $rule=array(
		        'email' => 'required|email|max:75' 
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                echo '<p style="color: #db2424;font-size: 20px;">The email field is required.</p>';
                exit;
        } 
    	
    	$subscriber = new Subscriber;
    	 
    	$subscriber->email = $inputs['email'];
    	$subscriber->ip = $_SERVER['REMOTE_ADDR'];
		  
		 
	    $subscriber->save();
	    
	    echo '<p style="color: #189e26;font-size: 20px;">Successfully subscribe</p>';
        exit;
    	 
    }
	
	/**
     * If application is already installed.
     *
     * @return bool
     */
    public function alreadyInstalled()
    {
        return file_exists(storage_path('installed'));
    }

}
