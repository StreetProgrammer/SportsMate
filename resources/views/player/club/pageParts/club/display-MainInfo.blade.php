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

  {{-- <div class="text-center" style="padding-left:40%;">
    <div class="oval-div oval-div-green" 
          style="cursor: pointer;float: left;"
          data-toggle="modal" data-target="#newChallengeModal"
    >
      <i class="fa fa-star"></i>
      <span>Invite</span>
    </div>
  </div> --}}
    
  
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
  <p style="color: #fff">
    <span style="color:#ddd">{{ trans('player.contain') }} </span>
    <span class="span-number" style="background:#f0ad4e!important;">{{$club->clubBranches->count()}}</span> 
    <span style="color:#ddd"> {{ trans('player.branches') }}</span>
  </p>
</div>

<div class="text-center" style="color: #fff;margin: auto;padding: 20px">
  <p style="color: #fff">
    <span>{{ trans('player.contain') }} </span>
    <span class="span-number" style="background:#f0ad4e!important;">{{$club->clubPlaygrounds->count()}}</span> 
    <span> {{ trans('player.playgrounds') }}</span>
  </p>
</div>
<!--  start upload profile image Model -->


<!--  end upload profile image Model -->

