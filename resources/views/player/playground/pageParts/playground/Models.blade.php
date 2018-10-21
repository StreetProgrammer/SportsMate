
    <!------------------------------------------->
    <!--  start add new Reservation Modal -->
    <!------------------------------------------->

    <div class="modal fade" id="newReservationModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header" style="color: #fff;background-color: #06774a !important;">
            <button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
            <h4 class="modal-title">{{ $playground->c_b_p_name }}</h4>
          </div>
          <div class="box box-primary">
            <div class="box-body no-padding">
              <div class="modal-body">
                <p>
                  <span class="btn btn-flat" style="color:#fff; background: #00a65a">by Player</span>
                  <span class="btn btn-flat" style="color:#fff; background: #dd4b39">by Owner</span>
                  <span class="btn btn-flat" style="color:#fff; background: #ff851b">by Admin</span>
                  <span class="btn btn-flat" style="color:#fff; background: #0073b7">by Manager</span>
                </p>

                <div class="row">

                  <div class="col-md-8">
                    <div class="shade" style="padding:5px" id="Reservations{{$playground->id}}"></div>
                  </div>
                  
                  <div class="col-md-4">
                    <div class="shade" style="background: #EEE; border: 1px solid #ddd;padding:5px">
                      <h4>{{ trans('player.New_Reservation') }}</h4>
                      <hr style="border-top: 2px solid #06774a;">
                      <p id="{{$playground->id}}_err" class="alert"></p>
                      <!-- start add reservation form -->
                      <form class="form-horizontal our-form"
                        action="{{url('Reservation')}}/{{$playground->id}}/Add"
                        method="post"
                        role="form"
                      >
                          {{ csrf_field() }}
                        <input type="hidden" name="playgroundId" value="{{$playground->id}}">
                        <div class="form-group">
                          <label class="col-lg-3 control-label">{{ trans('player.Date') }}</label>
                          <div class="col-lg-8">
                            <input 
                              class="date shade-2 sm-inputs form-control input-xs" 
                              style="background: #ffffff !important;" 
                              id="{{$playground->id}}_date" 
                              type="date" class="date" 
                              name="{{$playground->id}}_date" 
                              min="@php
                                    echo date("Y-m-d") ;
                                  @endphp" class="date form-control input-xs">
                          </div>
                        </div>
                        <div class="hours" style="">
                          @php
                            $hours = DB::table('hours')->get();
                          @endphp
                          <div class="form-group">
                            <label class="col-lg-3 control-label">{{ trans('player.From') }}</label>
                            <div class="col-lg-8">
                                <select id="{{$playground->id}}_from" 
                                        name="{{$playground->id}}_from" 
                                        class="date shade-2 sm-inputs form-control input-xs" 
                                        style="background: #ffffff !important;"
                                >
                                    <option value="">{{ trans('player.starts_at') }}</option>
                                  @foreach ($hours as $hour)
                                    <option value="{{ $hour->hour_id }}">{{ $hour->hour_format }}</option>
                                  @endforeach

                                </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-3 control-label">{{ trans('player.To') }}</label>
                            <div class="col-lg-8">
                                <select id="{{$playground->id}}_to" 
                                        name="{{$playground->id}}_to" 
                                        class="date shade-2 sm-inputs form-control input-xs" 
                                        style="background: #ffffff !important;"
                                >
                                    <option value="">{{ trans('player.ends_at') }}</option>
                                  @foreach ($hours as $hour)
                                    <option value="{{ $hour->hour_id }}">{{ $hour->hour_format }}</option>
                                  @endforeach

                                </select>
                            </div>
                          </div>
                          
                          <div id="{{$playground->id}}_nameDiv" class="form-group" style="display: none">
                            <label class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-8">
                                <input  id="{{$playground->id}}_name"
                                        name="{{$playground->id}}_name" 
                                        type="text" 
                                        class="date shade-2 sm-inputs form-control input-xs" 
                                        style="background: #ffffff !important;"
                                        required="required" 
                                >
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                               <input 
                                  type="submit" 
                                  class="submit btn btn-md btn-flat btn-primary"
                                  style="display: none;" 
                                  value="{{ trans('player.Reserve') }}"
                                  name="{{$playground->id}}_add"
                                  id ="{{$playground->id}}_add"  
                                >
                                <span class="reCheckLoader pull-right" style="display:none;color: #367fa9 ;">
                                  <i class="fa fa-circle-o-notch fa-spin" style="font-size:20px"></i>
                                </span>
                            </div>
                          </div>
                    
                        
                        </div>
                      </form>
                      <!-- start add reservation form -->
                    </div><!---end shade-->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer" style="color: #fff;background-color: #06774a !important;border: 0px">
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
  <!-- endModel --> 
    <!------------------------------------>
    <!--  end add new Reservation Modal --><!--------------------------------------->
    {{-- end of model for profile to other users--}}

