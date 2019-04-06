@extends("app")

@section('head_title', 'Agents | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
<!-- begin:header -->
    <div id="header" class="heading" style="background-image: url({{ URL::asset('assets/img/img01.jpg') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="page-title">
              <h2>Agents</p>
            </div>
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
              <li class="active">Agents</li>
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
          <div class="col-md-12">
            <div class="blog-container">
              <div class="blog-content">
                  
                <div class="the-team">
                  <div class="row container-realestate">
                   @foreach($agents as $i => $agent) 
                    <div class="col-md-4">
                      <div class="team-container team-dark">
                        <div class="team-image">
                          <img src="{{ URL::asset('upload/members/'.$agent->image_icon.'-b.jpg') }}" alt="{{ $agent->name }}">
                        </div>
                        <div class="team-description">
                          <h3>{{$agent->name}}</h3>
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
                    <!-- break -->
                   @endforeach 
                    
                  </div>
                  
                  @include('_particles.pagination', ['paginator' => $agents]) 
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end:content -->
 
@endsection
