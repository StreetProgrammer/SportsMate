<span class="mainInfoLoader" style="position:absolute;bottom:50%;left:50%;
						transform:translate(-50%, -20%);
						-ms-transform:translate(-50%, -20%);
						color:white;font-size:16px;border:none;
						cursor:pointer;font-size:10px;color:#3c8dbc;
						z-index: 1;display: none"
			>
				<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
			</span>
          <!-- plygrounds Box -->
          <div class="box box-primary mainBranchInfo">
            <div class="box-header with-border">
              <h3 class="box-title"> 
                <span style="color:#3c8dbc;font-weight: bold;">
                  {{$clubBranche->c_b_name}}
                </span> 
                Playgrounds
              </h3>
              <span id="showHidePlaygrounds" class="hoverAble pull-right" style="font-size: 15px; color: #3c8dbc;cursor: pointer;position: relative;">
              	{{$clubBranche->branchPlaygrounds->count()}} Playground Till Now
              	<i class="fa fa-plus-square" aria-hidden="true"></i>
              </span>
              <div class="displayAble" style="display:none;font-size: 15px; color: #fff;position: absolute;left: 25px;bottom: 25px; background: #0e0e0e82;border-radius: 5px;padding: 1px 5px;">
              		<span style="font-size: 10px;">Add New Playground</span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<div class="addNewPlayground" style="display: none;">
            		{!! Form::open(['url' => url(''), 'method' => 'POST']) !!}
                  	{!! Form::hidden( 'clubId', Auth::id() ) !!}
                  	{!! Form::hidden( 'clubBranchId', $clubBranche->id ) !!}
		              <strong class="" style="">
		                <i class="fa fa-building custom" style="color: #3c8dbc;"></i>  
		                Playground Name
		              </strong>
		              <p class="text-muted">
		                <input type="text" name="c_b_p_name" class=" form-control" style="" value="">
		              </p>

		              <hr class="" style="">
		              <strong><i class="fa fa-phone custom" style="color: #3c8dbc;"></i>  Phone</strong>

		              <p class="text-muted">
		              	<input type="text" name="c_b_P_phone" class=" form-control" style="" value="{{ $clubBranche->c_b_phone }}">
		              </p>

		              <hr class="displayDetails">
					  <strong><i class="fa fa-phone custom" style="color: #3c8dbc;"></i>  Sport</strong>
		              <p class="text-muted">
		              	<select class="form-control input-xs" name="c_b_p_sport_id" id="c_b_p_sport_id">

		                  <option value="">Select Sport</option>

			                @foreach ($sports as $sport)

			                    <option
			                      value="{{ $sport->id }}"
			                    >
									
			                      @php
			                        if (session()->get('lang') == 'ar') {
							            echo $sport->ar_sport_name;
							        } elseif (session()->get('lang') == 'en') {
							            echo $sport->en_sport_name;
							        }else{

							        	//## handle it if no seesion ##//
							        	//echo $sport-> . setting()->main_lang . '_sport_name'; 
							        }
			                      @endphp
			                    </option>

			                @endforeach

		              </select>
		              </p>

		            <hr class="displayDetails">
					<strong><i class="fa fa-phone custom" style="color: #3c8dbc;"></i>  Sport</strong>
					<p class="text-muted">
	              	<input type="number" step="any"  name="fuel" class="form-control"/>
	              </p>
	              <strong><i class="fa fa-map-marker margin-r-5" style="color: #3c8dbc;"></i> Location</strong>

		              <p class="text-muted"></p>
		              <!---->

					<div class="col-lg-5 " style="">

		              <select class="form-control input-xs" name="c_b_p_city" id="governorate">

		                  <option value="">Select Governorate</option>

		                @foreach ($governorate as $gov)

		                    <option
		                      value="{{ $gov->id }}"
		                      @php
		                        echo ($clubBranche->city == $gov->id ? ' selected="selected" ' : '');
		                      @endphp
		                    >
		                        {{ $gov->g_en_name }}
		                    </option>

		                @endforeach


		              </select>

		            </div>
		            <div class="col-lg-5 " style="">
			              <select class="form-control input-xs" name="c_b_p_area" id="area">

			                <option value="">Select Area</option>
			                @foreach ($governorate as $goov) <!--loop throw each city -->

			                    @foreach ($goov->areas as $area) <!--loop throw each city->area -->

			                      <!--check if we are in clubBranche city -->
			                      @if ($area->a_governorate_id == $clubBranche->c_b_city)

			                        <option
			                          value="{{ $area->id }}"
			                        @php
			                          echo ($clubBranche->area == $area->id ? ' selected="selected" ' : '');
			                        @endphp
			                        >
			                          {{ $area->a_en_name }}
			                        </option>

			                      @endif


			                    @endforeach
			              @endforeach

			            </select>
			        </div>
			        <div class="col-lg-2 " style="" >
						<div id="loader"
			                 class="text-center "
			                 style="display: none;z-index: 99999;font-size: 10px;color: #3c8dbc;"
			            >
			              <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
			            </div>
			        </div>
			        <div class="clearfix"></div>
		           <br class="" style=""> 
		            <strong class="" style="">
		              <i class=" fa fa-map-marker margin-r-5" style="color: #3c8dbc;"></i> Detail Adreess
		            </strong>
		            <p class="text-muted">
		              <input type="text" name="c_b_address" class=" form-control" style="" value="{{ $clubBranche->c_b_p_address }}">
		            </p>
		          <!---->
		            <hr>

		              <strong><i class="fa fa-file-text-o margin-r-5" style="color: #3c8dbc;"></i> Description
		              <textarea class=" form-control" name="c_desc" id="c_desc" cols="30" rows="8" style="">

		              </textarea>
		              <hr style="" class="">
		              {!! Form::submit('Add', ['class' => 'btn btn-success', 'style' => '', 'id' => 'EditclubBrancheMainInfo']) !!}
            	</div><!-- end of #AddNewPlayground -->
				<div class="displayPlaygroundsDetails">
					<!-- start filpable div -->
					<div class="row">

	                    <ul id="playlist-1" style="list-style-type: none;">
	                    @foreach ($clubBranche->branchPlaygrounds as $playground)

	                    	<div class="sura text-center col-md-4 col-sm-4 col-xs-6 " >
	                            <div class="flip3d">
	                                <div class="back"> 
	                                    <p>
	                                    	<a class="play sura_link" href="">
	                                    		<span class="glyphicon glyphicon-play" ></span>
	                                    		{{ $playground->c_b_p_name }}
	                                    	</a>
	                                    </p>
	                                    <p>
	                                    	<a class="sura_link" href="" download>
	                                    		<span class="glyphicon glyphicon-download-alt"></span>
	                                    		For {{ $playground->sport->en_sport_name }}
	                                    	</a>
	                                    </p>
	                                </div>
	                                <div class="front">
	                                    <img id="branchLogoPlaceholder" class="displayCamIcon img img-rounded" 
						                    @if (empty($playground->c_b_p_logo))
						                      src="http://via.placeholder.com/150x150?text=Playground%20Logo"
						                    @else
						                      src="{{ Storage::url($playground->c_b_p_logo) }}"
						                    @endif
						                    alt="User profile picture"
						                alt="">
	                                    <i class=""></i>
	                                </div>
	                            </div>
	                        </div>

	                    @endforeach   
	                    </ul>

	                </div>
					
					<!-- end filpable div -->
				</div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->