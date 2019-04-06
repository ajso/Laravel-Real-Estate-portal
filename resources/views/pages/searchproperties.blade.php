@extends("app")

@section('head_title', 'Properties | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")

 <!-- begin:header -->
    <div id="header" class="heading" style="background-image: url({{ URL::asset('assets/img/img01.jpg') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="quick-search">
              <div class="row">
                {!! Form::open(array('url' => array('search'),'name'=>'search_form','id'=>'search_form','role'=>'form')) !!}
                  <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="form-group">
                      <label for="bedroom">Keyword</label>
                      <input type="text" name="keyword" class="form-control" placeholder="Enter keyword">
                    </div>
                     
                  </div>
                  <!-- break -->
                  <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="form-group">
                      <label for="status">Status</label>
                      <select class="form-control" name="purpose">
                        <option value="Sale">For Sale</option>
                        <option value="Rent">For Rent</option>
                      </select>
                    </div>
                    
                  </div>
                  <!-- break -->
                  <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="form-group">
                      <label for="type">Type</label>
                      <select class="form-control" name="type">
                        <option value="Apartment">Apartment</option>
						<option value="House">House</option>
						<option value="Land">Land</option>
						<option value="Commercial">Commercial</option>

                      </select>
                    </div>
                    
                  </div>
                  <!-- break -->
                  <div class="col-md-3 col-sm-3 col-xs-6">
                     
                    <div class="form-group">
                      <label for="maxprice">&nbsp;</label>
                      <input type="submit" name="submit" value="Search Again" class="btn btn-primary btn-block">
                    </div>
                  </div>

                {!! Form::close() !!} 
              </div>
            </div>
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/') }}">Home</a></li> 
              <li class="active">Search</li>
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
           
            <!-- begin:product -->
            <div class="row container-realestate">
           	  @foreach($properties as $i => $property) 	
             	 <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="property-container">
              <div class="property-image">
                 
                <img src="{{ URL::asset('upload/properties/'.$property->featured_image.'-s.jpg') }}" alt="{{ $property->property_name }}">
                <div class="property-price">
                  <h4>{{ $property->property_type }}</h4>
                  <span>@if($property->sale_price) {{$property->sale_price}} @else {{$property->rent_price}} @endif</span>
                </div>
                <div class="property-status">
                  <span>For {{$property->property_purpose}}</span>
                </div>
              </div>
              <div class="property-features">
                <span><i class="fa fa-home"></i> {{$property->area}}</span>
                <span><i class="fa fa-hdd-o"></i> {{$property->bedrooms}}</span>
                <span><i class="fa fa-male"></i> {{$property->bathrooms}}</span>
              </div>
              <div class="property-content">
                <h3><a href="{{URL::to('properties/'.$property->property_slug)}}">{{ $property->property_name }}</a> <small>{{ $property->address }}</small></h3>
              </div>
            </div>
          </div>
              <!-- break -->
           	  @endforeach
           	  
              
            </div>
            <!-- end:product -->
 
          </div>
          <!-- end:article -->

          <!-- begin:sidebar -->
          @include('_particles.sidebar')
          <!-- end:sidebar -->
          
        </div>
      </div>
    </div>
    <!-- end:content -->
 
@endsection
