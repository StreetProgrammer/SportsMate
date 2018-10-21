<div>

  <div class="panel panel-default shade top-bottom-border scrollable" style="height: 250px !important">

      <!--------------------->
      <div class="panel-heading text-center shade bottom-border">
        <h4 style="color: #06774a;margin: 5px 0px">
          {{ trans('player.applicants') }}
          
        {{--
          here we check if event creator who logged in so no need for this,
          but if any other users who can apply for one time for that event
      --}}
      {{-- check if user is not creator and event date still i future --}}
        @if ( $event->E_creator_id != Auth::id() && $event->E_date > date("Y-m-d") )

          @if ($event->Applicants->contains(Auth::id()) == true)
              <span class="pull-right" style="font-size:12px">
                  {{ trans('player.applied_since') }}
                  @php
                      $row = DB::table('event_user')
                      ->where('event_id', '=', $event->id)
                      ->where('user_id', '=', Auth::id())
                      ->first() ;
                  @endphp
                  {{ date("Y-m-d g:i a", strtotime($row->created_at)) }}
              </span>
          {{-- now check if Applicants don't contain this user 
              and no event candidate and event date still in future 
              so we can display apply button to him 
              sure we know that that user is no the creator from parent if
          --}}
          @elseif ($event->Applicants->contains(Auth::id()) == false && $event->E_candidate_id == null && $event->E_date > date("Y-m-d"))
              <span class="pull-right" style="font-size:12px">
                  <button class="apply btn sm-inputs btn-warning" 
                          id="{{ $event->id }}_{{ Auth::id() }}_apply"
                          style=" background: #ff9800 !important;
                                  padding:2px 10px 2px 10px;
                                  color: #fff !important;
                                  border-color: #ddd;
                                  box-shadow: 1px 0px 0px #eee;" 
                  >
                    {{ trans('player.apply_for_Event') }}
                    <span id="applyLoader" style="display: none">
                      <i class="fa fa-circle-o-notch fa-spin" style="font-size:15px"></i>
                    </span>
                  </button>
              </span>
          @endif

      @endif
      </h4>
      {{ trans('player.Desc_applicants') }}
      </div>
      @if ($event->applicants->count() > 0)
        <div class="row">
          @foreach ($event->applicants as $applicant)
          <div class="col-md-4">
            
              <div class=" shade-2 text-center" 
                   style="@if ($applicant->id == Auth::id())
                            border: 3px solid #06774a;
                          @else
                            border: 1px solid #ddd;
                         @endif
                            background: #ececec;
                            margin:15px 50px 5px 15px;"
              >
                <a href="{{url('/')}}/profile/{{sm_crypt($applicant->id)}}" class="a-holding-divs" >
                  <div class="profile-img-container text-center" style="padding:5px 0px 0px 0px;">
                    <div class="d-flex justify-content-center h-100">
                      <div class="image_outer_container">
                        <!-- <div class="green_icon"></div> -->
                        <div class="image_inner_container">
                          <img class="shade"
                                style="height: 70px;width: 70px;border:5px solid #06774ad4;"
                                @if (empty($event->applicant->user_img))
                                  src="{{ url('/') }}/design/AdminLTE/dist/img/user.png"
                                @else
                                  src="{{ Storage::url($applicant->user_img) }}"
                                @endif class="user-image" alt="User Image" alt="" 
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                <h3 style="color:#06774a;font-size:13px !important;">
                  <span>{{ $applicant->name }}</span>
                  <span></span>
                </h3>
                  {{-- used to if Auth is creator --}}
                  @if ( $event->E_creator_id == Auth::id() )
                    {{-- now will check if no candidate and event date still in future --}}
                    @if ( $event->E_candidate_id == '' && $event->E_date > date("Y-m-d"))
                       <button class="accept shade-2 btn sm-inputs btn-warning" 
                                id="{{ $event->id }}_{{ $applicant->id }}_accept"
                                style="background: #ff9800 !important;
                                        color: #fff !important;
                                        margin: -5px 0px 5px;" 
                        >
                          {{ trans('player.accept_applicant') }}
                          <span id="{{ $event->id }}_{{ $applicant->id }}_acceptLoader" style="display: none">
                            <i class="fa fa-circle-o-notch fa-spin" style="font-size:15px"></i>
                          </span>
                        </button>
                    @elseif ( $event->E_candidate_id == $applicant->id )
                        <span style="color:#06774a;font-size:20px">
                            <i class="fa fa-check-square" aria-hidden="true"></i>
                        </span>
                    @else
                        <span style="color:#ffb300;font-size:20px">
                            <i class="fa fa-window-close" aria-hidden="true"></i>
                        </span>
                    @endif
                  @else

                  @endif
              </div>
          </div>
          @endforeach
        </div>
      @else
        <div class="shade-2 text-center" 
             style="background: #ececec;
                border: 1px solid #ddd;
                margin:15px 50px 15px 50px;
                padding: 50px"
        >
          <h3 style="color:#06774a;font-size:20px !important;">
            <span>{{ trans('player.No_one_apply') }}</span>
          </h3>
        </div>
      @endif
        

      <!--------------------->
      
    </div>
</div>