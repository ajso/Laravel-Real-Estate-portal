<?php

namespace App\Http\Controllers;

use App\User;
use App\Properties;
use App\Enquire;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PropertiesController extends Controller
{
	 
    public function index()
    {  
    	$properties = Properties::where('status','1')->orderBy('id', 'desc')->paginate(9); 
    	 			    
        return view('pages.properties',compact('properties'));
    }
    
    public function featuredproperties()
    {  
    	$properties = Properties::where('featured_property','1')->orderBy('id', 'desc')->paginate(9);;
    	 			    
        return view('pages.featuredproperties',compact('properties'));
    }
    
    public function saleproperties()
    {  
    	$properties = Properties::where('property_purpose','Sale')->orderBy('id', 'desc')->paginate(9);;
    	 			    
        return view('pages.saleproperties',compact('properties'));
    }
    
    public function rentproperties()
    {  
    	$properties = Properties::where('property_purpose','Rent')->orderBy('id', 'desc')->paginate(9);;
    	 			    
        return view('pages.rentproperties',compact('properties'));
    }
    
      
    public function propertiesbytype($slug)
    {  
    	$properties = Properties::where('property_type',$slug)->orderBy('id', 'desc')->paginate(1);
    	
    	if(!$properties){
            abort('404');
        }
    	
    	$type=$slug;
    	 			    
        return view('pages.propertiesbytype',compact('properties','type'));
    }
    
    public function propertysingle($slug)
    {  
    	$property = Properties::where("property_slug", $slug)->first();
    	
    	if(!$property){
            abort('404');
        }
    	
    	$agent = User::findOrFail($property->user_id);
    	 			    
        return view('pages.propertysingle',compact('property','agent'));
    }
	
	public function agentscontact(Request $request)
    {
    	
    	$data =  \Input::except(array('_token')) ;
	    
	    $inputs = $request->all();
	    
	    $rule=array(
		        'name' => 'required',
				'email' => 'required',
		        'message' => 'required' 
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
    	
    	$enquire = new Enquire;
    	 
    	$enquire->property_id = $inputs['property_id'];
    	$enquire->agent_id = $inputs['agent_id'];
    	$enquire->name = $inputs['name'];
    	$enquire->email = $inputs['email'];
    	$enquire->phone = $inputs['phone'];
    	$enquire->message = $inputs['message'];
    	 
		  
		 
	    $enquire->save();
	    
	    \Session::flash('flash_message', 'Message send successfully');

         return \Redirect::back();
    	 
    }
    
    public function searchproperties(Request $request)
    {  
    	$data =  \Input::except(array('_token')) ;
	    
	    $inputs = $request->all();
    	
    	/*$properties = Properties::where(array('property_type'=>$inputs['type'],'property_purpose'=>$inputs['purpose'])) 
    
    							->orderBy('id', 'desc')->paginate(9);*/
    	if($inputs['purpose']=='Rent')
    	{
			$price='rent_price';
			
		}
		else
		{
			$price='sale_price';
		}
    
    	$properties = DB::table('properties')
    				   ->where('property_type', '=', $inputs['type'])
    				   ->where('property_purpose', '=', $inputs['purpose'])
    				   ->whereBetween($price, [$inputs['min_price'], $inputs['max_price']]) 
    				   ->orderBy('id', 'desc')
    				   ->get();
					    		
    	 
    	 			    
        return view('pages.searchproperties',compact('properties'));
    }
    
    public function searchkeywordproperties(Request $request)
    {  
    	$data =  \Input::except(array('_token')) ;
	    
	    $inputs = $request->all();
    	
    	  
    	 
    	$properties = DB::table('properties')    				   
    				   ->where('property_type', '=', $inputs['type'])
    				   ->where('property_purpose', '=', $inputs['purpose'])
    				   ->where('property_name', 'like', '%'.$inputs['keyword'].'%')
    				   ->orderBy('id', 'desc')
    				   ->get();
					    	 
    	 			    
        return view('pages.searchproperties',compact('properties'));
    }
	
}
