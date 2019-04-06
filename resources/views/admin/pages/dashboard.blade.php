@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2>Overview</h2>
	</div>
    
 
<div class="row">
    
  	@if(Auth::user()->usertype=='Admin')
    	
    	<a href="{{ URL::to('admin/properties') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-orange panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Properties</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$properties_count}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-map-marker fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    <a href="{{ URL::to('admin/featuredproperties') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-green panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Featured</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$featured_properties}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-star fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    
    <a href="{{ URL::to('admin/inquiries') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-primary panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Inquiries</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$inquiries}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-send fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    
    <a href="{{ URL::to('admin/users') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-default panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Agents</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$agents}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-users fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    
    <a href="{{ URL::to('admin/testimonials') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-grey panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Testimonials</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$testimonials}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-list fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    
    <a href="{{ URL::to('admin/subscriber') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-default panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Subscribers</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$subscriber}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-envelope fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    
    <a href="{{ URL::to('admin/partners') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-orange panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Partners</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$partners}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-bookmark-o fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    
    @else
    
    <a href="{{ URL::to('admin/properties') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-orange panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Properties</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$properties_count}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-map-marker fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    
    <a href="{{ URL::to('admin/properties') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-green panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Publish</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$publish_properties}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-map-marker fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    
    <a href="{{ URL::to('admin/properties') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-grey panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">UnPublish</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$unpublish_properties}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-map-marker fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    
    <a href="{{ URL::to('admin/inquiries') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-primary panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Inquiries</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$inquiries}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-send fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    
    @endif
    
     
	
	 
</div>
 
</div>

@endsection