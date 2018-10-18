<span class="mainInfoLoader" style="position:absolute;bottom:50%;left:50%;
						transform:translate(-50%, -20%);
						-ms-transform:translate(-50%, -20%);
						color:white;font-size:16px;border:none;
						cursor:pointer;font-size:10px;color:#3c8dbc;
						z-index: 1;display: none"
			>
				<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
			</span>
          <!-- About Me Box -->
          {!! Form::open(['url' => aurl(''), 'method' => 'POST']) !!}
          {!! Form::hidden( 'clubId', $club->id ) !!}
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About <span style="color:#3c8dbc;font-weight: bold;">{{$club->name}}</span> Club</h3>
              <span id="showHideEdit" class="hoverAble pull-right" style="font-size: 15px; color: #3c8dbc;cursor: pointer;position: relative;">
              	<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </span>
              <div class="displayAble" style="display:none;font-size: 15px; color: #fff;position: absolute;left: 25px;bottom: 25px; background: #0e0e0e82;border-radius: 5px;padding: 1px 5px;">
              		Update
              		<span style="font-size: 10px;">last update {{$club->updated_at}}</span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong class="editDetails" style="display:none;">
                <i class="fa fa-user custom" style="color: #3c8dbc;"></i>  
                User Name
              </strong>
              <p class="text-muted">
                <input type="text" name="name" class="editDetails form-control" style="display:none;" value="{{ $club->name }}">
              </p>

              <hr class="editDetails" style="display:none;">
              <strong><i class="fa fa-phone custom" style="color: #3c8dbc;"></i>  Phone</strong>

              <p class="text-muted">
              	<span class="displayDetails">{{ $club->clubProfile->c_phone }}</span>
              	<input type="text" name="c_phone" class="editDetails form-control" style="display:none;" value="{{ $club->clubProfile->c_phone }}">
              </p>

              <hr>

              <strong class="displayDetails"><i class="fa fa-envelope margin-r-5" style="color: #3c8dbc;"></i>  Email</strong>

              <p class="text-muted">
              <span class="displayDetails">{{ $club->email }}</span>
              </p>

              <hr class="displayDetails">

              <strong><i class="fa fa-map-marker margin-r-5" style="color: #3c8dbc;"></i> Location</strong>

              <p class="displayDetails text-muted" >
              	{{ $club->clubProfile->country->c_en_name }} 
                @if ($club->clubProfile->c_city != null)
                  , {{ $club->clubProfile->governorate->g_en_name }}
                @endif
                @if ($club->clubProfile->c_area != null)
                   , {{ $club->clubProfile->area->a_en_name }} 
                @endif
              </p>
              <p>{{ $club->clubprofile->c_address }}</p>
              <!---->

			<div class="col-lg-5 editDetails" style="display:none;">

              <select class="form-control input-xs" name="c_city" id="governorate">

                  <option value="">Select Governorate</option>

                @foreach ($governorate as $gov)

                    <option
                      value="{{ $gov->id }}"
                      @php
                        echo ($club->clubProfile->c_city == $gov->id ? ' selected="selected" ' : '');
                      @endphp
                    >
                        {{ $gov->g_en_name }}
                    </option>

                @endforeach


              </select>

            </div>
            <div class="col-lg-5 editDetails" style="display:none;">
	              <select class="form-control input-xs" name="c_area" id="area">

	                <option value="">Select Area</option>
	                @foreach ($governorate as $goov) <!--loop throw each city -->

	                    @foreach ($goov->areas as $area) <!--loop throw each city->area -->

	                      <!--check if we are in club city -->
	                      @if ($area->a_governorate_id == $club->clubProfile->c_city)

	                        <option
	                          value="{{ $area->id }}"
	                        @php
	                          echo ($club->clubProfile->c_area == $area->id ? ' selected="selected" ' : '');
	                        @endphp
	                        >
	                          {{ $area->a_en_name }}
	                        </option>

	                      @endif


	                    @endforeach
	              @endforeach

	            </select>
	        </div>
	        <div class="col-lg-2 editDetails" style="display:none;" >
				<div id="loader"
	                 class="text-center "
	                 style="display: none;z-index: 99999;font-size: 10px;color: #3c8dbc;"
	            >
	              <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
	            </div>
	        </div>
	        <div class="clearfix"></div>
            <!---->
              <br>
              <p class="text-muted">
                <input type="text" name="c_address" class="editDetails form-control" style="display:none;" value="{{ $club->clubprofile->c_address }}">
              </p>
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5" style="color: #3c8dbc;"></i> Description</strong>

              <p class="displayDetails">{{$club->clubprofile->c_desc}}</p>
              <textarea class="editDetails form-control" name="c_desc" id="c_desc" cols="30" rows="8" style="display: none">
              	{{$club->clubprofile->c_desc}}
              </textarea>
              <hr style="display: none;" class="editDetails">
              {!! Form::submit('Save', ['class' => 'editDetails btn btn-success', 'style' => 'display: none;', 'id' => 'EditClubMainInfo']) !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      	{!! Form::close() !!}