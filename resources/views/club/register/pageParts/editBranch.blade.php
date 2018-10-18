<div class="container">
  <div class="col-md-12">
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i>  Playground</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class=" col-md-12">

              <div class="imageInfo col-md-4">       
                <!-- Profile Image -->
                <div class="box box-primary">
                  <div class="box-body box-profile">
                    <div class="text-center" style="">
                        <!-- check if club has branches -->
                        @if (Auth::user()->clubBranches->count() > 0)
                          @foreach (Auth::user()->clubBranches as $branch)

                            <div style="border: 1px solid #3c8dbc;
                                        margin: 5px 5px;
                                        padding: 10px 0px;
                                        border-radius: 5px;
                                        background: #ddd;"
                            >
                              <p style="color: #3c8dbc;font-size: 115%;font-weight: bold;">
                                <span class="text-center">
                                  {{ $branch->c_b_name }}
                                </span>
                                <span id="{{ $branch->id }}"  
                                      class="DeleteBranch pull-right" 
                                      style="margin: -10px 5px 0px 5px;
                                            color:#3c8dbc;
                                            cursor: pointer;"
                                >
                                  <i class="fa fa-close"></i>
                                </span>
                                <span id="{{ $branch->id }}"  
                                      class="DisplayEditBranch pull-right" 
                                      style="margin: -10px 5px 0px 5px;
                                            color:#3c8dbc;
                                            cursor: pointer;"
                                >
                                  <i class="fa fa-edit"></i>
                                </span>
                              </p>
                              @if ($branch->branchPlaygrounds->count() > 0)
                                @foreach ($branch->branchPlaygrounds as $playground)
                                  <div style="padding: 10px 0px 0px 10px;
                                              margin: 10px 40px;
                                              border: 1px solid #3c8dbc;
                                              background: #fff;
                                              border-radius: 10px;"
                                  >
                                    <p>
                                      <span class="text-center">
                                        {{ $playground->c_b_p_name }}
                                      </span>
                                      <span id="{{ $playground->id }}"  
                                            class="DeletePlayground pull-right" 
                                            style="margin: -10px 5px 0px 5px;
                                                  color:#3c8dbc;
                                                  cursor: pointer;"
                                      >
                                        <i class="fa fa-close"></i>
                                      </span>
                                      <span id="{{ $playground->id }}"  
                                            class="DisplayEditPlayground pull-right" 
                                            style="margin: -10px 5px 0px 5px;
                                                  color:#3c8dbc;
                                                  cursor: pointer;"
                                      >
                                        <i class="fa fa-edit"></i>
                                      </span>
                                          </p>
                                  </div>
                                @endforeach
                              @else
                                <div class="text-center">
                                  <span class="label label-danger">No Playgrounds</span>
                                </div>
                              @endif
                              <hr>
                                Add New Playground
                                <span id="{{ $branch->id }}"  
                                      class="AddPlaygroundRegister"  style="cursor: pointer;color: #3c8dbc;">
                                  <i class="fa fa-plus-square"></i>
                                </span>
                            </div>
                            
                          @endforeach

                          <hr>
                          Add New Branch
                          <span class="ShowManagePart" style="cursor: pointer;color: #3c8dbc;">
                            <i class="fa fa-plus-square"></i>
                          </span>
                        @else
                          <hr>
                          Add New Branch
                          <span class="ShowManagePart" style="cursor: pointer;color: #3c8dbc;">
                            <i class="fa fa-plus-square"></i>
                          </span>
                        @endif
                        
                    </div>
                  </div>

                <!-- /.box-body -->
                </div>
              <!-- /.box -->
                <br><br>
                <!----->
                @php
                $registerDone = 1 ;
                  if (Auth::user()->clubBranches->count() > 0){
                    foreach (Auth::user()->clubBranches as $Branch) {
                      if ($Branch->branchPlaygrounds->count() == 0) {
                        $registerDone = 0 ;
                      }
                    }
                  }                  
                @endphp
                
                @if ($registerDone == 1)
                  <div style="padding: 10px;
                          margin: 10px;
                          border: 2px solid #3c8dbc;
                          border-radius: 5px;
                          background: #ecf0f5;"   
                  >
                    <p style="color: #3c8dbc;
                            font-size: 100%;
                            font-weight: bold;
                            font-family: sans-serif;"   
                    >
                      if you finished your club data, please click button below to save it and wait for our response
                    </p>
                    <button class="btn btn-success btn-block">Send Account Data</button>
                  </div>
                  <!----->
                @endif
                
                  
              </div>

        <div class="mainInfo col-md-8">
          <!-- About Me Box -->
          {!! Form::open(['url' => aurl(''), 'method' => 'POST']) !!}
          {!! Form::hidden( 'clubBranch', $clubBranch->id ) !!}
          <div class="box box-primary">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- <p class="text-center">hggh</p> -->
              <strong>
                <i class="fa fa-building custom" style="color: #3c8dbc;"></i>  
                Branch Name
              </strong>
              <p class="text-muted">
                <input type="text" name="c_b_name" class="form-control"  value="{{$clubBranch->c_b_name}}">
              </p>

              <hr class="">
              <strong><i class="fa fa-phone custom" style="color: #3c8dbc;"></i> Branch Phone</strong>

              <p class="text-muted">
                <input type="text" name="c_b_phone" class="form-control" value="{{$clubBranch->c_b_phone}}">
              </p>

              <hr class="">
              <div class="clearfix"></div>

              <strong><i class="fa fa-map-marker margin-r-5" style="color: #3c8dbc;"></i> Location</strong>

              <p class="displayDetails text-muted" >
                
              <!---->

              <div class="col-lg-5">

                      <select class="form-control input-xs" name="c_b_city" id="governorate">

                          <option value="">Select Governorate</option>

                        @foreach ($governorate as $gov)

                            <option
                              value="{{ $gov->id }}"
                              @php
                                echo ($clubBranch->c_b_city == $gov->id ? ' selected="selected" ' : '');
                              @endphp
                            >
                                {{ $gov->g_en_name }}
                            </option>

                        @endforeach


                      </select>

                    </div>
                    <div class="col-lg-5" style="">
                        <select class="form-control input-xs" name="c_b_area" id="area">
                          <option value="">Select Area</option>
                          @foreach ($governorate as $goov) <!--loop throw each city -->

                                @foreach ($goov->areas as $area) <!--loop throw each city->area -->

                                  <!--check if we are in club city -->
                                  @if ($area->a_governorate_id == $clubBranch->c_b_city)

                                    <option
                                      value="{{ $area->id }}"
                                    @php
                                      echo ($clubBranch->c_b_area == $area->id ? ' selected="selected" ' : '');
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
                    <input type="text" name="c_b_address" class="form-control" value="{{$clubBranch->c_b_address}}">
                  </p>
                  <hr>

                  <strong>
                    <i class="fa fa-file-text-o margin-r-5" style="color: #3c8dbc;"></i> Description
                  </strong>

                  <textarea class="form-control" name="c_b_desc" id="c_b_desc" cols="30" rows="8">
                    {{$clubBranch->c_b_desc}}
                  </textarea>
                  <br>
                  {!! Form::submit('Update', ['class' => 'btn btn-success', 'style' => '', 'id' => 'updateBranchRegister']) !!}
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
