<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Partners;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;

class PartnersController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }
    public function partnerslist()
    {  
    	$partnerslist = Partners::orderBy('id')->get();
		  
        return view('admin.pages.partnerslist',compact('partnerslist'));
    } 
	
	 public function addpartners()    { 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
          
        return view('admin.pages.addpartners');
    }
    
    public function addnew(Request $request)
    { 
    	
    	$data =  \Input::except(array('_token')) ;
	    
	    $inputs = $request->all();
	    
	    $rule=array(
		        'name' => 'required',
				'url' => 'required',
		        'partner_image' => 'mimes:jpg,jpeg,gif,png' 
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
	      
		if(!empty($inputs['id'])){
           
            $partners = Partners::findOrFail($inputs['id']);

        }else{

            $partners = new Partners;

        }
		
		 
		//Slide image
		$partner_image = $request->file('partner_image');
		 
        if($partner_image){
            
            \File::delete(public_path() .'/upload/partners/'.$partners->partner_image.'.jpg');
		   
            
            $tmpFilePath = 'upload/partners/';

            $hardPath =  str_slug($inputs['name'], '-').'-'.md5(time());
			
            $img = Image::make($partner_image);

            $img->fit(345, 230)->save($tmpFilePath.$hardPath.'.jpg');
             
            $partners->partner_image = $hardPath;
             
        }
		 
		 
		$partners->name = $inputs['name'];
		$partners->url = $inputs['url'];		 
		  
		 
	    $partners->save();
		
		if(!empty($inputs['id'])){

            \Session::flash('flash_message', 'Changes Saved');

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', 'Added');

            return \Redirect::back();

        }		     
        
         
    }     
    
    public function editpartners($id)    
    {     
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }		
    		     
          $partners = Partners::findOrFail($id);
           
          return view('admin.pages.addpartners',compact('partners'));
        
    }	 
    
    public function delete($id)
    {
    	
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
    		
        $partners = Partners::findOrFail($id);
        
		\File::delete(public_path() .'/upload/partners/'.$partners->partner_image.'.jpg');
		 
		$partners->delete();
		
        \Session::flash('flash_message', 'Deleted');

        return redirect()->back();

    }
      
    	
}
