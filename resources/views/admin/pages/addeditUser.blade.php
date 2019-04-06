@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{ isset($user->name) ? 'Edit: '. $user->name : 'Add Agent' }}</h2>
		
		<a href="{{ URL::to('admin/users') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Back</a>
	  
	</div>
	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
	 @if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif
   
   	<div class="panel panel-default">
            <div class="panel-body">
                {!! Form::open(array('url' => array('admin/users/adduser'),'class'=>'form-horizontal padding-15','name'=>'user_form','id'=>'user_form','role'=>'form','enctype' => 'multipart/form-data')) !!} 
                <input type="hidden" name="id" value="{{ isset($user->id) ? $user->id : null }}">
                  
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" value="{{ isset($user->name) ? $user->name : null }}" class="form-control">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-9">
                        <input type="text" name="phone" value="{{ isset($user->phone) ? $user->phone : null }}" class="form-control" value="">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Fax</label>
                    <div class="col-sm-9">
                        <input type="text" name="fax" value="{{ isset($user->fax) ? $user->fax : null }}" class="form-control" value="">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">About</label>
                    <div class="col-sm-9">
                         
						<textarea name="about" cols="50" rows="5" class="form-control">{{ isset($user->about) ? $user->about : null }}</textarea>
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Facebook</label>
                    <div class="col-sm-9">
                        <input type="text" name="facebook" value="{{ isset($user->facebook) ? $user->facebook : null }}" class="form-control" value="">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Twitter</label>
                    <div class="col-sm-9">
                        <input type="text" name="twitter" value="{{ isset($user->twitter) ? $user->twitter : null }}" class="form-control" value="">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Google Plus</label>
                    <div class="col-sm-9">
                        <input type="text" name="gplus" value="{{ isset($user->gplus) ? $user->gplus : null }}" class="form-control" value="">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Linkedin</label>
                    <div class="col-sm-9">
                        <input type="text" name="linkedin" value="{{ isset($user->linkedin) ? $user->linkedin : null }}" class="form-control" value="">
                    </div>
                </div>
				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Profile Picture</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(isset($user->image_icon))
                                 
									<img src="{{ URL::asset('upload/members/'.$user->image_icon.'-s.jpg') }}" width="80" alt="person">
								@endif
								                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="image_icon" class="filestyle"> 
                            </div>
                        </div>
	
                    </div>
                </div>
				
				<hr />
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" value="{{ isset($user->email) ? $user->email : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" value="" class="form-control">
                    </div>
                </div>
                 
                
                 
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">{{ isset($user->name) ? 'Edit Agent' : 'Add Agent' }}</button>
                         
                    </div>
                </div>
                
                {!! Form::close() !!} 
            </div>
        </div>
   
    
</div>

@endsection