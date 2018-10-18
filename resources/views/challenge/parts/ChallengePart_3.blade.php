<!-- start Result view -->
<div class="col-md-8 ">
    <div class="panel panel-default shade">
            <div class="panel-heading">
                <h4>Golf Playground(s)</h4>
            </div>

            <div class="panel-body">

                @foreach ($Event->eventSport->playgrounds as $playground)<!-- for loop throw each Playground for golf -->
                    @if (Auth::user()->id == $Event->E_creator_id || Auth::user()->id == $Event->E_candidate_id) <!--if for get user type-->

                        @if ($Event->expectedPlaygrounds->contains($playground->id) == false) <!--if for know if play Playground in suggested-->

                            @php
                                $ReservationCase_1 = DB::table('reservations')->where('R_playground_id', '=' , $playground->id)
                                                    ->where('R_date', '=' , $Event->E_date)
                                                    ->whereBetween('R_from', [$Event->E_from, (($Event->E_to) - 1)])->get();

                                $ReservationCase_2 = DB::table('reservations')->where('R_playground_id', '=' , $playground->id)
                                                    ->where('R_date', '=' , $Event->E_date)
                                                    ->whereBetween('R_to', [(($Event->E_from) + 1), $Event->E_to, ])->get();

                                $ReservationCase_3 = DB::table('reservations')->where('R_playground_id', '=' , $playground->id)
                                                    ->where('R_date', '=' , $Event->E_date)
                                                    ->where('R_to', '>', $Event->E_to)
                                                    ->where('R_from', '<', $Event->E_from)->get();
                            @endphp


                            @if ($ReservationCase_1->count() != 0 || $ReservationCase_2->count() != 0 || $ReservationCase_3->count() != 0)

                            @else
                                <div class="col-md-3 shade circular-div" >
                                    <span class="" style="">

                                    <a href="/Playground/{{ $playground->id }}/Display" class="playground-link" >
                                      {{ $playground->c_b_p_name }}
                                    </a>

                                  </span>
                                  @if ($playground->c_b_p_city == Auth::user()->playerProfile->p_city && $playground->c_b_p_area == Auth::user()->playerProfile->p_area)<!--if for know if Playground near Event creator address-->
                                        <p style="color: #ff5522;font-size: 80%;">
                                            <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                                        </p>
                                  @endif <!--if for know if Playground near Event creator address-->

                                  @if ($Event->E_playground_id == null)
                                      <p>
                                          <form action="{{url('Event')}}/{{$Event->id}}/SuggestPlayground"
                                                  method="post"
                                                  role="form"
                                                  style="color:#FF5522;font-weight:bold;display: inline-flex;"
                                          >
                                            {{ csrf_field() }}

                                              <input type="hidden" name="playground" value="{{ $playground->id }}">

                                              <button type="submit" class="btn btn-primary btn-xs icon-button">
                                                  <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>
                                              </button>
                                          </form>
                                      </p>
                                    @endif

                                </div>
                            @endif





                        @endif<!--if for know if play Playground in suggested-->

                    @else <!--if for get user type-->

                        <div class="col-md-3 shade circular-div" >
                            <span class="" style="">

                            <a href="/Playground/{{ $playground->id }}/Display" class="playground-link" >
                              {{ $playground->c_b_p_name }}
                            </a>

                            </span>
                              @if ($playground->c_b_p_city == Auth::user()->playerProfile->p_city && $playground->c_b_p_area == Auth::user()->playerProfile->p_area)<!--if for know if Playground near Event creator address-->
                                    <p style="color: #ff5522;font-size: 80%;">
                                        <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                                    </p>
                              @endif <!--if for know if Playground near Event creator address-->

                              <p style="color: #ff5522;font-size: 80%;">
                                  {{ $playground->playgroundEvents->count() }}
                              </p>
                              <p style="color: #ff5522;font-size: 80%;">
                                  {{ $playground->expectedEvents->count() }}
                              </p>

                        </div>

                    @endif<!--if for get user type-->

                @endforeach<!-- for loop throw each Playground for golf -->

            </div>
    </div>
</div>


<div class="col-md-4 ">
    <div class="panel panel-default shade">
        <div class="panel-heading">
            <h4>
                <span style="color:#FF5522;font-style:italic;">
                    {{ $Event->eventSport->sport_name }}
                </span>
                Event
                <span style="color:#FF5522;font-style:italic;">
                    Expected Playgrounds
                </span>

            </h4>
                <span style="color:#FF5522;font-weight:bold;" >
                @if ($Event->expectedPlaygrounds->count() == 0)
                    No Suggested Playgrounds For this event till Now !!
                @else
                    {{ $Event->expectedPlaygrounds->count() }} Till Now
                @endif
            </span>
        </div>

        <div class="panel-body scrollable">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <ul class="list-group">
            @foreach ($Event->expectedPlaygrounds as $expectedPlayground)

                @if (Auth::id() == $Event->E_creator_id || Auth::id() == $Event->E_candidate_id )
                    @php

                        $ReservationCase_1 = DB::table('reservations')->where('R_playground_id', '=' , $expectedPlayground->id)
                                            ->where('R_date', '=' , $Event->E_date)
                                            ->whereBetween('R_from', [$Event->E_from, (($Event->E_to) - 1)])->get();

                        $ReservationCase_2 = DB::table('reservations')->where('R_playground_id', '=' , $expectedPlayground->id)
                                            ->where('R_date', '=' , $Event->E_date)
                                            ->whereBetween('R_to', [(($Event->E_from) + 1), $Event->E_to, ])->get();

                        $ReservationCase_3 = DB::table('reservations')->where('R_playground_id', '=' , $expectedPlayground->id)
                                            ->where('R_date', '=' , $Event->E_date)
                                            ->where('R_to', '>', $Event->E_to)
                                            ->where('R_from', '<', $Event->E_from)->get();

                        if ($ReservationCase_1->count() != 0 || $ReservationCase_2->count() != 0 || $ReservationCase_3->count() != 0) {
                            $PlaygroundReservationStatus = 1 ;
                        }else {
                            $PlaygroundReservationStatus = 0 ;
                        }
                    @endphp

                    <li class="list-group-item "
                        @if ($PlaygroundReservationStatus == 1 && $expectedPlayground->id != $Event->E_playground_id)
                            style="background:#fdcccc;"
                        @elseif ($PlaygroundReservationStatus == 1 && $expectedPlayground->id == $Event->E_playground_id)
                            style="background:#cddc397d;"
                        @endif
                    >
                            <div class=" "
                                 style="min-height: 50px;"
                            >
                              <span class="badge badge-warning rolesbadge" >
                                <a href="/Playground/{{ $expectedPlayground->id }}/Display"
                                     class=""
                                     style="color:#fff !important;"
                                >
                                  {{ $expectedPlayground->c_b_p_name }}

                                  @if ($PlaygroundReservationStatus == 1 && $expectedPlayground->id != $Event->E_playground_id)
                                      <span style="color: #607D8B;">
                                          <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>
                                      </span>
                                  @elseif ($PlaygroundReservationStatus == 1 && $expectedPlayground->id == $Event->E_playground_id)
                                      <span style="color:#00c8536b;">
                                          <i class="fa fa-check-circle fa-2x" aria-hidden="true"></i>
                                      </span>
                                  @endif
                                </a>

                              </span>
                                @if ($expectedPlayground->c_b_p_city == Auth::user()->playerProfile->p_city && $expectedPlayground->c_b_p_area == Auth::user()->playerProfile->p_area)
                                    <p class="pull-right" style="color: #ff5522;font-size: 80%;">
                                        <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                                    </p>
                                @endif
                                <br>
                                <p class="pull-right" style="color: #ff5522;font-size: 80%;">

                                    suggested by:
                                    @php
                                        if($expectedPlayground->expectedEvents->chosenBy == $Event->E_creator_id){
                                            $chooser = $Event->creator ;
                                        }elseif ($expectedPlayground->expectedEvents->chosenBy == $Event->E_candidate_id) {
                                            $chooser = $Event->candidate ;
                                        }
                                    @endphp
                                     {{ $chooser->name }}

                                     @if ( $chooser->id != Auth::id() )

                                         <p>
                                             @if ($expectedPlayground->expectedEvents->yesOrno == 0)

                                                 <form action="/Event/{{ $Event->id }}/AcceptSuggestedPlayground" method="post" role="form"
                                                       style="color:#FF5522;font-weight:bold;display: inline-flex;">
                                                   {{ csrf_field() }}

                                                     <input type="hidden" name="playground_id" value="{{$expectedPlayground->id}}">

                                                     <button type="submit" class="btn btn-primary btn-xs icon-button" style="font-size: 85%;">
                                                       <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>
                                                     </button>
                                                 </form>

                                                 <form action="/Event/{{ $Event->id }}/refuseSuggestedPlayground" method="post" role="form"
                                                       style="color:#FF5522;font-weight:bold;display: inline-flex;">
                                                   {{ csrf_field() }}

                                                     <input type="hidden" name="playground_id" value="{{$expectedPlayground->id}}">

                                                     <button type="submit" class="btn btn-primary btn-xs icon-button" style="font-size: 85%;">
                                                       <i class="fa fa-thumbs-up fa-rotate-180 fa-2x" aria-hidden="true"></i>
                                                     </button>
                                                 </form>

                                             @elseif ($expectedPlayground->expectedEvents->yesOrno == 1)

                                                 <p style="color:#00C853">
                                                     <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>
                                                 </p>
                                            @elseif ($expectedPlayground->expectedEvents->yesOrno == 2)
                                                <p style="color:#D50000">
                                                    <i class="fa fa-thumbs-up fa-rotate-180 fa-2x" aria-hidden="true"></i>
                                                </p>
                                             @endif

                                        </p>

                                    @elseif ( $chooser->id == Auth::id() )

                                        @if ($expectedPlayground->expectedEvents->yesOrno == 0)
                                            <p>
                                                No decision Yet
                                            </p>
                                        @elseif ($expectedPlayground->expectedEvents->yesOrno == 1)

                                            <p style="color:#00C853">
                                                <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>
                                            </p>

                                        @elseif ($expectedPlayground->expectedEvents->yesOrno == 2)

                                            <p style="color:#D50000">
                                                <i class="fa fa-thumbs-up fa-rotate-180 fa-2x" aria-hidden="true"></i>
                                            </p>

                                        @endif

                                     @endif
                                     @if (Auth::id() == $Event->E_creator_id && $Event->E_playground_id == 0 && $expectedPlayground->expectedEvents->yesOrno == 1 && $PlaygroundReservationStatus == 0)
                                         <form method="POST" action="{{url('Reservation')}}/{{$expectedPlayground->id}}/Add">
                                             {{ csrf_field() }}
                                             <input type="hidden" name="R_event_id" value="{{ $Event->id }}">
                                             <input type="hidden" name="R_creator_id" value="{{ $Event->E_creator_id }}">
                                             <input type="hidden" name="R_date" value="{{ $Event->E_date }}">
                                             <input type="hidden" name="R_day" value="{{ $Event->E_day }}">
                                             <input type="hidden" name="R_from" value="{{ $Event->E_from }}">
                                             <input type="hidden" name="R_to" value="{{ $Event->E_to }}">
                                             <input type="hidden" name="R_JQueryFrom" value="{{ $Event->E_JQueryFrom }}">
                                             <input type="hidden" name="R_JQueryTo" value="{{ $Event->E_JQueryTo }}">

                                            <input type="submit" class="btn btn-primary btn-xs" value="GO">

                                         </form>

                                     @endif
                                </p>

                            </div>
                        </li>


                @else
                    <li class="list-group-item ">
                        <div class=" "
                             style="min-height: 50px;"
                        >
                          <span class="badge badge-warning rolesbadge" >
                            <a href="/Playground/{{ $expectedPlayground->id }}/Display"
                                 class=""
                                 style="color:#fff !important;"
                            >
                              {{ $expectedPlayground->c_b_p_name }}
                            </a>

                          </span>
                            @if ($expectedPlayground->c_b_p_city == Auth::user()->playerProfile->p_city && $expectedPlayground->c_b_p_area == Auth::user()->playerProfile->p_area)
                                <p class="pull-right" style="color: #ff5522;font-size: 80%;">
                                    <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                                </p>
                            @endif
                            <br>
                            <p class="pull-right" style="color: #ff5522;font-size: 80%;">

                                suggested by:
                                @php
                                    if($expectedPlayground->expectedEvents->chosenBy == $Event->E_creator_id){
                                        $chooser = $Event->creator ;
                                    }elseif ($expectedPlayground->expectedEvents->chosenBy == $Event->E_candidate_id) {
                                        $chooser = $Event->candidate ;
                                    }
                                @endphp
                                 {{ $chooser->name }}

                            </p>

                        </div>
                    </li>
                @endif

            @endforeach
            </ul>
        </div>

</div>
<!--end result content -->
