<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 

class AdminController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
         
    }
    public function index()
    { 
        return view('admin.pages.dashboard');
    }
	
	public function profile()
    { 
        return view('admin.pages.profile');
    }
    
    public function updateProfile(Request $request)
    {  
    		 
    	$user = User::findOrFail(Auth::user()->id);
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	    $rule=array(
		        'name' => 'required',
		        'email' => 'required|email|max:75|unique:users,id',
		        'image_icon' => 'mimes:jpg,jpeg,gif,png'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
	    

	    $inputs = $request->all();
		
		$icon = $request->file('user_icon');
		 
        if($icon){
		
			\File::delete(public_path() .'/upload/members/'.$user->image_icon.'-b.jpg');
		    \File::delete(public_path() .'/upload/members/'.$user->image_icon.'-s.jpg');
		
            $tmpFilePath = 'upload/members/';

            $hardPath =  str_slug($inputs['name'], '-').'-'.md5(time());

            $img = Image::make($icon);

            $img->fit(376, 250)->save($tmpFilePath.$hardPath.'-b.jpg');
            $img->fit(80, 80)->save($tmpFilePath.$hardPath. '-s.jpg');

            $user->image_icon = $hardPath;
        }
        
		
		$user->name = $inputs['name']; 
		$user->email = $inputs['email']; 
		$user->phone = $inputs['phone'];
		$user->fax = $inputs['fax']; 
		$user->about = $inputs['about'];
		$user->facebook = $inputs['facebook'];
		$user->twitter = $inputs['twitter'];
		$user->gplus = $inputs['gplus'];
		$user->linkedin = $inputs['linkedin'];
		
	   
	    $user->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function updatePassword(Request $request)
    { 
    	 
    		//$user = User::findOrFail(Auth::user()->id);
		
		
		    $data =  \Input::except(array('_token')) ;
            $rule  =  array(
                    'password'       => 'required|confirmed',
                    'password_confirmation'       => 'required'
                ) ;
 
            $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
		
	   		/* $val=$this->validate($request, [
                    'password' => 'required|confirmed',
            ]);  */      
         
	    $credentials = $request->only('password', 'password_confirmation'
            );
            
        $user = \Auth::user();
        $user->password = bcrypt($credentials['password']);
        $user->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
	 
    	
}
