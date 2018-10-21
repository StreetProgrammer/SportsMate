
@if (Auth::id() == $user->id)
    {{-- start of model for profile owner--}}
    <!------------------------------------------->
    <!--  start update player profile Model -->
    <!--------------------------------->
    <div id="editMainInfoModal" class="modal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="color: #fff;background-color: #06774a !important;">
            <button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
            <h4 class="modal-title" >
              {{ trans('player.Edit_Main_Information') }} 
              <span id="profileInfoLoader" style="display:none;">
                <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
              </span>
            </h4>
          </div>
          <div class="modal-body profileInfo">
            <div class="row">
              <div class="col-md-12">
                <div id="editMainInfoMessage" class="alert alert-danger text-center" style="display:none">
                  <h4><i class="fa fa-warning"></i></h4>
                  <p style="font-size: 90%;color: #3c763d;">
                    {{ trans('player.check_wrong_entries_and_try_again') }}
                  </p>
                </div>
              <form action="">
                    <div class="form-group">
                      <label for="name">{{ trans('player.Name') }} :</label>
                      <input type="text" 
                              name="name" 
                              class="sm-inputs form-control" 
                              id="name" 
                              value="{{$user->name}}"
                      >
                    </div>
                    <div class="form-group">
                      <label for="email">{{ trans('player.Email_address') }} :</label>
                      <input type="email" 
                              name="email" 
                              class="sm-inputs form-control"  
                              value="{{$user->email}}"
                      >
                    </div>
                    <div class="form-group">
                      <label for="phone">{{ trans('player.Phone_Number') }} :</label>
                      <input type="phone" 
                              name="p_phone" 
                              class="sm-inputs form-control" 
                              id="phone" 
                              value="{{$user->playerProfile->p_phone}}"
                      >
                    </div>

                  
                <div class="col-lg-5 ">

                  <select class="sm-inputs form-control input-xs" name="p_city" id="governorate">

                      <option value="">{{ trans('player.Select_Governorate') }}</option>

                    @foreach ($governorate as $gov)

                        <option
                          value="{{ $gov->id }}"
                          @php
                            echo ($user->playerProfile->p_city == $gov->id ? ' selected="selected" ' : '');
                          @endphp
                        >
                          @if (direction() == 'ltr')
                            {{ $gov->g_en_name }}
                          @else
                            {{ $gov->g_ar_name }}
                          @endif
                        </option>

                    @endforeach


                  </select>

                </div>
                <div class="col-lg-5">
                  <select class="sm-inputs form-control input-xs" name="p_area" id="area">

                    <option value="">Select Area</option>
                    @foreach ($governorate as $goov) <!--loop throw each city -->
                        @foreach ($goov->areas as $area) <!--loop throw each city->area -->
                          <!--check if we are in clubBranche city -->
                          @if ($area->a_governorate_id == $user->playerProfile->p_city)
                            <option
                              value="{{ $area->id }}"
                            @php
                              echo ($user->playerProfile->p_area == $area->id ? ' selected="selected" ' : '');
                            @endphp
                            >
                              @if (direction() == 'ltr')
                                {{ $area->a_en_name }}
                              @else
                                {{ $area->a_ar_name }}
                              @endif
                            </option>

                          @endif
                        @endforeach
                    @endforeach

                  </select>
                </div>
                <div class="col-lg-2" >
                  <div id="loader"
                             class="text-center "
                             style="display: none;z-index: 99999;font-size: 20px;color: #06b36f;"
                  >
                    <i class="fa fa-circle-o-notch fa-spin"></i>
                  </div>
                </div>
                 <div class="clearfix"></div>
                  <br>

                  <div class="form-group">
                      <label for="p_address">{{ (trans('player.Address')) }} :</label>
                      <input type="text" 
                              name="p_address" 
                              class="sm-inputs form-control" 
                              id="p_address" 
                              value="{{$user->playerProfile->p_address}}"
                      >
                    </div>

                  <div class="form-group">
                    <label for="p_gender">{{ (trans('player.Gender')) }} :</label>
                    
                      <label class="radio-inline" style="font-size: 15px;">
                        <input type="radio" 
                        name="p_gender" 
                        value="2" 
                        @php
                          echo ($user->playerProfile->p_gender == 1 ? ' checked="checked" ' : '');
                        @endphp
                        >
                        <span style="font-size: 120%;color: #06774a;"><i class="fa fa-male" ></i></span>    
                      </label>
                    
                      <label class="radio-inline" style="font-size: 15px;">
                        <input type="radio" 
                        name="p_gender" 
                        value="2" 
                        @php
                          echo ($user->playerProfile->p_gender == 2 ? ' checked="checked" ' : '');
                        @endphp
                        >
                        <span style="font-size: 120%;color: #06774a;"><i class="fa fa-female" ></i></span>   
                      </label>
                    
                  </div>

                  <div class="form-group">
                    <label for="p_preferred_gender">{{ trans('player.Interested_in') }} :</label>
                    
                      <label class="radio-inline" style="font-size: 15px;">
                        <input type="radio" 
                        name="p_preferred_gender" 
                        value="2" 
                        @php
                          echo ($user->playerProfile->p_preferred_gender == 1 ? ' checked="checked" ' : '');
                        @endphp
                        >
                        <span style="font-size: 120%;color: #06774a;"><i class="fa fa-male" ></i></span>    
                      </label>
                    
                    
                      <label class="radio-inline" style="font-size: 15px;">
                        <input type="radio" 
                        name="p_preferred_gender" 
                        value="2" 
                        @php
                          echo ($user->playerProfile->p_preferred_gender == 2 ? ' checked="checked" ' : '');
                        @endphp
                        >
                        <span style="font-size: 120%;color: #06774a;"><i class="fa fa-female" ></i></span>   
                      </label>
                    
                    
                      <label class="radio-inline" style="font-size: 15px;">
                        <input type="radio" 
                        name="p_preferred_gender" 
                        value="3" 
                        @php
                          echo ($user->playerProfile->p_preferred_gender == 3 ? ' checked="checked" ' : '');
                        @endphp
                        >
                        <span style="font-size: 120%;color: #06774a;">
                          <i class="fa fa-male" ></i> | <i class="fa fa-female" ></i> 
                        </span>   
                      </label>
                    
                  </div>
              
                  <div class="form-group">
                    <label for="pwd">{{ trans('player.birth_date') }} :</label>
                    <input type="date" 
                            class="sm-inputs form-control" 
                            id="p_born_date"
                            name="p_born_date" 
                            format="dd-MM-yyyy"
                            @if ($user->playerProfile->p_born_date != '')
                              value="{{$user->playerProfile->p_born_date}}" 
                            @endif
                    >
                  </div>
                    
                  <div class="col-md-10">
                    <p style="font-size: 14px;color: #333;">
                      <label for="pwd">{{ trans('player.Password') }} :</label>
                      <input type="password" name="password" class="sm-inputs form-control" value="">
                    </p>
                  </div>
                  <div class="col-md-2 text-center" style="margin-top: 30px">
                    <strong class="showHidePass" style="font-size: 120%;
                                            border: 2px solid #f89406;
                                            padding: 3px 5px;
                                            border-radius: 15px;
                                            cursor: pointer;"
                    >
                      <i class="fa fa-eye" style="color: #f89406;"aria-hidden="true"></i>
                    </strong>
                  </div>
                  <div class="clearfix"></div>
                
                   <div class="form-group">
                    <label for="user_is_active">{{ trans('player.Account_Status') }} :</label>
                    
                      <label class="radio-inline" style="font-size: 15px;">
                        <input type="radio" 
                        name="user_is_active" 
                        value="1" 
                        @php
                          echo ($user->user_is_active == 1 ? ' checked="checked" ' : '');
                        @endphp
                        >
                        <span style="font-size: 120%;color: #06774a;">{{ trans('player.Activated') }}</span>    
                      </label>
                    
                      <label class="radio-inline" style="font-size: 15px;">
                        <input type="radio" 
                        name="user_is_active" 
                        value="0" 
                        @php
                          echo ($user->user_is_active == 0 ? ' checked="checked" ' : '');
                        @endphp
                        >
                        <span style="font-size: 120%;color: #06774a;">{{ trans('player.Deactivated') }}</span>   
                      </label>
                    
                  </div>
                </form>
              </div>
              
            </div>
          </div>
          <div class="modal-footer" style="color: #fff;background-color: #06774a !important;">
            <button 
                  type="button"
                  style="background: #ff9800 !important; color: #fff !important;border-color:#ddd;box-shadow: 1px 0px 0px #eee;" 
                  class="btn sm-inputs btn-warning"
                  id="updatePlayerMainInfo" 
            >
              {{ trans('player.Update') }}
            </button>
            <button 
                  type="button"
                  style="background: #fff !important; color: #000 !important;border-color:#ddd;box-shadow: 1px 0px 0px #eee;" 
                  class="btn sm-inputs btn-default" 
                  data-dismiss="modal"
            >
              {{ trans('player.Close') }}
            </button>
          </div>
        </div>
      </div>
    </div>

    <!------------------------------------>
    <!--  end update player profile Model -->
    <!--------------------------------------->


    <!------------------------------------------->
    <!--  start update player sports Model -->
    <!--------------------------------->
    <div id="sportseditModal" class="modal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
              <div class="modal-header" style="color: #fff;background-color: #06774a !important;">
                <button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
                <h4 class="modal-title" >
                  {{ trans('player.Edit_Sports_Information') }} 
                  <span id="sportsInfoLoader" style="display:none;">
                    <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
                  </span>
                </h4>
              </div>
              <div id="getPlayerSports" class="modal-body">
                @include('player.profile.pageParts.playerHisProfile.getPlayerSports')
              </div>
              <div class="modal-footer" style="color: #fff;background-color: #06774a !important;">
                <button 
                      type="button"
                      style="background: #fff !important; color: #000 !important;border-color:#ddd;box-shadow: 1px 0px 0px #eee;" 
                      class="btn sm-inputs btn-default" 
                      data-dismiss="modal"
                >
                  {{ trans('player.Close') }}
                </button>
              </div>
          </div>
        </div>
    </div>

    <!------------------------------------>
    <!--  end update player sports Model -->
    <!--------------------------------------->

    <!------------------------------------------->
    <!--  start update vacant Model -->
    <!--------------------------------->
    <div id="vacantTimeModal" class="modal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
              <div class="modal-header" style="color: #fff;background-color: #06774a !important;">
                <button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
                <h4 class="modal-title" >
                  {{ trans('player.Edit_Vacant_Time') }} 
                  <span id="vacantInfoLoader" style="display:none;">
                    <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
                  </span>
                </h4>
              </div>
              <div id="getPlayerVacants" class="modal-body">
                @include('player.profile.pageParts.playerHisProfile.getPlayerVacants')
              </div>
              <div class="modal-footer" style="color: #fff;background-color: #06774a !important;">
                <button 
                      type="button"
                      style="background: #fff !important; color: #000 !important;border-color:#ddd;box-shadow: 1px 0px 0px #eee;" 
                      class="btn sm-inputs btn-default" 
                      data-dismiss="modal"
                >
                  {{ trans('player.Close') }}
                </button>
              </div>
          </div>
        </div>

    </div>
    <!------------------------------------>
    <!--  end update vacant Model --><!--------------------------------------->

    <!------------------------------------------->
    <!--  start add new event Model -->
    <!--------------------------------->
    <div id="newEventModal" class="modal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
              <div class="modal-header" style="color: #fff;background-color: #06774a !important;">
                <button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
                <h4 class="modal-title" >
                  {{ trans('player.Add_New_Event') }} 
                  <span id="eventInfoLoader" style="display:none;">
                    <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
                  </span>
                </h4>
              </div>
              <div id="getPlayerVacants" class="modal-body">
                {{----------------------------------------------------------------}}
                @php
                  $days = DB::table('days')->get();
                  $hours = DB::table('hours')->get();
                @endphp
                <div class="row">
                  <div class="col-md-12">
                    <div id="eventErrors" class="alert alert-success text-center" style="display:none">
                      <div id="eventErrorsSuccess" style="display:none">
                        <h4><i class="fa fa-check-circle"></i></h4>
                        <p style="font-size: 90%;color: #3c763d;">
                        {{ trans('player.New_Event_Created_Successfully') }}  
                        </p>
                      </div>
                      <div id="eventErrorsFaild" style="display:none">
                        <h4><i class="fa fa-warning"></i></h4>
                        <p style="font-size: 90%;color: #a94442;">
                          {{ trans('player.check_wrong_entries_and_try_again') }}
                        </p>
                      </div>  
                    </div>
                  </div>

                  <div class="col-md-12">

                      
                      {{ csrf_field() }}
                      <br>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-lg-5 ">
                              {{ trans('player.preferred_rate') }} 
                              <span class=" span-number slider-value" id="E_preferred_rate_value">5</span>
                            </label>
                            <div class="col-lg-7">
                              <div class="ui-select">
                                <div class="""slidecontainer">
                                  <input class="slider form-control input-xs"
                                    id="E_preferred_rate" 
                                    type="range"
                                    name="preferred_rate"
                                    min="0"
                                    max="10"
                                    step="1"
                                    value="5"
                                >
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-lg-2 ">{{ trans('player.Sport') }}</label>
                            <div class="col-lg-10">
                              <div class="ui-select">
                                <select name="sport_id" style="padding: 0 5px 0 10px;" class="sm-inputs form-control">

                                   @foreach ($user->sports as $sport)
                                    <option value="{{ $sport->id }}">
                                      @if (direction() == 'ltr')
                                        {{ $sport->en_sport_name }}
                                      @else
                                        {{ $sport->ar_sport_name }}
                                      @endif
                                    </option>
                                  @endforeach

                                </select>
                              </div>
                            </div>
                          </div>
                        </div> 
                        <div class="clearfix"></div>
                        <br><br><br>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">{{ trans('player.Day') }}</label>
                            <div class="col-lg-10">
                              <div class="ui-select">
                                <input type="date" 
                                        class="sm-inputs form-control" 
                                        id="date"
                                        name="E_date" 
                                        format="dd-MM-yyyy"
                                        value="@php 
                                                echo date('Y-m-d') ;
                                               @endphp"     
                                >
                              </div>
                            </div>
                          </div>
                        </div> 
                        
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">{{ trans('player.From') }}</label>
                            <div class="col-lg-10">
                              <div class="ui-select">
                                <select name="E_from" style="padding: 0 5px 0 10px;" class="sm-inputs form-control">

                                  @foreach ($hours as $hour)
                                    <option value="{{ $hour->hour_id }}">{{ $hour->hour_format }}</option>
                                  @endforeach

                                </select>
                              </div>
                            </div>
                          </div>
                        </div> 

                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">{{ trans('player.To') }}</label>
                            <div class="col-lg-10">
                              <div class="ui-select">
                                <select  name="E_to" style="padding: 0 5px 0 10px;" class="sm-inputs form-control">

                                  @foreach ($hours as $hour)
                                    <option value="{{ $hour->hour_id }}">{{ $hour->hour_format }}</option>
                                  @endforeach

                                </select>
                              </div>
                            </div>
                          </div>
                        </div> 

                    </div> <!--col-md-12-->
                </div>
              </div>
              <div class="modal-footer" style="color: #fff;background-color: #06774a !important;">
                <button type="" 
                        style="background: #ff5522 !important; color: #fff !important;border-color:#ddd;box-shadow: 1px 0px 0px #eee;"
                        class="btn sm-inputs btn-primary"
                        id="addNewEvent"    
                >
                    {{ trans('player.Add_New_Event') }}
                </button>
                <button 
                      type="button"
                      style="background: #fff !important; color: #000 !important;border-color:#ddd;box-shadow: 1px 0px 0px #eee;" 
                      class="btn sm-inputs btn-default" 
                      data-dismiss="modal"
                >
                  {{ trans('player.Close') }}
                </button>
              </div>
          </div>
        </div>

    </div>
    <!------------------------------------>
    <!--  end add new event Model --><!--------------------------------------->
    {{-- end of model for profile owner--}}

    {{-- start of model for profile to other users--}}
@else
    <!------------------------------------------->
    <!--  start add new Challenge Modal -->
    <!--------------------------------->
    <div id="newChallengeModal" class="modal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
              <div class="modal-header" style="color: #fff;background-color: #06774a !important;">
                <button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
                <h4 class="modal-title" >
                {{ trans('player.Add_New_Challenge_With') }} {{ $user->name }} 
                  <span id="challengeInfoLoader" style="display:none;">
                    <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
                  </span>
                </h4>
              </div>
              <div id="getPlayerVacants" class="modal-body">

                {{----------------------------------------------------------------}}

                @php

                  $days = DB::table('days')->get();
                  $hours = DB::table('hours')->get();

                @endphp

                <div class="row">
                  <div class="col-md-12">
                    <div id="challengeErrors" class="alert alert-success text-center" style="display:none">
                      <div id="challengeErrorsSuccess" style="display:none">
                        <h4><i class="fa fa-check-circle"></i></h4>
                        <p style="font-size: 90%;color: ##3c763d;">
                        {{ trans('player.New_Challenge_Created_Successfully') }}  
                        </p>
                      </div>
                      <div id="challengeErrorsFaild" style="display:none">
                        <h4><i class="fa fa-warning"></i></h4>
                        <p style="font-size: 90%;color: ##3c763d;">
                          {{trans('player.check_wrong_entries_and_try_again')}}
                        </p>
                      </div>  
                    </div>
                  </div>

                  <div class="col-md-12">

                      {{ csrf_field() }}
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-lg-2 ">{{ trans('player.Sport') }}</label>
                            <div class="col-lg-10">
                              <div class="ui-select">
                                <select name="sport_id" style="padding: 0 5px 0 10px;" class="sm-inputs form-control">

                                   @foreach ($user->sports as $sport)
                                    <option value="{{ $sport->id }}">
                                      @if (direction() == 'ltr')
                                        {{ $sport->en_sport_name }}
                                      @else
                                        {{ $sport->ar_sport_name }}
                                      @endif
                                      </option>
                                  @endforeach

                                </select>
                              </div>
                            </div>
                          </div>
                        </div> 
                        <!-- <div class="clearfix"></div> -->
                        <!-- <br><br><br> -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">{{ trans('player.Day') }}</label>
                            <div class="col-lg-10">
                              <div class="ui-select">
                                <input type="date" 
                                        class="sm-inputs form-control" 
                                        id="date"
                                        name="C_date" 
                                        format="dd-MM-yyyy"
                                        value="@php 
                                                echo date('Y-m-d') ;
                                               @endphp"     
                                >
                              </div>
                            </div>
                          </div>
                        </div> 
                        <div class="clearfix"></div>
                        <br><br><br>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">{{ trans('player.From') }}</label>
                            <div class="col-lg-10">
                              <div class="ui-select">
                                <select name="C_from" style="padding: 0 5px 0 10px;" class="sm-inputs form-control">

                                  @foreach ($hours as $hour)
                                    <option value="{{ $hour->hour_id }}">{{ $hour->hour_format }}</option>
                                  @endforeach

                                </select>
                              </div>
                            </div>
                          </div>
                        </div> 

                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">{{ trans('player.To') }}</label>
                            <div class="col-lg-10">
                              <div class="ui-select">
                                <select  name="C_to" style="padding: 0 5px 0 10px;" class="sm-inputs form-control">

                                  @foreach ($hours as $hour)
                                    <option value="{{ $hour->hour_id }}">{{ $hour->hour_format }}</option>
                                  @endforeach

                                </select>
                              </div>
                            </div>
                          </div>
                        </div> 

                    </div> <!--col-md-12-->
                </div>
              </div>
              <div class="modal-footer" style="color: #fff;background-color: #06774a !important;">
                <button type="" 
                        style="background: #ff5522 !important; color: #fff !important;border-color:#ddd;box-shadow: 1px 0px 0px #eee;"
                        class="btn sm-inputs btn-primary"
                        id="addNewChallenge"    
                >
                  {{ trans('player.Add_Challenge') }}
                </button>
                <button 
                      type="button"
                      style="background: #fff !important; color: #000 !important;border-color:#ddd;box-shadow: 1px 0px 0px #eee;" 
                      class="btn sm-inputs btn-default" 
                      data-dismiss="modal"
                >
                  {{ trans('player.Close') }}
                </button>
              </div>
          </div>
        </div>

    </div>
    <!------------------------------------>
    <!--  end add new Challenge Modal --><!--------------------------------------->
    {{-- end of model for profile to other users--}}
@endif
