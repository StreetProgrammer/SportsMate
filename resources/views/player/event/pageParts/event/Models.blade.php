<!------------------------------------------->
<!--  start update player profile Model -->
<!--------------------------------->
<div id="editMainInfoModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color: #fff;background-color: #06774a !important;">
        <button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
        <h4 class="modal-title" >
          Edit Main Information 
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
              <p style="font-size: 90%;color: #a94442;">
                please, check errors and try again .
              </p>
            </div>
          <form action="">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" 
                          name="name" 
                          class="sm-inputs form-control" 
                          id="name" 
                          value="{{Auth::user()->name}}"
                  >
                </div>
                <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" 
                          name="email" 
                          class="sm-inputs form-control"  
                          value="{{Auth::user()->email}}"
                  >
                </div>
                <div class="form-group">
                  <label for="phone">phone number:</label>
                  <input type="phone" 
                          name="p_phone" 
                          class="sm-inputs form-control" 
                          id="phone" 
                          value="{{Auth::user()->playerProfile->p_phone}}"
                  >
                </div>

              
            <div class="col-lg-5 ">

              <select class="sm-inputs form-control input-xs" name="p_city" id="governorate">

                  <option value="">Select Governorate</option>

                @foreach ($governorate as $gov)

                    <option
                      value="{{ $gov->id }}"
                      @php
                        echo (Auth::user()->playerProfile->p_city == $gov->id ? ' selected="selected" ' : '');
                      @endphp
                    >
                        {{ $gov->g_en_name }}
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
                      @if ($area->a_governorate_id == Auth::user()->playerProfile->p_city)

                        <option
                          value="{{ $area->id }}"
                        @php
                          echo (Auth::user()->playerProfile->p_area == $area->id ? ' selected="selected" ' : '');
                        @endphp
                        >
                          {{ $area->a_en_name }}
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
                  <label for="p_address">Address:</label>
                  <input type="text" 
                          name="p_address" 
                          class="sm-inputs form-control" 
                          id="p_address" 
                          value="{{Auth::user()->playerProfile->p_address}}"
                  >
                </div>

              <div class="form-group">
                <label for="p_gender">gender:</label>
                
                  <label class="radio-inline" style="font-size: 15px;">
                    <input type="radio" 
                    name="p_gender" 
                    value="2" 
                    @php
                      echo (Auth::user()->playerProfile->p_gender == 1 ? ' checked="checked" ' : '');
                    @endphp
                    >
                    <span style="font-size: 120%;color: #06774a;"><i class="fa fa-male" ></i></span>    
                  </label>
                
                  <label class="radio-inline" style="font-size: 15px;">
                    <input type="radio" 
                    name="p_gender" 
                    value="2" 
                    @php
                      echo (Auth::user()->playerProfile->p_gender == 2 ? ' checked="checked" ' : '');
                    @endphp
                    >
                    <span style="font-size: 120%;color: #06774a;"><i class="fa fa-female" ></i></span>   
                  </label>
                
              </div>

              <div class="form-group">
                <label for="p_preferred_gender">interested in:</label>
                
                  <label class="radio-inline" style="font-size: 15px;">
                    <input type="radio" 
                    name="p_preferred_gender" 
                    value="2" 
                    @php
                      echo (Auth::user()->playerProfile->p_preferred_gender == 1 ? ' checked="checked" ' : '');
                    @endphp
                    >
                    <span style="font-size: 120%;color: #06774a;"><i class="fa fa-male" ></i></span>    
                  </label>
                
                
                  <label class="radio-inline" style="font-size: 15px;">
                    <input type="radio" 
                    name="p_preferred_gender" 
                    value="2" 
                    @php
                      echo (Auth::user()->playerProfile->p_preferred_gender == 2 ? ' checked="checked" ' : '');
                    @endphp
                    >
                    <span style="font-size: 120%;color: #06774a;"><i class="fa fa-female" ></i></span>   
                  </label>
                
                
                  <label class="radio-inline" style="font-size: 15px;">
                    <input type="radio" 
                    name="p_preferred_gender" 
                    value="3" 
                    @php
                      echo (Auth::user()->playerProfile->p_preferred_gender == 3 ? ' checked="checked" ' : '');
                    @endphp
                    >
                    <span style="font-size: 120%;color: #06774a;">
                      <i class="fa fa-male" ></i> | <i class="fa fa-female" ></i> 
                    </span>   
                  </label>
                
              </div>
          
              <div class="form-group">
                <label for="pwd">birth date:</label>
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
                  <label for="pwd">Password:</label>
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
                <label for="user_is_active">Account Status:</label>
                
                  <label class="radio-inline" style="font-size: 15px;">
                    <input type="radio" 
                    name="user_is_active" 
                    value="1" 
                    @php
                      echo (Auth::user()->user_is_active == 1 ? ' checked="checked" ' : '');
                    @endphp
                    >
                    <span style="font-size: 120%;color: #06774a;">activated</span>    
                  </label>
                
                  <label class="radio-inline" style="font-size: 15px;">
                    <input type="radio" 
                    name="user_is_active" 
                    value="0" 
                    @php
                      echo (Auth::user()->user_is_active == 0 ? ' checked="checked" ' : '');
                    @endphp
                    >
                    <span style="font-size: 120%;color: #06774a;">deactivated</span>   
                  </label>
                
              </div>
            </form>
          </div>
          
        </div>
      </div>
      <div class="modal-footer" style="color: #fff;background-color: #06774a !important;">
        <!-- <button class="btn btn-warning" id="updatePlayerMainInfo" style="background:#ff9800">Update</button> -->
        <button 
              type="button"
              style="background: #ff9800 !important; color: #fff !important;border-color:#ddd;box-shadow: 1px 0px 0px #eee;" 
              class="btn sm-inputs btn-warning"
              id="updatePlayerMainInfo" 
        >
          Update
        </button>
        <button 
              type="button"
              style="background: #fff !important; color: #000 !important;border-color:#ddd;box-shadow: 1px 0px 0px #eee;" 
              class="btn sm-inputs btn-default" 
              data-dismiss="modal"
        >
          Close
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
              Edit Sports Information 
              <span id="sportsInfoLoader" style="display:none;">
                <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
              </span>
            </h4>
          </div>
          <div id="getPlayerSports" class="modal-body">
            @include('player.pageParts.playerHisProfile.getPlayerSports')
          </div>
          <div class="modal-footer" style="color: #fff;background-color: #06774a !important;">
            <button 
                  type="button"
                  style="background: #fff !important; color: #000 !important;border-color:#ddd;box-shadow: 1px 0px 0px #eee;" 
                  class="btn sm-inputs btn-default" 
                  data-dismiss="modal"
            >
              Close
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
              Edit Vacant Time 
              <span id="vacantInfoLoader" style="display:none;">
                <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
              </span>
            </h4>
          </div>
          <div id="getPlayerVacants" class="modal-body">
            @include('player.pageParts.playerHisProfile.getPlayerVacants')
          </div>
          <div class="modal-footer" style="color: #fff;background-color: #06774a !important;">
            <button 
                  type="button"
                  style="background: #fff !important; color: #000 !important;border-color:#ddd;box-shadow: 1px 0px 0px #eee;" 
                  class="btn sm-inputs btn-default" 
                  data-dismiss="modal"
            >
              Close
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
              Add New Event 
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
                    <p style="font-size: 90%;color: #a94442;">
                      New Event Created Successfully
                    </p>
                  </div>
                  <div id="eventErrorsFaild" style="display:none">
                    <h4><i class="fa fa-warning"></i></h4>
                    <p style="font-size: 90%;color: #a94442;">
                      check errors and try again
                    </p>
                  </div>  
                </div>
              </div>

              <div class="col-md-12">

                  
                  {{ csrf_field() }}
                  <br>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-lg-3 ">Range <span id="E_preferred_rate_value"></span></label>
                        <div class="col-lg-9">
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
                        <label class="col-lg-2 ">Sport</label>
                        <div class="col-lg-10">
                          <div class="ui-select">
                            <select name="sport_id" style="padding: 0 5px 0 10px;" class="sm-inputs form-control">

                               @foreach ($user->sports as $sport)
                                <option value="{{ $sport->id }}">{{ $sport->en_sport_name }}</option>
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
                        <label class="col-lg-2 control-label">Day</label>
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
                        <label class="col-lg-2 control-label">From</label>
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
                        <label class="col-lg-2 control-label">To</label>
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
                Add
            </button>
            <button 
                  type="button"
                  style="background: #fff !important; color: #000 !important;border-color:#ddd;box-shadow: 1px 0px 0px #eee;" 
                  class="btn sm-inputs btn-default" 
                  data-dismiss="modal"
            >
              Close
            </button>
          </div>
      </div>
    </div>

</div>
<!------------------------------------>
<!--  end add new event Model --><!--------------------------------------->

