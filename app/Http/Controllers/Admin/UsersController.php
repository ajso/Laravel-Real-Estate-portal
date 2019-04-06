<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;

class UsersController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }
    public function userslist()    { 
         
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        } 
          
        $allusers = User::where('usertype', '=', 'Agents')->orderBy('id')->get();
       
         
        return view('admin.pages.users',compact('allusers'));
    } 
     
    public function addeditUser()    { 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
          
        return view('admin.pages.addeditUser');
    }
    
    public function addnew(Request $request)
    { 
    	
    	$data =  \Input::except(array('_token')) ;
	    
	    $inputs = $request->all();
	    
	    $rule=array(
		        'name' => 'required',
		        'email' => 'required|email|max:75|unique:users,id',
		        'password' => 'min:6|max:15',
		        'image_icon' => 'mimes:jpg,jpeg,gif,png' 
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
	      
		if(!empty($inputs['id'])){
           
            $user = User::findOrFail($inputs['id']);

        }else{

            $user = new User;

        }
		
		 
		//User image
		$user_image = $request->file('image_icon');
		 
        if($user_image){
            
            \File::delete(public_path() .'/upload/members/'.$user->image_icon.'-b.jpg');
		    \File::delete(public_path() .'/upload/members/'.$user->image_icon.'-s.jpg');
            
            $tmpFilePath = 'upload/members/';

            $hardPath =  str_slug($inputs['name'], '-').'-'.md5(time());
			
            $img = Image::make($user_image);

            $img->fit(376, 250)->save($tmpFilePath.$hardPath.'-b.jpg');
            $img->fit(80, 80)->save($tmpFilePath.$hardPath. '-s.jpg');

            $user->image_icon = $hardPath;
             
        }
		 
		$user->usertype = 'Agents';
		$user->name = $inputs['name'];		 
		$user->email = $inputs['email'];
		$user->phone = $inputs['phone'];
		$user->fax = $inputs['fax'];
		$user->about = $inputs['about'];
		$user->facebook = $inputs['facebook'];
		$user->twitter = $inputs['twitter'];
		$user->gplus = $inputs['gplus'];
		$user->linkedin = $inputs['linkedin']; 		 
		
		if($inputs['password'])
		{
			$user->password= bcrypt($inputs['password']); 
		}
		
		
		 
	    $user->save();
		
		if(!empty($inputs['id'])){

            \Session::flash('flash_message', 'Changes Saved');

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', 'Added');

            return \Redirect::back();

        }		     
        
         
    }     
    
    public function editUser($id)    
    {     
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }		
    		     
          $user = User::findOrFail($id);
           
          return view('admin.pages.addeditUser',compact('user'));
        
    }	 
    
    public function delete($id)
    {
    	
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
    		
        $user = User::findOrFail($id);
        
		\File::delete(public_path() .'/upload/members/'.$user->image_icon.'-b.jpg');
		\File::delete(public_path() .'/upload/members/'.$user->image_icon.'-s.jpg');
			
		$user->delete();
		
        \Session::flash('flash_message', 'Deleted');

        return redirect()->back();

    }
    
     
   
    	
}
