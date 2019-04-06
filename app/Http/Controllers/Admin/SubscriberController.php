<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Subscriber;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;

class SubscriberController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }
    public function subscriberlist()
    {  
    	$subscriberlist = Subscriber::orderBy('id')->get();
		  
        return view('admin.pages.subscriber',compact('subscriberlist'));
    } 
	 
    
    public function delete($id)
    {
    	
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
    		
        $subscriber = Subscriber::findOrFail($id);
         
		 
		$subscriber->delete();
		
        \Session::flash('flash_message', 'Deleted');

        return redirect()->back();

    }
      
    	
}
