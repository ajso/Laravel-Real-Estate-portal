 
 
<script>

 function subscribe_user()

 {

    $.ajax({

        type: "POST",
        //url: "http://localhost/laravel_divine_home/public/subscribe",
        url:"{{URL::to('subscribe/')}}",
        data: {'email':$('input[name=email]').val(), '_token': $('input[name=_token]').val()},
        beforeSend : function(msg){ $("#submitbutton").html('<img src="{{ URL::asset('assets/img/loading.gif') }}" />'); },
        success: function(msg)
        {
			//$('body,html').animate({ scrollTop: 0 }, 200);
            if(msg.substring(1,7) != 'script')
            {
				
                $('#modal-error').modal('show');
                $("#ajax").html(msg); 
				$("#email_id").val('');
                $("#submitbutton").html('<button class="btn btn-primary btn-lg" type="submit" onClick="subscribe_user()"><i class="fa fa-envelope"></i></button>');
            }
            else
            { 
                $("#ajax").html(msg); 
            }
        }

    });

 }
 
 
 </script>
<!-- begin:subscribe -->
    <div id="subscribe">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-md-offset-2 col-sm-8 col-xs-12">
            <h3>Get Newsletter Update</h3>
          </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
            
            <div class="input-group">
             
              <meta name="_token" content="{!! csrf_token() !!}"/>
              <input type="text" name="email" id="email_id" class="form-control input-lg" placeholder="Enter your mail">
              <span class="input-group-btn">
                <div id="submitbutton"><button class="btn btn-primary btn-lg" type="submit" onClick="subscribe_user()"><i class="fa fa-envelope"></i></button></div>
                
              </span>
               
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end:subscribe -->
    
     <!-- begin:modal-message -->
    <div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="modal-signin" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header" style="border-bottom:none;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           
          </div>
          <div class="modal-body">
                <div id="ajax" style="color: #db2424"></div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- end:modal-message -->