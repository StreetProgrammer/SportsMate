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

                @if ( $registerDone == 1 )
                  <!---->
                  {!! Form::open(['url' => url('NewClubProfileCreated'), 'method' => 'POST']) !!}
                  {!! Form::hidden( 'clubId', Auth::id() ) !!}
                  {!! Form::hidden( 'status', Auth::user()->our_is_active ) !!}
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
                    {!! Form::submit('Send Account Data', ['class' => 'btn btn-success btn-block']) !!}
                    {!! Form::close() !!}
                  </div>
                  <!----->
                
                @endif
                  
              </div>

        <div class="mainInfo col-md-8">
          <!-- About Me Box -->
          {!! Form::open(['url' => aurl(''), 'method' => 'POST']) !!}
          {!! Form::hidden( 'clubId', Auth::id() ) !!}
          {!! Form::hidden( 'branchId', $clubBranch->id ) !!}
          {!! Form::hidden( 'c_b_p_country', Auth::user()->clubProfile->c_country ) !!}
          <div class="box box-primary">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- <p class="text-center">hggh</p> -->
              <strong>
                <i class="fa fa-building custom" style="color: #3c8dbc;"></i>  
                Playground Name
              </strong>
              <p class="text-muted">
                <input type="text" name="c_b_p_name" class="form-control"  value="">
              </p>

              <hr class="">
              <strong><i class="fa fa-phone custom" style="color: #3c8dbc;"></i> Playground Phone</strong>

              <p class="text-muted">
                <input type="text" name="c_b_p_phone" class="form-control" value="">
              </p>

              <hr class="">
              <strong><i class="fa fa-phone custom" style="color: #3c8dbc;"></i> Sport</strong>

              <p class="text-muted">
                <select class="form-control input-xs" name="c_b_p_sport_id" id="sport">
                  <option value="">Select Sport</option>
                  @foreach ($sports as $sport)

                    <option
                        value="{{ $sport->id }}"
                    >
                        {{ $sport->en_sport_name }}
                    </option>

                  @endforeach
                </select>
              </p>

              <hr class="">
              <strong><i class="fa fa-phone custom" style="color: #3c8dbc;"></i> Price Per Hour</strong>

              <p class="text-muted">
                <input type="text" name="c_b_p_price_per_hour" class="form-control" value="">
              </p>

              <hr class="">
              <div class="clearfix"></div>

              <strong><i class="fa fa-map-marker margin-r-5" style="color: #3c8dbc;"></i> Location</strong>

              <p class="displayDetails text-muted" >
                
              <!---->

              <div class="col-lg-5">

                      <select class="form-control input-xs" name="c_b_p_city" id="governorate">

                          <option value="">Select Governorate</option>

                        @foreach ($governorate as $gov)

                            <option
                              value="{{ $gov->id }}"
                            >
                                {{ $gov->g_en_name }}
                            </option>

                        @endforeach


                      </select>

                    </div>
                    <div class="col-lg-5" style="">
                        <select class="form-control input-xs" name="c_b_p_area" id="area">
                          <option value="">Select Area</option>
                          @foreach ($governorate as $goov) <!--loop throw each city -->

                                @foreach ($goov->areas as $area) <!--loop throw each city->area -->

                                  <!--check if we are in club city -->
                                  @if ($area->a_governorate_id == Auth::user()->clubProfile->c_city)

                                    <option
                                      value="{{ $area->id }}"
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
                    <input type="text" name="c_b_p_address" class="form-control" value="">
                  </p>
                  <hr>

                  <strong>
                    <i class="fa fa-file-text-o margin-r-5" style="color: #3c8dbc;"></i> Description
                  </strong>
                  <textarea class="form-control" name="c_b_p_desc" id="c_b_p_desc" cols="30" rows="8">
                    
                  </textarea>
                  <div class="row" >
                    <div class="col-md-12">
                      <p>features</p>
                    </div>
                    <div class="col-md-12">
                      <div class="col-md-3 text-center">
                        <div class="fea" style="background: #ecf0f5;border:1px solid #ddd;margin-bottom: 5px;">
                          <label class="" style="cursor: pointer;" for="feature 1">feature 1</label>
                          {{ Form::checkbox('features[]', 'feature1', ['id'=> 'feature 1']) }}
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        <div class="fea" style="background: #ecf0f5;border:1px solid #ddd;margin-bottom: 5px;">
                          <label class="" style="cursor: pointer;" for="feature 2">feature 2</label>
                          {{ Form::checkbox('features[]', 'feature2', ['id'=> 'feature 2']) }}
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        <div class="fea" style="background: #ecf0f5;border:1px solid #ddd;margin-bottom: 5px;">
                          <label class="" style="cursor: pointer;" for="feature 3">feature 3</label>
                          {{ Form::checkbox('features[]', 'feature3', ['id'=> 'feature 3']) }}
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        <div class="fea" style="background: #ecf0f5;border:1px solid #ddd;margin-bottom: 5px;">
                          <label class="" style="cursor: pointer;" for="feature 4">feature 4</label>
                          {{ Form::checkbox('features[]', 'feature4', ['id'=> 'feature 4']) }}
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        <div class="fea" style="background: #ecf0f5;border:1px solid #ddd;margin-bottom: 5px;">
                          <label class="" style="cursor: pointer;" for="feature 5">feature 5</label>
                          {{ Form::checkbox('features[]', 'feature5', ['id'=> 'feature 5']) }}
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        <div class="fea" style="background: #ecf0f5;border:1px solid #ddd;margin-bottom: 5px;">
                          <label class="" style="cursor: pointer;" for="feature 6">feature 6</label>
                          {{ Form::checkbox('features[]', 'feature6', ['id'=> 'feature 6']) }}
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        <div class="fea" style="background: #ecf0f5;border:1px solid #ddd;margin-bottom: 5px;">
                          <label class="" style="cursor: pointer;" for="feature 7">feature 7</label>
                          {{ Form::checkbox('features[]', 'feature7', ['id'=> 'feature 7']) }}
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        <div class="fea" style="background: #ecf0f5;border:1px solid #ddd;margin-bottom: 5px;">
                          <label class="" style="cursor: pointer;" for="feature 8">feature 8</label>
                          {{ Form::checkbox('features[]', 'feature8', ['id'=> 'feature 8']) }}
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        <div class="fea" style="background: #ecf0f5;border:1px solid #ddd;margin-bottom: 5px;">
                          <label class="" style="cursor: pointer;" for="feature 9">feature 9</label>
                          {{ Form::checkbox('features[]', 'feature9', ['id'=> 'feature 9']) }}
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        <div class="fea" style="background: #ecf0f5;border:1px solid #ddd;margin-bottom: 5px;">
                          <label class="" style="cursor: pointer;" for="feature 10">feature 10</label>
                          {{ Form::checkbox('features[]', 'feature10', ['id'=>'feature 10']) }}
                        </div>
                      </div>
                    </div>
                      
                  </div>
                  <div class="row">
                    <div class="col-md-12">  
                      <label id="forPlaygroundImageFile" for="playgroundImageFile" style="position:absolute;bottom:0%;left:50%;
                        transform:translate(-50%, 105%);
                        -ms-transform:translate(-50%, 110%);
                        font-size:16px;border:none;
                        cursor:pointer;font-size:16px;color:#3c8dbc;"
                      >
                        Add Photos
                        <span style=""
                        >
                          <i class="fa fa-picture-o margin-r-5" style="color: #3c8dbc;"></i>
                        </span>
                          <input type="file" id="playgroundImageFile" style="display:none">
                      </label>
                    </div>
                  </div>
                  <div class="row playgroundGallaryPlaceholder" style="margin: 25px 0px 0px 0px;background: #ecf0f5;border: 1px solid #d2d6de;">
                    
                  </div>
                  <br>
                  <br>
                  <input type="hidden" name="photos">
                  {!! Form::submit('Save', ['class' => 'btn btn-success', 'style' => '', 'id' => 'AddNewPlaygroundRegister']) !!}
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
<div id="playgroundImageFileModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Crop Image</h4>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-md-12 text-center">
              <div id="playgroundImgDiv" style="<!-- width:350px; --> margin-top:30px"></div>
            </div>
        </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success crop_playgroundImage">Crop</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
</div>
<!--  end upload branch logo Model -->
<script>
  // start proccess of playground images crop and prepare input value in [[ register Proccess ]] to [[ store ]]

  $playgroundImg = $('#playgroundImgDiv').croppie({
        enableExif: true,
        viewport: {
          width:200,
          height:200,
          type:'square' //circle
        },
        boundary:{
          width:300,
          height:300
        }
      });

  $(document).on('change', "#playgroundImageFile", function () {
    var reader = new FileReader();
    reader.onload = function (event) {
      $playgroundImg.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    //alert('done') ;
    $('#playgroundImageFileModal').modal('show');
  });
  $(document).on('click', ".crop_playgroundImage", function (event) {
    $playgroundImg.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $('.playgroundGallaryPlaceholder').append('<div class="col-md-3 text-center" style="position: relative;display: inline-block;"><div style="padding:5px;"><img class="img img-thumbnail gallaryImg" style="width:100px" src="'+ response +'"></div><span class="DelImg" style="cursor: pointer;position: absolute;top: 10px;right: 45px;color: #3c8dbc;"><i class="fa fa-times-circle"></i></span></div>');
      
      $('#playgroundImageFileModal').modal('hide');
      var playgroundImageFile = $("#playgroundImageFile");
      playgroundImageFile.replaceWith( playgroundImageFile = playgroundImageFile.clone( true ) );
      if ( $('.gallaryImg').length > 4 ) {
        $('#forPlaygroundImageFile').fadeOut();
      } else {
        $('#forPlaygroundImageFile').fadeIn();
      }
    })
  });

  $(document).on('click', ".DelImg", function () {

    $(this).parent().remove() ;
    var count = $('.gallaryImg').length ;
    //alert(count);
    if ( $('.gallaryImg').length > 4 ) {
      $('#forPlaygroundImageFile').fadeOut();
    } else {
      $('#forPlaygroundImageFile').fadeIn();
    }

  });

 //end proccess of playground images crop and prepare input value in [[ register Proccess ]] to [[ store ]]


</script>
