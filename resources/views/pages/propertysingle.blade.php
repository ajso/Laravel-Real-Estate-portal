@extends("app")

@section('head_title', $property->property_name .' | '.getcong('site_name') )
@section('head_description', substr(strip_tags($property->description),0,200))
@section('head_image', asset('/upload/properties/'.$property->featured_image.'-b.jpg'))
@section('head_url', Request::url())

@section("content")

<!-- begin:header -->
    <div id="header" class="heading" style="background-image: url({{ URL::asset('assets/img/img01.jpg') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="page-title">
              <h2>{{$property->property_name}}</h2>
            </div>
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
              <li><a href="{{ URL::to('properties/') }}">Properties</a></li> 
              <li class="active">{{$property->property_name}}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end:header -->
<!-- begin:content -->
    <div id="content">
      <div class="container">
        <div class="row">
          <!-- begin:article -->
          <div class="col-md-9 col-md-push-3">
            <div class="row">
              <div class="col-md-12 single-post">
                <ul id="myTab" class="nav nav-tabs nav-justified">
                  <li class="active"><a href="#detail" data-toggle="tab"><i class="fa fa-university"></i> Property Detail</a></li>
                  <li><a href="#location" data-toggle="tab"><i class="fa fa-paper-plane-o"></i> Contact Agent</a></li>
                </ul>

                <div id="myTabContent" class="tab-content">
                  <div class="tab-pane fade in active" id="detail">
                    <div class="row">
                      <div class="col-md-12">
                        <h2>{{$property->property_name}}</h2>
                        <div id="slider-property" class="carousel slide" data-ride="carousel">
                          
                          <div class="carousel-inner">
                            @if($property->featured_image)
                            <div class="item active">
                              <img src="{{ URL::asset('upload/properties/'.$property->featured_image.'-b.jpg') }}" alt="">
                            </div>
                            @endif
                            
                            @if($property->property_images1)
                            <div class="item">
                              <img src="{{ URL::asset('upload/properties/'.$property->property_images1.'-b.jpg') }}" alt="">
                            </div>
                            @endif
                            
                             @if($property->property_images2)
                            <div class="item">
                              <img src="{{ URL::asset('upload/properties/'.$property->property_images2.'-b.jpg') }}" alt="">
                            </div>
                            @endif
                            
                             @if($property->property_images3)
                            <div class="item">
                              <img src="{{ URL::asset('upload/properties/'.$property->property_images3.'-b.jpg') }}" alt="">
                            </div>
                            @endif
                            
                             @if($property->property_images4)
                            <div class="item">
                              <img src="{{ URL::asset('upload/properties/'.$property->property_images4.'-b.jpg') }}" alt="">
                            </div>
                            @endif
                            
                             @if($property->property_images5)
                            <div class="item">
                              <img src="{{ URL::asset('upload/properties/'.$property->property_images5.'-b.jpg') }}" alt="">
                            </div>
                            @endif
                            
                            
                             
                          </div>
                          <a class="left carousel-control" href="#slider-property" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                          </a>
                          <a class="right carousel-control" href="#slider-property" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                        </div>
                        <h3>Property Overview</h3>
                        <table class="table table-bordered">
                          <tr>
                            <td width="20%"><strong>ID</strong></td>
                            <td>#{{$property->id}}</td>
                          </tr>
                          <tr>
                            <td><strong>Price</strong></td>
                            <td>@if($property->sale_price) {{$property->sale_price}} @else {{$property->rent_price}} @endif</td>
                          </tr>
                          <tr>
                            <td><strong>Type</strong></td>
                            <td>{{$property->property_type}}</td>
                          </tr>
                          <tr>
                            <td><strong>Contract</strong></td>
                            <td>{{$property->property_purpose}}</td>
                          </tr>
                          <tr>
                            <td><strong>Location</strong></td>
                            <td>{{$property->address}}</td>
                          </tr>
                          <tr>
                            <td><strong>Bathrooms</strong></td>
                            <td>{{$property->bathrooms}}</td>
                          </tr>
                          <tr>
                            <td><strong>Bedrooms</strong></td>
                            <td>{{$property->bedrooms}}</td>
                          </tr>
                          <tr>
                            <td><strong>Area</strong></td>
                            <td>{{$property->area}}</sup> </td>
                          </tr>
                        </table>
                         

                        <h3>Property Description</h3>
                        {!!$property->description!!}
                        
                      </div>
                      
                    </div>
					<br/>
                    {!! getcong('disqus_comment_code') !!}	
                    
                  </div>
                  <!-- break -->
                  <div class="tab-pane fade" id="location">
                     
                    <div class="row">
                      <div class="col-md-12">
                        <h3>Contact Agent</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <div class="team-container team-dark">
                          <div class="team-image">
                            <img src="{{ URL::asset('upload/members/'.$agent->image_icon.'-b.jpg') }}" alt="{{$agent->name}}">
                          </div>
                          <div class="team-description">
                            <h3>{{$agent->name}}</h3>
                            <p><i class="fa fa-phone"></i> Office : {{$agent->phone}}<br>
                            <i class="fa fa-print"></i> Fax : {{$agent->fax}}</p>
                            <p>{{$agent->about}}</p>
                            <div class="team-social">
                              <span><a href="{{$agent->twitter}}" title="Twitter" rel="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a></span>
                              <span><a href="{{$agent->facebook}}" title="Facebook" rel="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a></span>
                              <span><a href="{{$agent->gplus}}" title="Google Plus" rel="tooltip" data-placement="top"><i class="fa fa-google-plus"></i></a></span>
                              <span><a href="{{$agent->linkedin}}" title="LinkedIn" rel="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a></span> 
                            </div>                       
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                         
                        {!! Form::open(array('url'=>'agentscontact','method'=>'POST', 'id'=>'agent_contact_form')) !!}
              			<meta name="_token" content="{!! csrf_token() !!}"/>
                         
                         <input type="hidden" name="property_id" value="{{$property->id}}">
                         
                         <input type="hidden" name="agent_id" value="{{$agent->id}}">
                          
                          <div id="ajax" style="color: #db2424"></div>
                          
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control input-lg" placeholder="Enter name : ">
                          </div>
                          <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control input-lg" placeholder="Enter email : ">
                          </div>
                          <div class="form-group">
                            <label for="telp">Telp.</label>
                            <input type="text" name="phone" class="form-control input-lg" placeholder="Enter phone number : ">
                          </div>
                          <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" class="form-control input-lg" rows="7" placeholder="Type a message : "></textarea>
                          </div>
                          <div class="form-group">
                            <input type="submit" name="submit" value="Send Message" class="btn btn-primary btn-lg">
                          </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end:article -->

          <!-- begin:sidebar -->
          @include('_particles.sidebar')
          <!-- end:sidebar -->
          
        </div>
      </div>
    </div>
    <!-- end:content -->
    
     @if (count($errors) > 0 or Session::has('flash_message'))
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

     <script type="text/javascript">    
	    $(window).load(function(){
	        $('#modal-error').modal('show');
	    });
	</script>
 	@endif
    <!-- begin:modal-message -->
    <div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="modal-signin" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header" style="border-bottom:none;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           
          </div>
          <div class="modal-body">
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
				     
				        {{ Session::get('flash_message') }}
				    </div>
				@endif
          </div>
          
        </div>
      </div>
    </div>
    <!-- end:modal-message -->
 
@endsection
