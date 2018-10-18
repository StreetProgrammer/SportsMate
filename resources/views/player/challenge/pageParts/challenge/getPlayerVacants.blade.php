{{----------------------------------------------------------------}}

            @php

              $days = DB::table('days')->get();
              $hours = DB::table('hours')->get();

            @endphp

<div class="row">
  <div class="col-md-12">
    <div id="vacantErrors" class="alert alert-danger text-center" style="display:none">
          <h4><i class="fa fa-warning"></i></h4>
          <p style="font-size: 90%;color: #a94442;">
            check errors and try again
          </p>
        </div>
  </div>
<div class="col-md-12">
    <form style="color:#FF5522;font-weight:bold;" class="form-horizontal" action="/Vacant/{{ $user->id }}/Add" method="post" role="form">
    {{ csrf_field() }}
    <br>
      
      <div class="col-md-3">
        <div class="form-group">
          <label class="col-lg-2 control-label">Day</label>
          <div class="col-lg-10">
            <div class="ui-select">
              <select name="day" style="padding: 0 5px 0 10px;" class="sm-inputs form-control">

                 @foreach ($days as $day)
                  <option value="{{ $day->day_id }}">{{ $day->day_format }}</option>
                @endforeach

              </select>
            </div>
          </div>
        </div>
      </div> 
      
      <div class="col-md-3">
        <div class="form-group">
          <label class="col-lg-2 control-label">From</label>
          <div class="col-lg-10">
            <div class="ui-select">
              <select name="from" style="padding: 0 5px 0 10px;" class="sm-inputs form-control">

                @foreach ($hours as $hour)
                  <option value="{{ $hour->hour_id }}">{{ $hour->hour_format }}</option>
                @endforeach

              </select>
            </div>
          </div>
        </div>
      </div> 

      <div class="col-md-3">
        <div class="form-group">
          <label class="col-lg-2 control-label">To</label>
          <div class="col-lg-10">
            <div class="ui-select">
              <select id="user_time_zone" name="to" style="padding: 0 5px 0 10px;" class="sm-inputs form-control">

                @foreach ($hours as $hour)
                  <option value="{{ $hour->hour_id }}">{{ $hour->hour_format }}</option>
                @endforeach

              </select>
            </div>
          </div>
        </div>
      </div> 
      
      <div class="col-md-3">
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
              <input type="submit" 
                style="background: #ff5522 !important; color: #fff !important;border-color:#ddd;"
                class="btn sm-inputs btn-primary"
                id="addNewVacantTime" 
                value="Add">
          </div>
        </div>
      </div>
    </form>
  </div> <!--col-md-12-->
  @foreach ($user->vacancies as $vacant)
    <div class="col-md-6">
      <div class="shade text-center" style="padding: 10px 16px;
                  background: #eee;
                  border: 2px solid #fff;
                  border-radius: 5px;
                  margin: 10px 0px" 
      >
        <!-- <span>Day :</span> -->
        <span class="badge badge-success rolesbadge" style="font-size:100%;padding: 10px;">
          {{ $vacant->Day->day_format }}
        </span>
        <span></span>
        <span class="badge badge-info rolesbadge" style="font-size:100%;padding: 10px;">
          {{ $vacant->From->hour_format }}
        </span>
        <span></span>
        <span class="badge badge-info rolesbadge" style="font-size:100%;padding: 10px;">
          {{ $vacant->To->hour_format }}
        </span>

        <form action="/Vacant/{{ $vacant->id }}/Delete" method="post" role="form"
              style="color:#FF5522;font-weight:bold;display: inline-flex;">
          {{ csrf_field() }}

            <button type="submit" id="{{$vacant->id}}_del" class="delVacant btn btn-danger btn-xs icon-button">
              <i class="fa fa-trash-o " aria-hidden="true"></i>
            </button>
        </form>

        <form style="color:#FF5522;font-weight:bold;display: inline-flex;"  action="/Vacant/{{ $vacant->id }}/Edit" method="post" role="form">
          {{ csrf_field() }}

            <button type="submit" id="{{$vacant->id}}_edit" class="editVacant btn btn-primary btn-xs icon-button">
              @if ($vacant->active == 1)
                <i class="fa fa-eye-slash " aria-hidden="true"></i>
              @else
                <i class="fa fa-eye " aria-hidden="true"></i>
              @endif
            </button>
        </form>
      </div><!--- .shade---->
    </div><!--- .col-md-4---->
  @endforeach
</div> <!-- .row -->

  


{{----------------------------------------------------------------}}