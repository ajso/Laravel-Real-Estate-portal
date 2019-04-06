<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Properties;
use App\Enquire;
use App\Partners;
use App\Subscriber;
use App\Testimonials;

use App\Http\Requests;
use Illuminate\Http\Request;


class DashboardController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
         
    }
    public function index()
    { 
    	if(Auth::user()->usertype=='Admin')
    	{
			$properties_count = Properties::count();
	    	
	    	$featured_properties = Properties::where('featured_property', '1')->count(); 
	    	$inquiries = Enquire::count();
	    	
	    	$agents = User::where('usertype', 'Agents')->count();
	    	
	    	$testimonials = Testimonials::count();
	    	
	    	$subscriber = Subscriber::count();
	    	
	    	$partners = Partners::count();
		}
		else
		{
			$user_id=Auth::user()->id; 
	    	 
	    	$properties_count = Properties::where(['user_id' => $user_id])->count();
	    	
	    	$publish_properties = Properties::where(['user_id' => $user_id,'status' => '1'])->count();
	    	
	    	$unpublish_properties = Properties::where(['user_id' => $user_id,'status' => '0'])->count(); 
	    	
	    	$inquiries = Enquire::where(['agent_id' => $user_id])->count();
			
		}
    	
    	
        return view('admin.pages.dashboard',compact('properties_count','featured_properties','inquiries','agents','testimonials','subscriber','partners','publish_properties','unpublish_properties'));
    }
	
	 
    	
}
