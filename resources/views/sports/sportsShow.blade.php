@extends('sports.layouts.sportLayout')

@section('content')
<div class="container" style="font-size:80%;">
    <div class="row">
        @foreach ($Sports as $sport)
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail shade">
              <img src="https://picsum.photos/300" alt="...">
              <div class="caption">
                <h3 style="font-size:113%;">{{ $sport->sport_name }}</h3>
                <p style="color: #FB8C00;">
                	@php
	                	$description = str_limit($sport->sport_desc, 30);
	                	echo $description;
	                @endphp  
	                <a href="/Sport/{{$sport->id}}" class="btn btn-primary btn-xs" role="button">More</a>
	            </p>
            </div>
        </div>
    </div>
        @endforeach
        
    </div>
</div>
@endsection