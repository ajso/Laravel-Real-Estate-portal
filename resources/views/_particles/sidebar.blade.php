<div class="col-md-3 col-md-pull-9 sidebar">
            <div class="widget widget-white">
              <div class="widget-header">
                <h3>Advance Search</h3>
              </div>    
               
              {!! Form::open(array('url' => array('searchproperties'),'class'=>'advance-search','name'=>'search_form','id'=>'search_form','role'=>'form')) !!}   
                <div class="form-group">
                      <label for="purpose">Purpose</label>
                      <select class="form-control" name="purpose">
                        <option value="Sale">For Sale</option>
                        <option value="Rent">For Rent</option>
                      </select>
               </div>
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
                      <label for="minprice">Min Price</label>
                      <input type="text" name="min_price" class="form-control" placeholder="Min Price (number)"> 
                </div>
                <div class="form-group">
                      <label for="maxprice">Max Price</label>
                      <input type="text" name="max_price" class="form-control" placeholder="Max Price (number)"> 
                    </div>
                
                <input type="submit" name="submit" value="Search" class="btn btn-primary btn-block">
              {!! Form::close() !!}
            </div>
            <!-- break -->
            <div class="widget widget-sidebar widget-white">
              <div class="widget-header">
                <h3>Property Type</h3>
              </div>    
              <ul class="list-check">
                <li><a href="{{URL::to('type/Apartment')}}">Apartment</a>&nbsp;({{countPropertyType('Apartment')}})</li>
                <li><a href="{{URL::to('type/House')}}">House</a>&nbsp;({{countPropertyType('House')}})</li>
                <li><a href="{{URL::to('type/Land')}}">Land</a>&nbsp;({{countPropertyType('Land')}})</li>
                <li><a href="{{URL::to('type/Commercial')}}">Commercial</a>&nbsp;({{countPropertyType('Commercial')}})</li>                
              </ul>
            </div>
            <!-- break -->
          </div>