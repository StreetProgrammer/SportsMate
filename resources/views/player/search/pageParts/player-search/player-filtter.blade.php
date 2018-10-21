<div class="panel panel-default shade">
    <div style="padding: 20px">
		
		<h4 style="color:#06774a;">
            {{ trans('player.Player_search') }}
            <span id="player_filtters_loader" style="display:none;">
                <i class="fa fa-circle-o-notch fa-spin" style="font-size:20px;color:#06774a;"></i>
            </span>
            <span id="clear_player_filter" style="cursor:pointer;display:none;">
              <span class="pull-right fa-stack fa-lg">
                <i class="fa fa-filter fa-stack-1x" 
                   style="font-size:70%;position:relative;bottom: 35px;left:20px"
                >
                </i>
                <i class="fa fa-ban fa-stack-1x text-danger"
                   style="position:relative;bottom:85px;left:20px"
                >
                </i>
              </span>
            </span>
        </h4>
		<hr>
        <div class="form-group">
            <label for="name">{{ trans('player.Name') }} :</label>
            <input type="text" 
                  name="player_filtters_name" 
                  class="sm-inputs form-control" 
                  id="player_filtters_name" 
            >
        </div>
        <br>
        
        <div class="form-group">
            <label for="sport">{{ trans('player.Sport') }}</label>
            <select class="sm-inputs form-control input-xs" 
                    name="player_filtters_sport" 
                    id="sport">
                
                @php $sports = DB::table('sports')->get() ; @endphp
                <option value="">{{ trans('player.Sport') }}</option>

                @foreach ($sports as $sport)

                    <option
                      value="{{ $sport->id }}"
                    >
                        @if ( direction() == 'ltr' )
                            {{ $sport->en_sport_name }}    
                        @else
                            {{ $sport->ar_sport_name }}    
                        @endif
                    </option>

                @endforeach

            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="p_gender">{{ trans('player.Gender') }}:</label>
            
              <label class="radio-inline" style="font-size: 15px;">
                <input type="radio" 
                name="player_filtters_gender"
                value="1" 
                >
                <span style="font-size: 120%;color: #06774a;"><i class="fa fa-male" ></i></span>    
              </label>
            
              <label class="radio-inline" style="font-size: 15px;">
                <input type="radio" 
                name="player_filtters_gender"
                value="2" 
                >
                <span style="font-size: 120%;color: #06774a;"><i class="fa fa-female" ></i></span>   
              </label>
            
        </div>
        <br>
        <div class="form-group">
            <label for="player_filtters_preferred_gender">{{ trans('player.Interested_in') }}:</label>
            
              <label class="radio-inline" style="font-size: 15px;">
                <input type="radio" 
                name="player_filtters_preferred_gender"
                value="1" 
                >
                <span style="font-size: 120%;color: #06774a;"><i class="fa fa-male" ></i></span>    
              </label>
            
            
              <label class="radio-inline" style="font-size: 15px;">
                <input type="radio" 
                name="player_filtters_preferred_gender"
                value="2" 
                >
                <span style="font-size: 120%;color: #06774a;"><i class="fa fa-female" ></i></span>   
              </label>
            
            
              <label class="radio-inline" style="font-size: 15px;">
                <input type="radio" 
                name="player_filtters_preferred_gender"
                value="3" 
                >
                <span style="font-size: 120%;color: #06774a;">
                  <i class="fa fa-male" ></i> | <i class="fa fa-female" ></i> 
                </span>   
              </label>
            
        </div>
        <div class="text-center">
           <button type="button" 
                style="background: #ff9800 !important; 
                       color: #fff !important;
                       border-color:#ddd;
                       box-shadow: 1px 0px 0px #eee;" 
                class="btn sm-inputs btn-warning" 
                id="player_filtters"
            >
                {{ trans('player.filter') }}
            </button> 
        </div>
        

    </div>
</div>