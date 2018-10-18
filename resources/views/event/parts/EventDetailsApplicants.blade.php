<!-- start Result view -->
@if (Auth::id() != $Event->E_creator_id || Auth::id() != $Event->E_candidate_id)
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
                            <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#RatePlayground">
                                Rate the playground
                            </button>
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
                    but if any other users who can apply for one time for that event
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
                    @if ($Event->E_candidate_id != null && Auth::id() != $Event->E_creator_id && Auth::id() != $Event->E_candidate_id)
                        <span class="pull-right">
                            @if ($Event->EventResult->count() > 0)
                                @foreach ($Event->EventResult as $Result)

                                    @if ($Result->E_R_IsFinalResult == 2)
                                        <!-- echo nothing if  we have final result -->
                                    @elseif ($Result->E_R_IsFinalResult != 2 && Auth::id() == $Result->E_R_ConfirmBy && !in_array($Result->E_R_YesOrNo, [1, 2]) == true)

                                        <button type="button" id="ShowPlayerResultModal" class="btn btn-primary btn-xs pull-right" style="margin:0px 5px;" data-toggle="modal" data-target="#AcceptOrRefuse">
                                            Make Decision
                                        </button>

                                    @endif

                                @endforeach
                            @endif
                        </span>
                        <span class="pull-right">
                            @php
                                if (Auth::id() == $Event->E_creator_id) {

                                    $giver_user_id = $Event->E_creator_id ;
                                    $rated_user_id = $Event->E_candidate_id ;

                                }elseif (Auth::id() == $Event->E_candidate_id) {

                                    $giver_user_id = $Event->E_candidate_id ;
                                    $rated_user_id = $Event->E_creator_id ;
                                }

                                $RateAdded = DB::table('rates')
                                        ->where('Event_id', '=', $Event->id)
                                        ->where('giver_user_id', '=', $giver_user_id)
                                        ->where('rated_user_id', '=', $rated_user_id)
                                        ->first() ;

                            @endphp
                        @if ($RateAdded != null)
                            <!-- echo nothing if  we have rate -->
                        @elseif ($RateAdded == null)

                            <button type="button" id="ShowPlayerRateModal" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#RatePlayer">
                                Rate the player
                            </button>
                        @endif

                        </span>
                        <span class="pull-right">

                                @if ($Event->EventResult->count() > 0)
                                    @php

                                        $ResultAdded = DB::table('results')
                                                ->where('E_R_EventId', '=', $Event->id)
                                                ->where('E_R_OpinionBy', '=', Auth::id())
                                                ->first() ;

                                    @endphp
                                    @foreach ($Event->EventResult as $Result)

                                            @if ($Result->E_R_IsFinalResult == 2 )

                                            @elseif ($ResultAdded != null)

                                            @elseif ($ResultAdded == null)
                                                <button type="button" id="ShowPlayerRateModal" class="btn btn-primary btn-xs pull-right" style="margin:0px 5px;" data-toggle="modal" data-target="#SuggestResult">
                                                    Give A Result
                                                    <!--<i aria-hidden="true" class="fa fa-trash-o fa-2x">
                                                    </i>-->
                                                </button>
                                            @endif
                                    @endforeach
                                @elseif ($Event->EventResult->count() == 0)
                                    <button type="button" id="ShowPlayerRateModal" class="btn btn-primary btn-xs pull-right" style="margin:0px 5px;" data-toggle="modal" data-target="#SuggestResult">
                                        Give A Result
                                        <!--<i aria-hidden="true" class="fa fa-trash-o fa-2x">
                                        </i>-->
                                    </button>
                                @endif
                        </span>
                    @endif

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
@endif

<!--end result content -->
