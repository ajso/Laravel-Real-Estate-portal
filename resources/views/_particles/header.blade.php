<!-- begin:navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-top">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::to('/') }}">
          
          @if(getcong('site_logo')) <img src="{{ URL::asset('upload/'.getcong('site_logo')) }}" alt=""> @else {{getcong('site_name')}} @endif
          
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-top">
          <ul class="nav navbar-nav navbar-right">
            <li class="{{classActivePathPublic('')}}"><a href="{{ URL::to('/') }}">Home</a></li>
        	<li class="{{classActivePathPublic('properties')}}"><a href="{{ URL::to('properties/') }}">All Properties</a></li> 
            <li class="{{classActivePathPublic('featured')}}"><a href="{{ URL::to('featured/') }}">Featured</a></li>
            <li class="{{classActivePathPublic('sale')}}"><a href="{{ URL::to('sale/') }}">Sale</a></li>
            <li class="{{classActivePathPublic('rent')}}"><a href="{{ URL::to('rent/') }}">Rent</a></li>
            <li class="{{classActivePathPublic('agents')}}"><a href="{{ URL::to('agents/') }}">Agents</a></li>
            
             
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
    <!-- end:navbar -->