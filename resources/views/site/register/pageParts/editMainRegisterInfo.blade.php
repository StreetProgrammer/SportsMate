<div class="container">
  <div class="col-md-12">
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i> Color Palette</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class=" col-md-12">

              <div class="imageInfo col-md-4">       
                <!-- Profile Image -->
                <div class="box box-primary">
                  <div class="box-body box-profile">
                    <div class="text-center" style="position: relative">
                      <img id="editClubProfileImagePlaceholder" class="displayCamIcon img img-rounded" 
                            @if ( !empty(Auth::user()->user_img) )
                              src = "{{ Storage::url($club->user_img) }}"
                            @else
                              src="http://via.placeholder.com/200x200?text=Club%20Logo"
                            @endif
                            alt="User profile picture"
                       >
                      <label for="editClubProfileImageFile" style="position:absolute;bottom:0%;left:50%;
                        transform:translate(-50%, -20%);
                        -ms-transform:translate(-50%, -20%);display: none;
                        color:white;font-size:16px;border:none;
                        cursor:pointer;font-size:20px;color:#fff;">
                        <span style=""
                        >
                          <i class="fa fa-camera" aria-hidden="true"></i>
                        </span>
                        <input type="file" id="editClubProfileImageFile" style="display:none">
                    </label>
                    </div>
                    <br>
                  {!! Form::open(['url' => url(''), 'method' => 'POST']) !!}
                      {!! Form::hidden( 'clubId', Auth::id() ) !!}
                      {!! Form::hidden( 'user_img', '' ) !!}
                      {!! Form::submit('Upload', 
                                        ['class' => 'btn btn-success btn-block', 
                                        'id' => 'updateClubProfileImage',
                                        'style' => 'display:none'
                                      ]) 
                      !!}
                  {!! Form::close() !!}
                  </div>
                <!-- /.box-body -->
                </div>
              <!-- /.box -->
              </div>

        <div class="mainInfo col-md-8">
          <!-- About Me Box -->
          {!! Form::open(['url' => aurl(''), 'method' => 'POST']) !!}
          {!! Form::hidden( 'clubId', Auth::id() ) !!}
          <div class="box box-primary">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- <p class="text-center">hggh</p> -->
              <strong>
                <i class="fa fa-user custom" style="color: #3c8dbc;"></i>  
                User Name
              </strong>
              <p class="text-muted">
                <input type="text" name="name" class="form-control"  value="{{Auth::user()->name}}">
              </p>

              <hr class="">
              <strong><i class="fa fa-phone custom" style="color: #3c8dbc;"></i>  Phone</strong>

              <p class="text-muted">
                <input type="text" name="c_phone" class="form-control" value="{{Auth::user()->clubProfile->c_phone}}">
              </p>

              <hr>

              <strong class="displayDetails"><i class="fa fa-envelope margin-r-5" style="color: #3c8dbc;"></i>  Email</strong>

              <p class="text-muted">
              <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
              </p>

              <hr class="">

              <p class="displayDetails">
                <i class="fa fa-key margin-r-5" style="color: #3c8dbc;"aria-hidden="true"></i>
                Password
              </p>
              <div class="col-md-10">
                <p class="text-muted">
                  <input type="password" name="password" class="form-control" value="">
                </p>
              </div>
              <div class="col-md-2 text-center">
                <strong class="showHidePass" style="font-size: 120%;
                                        border: 2px solid #3c8dbc;
                                        padding: 3px 5px;
                                        border-radius: 15px;
                                        cursor: pointer;"
                >
                  <i class="fa fa-eye" style="color: #3c8dbc;"aria-hidden="true"></i>
                </strong>
              </div>
              <hr class="">
              <div class="clearfix"></div>

              <strong><i class="fa fa-map-marker margin-r-5" style="color: #3c8dbc;"></i> Location</strong>

              <p class="displayDetails text-muted" >
                
              <!---->

              <div class="col-lg-5">

                      <select class="form-control input-xs" name="c_city" id="governorate">

                          <option value="">Select Governorate</option>

                        @foreach ($governorate as $gov)

                            <option
                              value="{{ $gov->id }}"
                              @php
                                echo (Auth::user()->clubProfile->c_city == $gov->id ? ' selected="selected" ' : '');
                              @endphp
                            >
                                {{ $gov->g_en_name }}
                            </option>

                        @endforeach


                      </select>

                    </div>
                    <div class="col-lg-5" style="">
                        <select class="form-control input-xs" name="c_area" id="area">
                          <option value="">Select Area</option>
                          @foreach ($governorate as $goov) <!--loop throw each city -->

                                @foreach ($goov->areas as $area) <!--loop throw each city->area -->

                                  <!--check if we are in club city -->
                                  @if ($area->a_governorate_id == Auth::user()->clubProfile->c_city)

                                    <option
                                      value="{{ $area->id }}"
                                      @php
                                        echo (Auth::user()->clubProfile->c_area == $area->id ? ' selected="selected" ' : '');
                                      @endphp
                                    >
                                      {{ $area->a_en_name }}
                                    </option>

                                  @endif


                                @endforeach
                          @endforeach
                        </select>
                    </div>
                  <div class="col-lg-2" style="" >
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
                  <strong>
                    <i class="fa fa-map-marker margin-r-5" style="color: #3c8dbc;"></i> Detailed Address
                  </strong>
                  <p class="text-muted">
                    <input type="text" name="c_address" class="form-control" value="{{Auth::user()->clubprofile->c_address}}">
                  </p>
                  <hr>

                  <strong>
                    <i class="fa fa-file-text-o margin-r-5" style="color: #3c8dbc;"></i> Description
                  </strong>

                  <textarea class="form-control" name="c_desc" id="c_desc" cols="30" rows="8">
                    {{Auth::user()->clubprofile->c_desc}}
                  </textarea>
                  <br>
                  {!! Form::submit('Save', ['class' => 'btn btn-success', 'style' => '', 'id' => 'UpdateClubMainInfo']) !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        {!! Form::close() !!}
              </div>

            </div>
            <!-- /.col -->
            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
  </div>
</div>

<!--  start upload branch logo Model -->
<div id="EditclubProfileImageModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Crop Image</h4>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-md-12 text-center">
              <div id="EditclubProfileImage_crop" style="<!-- width:350px; --> margin-top:30px"></div>
            </div>
        </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success crop_editClubProfileImage">Crop</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
</div>
<!--  end upload branch logo Model -->
