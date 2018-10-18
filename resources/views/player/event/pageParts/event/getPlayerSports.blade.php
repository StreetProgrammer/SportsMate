<div class="row">
	<div class="col-md-12">
		<div id="sportErrors" class="alert alert-danger text-center" style="display:none">
	        <h4><i class="fa fa-warning"></i></h4>
	        <p style="font-size: 90%;color: #a94442;">
	          if your change in any sport or sport role conflict with [Event - Challenge - Reservation ] in the future and your are part of it we can not accept your request until it's end time 
	      	</p>
        </div>
	</div>
</div>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8 text-center">
    <div class="form-group">
      <label for="sportToAdd" style="color:#06774a">Add Sport </label>
      <select class="sm-inputs form-control input-xs" name="sportToAdd" id="sportToAdd">
        <option value="">Select Sport</option>
        @foreach ($sports as $sport)
          @if ( $user->sports->contains($sport) == false)
            <option value="{{ $sport->id }}" >
                {{ $sport->en_sport_name }}
            </option>
          @endif
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-md-2 after"></div>
  
  <br>

   @foreach ($user->sports as $sport)
    <div class="col-md-4">
      <div class="shade" style="padding: 0px 16px;
                  background: #eee;
                  border: 2px solid #fff;
                  border-radius: 5px;
                  margin: 10px 0px;
                  height:110px" 
      >
        <p style="color: #fff;">
          <span style="color:#37474f;font-size:15px">
            {{$sport->en_sport_name}}
          </span>
          <span id="{{$sport->id}}"
                class="detachSport pull-right" 
                style="color:#37474f;font-size:15px;cursor:pointer;">
            <i class="fa fa-close"></i>
          </span>
          <br>

          <div class="checkbox">
            <label>
              <input 
                type="checkbox"
                class="sport_role" 
                id="{{$sport->id}}_player" 
                name="{{$sport->id}}_sport_roles[]" 
                value="{{ $sport->id }}"
                @if ($sport->sportUserInfo->as_player == 1)
                  checked="checked"
                @endif
            
            >
              <span style="" class="badge badge-success rolesbadge">
                  {{ trans('player.A_Player') }}
              </span>
            </label>

            <label>
              <input 
                type="checkbox"
                class="sport_role"  
                id="{{$sport->id}}_trainer"
                name="{{$sport->id}}_sport_roles[]" 
                value="{{ $sport->id }}"
                @if ($sport->sportUserInfo->as_trainer == 1)
                  checked="checked"
                @endif
            
            >
              <span style="" class="badge badge-error rolesbadge">
                  {{ trans('player.As_Trainer') }}
              </span>
            </label>

            <label>
              <input 
                type="checkbox"
                class="sport_role"  
                id="{{$sport->id}}_referee"
                name="{{$sport->id}}_sport_roles[]" 
                value="{{ $sport->id }}"
                @if ($sport->sportUserInfo->as_referee == 1)
                  checked="checked"
                @endif
            
            >
              <span style="" class="badge badge-info rolesbadge">
                  {{ trans('player.A_Referee') }}
              </span>
            </label>
          </div>
        </p>
      </div>
    </div>
  @endforeach
  
</div>