@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{ isset($partners->name) ? 'Edit: '. $partners->name : 'Add Partner' }}</h2>
		
		<a href="{{ URL::to('admin/partners') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Back</a>
	  
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
                {!! Form::open(array('url' => array('admin/partners/addpartners'),'class'=>'form-horizontal padding-15','name'=>'addpartners_form','id'=>'addpartners_form','role'=>'form','enctype' => 'multipart/form-data')) !!} 
                <input type="hidden" name="id" value="{{ isset($partners->id) ? $partners->id : null }}">
                  
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" value="{{ isset($partners->name) ? $partners->name : null }}" class="form-control">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">URL</label>
                    <div class="col-sm-9">
                        
						<input type="text" name="url" value="{{ isset($partners->url) ? $partners->url : null }}" class="form-control">
                    </div>
                </div>
				 
				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Image</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(isset($partners->partner_image))
                                 
									<img src="{{ URL::asset('upload/partners/'.$partners->partner_image.'.jpg') }}" width="100" alt="logo">
								@endif
								                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="partner_image" class="filestyle"> 
                            </div>
                        </div>
	
                    </div>
                </div>
				
				  
                 
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">{{ isset($partners->name) ? 'Edit Partner' : 'Add Partner' }}</button>
                         
                    </div>
                </div>
                
                {!! Form::close() !!} 
            </div>
        </div>
   
    
</div>

@endsection