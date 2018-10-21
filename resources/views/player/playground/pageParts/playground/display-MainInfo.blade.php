<input type="hidden" name="playerId" value="{{ $playground->id }}">
{{--<div class="profile-img-container text-center" style="padding: 25px 0px 0px 0px;">
  <div class="d-flex justify-content-center h-100">
    <div class="image_outer_container">
      <!-- <div class="green_icon"></div> -->
      <div class="image_inner_container">
        <img class="shade" 
            @if (empty($playground->user_img))
              src="{{ url('/') }}/design/AdminLTE/dist/img/user.png"
            @else
              src="{{ Storage::url($playground->user_img) }}"
            @endif
        >
      </div>
    </div>
  </div>
</div>--}}

<div class="text-center">

  <div style="padding: 10px">
    <h3 style="color:#ddd">
      {{ $playground->c_b_p_name }}
    </h3>
  </div>

  <h3 style="font-size: 110%;color:#FFF">
    
    <a href="{{ url('/') }}/Club/{{sm_crypt($playground->clubUser->id)}}" 
       class="btn btn-success" 
       style="border-radius: 25px;background:#99d21e;font-size:12px;display:inline-flex;"
    >
      {{ trans('player.Club') }} 
      <i class="fa fa-futbol-o" aria-hidden="true"></i> 
      {{$playground->clubUser->name}}
    </a>
    
    <a href="{{ url('/') }}/Club/{{sm_crypt($playground->clubUser->id)}}" 
       class="btn btn-success" 
       style="margin:5px;border-radius: 25px;background:#99d21e;font-size:12px;display:inline-flex;"
    >
      {{ trans('player.Branch') }}  
      <i class="fa fa-futbol-o" aria-hidden="true"></i> 
      {{$playground->branch->c_b_name}}
    </a>
    
  </h3>

   <h3 style="font-size: 110%;color:#FFF">
    <i class="fa fa-futbol-o" aria-hidden="true"></i>
    @if (direction() == 'ltr')
      {{$playground->sport->en_sport_name}}
    @else
      {{$playground->sport->ar_sport_name}}
    @endif
  </h3>

  <h3 style="font-size: 110%;color:#FFF">
    <i class="fa fa-money" aria-hidden="true"></i>
    <span style="color: #f89406;">
      {{$playground->c_b_p_price_per_hour}} {{ trans('player.EGP') }}
    </span>
    {{ trans('player./_hour') }}
  </h3>
  

  <div class="text-center" style="">
    <div class="btn btn-success" 
          style="border-radius: 25px;background:#99d21e;"
          data-toggle="modal" data-target="#newReservationModal"
    >
      <i class="fa fa-calendar-plus-o"></i>
      <span>{{ trans('player.Reserve') }} </span>
    </div>
  </div>
    
  <br>
  <div class="clearfix"></div>

  <div>
    <p style="color: #fff">
      <i class="fa fa-phone"></i>
      {{$playground->c_b_p_phone}}
    </p>
  </div>

  <div>
    <p style="color: #fff">
      <i class="fa fa-map-marker"></i>
      {{$playground->city->g_en_name}}, {{$playground->area->a_en_name}}
    </p>
  </div>

</div>

@if (!empty($playground->c_b_p_desc))
  <div class="clearfix"></div>

  <hr style="border-top: 2px solid #eee; margin:2px 20px;">
  <div  style="color: #fff;margin: auto;padding: 20px">
    <h4 class="text-center">{{ trans('player.Description') }}</h4>
    <p style="color:#fff">{{$playground->c_b_p_desc}}</p>
  </div>
@endif



