<!-- begin:header -->
    <div id="header" class="header-slide">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="quick-search">
              <div class="row">
                 
                 {!! Form::open(array('url' => array('searchproperties'),'name'=>'search_form','id'=>'search_form','role'=>'form')) !!}   
                   
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label for="purpose">Purpose</label>
                      <select class="form-control" name="purpose">
                        <option value="Sale">For Sale</option>
                        <option value="Rent">For Rent</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="minprice">Min Price</label>
                      <input type="text" name="min_price" class="form-control" placeholder="$200,00"> 
                    </div>
                  </div>
                  <!-- break -->
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label for="type">Type</label>
                      <select class="form-control" name="type">
                        <option value="Apartment">Apartment</option>
						<option value="House">House</option>
						<option value="Land">Land</option>
						<option value="Commercial">Commercial</option>

                      </select>
                    </div>
                    <div class="form-group">
                      <label for="maxprice">Max Price</label>
                      <input type="text" name="max_price" class="form-control" placeholder="$800,000"> 
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12"><input type="submit" name="submit" value="Search" class="btn btn-primary btn-lg btn-block"></div>

                {!! Form::close() !!} 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end:header -->