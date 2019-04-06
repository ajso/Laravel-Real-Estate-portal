@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		
		<div class="pull-right">
			<a href="{{URL::to('admin/testimonials/addtestimonial')}}" class="btn btn-primary">Add Testimonial <i class="fa fa-plus"></i></a>
		</div>
		<h2>Testimonials</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif
     
<div class="panel panel-default panel-shadow">
    <div class="panel-body">
         
        <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>
	            <tr>
	                <th>Image</th>
	                <th>Name</th>
	                 
	                <th class="text-center width-100">Action</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($alltestimonials as $i => $testimonial)
         	   <tr>
            	<td> @if($testimonial->t_user_image)
                                 
									<img src="{{ URL::asset('upload/testimonial/'.$testimonial->t_user_image.'.jpg') }}" width="80" alt="">
					@endif</td>
                <td>{{ $testimonial->name }}</td>
                
                <td class="text-center">
                <div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Actions <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu"> 
									<li><a href="{{ url('admin/testimonials/addtestimonial/'.$testimonial->id) }}"><i class="md md-edit"></i> Edit Editor</a></li>
									<li><a href="{{ url('admin/testimonials/delete/'.$testimonial->id) }}"><i class="md md-delete"></i> Delete</a></li>
								</ul>
							</div> 
                
            </td>
                
            </tr>
           @endforeach
             
            </tbody>
        </table>
    </div>
    <div class="clearfix"></div>
</div>

</div>



@endsection