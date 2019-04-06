 <!-- begin:testimonials -->
    <div id="testimony" style="background-image: url({{ URL::asset('assets/img/img17.jpg') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div id="testislider" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
               
              	@foreach($testimonials as $i => $testimonial)
               	 <div class="item @if($i==0) active @endif">
                  <div class="testimony-container">
                    
                    @if($testimonial->t_user_image)
						
						<div class="testimony-image" style="background: url({{ URL::asset('upload/testimonial/'.$testimonial->t_user_image.'.jpg') }})"></div>
						
					@else
						
						<div class="testimony-image" style="background: url({{ URL::asset('assets/img/team03.jpg') }})"></div>
					
					@endif
                    
                    <div class="testimony-content">
                      <h3>{{$testimonial->name}}</h3>
                      <blockquote>
                        <p>{{$testimonial->testimonial}}</p>
                      </blockquote>
                    </div>
                  </div>
                </div>
                 
              	@endforeach
                
              </div>
              <a class="left carousel-control" href="#testislider" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#testislider" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- end:testimonials -->