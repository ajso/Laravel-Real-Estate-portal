@extends("app")

@section('head_title', 'Page not found! | '.getcong('site_name') )
 
@section('head_url', Request::url())

@section("content")

<!-- begin:header -->
    <div id="header" class="heading" style="background-image: url({{ URL::asset('assets/img/img01.jpg') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="page-title">
              <h2>404</h2>
            </div>
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
              <li class="active">404</li>
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
              <div class="col-md-12 single-post" align="center">
                <h1 style="font-size: 100px;">404</h1>
                The page you're looking for could not be found.
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
      
@endsection
