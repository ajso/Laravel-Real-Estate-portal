<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="description" content="@yield('head_description', getcong('site_description'))">
    
    <meta property="og:type" content="article" />
    <meta property="og:title" content="@yield('head_title',  getcong('site_name'))" />
    <meta property="og:description" content="@yield('head_description', getcong('site_description'))" />
    <meta property="og:image" content="@yield('head_image', url('/upload/logo.png'))" />
    <meta property="og:url" content="@yield('head_url', url())" />
     
    <link href="{{ URL::asset('upload/'.getcong('site_favicon')) }}" rel="shortcut icon" type="image/x-icon" />

    <title>@yield('head_title', getcong('site_name'))</title>
	 
    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,600,800' rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    
     
    <link href="{{ URL::asset('assets/css/'.getcong('site_style').'.css') }}" rel="stylesheet">
    
    <link href="{{ URL::asset('assets/css/responsive.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="{{ URL::asset('assets/js/html5shiv.js') }}"></script>
      <script src="{{ URL::asset('assets/js/respond.min.js') }}"></script>
    <![endif]-->
 	{!!getcong('site_header_code')!!}
	
	{!! getcong('addthis_share_code')!!}
  </head>

  <body id="top">
	  
	  @include("_particles.header")
	   
	  
	  @yield("content")
	  
	   
	  @include("_particles.footer")
	   
	  
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ URL::asset('assets/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.js') }}"></script>
     <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script src="{{ URL::asset('assets/js/gmap3.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.easing.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.jcarousel.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.backstretch.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/script.js') }}"></script>
    
    <script type="text/javascript">

    /* backstretch slider */
    $('.header-slide').backstretch([
      @foreach(\App\Slider::orderBy('name')->get() as $slide)
      "{{ URL::asset('upload/slides/'.$slide->image_name.'.jpg') }}",
      
      @endforeach
      ], {
        fade: 850,
        duration: 4000
    });



	  </script>
    
    {!!getcong('site_footer_code')!!}
    
  </body>
</html>
    	  
	  
	  