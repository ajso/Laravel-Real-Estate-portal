<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Properties;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;

class PropertiesController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }
    public function propertieslist()
    {  
    	
    	
    	if(Auth::user()->usertype=='Admin')
        {
        	$propertieslist = Properties::orderBy('id')->get();
        }
        else
        {
        	$user_id=Auth::user()->id;
        	
			$propertieslist = Properties::where('user_id',$user_id)->orderBy('id')->get();
		}
    	
    	
		  
        return view('admin.pages.properties',compact('propertieslist'));
    } 
	
	 public function addeditproperty()    
	 { 
         
          
        return view('admin.pages.addeditproperty');
    }
    
    public function addnew(Request $request)
    { 
    	
    	$data =  \Input::except(array('_token')) ;
	    
	    $inputs = $request->all();
	    
	    $rule=array(
		        'property_name' => 'required',
				'description' => 'required',
		        'featured_image' => 'mimes:jpg,jpeg,gif,png' 
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
	      
		if(!empty($inputs['id'])){
           
            $property = Properties::findOrFail($inputs['id']);

        }else{

            $property = new Properties;

        }
		
		 
		//property featured image
		$featured_image = $request->file('featured_image');
		 
        if($featured_image){
            
            \File::delete(public_path() .'/upload/properties/'.$property->featured_image.'-b.jpg');
			\File::delete(public_path() .'/upload/properties/'.$property->featured_image.'-s.jpg');
		   
            
            $tmpFilePath = 'upload/properties/';

            $hardPath =  str_slug($inputs['property_name'], '-').'-'.md5(rand(0,99999));
			
            $img = Image::make($featured_image);

            $img->fit(640, 425)->save($tmpFilePath.$hardPath.'-b.jpg');
			$img->fit(358, 238)->save($tmpFilePath.$hardPath.'-s.jpg');
             
            $property->featured_image = $hardPath;
             
        }
		
		//property image 1
		$property_images1 = $request->file('property_images1');
		 
        if($property_images1){
            
            \File::delete(public_path() .'/upload/properties/'.$property->property_images1.'-b.jpg');
		   
            
            $tmpFilePath = 'upload/properties/';

            $hardPath =  str_slug($inputs['property_name'], '-').'-'.md5(rand(0,99999));
			
            $img = Image::make($property_images1);

            $img->fit(640, 425)->save($tmpFilePath.$hardPath.'-b.jpg');
			
             
            $property->property_images1 = $hardPath;
             
        }
		
		//property image 2
		$property_images2 = $request->file('property_images2');
		 
        if($property_images2){
            
            \File::delete(public_path() .'/upload/properties/'.$property->property_images2.'-b.jpg');
		   
            
            $tmpFilePath = 'upload/properties/';

            $hardPath =  str_slug($inputs['property_name'], '-').'-'.md5(rand(0,99999));
			
            $img = Image::make($property_images2);

            $img->fit(640, 425)->save($tmpFilePath.$hardPath.'-b.jpg');
			
             
            $property->property_images2 = $hardPath;
             
        }
		
		//property image 3
		$property_images3 = $request->file('property_images3');
		 
        if($property_images3){
            
            \File::delete(public_path() .'/upload/properties/'.$property->property_images3.'-b.jpg');
		   
            
            $tmpFilePath = 'upload/properties/';

            $hardPath =  str_slug($inputs['property_name'], '-').'-'.md5(rand(0,99999));
			
            $img = Image::make($property_images3);

            $img->fit(640, 425)->save($tmpFilePath.$hardPath.'-b.jpg');
			
             
            $property->property_images3 = $hardPath;
             
        }
		
		//property image 4
		$property_images4 = $request->file('property_images4');
		 
        if($property_images4){
            
            \File::delete(public_path() .'/upload/properties/'.$property->property_images4.'-b.jpg');
		   
            
            $tmpFilePath = 'upload/properties/';

            $hardPath =  str_slug($inputs['property_name'], '-').'-'.md5(rand(0,99999));
			
            $img = Image::make($property_images4);

            $img->fit(640, 425)->save($tmpFilePath.$hardPath.'-b.jpg');
			
             
            $property->property_images4 = $hardPath;
             
        }
		
		//property image 5
		$property_images5 = $request->file('property_images5');
		 
        if($property_images5){
            
            \File::delete(public_path() .'/upload/properties/'.$property->property_images5.'-b.jpg');
		   
            
            $tmpFilePath = 'upload/properties/';

            $hardPath =  str_slug($inputs['property_name'], '-').'-'.md5(rand(0,99999));
			
            $img = Image::make($property_images5);

            $img->fit(640, 425)->save($tmpFilePath.$hardPath.'-b.jpg');
			
             
            $property->property_images5 = $hardPath;
             
        }
		 
		if($inputs['property_slug']=="")
		{
			$property_slug  = str_slug($inputs['property_name'], "-");
		}
		else
		{
			$property_slug =str_slug($inputs['property_slug'], "-"); 
		} 
		 
		 
		$user_id=Auth::user()->id;
		 
		$property->user_id = $user_id;
		$property->property_name = $inputs['property_name'];
		$property->property_slug = $property_slug;
		$property->property_type = $inputs['property_type'];
		$property->property_purpose = $inputs['property_purpose'];
		$property->sale_price = $inputs['sale_price'];
		$property->rent_price = $inputs['rent_price'];
		$property->address = $inputs['address'];
		$property->bathrooms = $inputs['bathrooms'];
		$property->bedrooms = $inputs['bedrooms'];
		$property->area = $inputs['area'];
		$property->description = $inputs['description'];
		  
		  
		 
	    $property->save();
		
		if(!empty($inputs['id'])){

            \Session::flash('flash_message', 'Changes Saved');

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', 'Property Added');

            return \Redirect::back();

        }		     
        
         
    }     
    
    public function editproperty($id)    
    {           
          $property = Properties::findOrFail($id);
           
          return view('admin.pages.addeditproperty',compact('property'));
        
    }	 
     
	
	public function delete($id)
    {
    	 
    		
        $property = Properties::findOrFail($id);
        
		\File::delete(public_path() .'/upload/properties/'.$property->featured_image.'-b.jpg');
		\File::delete(public_path() .'/upload/properties/'.$property->featured_image.'-s.jpg');
		
		\File::delete(public_path() .'/upload/properties/'.$property->property_images1.'-b.jpg');
		\File::delete(public_path() .'/upload/properties/'.$property->property_images2.'-b.jpg');
		\File::delete(public_path() .'/upload/properties/'.$property->property_images3.'-b.jpg');
		\File::delete(public_path() .'/upload/properties/'.$property->property_images4.'-b.jpg');
		\File::delete(public_path() .'/upload/properties/'.$property->property_images5.'-b.jpg');
		 
		$property->delete();
		
        \Session::flash('flash_message', 'Property Deleted');

        return redirect()->back();

    }
	
	
	public function status($id)
    { 
        $property = Properties::findOrFail($id);
       
       	if(Auth::User()->id!=$property->user_id and Auth::User()->usertype!="Admin")
       	{

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
       
		if($property->status==1)
		{
			$property->status='0';		 
	   		$property->save();
	   		
	   		\Session::flash('flash_message', 'Unpublished');
		}
		else
		{
			$property->status='1';		 
	   		$property->save();
	   		
	   		\Session::flash('flash_message', 'Published');
		}
		 
        return redirect()->back();

    }
	
	public function featuredproperty($id)
    {
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        
        $property = Properties::findOrFail($id);
       
		if($property->featured_property==1)
		{
			$property->featured_property='0';		 
	   		$property->save();
	   		
	   		\Session::flash('flash_message', 'Property unset from featured');
		}
		else
		{
			$property->featured_property='1';		 
	   		$property->save();
	   		
	   		\Session::flash('flash_message', 'Property set as featured');
		}
		 
        return redirect()->back();

    }
      
    	
}
