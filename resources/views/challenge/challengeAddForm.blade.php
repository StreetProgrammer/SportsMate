@extends('event.layouts.eventLayout')

@section('content')

<div class="container" style="font-size: 80%;">
    <h3>Add New Event</h3>
    <hr>
    <div class="row">


      <!-- Add New Event form column -->


      <div class="col-md-6 personal-info col-md-offset-3">

        <h4 style="color:#FF5522;font-weight:bold;">New Event</h4>

        <!--<form class="form-horizontal" role="form">-->
        <form class="form-horizontal our-form"
          action="{{url('Event')}}/{{$userInfo->slug}}/Save"
          method="post"
          role="form"
        >
            {{ csrf_field() }}

          <div class="form-group">
            <label class="col-lg-3 control-label">Sport</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="E_sport_id" name="E_sport_id" class="form-control input-xs">

                  @foreach ($userInfo->sports as $sport)
                    <option value="{{ $sport->id }}">{{ $sport->sport_name }}</option>
                  @endforeach

                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Prefered Rate</label>
            <div class="col-lg-5">
              <input class="form-control input-xs"
                  type="range"
                  name="E_preferred_rate"
                  min="0"
                  max="10"
                  step="1"
                  value="5"
              >
            </div>
            <span>choose from 0 to 10 </span>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Event Date</label>
            <div class="col-lg-8">
              <input id="E_date" type="date" name="E_date" class="form-control input-xs">
            </div>
          </div>
          @php
              $hours = DB::table('hours')->get();
          @endphp
          <div class="form-group">
            <label class="col-lg-3 control-label">From</label>
            <div class="col-lg-8">
                <select name="E_from" class="form-control input-xs">

                  @foreach ($hours as $hour)
                    <option value="{{ $hour->hour_id }}">{{ $hour->hour_format }}</option>
                  @endforeach

                </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">To</label>
            <div class="col-lg-8">
                <select name="E_to" class="form-control input-xs">

                  @foreach ($hours as $hour)
                    <option value="{{ $hour->hour_id }}">{{ $hour->hour_format }}</option>
                  @endforeach

                </select>
            </div>
          </div>


          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
                <input type="submit" class="btn btn-xs btn-primary" value="Add">
            </div>
          </div>
        </form>
        </hr>

      </div>


<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>here player Edit Profile</h3>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
