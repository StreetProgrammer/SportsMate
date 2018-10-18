@extends('sports.layouts.sportLayout')

@section('content')
<div class="container" style="font-size:80%;">
    <div class="row">
        <div class="col-md-4 ">
            <div class="panel panel-default shade">
                <div class="panel-heading">
                    <h4><span style="color:#FF5522;font-style:italic;">{{ $sportDetails->sport_name }}</span> Page</h4>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group">
                        <li class="list-group-item">Sport Name : 
                            <span style="color:#FF5522;font-weight:bold;">
                                {{ $sportDetails->sport_name }}
                            </span>
                        </li>
                        <li class="list-group-item">Player To Play: 
                            <span style="color:#FF5522;font-weight:bold;">
                                {{ $sportDetails->sport_player_num }}
                            </span>
                        </li>
                        <li class="list-group-item">Description: 
                            <span style="color:#FF5522;font-weight:bold;">
                                {{ $sportDetails->sport_desc }}
                            </span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="col-md-4 ">
            <div class="panel panel-default shade">
                <div class="panel-heading">
                    <h4>
                        <span style="color:#FF5522;font-style:italic;">
                            {{ $sportDetails->sport_name }}
                        </span> 
                        Lovers
                        @if ($sportDetails->users->count() == 0)
                            <span style="font-size: 65%;color:#FF5522;font-style:italic;" class="pull-right">
                                No Lovers Till Now !!
                            </span>
                            
                        @else

                            <span style="color:#FF5522;font-style:italic;" class="pull-right">
                                {{ $sportDetails->users->count() }} 
                                Lover(s)
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

                        @foreach ($sportDetails->users as $sportLover)
                           
                                <li class="list-group-item">
                                    
                                    <span style="color:#FF5522;font-weight:bold;">
                                        <a href="/profile/{{ $sportLover->slug }}">

                                            {{$sportLover->name}}
                                            @if ($sportLover->id == Auth::user()->id)
                                                <span class="pull-right">You Are Here</span>
                                            @endif
                                        </a>  

                                    </span>
                                    
                                </li>                            
                           
                            <!---------------------------------->
                            


                        @endforeach
            
                    </ul>
                </div>

            </div>
        </div>


        <div class="col-md-4 ">
            <div class="panel panel-default shade">
                <div class="panel-heading">
                    <h4>
                        <span style="color:#FF5522;font-style:italic;">
                            {{ $sportDetails->sport_name }}
                        </span> 
                        Events
                        @if ($sportDetails->sportEvents->count() == 0)
                            
                            <span style="font-size: 65%;color:#FF5522;font-style:italic;" class="pull-right">
                                No Events Till Now !!
                            </span>
                        @else

                            <span style="color:#FF5522;font-style:italic;" class="pull-right">
                                {{ $sportDetails->sportEvents->count() }} 
                                Event(s)
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

                        @foreach ($sportDetails->sportEvents as $event)

                                <li class="list-group-item">
                                    
                                    <span style="color:#FF5522;font-weight:bold;">
                                        <a href="/Event/Show/{{$event->id}}">

                                            <span class=""> 
                                                On {{$event->E_day}}, {{$event->E_date}}
                                            </span>
                                             By
                                            <span style="color:#FF5522;font-weight:bold;"> 
                                                By {{$event->creator->name}}
                                            </span>

                                        </a>  

                                    </span>
                                    
                                </li>    
                           
                                
                        @endforeach
            
                    </ul>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
