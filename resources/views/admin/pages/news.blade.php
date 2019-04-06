@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		
		<div class="pull-right">
			<a href="{{URL::to('admin/news/addnews')}}" class="btn btn-primary">Add News <i class="fa fa-plus"></i></a>
		</div>
		<h2>News</h2>
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
	                <th>Title</th>
	                <th>Category</th>
	                <th class="text-center">Status</th>
	                <th>Dates</th>
	                <th class="text-center width-100">Action</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($allnews as $i => $news)
         	   <tr>
            	<td> @if($news->image)
                                 
									<img src="{{ URL::asset('upload/news/'.$news->image.'-s.jpg') }}" width="100" alt="person">
								@endif</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->category_name}}</td>
                <td class="text-center">
						@if($news->status==1)
							<span class="icon-circle bg-green">
								<i class="md md-check"></i>
							</span>
						@else
							<span class="icon-circle bg-orange">
								<i class="md md-close"></i>
							</span>
						@endif
            	</td>
                
                <td>{{ date('m-d-Y',strtotime($news->created_at)) }}</td>
                
                <td class="text-center">
                <div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Actions <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li>
										@if($news->status==1)                	
					                	<a href="{{ url('admin/news/status/'.$news->id) }}"><i class="md md-close"></i> Unpublish</a>
					                	@else
					                	<a href="{{ url('admin/news/status/'.$news->id) }}"><i class="md md-check"></i> Publish</a>
					                	@endif
									</li>
									@if(Auth::user()->usertype=='Admin')
									<li>
										@if($news->slider_news=='no')                	
					                	<a href="{{ url('admin/news/sliderhomepage/'.$news->id) }}"><i class="md md-star"></i> Set as Homepage Slider</a>
					                	 @else
					                	 <a href="{{ url('admin/news/sliderhomepage/'.$news->id) }}"><i class="md md-remove"></i> Unset as Homepage Slider</a>
					                	@endif
									</li>
									<li>
										@if($news->featured_news=='no')                	
					                	<a href="{{ url('admin/news/featurednews/'.$news->id) }}"><i class="fa fa-heart"></i> Set as Featured</a>
					                	 @else
					                	 <a href="{{ url('admin/news/featurednews/'.$news->id) }}"><i class="fa fa-heart-o"></i> Unset as Featured</a>
					                	@endif
									</li>
									@endif
									<li><a href="{{ url('admin/news/addnews/'.$news->id) }}"><i class="md md-edit"></i> Edit News</a></li>
									<li><a href="{{ url('admin/news/delete/'.$news->id) }}" onclick="return confirm('Are you sure? You will not be able to recover this.')"><i class="md md-delete"></i> Delete</a></li>
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