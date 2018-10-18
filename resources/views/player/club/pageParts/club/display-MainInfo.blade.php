<input type="hidden" name="playerId" value="{{ $club->id }}">
<div class="profile-img-container text-center" style="padding: 25px 0px 0px 0px;">
  <div class="d-flex justify-content-center h-100">
    <div class="image_outer_container">
      <!-- <div class="green_icon"></div> -->
      <div class="image_inner_container">
        <img class="shade" 
            @if (empty($club->user_img))
              src="{{ url('/') }}/design/AdminLTE/dist/img/user.png"
            @else
              src="{{ Storage::url($club->user_img) }}"
            @endif
        >
      </div>
    </div>
  </div>
</div>

<div class="text-center">
  <div style="padding: 10px">
    <h3 style="color:#ddd">
      {{ $club->name }}
    </h3>
  </div>

  <div class="text-center" style="padding-left:40%;">
    <div class="oval-div oval-div-green" 
          style="cursor: pointer;float: left;"
          data-toggle="modal" data-target="#newChallengeModal"
    >
      <i class="fa fa-star"></i>
      <span>Invite</span>
    </div>
  </div>
    
  
  <div class="clearfix"></div>
  <h3 style="font-size: 95%;color:#FFF">
    <i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 130%;"></i>
    {{  $club->email }}
  </h3>

  <div>
    <p style="color: #fff">
      <i class="fa fa-phone"></i>
      {{$club->clubProfile->c_phone}}
    </p>
  </div>

  <div>
    <p style="color: #fff">
      <i class="fa fa-map-marker"></i>
      {{$club->clubProfile->governorate->g_en_name}}, {{$club->clubProfile->area->a_en_name}}
    </p>
  </div>

</div>

<div class="clearfix"></div>

<hr style="border-top: 2px solid #eee; margin:2px 20px;">
<div class="text-center" style="color: #fff;margin: auto;padding: 20px">

</div>
<!--  start upload profile image Model -->
<div id="uploadimageModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header" style="color: #fff;background-color: #06774a !important;">
            <button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
            <h4 class="modal-title" >
              Upload & Crop Image 
              <span id="imageInfoLoader" style="display:none;">
                <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
              </span>
            </h4>
          </div>
          <div class="modal-body imageInfo">
            <div class="row">
            <div class="col-md-12 text-center">
              <div id="player_photo" style="<!-- width:350px; --> margin-top:30px"></div>
            </div>
            
        </div>
          </div>
          <div class="modal-footer" style="color: #fff;background-color: #06774a !important;">
            <button class="btn btn-warning crop_image" style="background:#ff9800">Crop & Upload</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
</div>

<!--  end upload profile image Model -->

