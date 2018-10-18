<!-- start Result view -->
@if (Auth::id() != $Event->E_creator_id && Auth::id() != $Event->E_candidate_id)

    <div class="col-md-8 ">
        <div class="panel panel-default shade">
            <div class="panel-heading">
                <h4>
                    <span style="color:#FF5522;font-style:italic;">

                        <a href="/profile/{{ $Event->creator->slug }}">
                            {{ $Event->creator->name }}
                        </a>
                        <a href="/Sport/{{ $Event->eventSport->id }}">
                            {{ $Event->eventSport->sport_name }}
                        </a>

                    </span> Event Details


                </h4>
            </div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <ul class="list-group">
                    <li class="list-group-item">Sport :
                        <span style="color:#FF5522;font-weight:bold;">
                            {{ $Event->eventSport->sport_name }}
                        </span>
                    </li>
                    <li class="list-group-item">Event Date :
                        <span style="color:#FF5522;font-weight:bold;">
                            {{ $Event->EventDay->day_format }}, {{ $Event->E_date }}
                        </span>
                        From :
                        <span style="color:#FF5522;font-weight:bold;">
                            {{ $Event->EventFrom->hour_format }},
                        </span>
                        To :
                        <span style="color:#FF5522;font-weight:bold;">
                            {{ $Event->EventTo->hour_format }}
                        </span>
                    </li>
                    <li class="list-group-item">Preferred Rate:
                        <span style="color:#FF5522;font-weight:bold;">
                            {{ $Event->E_preferred_rate }} / 10
                        </span>
                    </li>
                    <li class="list-group-item">Candidate Player :
                        @if ($Event->E_candidate_id == '')
                            <span style="color:#FF5522;font-weight:bold;">
                                No Candidate Till Now !!
                            </span>
                        @else
                        <a href="profile/{{ $Event->candidate->id }}">
                            <span style="color:#FF5522;font-weight:bold;">
                                {{ $Event->candidate->name }}
                            </span>
                        </a>

                         @endif

                    </li>
                    <li class="list-group-item">Candidate Playground:
                         @if ($Event->E_playground_id == '')
                            <span style="color:#FF5522;font-weight:bold;">
                                No Playground Till Now !!
                            </span>
                        @else
                            <span style="color:#FF5522;font-weight:bold;">
                                {{ $Event->eventPlayground->c_b_p_name }}
                            </span>
                            @php
                                date_default_timezone_set('Africa/Cairo');
                                $nowTime = strtotime(date('Y-m-d h:i:s a')) ;
                                $eventEndAt = strtotime($Event->E_JQueryTo) ;
                                if ($nowTime > $eventEndAt) {
                                    echo '<h1>' . date('Y-m-d h:i:s a') . '</h1>' ;
                                }
                            @endphp
                            <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#RatePlayground">Rate the playground</button>
                         @endif
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="col-md-4 ">
        <div class="panel panel-default shade">
            <div class="panel-heading">
                <h4><span style="color:#FF5522;font-style:italic;">{{ $Event->eventSport->sport_name }}</span> Event Applicants</h4>
                <span style="color:#FF5522;font-weight:bold;" >
                    @if ($Event->Applicants->count() == 0)
                        No One Apply For this event till Now !!
                    @else
                        {{ $Event->Applicants->count() }} Till Now
                    @endif
                </span>
                {{--
                    here we check if event creator who logged in so no need for this,
                    but if any other usersohe can apply for one time for that event
                --}}
                @if ($Event->E_creator_id != Auth::id() && Auth::user()->type != 2)
                    @if ($Event->Applicants->contains(Auth::id()) == true)
                        <span class="pull-right">
                            you applied at
                            @php
                                $row = DB::table('event_user')
                                ->where('event_id', '=', $Event->id)
                                ->where('user_id', '=', Auth::id())
                                ->first()
                            @endphp
                            {{ $row->created_at }}
                        </span>
                    @elseif ($Event->Applicants->contains(Auth::id()) == false && $Event->E_candidate_id == null)
                        <span class="pull-right">

                            <form method="POST" action="{{url('Event')}}/{{$Event->id}}/Apply">
                                {{ csrf_field() }}

                               <input type="submit" class="btn btn-primary btn-xs" value="Apply">

                            </form>

                        </span>
                    @endif
                @endif


            </div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <ul class="list-group">

                @foreach ($Event->Applicants as $Applicant)

                    <li class="list-group-item">

                        <span style="color:#FF5522;font-weight:bold;">

                            <a href="/profile/{{$Applicant->id}}">
                                {{ $Applicant->name }}
                            </a>
                            @if ( $Event->E_creator_id == Auth::id() )
                                @if ( $Event->E_candidate_id == '' )
                                    <span class="pull-right">
                                        <form method="POST" action="{{url('Event')}}/{{$Event->id}}/Accept">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="accepted" value="{{ $Applicant->id }}">
                                            <input type="submit" class="btn btn-primary btn-xs" value="Accept">

                                        </form>
                                    </span>
                                @elseif ( $Event->E_candidate_id == $Applicant->id )
                                    <span class="pull-right">
                                        <btton class="btn btn-warning btn-xs" disabled="disabled">
                                            Accepted
                                        </button>
                                    </span>
                                @else
                                    <span class="pull-right">
                                        <btton class="btn btn-primary btn-xs" disabled="disabled">
                                            Accept
                                        </button>
                                    </span>
                                @endif
                            @else
                                @if ($Applicant->id == Auth::id())

                                    <span class="pull-right">You Are Here</span>

                                @endif
                            @endif

                        </span>

                    </li>

                        <!---------------------------------->



                    @endforeach

                </ul>
            </div>

        </div>
    </div>

@else

    @if ($Event->E_candidate_id != null)
        <div class="col-md-12 ">
            <div id="Games" class=" " role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header text-center uk-block-primary" style="">
                            <p style="font-size: 15px;font-weight: bold;color: #FF5522;margin-bottom: 1px;margin-top: 1px;">
                                Event Games Details
                            </p>
                            <button id="DisplayAddGameForm" class="pull-right btn btn-primary btn-xs icon-button">
                                <i aria-hidden="true" class="fa fa-plus fa-2x"></i>
                            </button>
                        </div><!--end modal header-->
                        <div class="modal-body text-center" style=" padding:20px ; background:#fff; color:#FF5522;">
                            <p id="AddGameLoading" style="display:none;color:#f52;"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></p>
                            <div id="AddGameForm" style="display:none;">
                                <form method="POST" action="{{url('/Event')}}/{{$Event->id}}/SuggestResult">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="MainEvent" value="{{$Event->id}}">
                                    <input type="hidden" name="OpinionBy" value="{{ Auth::id() }}">
                                    <div id="rate-body">
                                        <div class="row">
                                            <div class="col-md-offset-2 col-md-8">

                                                <div class="panel panel-default">
                                                    <div class='panel panel-heading text-center'>
                                                        Suggest Result For You And
                                                        <span style="color:#FF5522;font-style:italic;">
                                                            @if (Auth::id() == $Event->candidate->id && $Event->E_creator_id != null)
                                                                <a href="/profile/{{ $Event->creator->slug }}">
                                                                    {{ $Event->creator->name }}
                                                                </a>
                                                            @elseif (Auth::id() == $Event->creator->id && $Event->E_creator_id != null)
                                                                <a href="/profile/{{ $Event->creator->slug }}">
                                                                    {{ $Event->candidate->name }}
                                                                </a>
                                                            @endif

                                                        </span>
                                                        Event
                                                    </div>
                                                    <div class='panel-body'>
                                                            <div class='col-sm-6 text-center'>
                                                                <ul class="list-group">
                                                                     <li class="list-group-item">
                                                                         <img class='team-icon' src='http://fakeimg.pl/100x100/?text=Player 1&font=lobster' width='64' height='64'>
                                                                         <p style="font-style: italic;font-weight: bold;color: #f52;">
                                                                             {{ $Event->creator->name }}
                                                                         </p>
                                                                     </li>

                                                                     <li class="list-group-item text-center">
                                                                         <input type="number" name="CreatorScore" value="0" style="width: 25%;border: 0px;">
                                                                     </li>

                                                                 </ul>
                                                            </div>
                                                          <div class='col-sm-6 text-center'>
                                                              <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <img class='team-icon' src='http://fakeimg.pl/100x100/?text=Player 2&font=lobster' width='64' height='64'>
                                                                        <p style="font-style: italic;font-weight: bold;color: #f52;">
                                                                            {{ $Event->candidate->name }}
                                                                        </p>
                                                                    </li>
                                                                    <li class="list-group-item text-center">
                                                                        <input type="number" name="CandidateScore" value="0" style="width: 25%;border: 0px;">
                                                                    </li>

                                                              </ul>
                                                          </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                <input type="submit" name="submit" value="Save" class="btn btn-primary btn-xs" id="AddGameBtn">
                                </form>
                                <hr>
                            </div>

                            <div class="scrollable">
                                @if ($Event->SubEvents->count() == 0)

                                    You need To Add Game(s) For  your Event

                                @else
                                    <ul class="list-group">

                                    @foreach ($Event->SubEvents as $Game)

                                            <li class="list-group-item">
                                                <div class="panel panel-default">
                                                    <div class='panel panel-heading '>
                                                        @php
                                                            if($Game->SubEventResult->E_R_OpinionBy == $Event->E_creator_id){
                                                                $chooser = $Event->creator ;
                                                            }elseif ($Game->SubEventResult->E_R_OpinionBy == $Event->E_candidate_id) {
                                                                $chooser = $Event->candidate ;
                                                            }
                                                        @endphp
                                                        <div class="text-center">
                                                            Games uggested by: {{ $chooser->name }}

                                                            @if ($chooser->id == Auth::id())
                                                            {{--%%%%%%%%%%%%%%%%%%%%%%--}}
                                                                <div class="pull-right">
                                                                    @if ($Game->SubEventResult->E_R_YesOrNo == 0) {{--means no decision yet for that game--}}
                                                                        <span class="pull-right">
                                                                            <form action="/Event/{{ $Event->id }}/refuseSuggestedPlayground" method="post" role="form"
                                                                                  style="color:#FF5522;font-weight:bold;display: inline-flex;">
                                                                              {{ csrf_field() }}

                                                                                <input type="hidden" name="MainEvent" value="{{$Event->id}}">

                                                                                <button id="deleteSuggestedGame{{$Game->id}}" type="submit" class="deleteSuggestedGame btn btn-primary btn-xs icon-button" style="font-size: 85%;">
                                                                                  <i class="fa fa-close fa-2x" aria-hidden="true"></i>
                                                                                </button>
                                                                            </form>
                                                                        </span>
                                                                    @elseif ($Game->SubEventResult->E_R_YesOrNo == 2) {{--means other user accepted game--}}
                                                                        {{--do nothing in this case--}}

                                                                    @elseif ($Game->SubEventResult->E_R_YesOrNo == 1) {{--means other user refused game--}}
                                                                        <span class="pull-right">
                                                                            <form action="/Event/{{ $Event->id }}/refuseSuggestedPlayground" method="post" role="form"
                                                                                  style="color:#FF5522;font-weight:bold;display: inline-flex;">
                                                                              {{ csrf_field() }}

                                                                                <input type="hidden" name="MainEvent" value="{{$Event->id}}">

                                                                                <button id="deleteSuggestedGame{{$Game->id}}" type="submit" class="deleteSuggestedGame btn btn-primary btn-xs icon-button" style="font-size: 85%;">
                                                                                  <i class="fa fa-close fa-2x" aria-hidden="true"></i>
                                                                                </button>
                                                                            </form>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                                {{--%%%%%%%%%%%%%%%%%%%%%%--}}
                                                            @endif
                                                        </div>


                                                    </div>
                                                    <div class='panel-body'>
                                                            <div class='col-sm-6 text-center'>
                                                                <ul class="list-group">
                                                                     <li class="list-group-item">
                                                                         <p style="font-style: italic;font-weight: bold;color: #f52;">
                                                                             {{ $Game->creator->name }}
                                                                         </p>
                                                                     </li>

                                                                     <li class="list-group-item text-center">
                                                                         <span>
                                                                             {{ $Game->SubEventResult->E_R_CreatorScore }}
                                                                         </span>
                                                                     </li>

                                                                 </ul>
                                                            </div>
                                                          <div class='col-sm-6 text-center'>
                                                              <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <p style="font-style: italic;font-weight: bold;color: #f52;">
                                                                            {{ $Game->candidate->name }}
                                                                        </p>
                                                                    </li>
                                                                    <li class="list-group-item text-center">
                                                                        <span>
                                                                            {{ $Game->SubEventResult->E_R_CandidateScore }}
                                                                        </span>
                                                                    </li>

                                                              </ul>
                                                          </div>
                                                    </div>
                                                </div>
                                            {{ $Game->id }}
                                            {{----------------------------------------------------------------------------------------------}}
                                            <p class="pull-right" style="color: #ff5522;font-size: 80%;">
                                                 @if ( $chooser->id != Auth::id() )
                                                     <p>
                                                         @if ($Game->SubEventResult->E_R_YesOrNo == 0)
                                                             {{-- Start Accept Suggested Game--}}
                                                             <form action="/Event/{{ $Event->id }}/AcceptSuggestedPlayground" method="post" role="form"
                                                                   style="color:#FF5522;font-weight:bold;display: inline-flex;">
                                                               {{ csrf_field() }}

                                                                 <input type="hidden" name="MainEvent" value="{{$Event->id}}">

                                                                 <button id="accpetSuggestedGame{{$Game->id}}" type="submit" class="accpetSuggestedGame btn btn-primary btn-xs icon-button" style="font-size: 85%;">
                                                                   <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>
                                                                 </button>
                                                             </form>
                                                             {{-- End Accept Suggested Game--}}
                                                             {{-- Start Refuse Suggested Game--}}
                                                             <form action="/Event/{{ $Event->id }}/refuseSuggestedPlayground" method="post" role="form"
                                                                   style="color:#FF5522;font-weight:bold;display: inline-flex;">
                                                               {{ csrf_field() }}

                                                                 <input type="hidden" name="MainEvent" value="{{$Event->id}}">

                                                                 <button id="refuseSuggestedGame{{$Game->id}}" type="submit" class="refuseSuggestedGame btn btn-primary btn-xs icon-button" style="font-size: 85%;">
                                                                   <i class="fa fa-thumbs-up fa-rotate-180 fa-2x" aria-hidden="true"></i>
                                                                 </button>
                                                             </form>
                                                              {{-- End Refuse Suggested Game--}}
                                                         @elseif ($Game->SubEventResult->E_R_YesOrNo == 2)

                                                             <p style="color:#00C853">
                                                                 <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>
                                                             </p>
                                                        @elseif ($Game->SubEventResult->E_R_YesOrNo == 1)
                                                            <p style="color:#D50000">
                                                                <i class="fa fa-thumbs-up fa-rotate-180 fa-2x" aria-hidden="true"></i>
                                                            </p>
                                                         @endif

                                                    </p>

                                                @elseif ( $chooser->id == Auth::id() )

                                                    @if ($Game->SubEventResult->E_R_YesOrNo == 0) {{--means no decision yet for that game--}}
                                                        <p>
                                                            No decision Yet
                                                        </p>
                                                    @elseif ($Game->SubEventResult->E_R_YesOrNo == 2) {{--means other user accepted game--}}

                                                        <p style="color:#00C853">
                                                            <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>
                                                        </p>

                                                    @elseif ($Game->SubEventResult->E_R_YesOrNo == 1) {{--means other user refused game--}}

                                                        <p style="color:#D50000">
                                                            <i class="fa fa-thumbs-up fa-rotate-180 fa-2x" aria-hidden="true"></i>
                                                        </p>

                                                    @endif

                                                 @endif

                                            </p>
                                            {{----------------------------------------------------------------------------------------------}}
                                            </li>
                                    @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    @endif


@endif

<!--end result content -->
