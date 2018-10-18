@extends('branch.layouts.branchlayout')

@section('content')

    <div class="container" style="font-size:80%;">
        <div class="row">
            <div class="col-md-6 ">
                <div class="panel panel-default shade">
                    <div class="panel-heading">
                        <h4><span style="color:#FF5522;font-style:italic;">{{ $Playground->c_b_p_name }}</span> Profile</h4>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <ul class="list-group">
                            <li class="list-group-item">Name :
                                <span style="color:#FF5522;font-weight:bold;">
                                    {{ $Playground->c_b_p_name }}
                                </span>
                            </li>
                            <li class="list-group-item">E-mail:
                                <span style="color:#FF5522;font-weight:bold;">
                                    {{ $Playground->c_b_p_name }}
                                </span>

                            </li>
                            <li class="list-group-item">Phone:
                                <span style="color:#FF5522;font-weight:bold;">
                                    {{ $Playground->c_b_p_phone }}
                                </span>
                            </li>
                            <li class="list-group-item">Address:
                                <span style="color:#FF5522;font-weight:bold;">
                                    {{ $Playground->c_b_p_phone }}
                                </span>
                            </li>
                            <li class="list-group-item">Gender:
                                <span style="color:#FF5522;font-weight:bold;">
                                    {{ $Playground->c_b_p_phone }}
                                </span>
                            </li>
                            <li class="list-group-item">Age:
                                <span style="color:#FF5522;font-weight:bold;">
                                    <span style="color:#FF5522;font-weight:bold;">
                                        {{ $Playground->c_b_p_phone }}
                                    </span>
                                </span>
                            </li>

                            <li class="list-group-item">Preferred Gender:
                                <span style="color:#FF5522;font-weight:bold;">
                                    {{ $Playground->c_b_p_phone }}
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-primary btn-xs">
                            <a href="{{ url('/Playground/') }}/{{$Playground->id}}/edit" style="color:#fff;">
                                Edit Profile
                            </a>
                        </button>
                    </div>

                </div>
            </div>


             <div class="col-md-6 ">
                <div class="panel panel-default shade">
                    <div class="panel-heading">
                        <h4><span style="color:#FF5522;font-style:italic;">Events</span></h4>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <span style="font-size: 115%;color: #3097d1;font-weight: bold;">
                            Events Played {{ $Playground->playgroundEvents->count() }} Till Now
                        </span>
                        <ul class="list-group" style="">
                            @foreach ($Playground->playgroundEvents as $playgroundEvent)
                                <li class="list-group-item">

                                </li>
                            @endforeach
                        </ul>
                        <span style="font-size: 115%;color: #3097d1;font-weight: bold;">
                            Expected Events {{ $Playground->expectedEvents->count() }} Till Now
                        </span>
                        <ul class="list-group">
                            @foreach ($Playground->playgroundEvents as $playgroundEvent)
                                <li class="list-group-item">

                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 ">
                <div class="panel panel-default shade">
                    <div class="panel-heading">
                        <h4><span style="color:#FF5522;font-style:italic;">Reservations</span></h4>
                    </div>

                    <div class="panel-body scrollable" style="overflow:auto;max-height: 50vh;">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <ul class="list-group" style="">
                            @if ($Playground->PlaygroudReservations->count() != 0)
                                @foreach ($Playground->PlaygroudReservations as $Reservation)
                                    <li class="list-group-item" style="min-height: 70px;">Detais:
                                        <span style="color:#FF5522;font-weight:bold;">
                                            {{ $Reservation->R_date }} - {{ $Reservation->ReservationDay->day_format }}
                                        </span>
                                        From:
                                        <span style="color:#FF5522;font-weight:bold;">
                                            {{ $Reservation->ReservationFrom->hour_format }}
                                        </span>
                                        To:
                                        <span style="color:#FF5522;font-weight:bold;">
                                            {{ $Reservation->ReservationTo->hour_format }}
                                        </span>
                                        By:
                                        @if ($Reservation->R_creator_id == $Reservation->R_playground_owner_id)
                                            <span style="color:#3097d1;font-weight:bold;font-size: 115%;">
                                                Owner
                                            </span>
                                        @else
                                            <span style="color:#FF5522;font-weight:bold;">
                                                {{ $Reservation->ReservationCreator->name }}
                                            </span>
                                        @endif
                                        <p class="pull-right">
                                            <span style="color:#FF5522;font-weight:bold;">
                                                {{ $Reservation->R_price_per_hour }}
                                            </span>
                                            <i class="fa fa-gbp" aria-hidden="true"></i>
                                            Per Hour--
                                            <span style="color:#FF5522;font-weight:bold;">
                                                {{ $Reservation->R_hour_count }}
                                            </span>
                                            Hours
                                            --
                                            Total Spent
                                            <span style="color:#FF5522;font-weight:bold;">
                                                {{ $Reservation->R_total_price }}
                                            </span>
                                            <i class="fa fa-gbp" aria-hidden="true"></i>
                                        </p>
                                    </li>
                                @endforeach
                            @endif
                        </ul>

                    </div>

                </div>
            </div><!-- end of reservations details-->

          <!-- Add New reservation form column -->
          <div class="col-md-6 personal-info">
              <div class="panel panel-default shade">
                  <div class="panel-heading">

                      <h4>
                          <span style="color:#FF5522;font-style:italic;">
                              Add New Reservation
                          </span>
                      </h4>
                  </div>
            <!--<form class="form-horizontal" role="form">-->
                    <br>
                    <form class="form-horizontal our-form"
                      action="{{url('Reservation')}}/{{$Playground->id}}/Add"
                      method="post"
                      role="form"
                    >
                        {{ csrf_field() }}

                      <div class="form-group">
                        <label class="col-lg-3 control-label">Event Date</label>
                        <div class="col-lg-8">
                          <input id="E_date" type="date" name="R_date" class="form-control input-xs">
                        </div>
                      </div>
                      @php
                          $hours = DB::table('hours')->get();
                      @endphp
                      <div class="form-group">
                        <label class="col-lg-3 control-label">From</label>
                        <div class="col-lg-8">
                            <select name="R_from" class="form-control input-xs">

                              @foreach ($hours as $hour)
                                <option value="{{ $hour->hour_id }}">{{ $hour->hour_format }}</option>
                              @endforeach

                            </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-3 control-label">To</label>
                        <div class="col-lg-8">
                            <select name="R_to" class="form-control input-xs">

                              @foreach ($hours as $hour)
                                <option value="{{ $hour->hour_id }}">{{ $hour->hour_format }}</option>
                              @endforeach

                            </select>
                        </div>
                      </div>

                      

                      <!--
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Hour Price</label>
                        <div class="col-lg-8">
                          <input class="form-control input-xs" type="number" min="1" name="R_price_per_hour" value="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-3 control-label">Tatal Hours</label>
                        <div class="col-lg-8">
                          <input class="form-control input-xs" type="number" min="1" name="R_hour_count" value="">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="col-lg-3 control-label">Total Price</label>
                        <div class="col-lg-8">
                          <input class="form-control input-xs" type="number" min="1" name="R_total_price" value="">
                        </div>
                      </div>
                        -->


                      <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-xs btn-primary" value="Add">
                        </div>
                      </div>
                    </form>
                    </hr>
                </div>
          </div><!-- Add New reservation form column -->
    </div><!--row 2-->
</div>

@endsection
