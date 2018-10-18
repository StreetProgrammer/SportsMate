@extends('sports.layouts.sportLayout')

@section('content')
<div class="container" style="font-size:80%;">
    <div class="row">
        @foreach ($Events as $Event)
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail shade">
              <img src="https://picsum.photos/300" alt="...">
              <div class="caption">
                <h3 style="font-size:113%;">

                    Event By: 
                    <a href="#">
                        {{ $Event->creator->name }}
                    </a>
                    
                    
                </h3>
                <span style="font-size: 95%;color:#FB8C00">
                        {{ $Event->E_day }} 
                        {{ $Event->E_date }}
                    </span>
                <p style="color: #FB8C00;">
                    Sport: 
                    <a href="/Sport/{{ $Event->eventSport->id }}">
                        {{ $Event->eventSport->sport_name }}
                    </a>  
                    <a href="/Event/Show/{{$Event->id}}" class="btn btn-primary btn-xs pull-right" role="button">
                        Event Details
                    </a>

                </p>
            </div>
        </div>
    </div>
        @endforeach
        
    </div>
</div>
@endsection
