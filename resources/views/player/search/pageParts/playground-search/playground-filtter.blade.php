<div class="panel panel-default shade">
    <div style="padding: 20px">
		
		<h4 style="color:#06774a;">
            Playground search
            <span id="playground_filtters_loader" style="display:none;">
                <i class="fa fa-circle-o-notch fa-spin" style="font-size:20px;color:#06774a;"></i>
            </span>
            <span id="clear_playground_filter" style="cursor:pointer;display:none;">
              <span class="pull-right fa-stack fa-lg">
                <i class="fa fa-filter fa-stack-1x" 
                   style="font-size:70%;position:relative;bottom: 35px;left:20px"
                >
                </i>
                <i class="fa fa-ban fa-stack-1x text-danger"
                   style="position:relative;bottom:85px;left:20px"
                >
                </i>
              </span>
            </span>
        </h4>
		<hr>
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" 
                  name="playground_filtters_name" 
                  class="sm-inputs form-control" 
                  id="playground_filtters_name" 
            >
        </div>
        <br>
        
        <div class="form-group">
            <label for="sport">sport</label>
            <select class="sm-inputs form-control input-xs" 
                    name="playground_filtters_sport" 
                    id="sport">
                
                @php $sports = DB::table('sports')->get() ; @endphp
                <option value="">Sport</option>

                @foreach ($sports as $sport)

                    <option
                      value="{{ $sport->id }}"
                    >
                        {{ $sport->en_sport_name }}
                    </option>

                @endforeach

            </select>
        </div>
        <br>
        <div class="form-group">
          <label for="features">Price: </label>

          <div class="row">
            <div class="col-lg-12">
              <div class="wrapper" style="padding:5px;">
                <div class="range-slider">
                    <input type="text" class="js-range-slider" value="" />
                </div>
                <div class="extra-controls form-inline">
                  <div class="form-group">
                    <input type="hidden" id="from" name="playground_filtters_from" class="js-input-from form-control" value="0" />
                    <input type="hidden" id="to" name="playground_filtters_to" class="js-input-to form-control" value="0" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="form-group">
          <label for="features">Location:</label>

          <div class="row">
            <div class="col-lg-5 ">

                <select class="sm-inputs form-control input-xs" 
                        name="playground_filtters_city" 
                        id="governorate"
                        style="padding: 0px 5px 0px 5px;"
                >
                    <option value="">Governorate</option>
                  @foreach ($governorate as $gov)
                    <option value="{{ $gov->id }}">{{ $gov->g_en_name }} </option>
                  @endforeach
                </select>

            </div>
            <div class="col-lg-5">
                <select class="sm-inputs form-control input-xs"
                  name="playground_filtters_area" 
                  id="area"
                  style="padding: 0px 5px 0px 5px;"
            >
                  <option value="">Area</option>
                  @foreach ($governorate as $goov) <!--loop throw each city -->
                    @foreach ($goov->areas as $area) <!--loop throw each city->area -->
                      <option value="{{ $area->id }}" > {{ $area->a_en_name }}</option>
                    @endforeach
                  @endforeach
                </select>
            </div>
            <div class="col-lg-2" >
              <div id="loader"
                  class="text-center "
                  style="display: none;z-index: 99999;font-size: 20px;color: #06b36f;"
              >
                <i class="fa fa-circle-o-notch fa-spin"></i>
              </div>
            </div>
          </div>

        </div>
        <br>
        <div class="form-group">
          <label for="features">Feature:</label>

          <div class="row text-center">

              <div class="col-md-6">
                    <label class="" style="font-size:15px;margin:5px;cursor:pointer">
                      <input type="checkbox" 
                      name="playground_filtters_feature1"
                      value="1" 
                      >
                      <span style="font-size: 75%;color: #06774a;">feature1</span>    
                    </label>
                  </div>

              <div class="col-md-6">
                    <label class="" style="font-size:15px;margin:5px;cursor:pointer">
                      <input type="checkbox" 
                      name="playground_filtters_feature2"
                      value="1" 
                      >
                      <span style="font-size: 75%;color: #06774a;">feature2</span>    
                    </label>
                  </div>

              <div class="col-md-6">
                    <label class="" style="font-size:15px;margin:5px;cursor:pointer">
                      <input type="checkbox" 
                      name="playground_filtters_feature3"
                      value="1" 
                      >
                      <span style="font-size: 75%;color: #06774a;">feature3</span>    
                    </label>
                  </div>

              <div class="col-md-6">
                    <label class="" style="font-size:15px;margin:5px;cursor:pointer">
                      <input type="checkbox" 
                      name="playground_filtters_feature4"
                      value="1" 
                      >
                      <span style="font-size: 75%;color: #06774a;">feature4</span>    
                    </label>
                  </div>

              <div class="col-md-6">
                    <label class="" style="font-size:15px;margin:5px;cursor:pointer">
                      <input type="checkbox" 
                      name="playground_filtters_feature5"
                      value="1" 
                      >
                      <span style="font-size: 75%;color: #06774a;">feature5</span>    
                    </label>
                  </div>

              <div class="col-md-6">
                    <label class="" style="font-size:15px;margin:5px;cursor:pointer">
                      <input type="checkbox" 
                      name="playground_filtters_feature6"
                      value="1" 
                      >
                      <span style="font-size: 75%;color: #06774a;">feature6</span>    
                    </label>
                  </div>

              <div class="col-md-6">
                    <label class="" style="font-size:15px;margin:5px;cursor:pointer;">
                      <input type="checkbox" 
                      name="playground_filtters_feature7"
                      value="1" 
                      >
                      <span style="font-size: 75%;color: #06774a;">feature7</span>    
                    </label>
                  </div>

              <div class="col-md-6">
                 <label class="" style="font-size:15px;margin:5px;cursor:pointer">
                  <input type="checkbox" 
                  name="playground_filtters_feature8"
                  value="1" 
                  >
                  <span style="font-size: 75%;color: #06774a;">feature8</span>    
                </label>
              </div>

          </div>
            
        </div>
        <br>
        <div class="text-center">
           <button type="button" 
                style="background: #ff9800 !important; 
                       color: #fff !important;
                       border-color:#ddd;
                       box-shadow: 1px 0px 0px #eee;" 
                class="btn sm-inputs btn-warning" 
                id="playground_filtters"
            >
                Update
            </button> 
        </div>
        

    </div>
</div>