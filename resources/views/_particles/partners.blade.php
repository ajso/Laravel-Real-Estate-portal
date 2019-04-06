<!-- begin:partner -->
    <div id="partner">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="heading-title bg-white">
              <h2>Our Partnership</h2>
            </div>
          </div>
        </div>
        <!-- break -->

        <div class="row">
          <div class="col-md-12">
            <div class="jcarousel-wrapper">
              <div class="jcarousel">
                <ul>
                @foreach($partners as $i => $partner)
                
                  <li><a href="{{$partner->url}}" target="_blank"><img src="{{ URL::asset('upload/partners/'.$partner->partner_image.'.jpg') }}" alt="{{$partner->name}}"></a></li>
                
                @endforeach  
                   
                </ul>
              </div>
              <a href="#" class="jcarousel-control-prev"><i class="fa fa-angle-left"></i></a>
              <a href="#" class="jcarousel-control-next"><i class="fa fa-angle-right"></i></a>
              <!-- <p class="jcarousel-pagination"></p> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end:partner -->