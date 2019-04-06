@extends("app")
@section("content")

@include("_particles.slidersearch")

<!-- begin:content -->
    <div id="content">
      <div class="container">
        <!-- begin:latest -->
        <div class="row">
          <div class="col-md-12">
            <div class="heading-title">
              <h2>Latest Properties</h2>
            </div>
          </div>
        </div>
        <div class="row">
         @foreach($propertieslist as $i => $property)
          <div class="col-md-3 col-sm-6 col-xs-12">
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
        <!-- end:latest -->

        
      </div>
    </div>
    <!-- end:content -->
    
    @include("_particles.testimonials")
	  
	@include("_particles.subscribe")
	  
	@include("_particles.partners")
 
@endsection
