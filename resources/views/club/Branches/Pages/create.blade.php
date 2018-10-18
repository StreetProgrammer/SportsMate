@extends('club.index')
@section('content')
<div class="box box-primary mainInfo">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
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
          <div class="row" style="margin: auto">
            <div class="col-md-8">
              <strong class="" style="">
                <i class="fa fa-user custom" style="color: #3c8dbc;"></i>  
                Branch Name
              </strong>
              <p class="text-muted">
                {!! Form::text('c_b_name',old('c_b_name'),['class'=>'form-control']) !!}
              </p>
              <hr class="" style="">

              <strong class="" style="">
                <i class="fa fa-phone custom" style="color: #3c8dbc;"></i>  
                Phone
              </strong>
              <p class="text-muted">
                {!! Form::text('c_b_phone',old('c_b_phone'),['class'=>'form-control']) !!}
              </p>
              <hr class="">

              <strong><i class="fa fa-map-marker margin-r-5" style="color: #3c8dbc;"></i> Location</strong>

             <br>
            <div class="row">
               <div class="col-lg-5" style="">

                <select class="form-control input-xs" name="c_b_city" id="governorate">

                  <option value="">Select Governorate</option>

                  @foreach ($governorate as $gov)

                  <option
                    value="{{ $gov->id }}"
                    @php
                      echo ($club->clubProfile->c_b_city == $gov->id ? ' selected="selected" ' : '');
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
              <div class="col-lg-2 " style="" >
                  <div id="loader"
                       class="text-center "
                       style="display: none;z-index: 99999;font-size: 10px;color: #3c8dbc;"
                  >
                     <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                  </div>
              </div>
            </div>

          <div class="clearfix"></div>
            <!---->
              <hr>

              <strong><i class="fa fa-map-marker margin-r-5" style="color: #3c8dbc;"></i> Address</strong>
              <p class="text-muted">
                {!! Form::text('c_b_address',old('c_b_address'),['class'=>'form-control']) !!}
              </p>
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5" style="color: #3c8dbc;"></i> Description</strong>
              <textarea class="editDetails form-control" name="c_b_desc" id="c_b_desc" cols="30" rows="8" style="">
              </textarea>
              <hr style="display: none;" class="editDetails">
              
              <hr>
              {!! Form::hidden('c_b_logo','',['class'=>'']) !!}
              {!! Form::hidden('c_b_banner','',['class'=>'']) !!}
              {!! Form::submit(trans('admin.saveCountryBtn'),['class'=>'btn btn-primary', 'id' => 'createBranch']) !!}
              {!! Form::close() !!}
            </div>
            <div class="col-md-4 text-center" style="background: #fff">
              <div style="position: relative;">
                <img id="branchLogoPlaceholder" class="displayCamIcon img img-circle" src="https://placehold.co/200x200/ddd?text=Branch%20Logo" alt="">
                <label for="logoUpload" style="position:absolute;bottom:0%;left:50%;
                  transform:translate(-50%, -20%);
                  -ms-transform:translate(-50%, -20%);display: none;
                  color:white;border:none;
                  cursor:pointer;font-size:35px;color:#fff;">
                    <span style="">
                      <i class="fa fa-camera" aria-hidden="true"></i>
                    </span>
                    <input type="file" id="logoUpload" style="display:none">
                </label>
              </div>
              <br>
              <hr>
              <br>
              <div style="position: relative;">
                <img id="branchBannerPlaceholder" class="displayCamIcon img img-rounded" src="https://placehold.co/300x150/ddd?text=Branch%20Banner" alt="">
                <label for="bannerUpload" style="position:absolute;bottom:0%;left:50%;
                  transform:translate(-50%, -20%);
                  -ms-transform:translate(-50%, -20%);display: none;
                  color:white;border:none;
                  cursor:pointer;font-size:35px;color:#fff;">
                    <span style=""
                    >
                      <i class="fa fa-camera" aria-hidden="true"></i>
                    </span>
                    <input type="file" id="bannerUpload" style="display:none">
                </label>
              </div>
            </div>
          </div>  
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    <br>
  </div>
<!-- /.box -->
</div>
<!--  start upload branch logo Model -->
<div id="uploadBranchLogoModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Upload & Crop Image</h4>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-md-12 text-center">
              <div id="logo_crop" style="<!-- width:350px; --> margin-top:30px"></div>
            </div>
        </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success crop_BranchLogoImage">Crop</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
</div>
<!--  end upload branch logo Model -->
<!--  start upload branch logo Model -->
<div id="uploadBranchBannerModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Upload & Crop Image</h4>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-md-12 text-center">
              <div id="BannerImage" style="<!-- width:350px; --> margin-top:30px"></div>
            </div>
        </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success crop_BranchBannerImage">Crop</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
</div>
<!--  end upload branch logo Model -->
@endsection