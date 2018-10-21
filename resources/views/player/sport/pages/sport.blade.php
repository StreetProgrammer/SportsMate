@extends('site.index')
@section('content')

@yield('content')
    {{--------------------------------------------------------------------}}
   {{ csrf_field() }}

<section class="players-main">
  <div class="container">
    <div class="row">

      <div class="col-md-6">

        <div class="">
          <div style="width: 100%;height: auto;overflow: hidden;">
            <img  style="width: 100%;height: auto;" 
                  @if (empty($Sport->sport_img))
                    src="{{ url('/') }}/player/img/counter.png"
                  @else
                    src="{{ Storage::url($Sport->sport_img) }}"
                  @endif class="user-image" alt="Sport Image" alt=""
            >
          </div>

          <div class="sport-desc" style="padding: 10px;margin-top: 10px">
            <h3>
              @if ( direction() == 'ltr' )
               {{ $Sport->en_sport_name }}   
              @else
               {{ $Sport->ar_sport_name }}   
              @endif
            </h3>
            <p>{{ $Sport->sport_desc }}</p>
          </div>
        </div>
      </div>

      <div class="col-md-6">

        <div class="">

          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="offer offer-default">
              <div class="shape">
                <div class="shape-text">
                               
                </div>
              </div>
              <div class="offer-content">
                <h3 class="lead" style="font-size:16px;font-weight:bold;">
                  {{ trans('player.playground') }}
                  <span class="text-center badge bg-danger" 
                        style="padding: 7px 9px 7px;
                               background-color: #06774a;
                              font-size: 15px;
                              border-radius: 50px;"
                  >
                    1{{ $Sport->playgrounds->count() }}
                  </span>
                </h3>
                <p style="color: #06774a;font-size: 13px;">
                  And a little description.
                  <br> and so one
                </p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="offer offer-orange">
              <div class="shape">
                <div class="shape-text">
                              
                </div>
              </div>
              <div class="offer-content">
                <h3 class="lead" style="font-size:16px;font-weight:bold;">
                  {{ trans('player.player') }}
                  <span class="text-center badge bg-danger" 
                        style="padding: 7px 9px 7px;
                               background-color:#ffa500;
                              font-size: 15px;
                              border-radius: 50px;"
                  >
                    {{ $Sport->player->count() }}
                  </span>
                </h3>
                <p style="color:#ffa500;font-size: 13px;">
                  And a little description.
                  <br> and so one
                </p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="offer offer-danger">
              <div class="shape">
                <div class="shape-text">
                                
                </div>
              </div>
              <div class="offer-content">
                <h3 class="lead" style="font-size:16px;font-weight:bold;">
                  {{ trans('player.challenge') }}
                  <span class="text-center badge bg-danger" 
                        style="padding: 7px 9px 7px;
                               background-color: #d9534f;
                              font-size: 15px;
                              border-radius: 50px;"
                  >
                    {{ $Sport->sportChallenges->count() }}
                  </span>
                </h3>
                <p style="color: #d9534f;font-size: 13px;">
                  And a little description.
                  <br> and so one
                </p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="offer offer-primary">
              <div class="shape">
                <div class="shape-text">
                               
                </div>
              </div>
              <div class="offer-content">
                <h3 class="lead" style="font-size:16px;font-weight:bold;">
                  {{ trans('player.event') }}
                  <span class="text-center badge bg-danger" 
                        style="padding: 7px 9px 7px;
                               background-color: #428bca;
                              font-size: 15px;
                              border-radius: 50px;"
                  >
                    {{ $Sport->sportEvents->count() }}
                  </span>
                </h3>
                <p style="color: #428bca;font-size: 13px;">
                  And a little description.
                  <br> and so one
                </p>
              </div>
            </div>
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="offer offer-info">
              <div class="shape">
                <div class="shape-text">
                               
                </div>
              </div>
              <div class="offer-content">
                <h3 class="lead" style="font-size:16px;font-weight:bold;">
                  {{ trans('player.trainer') }}
                  <span class="text-center badge bg-danger" 
                        style="padding: 7px 9px 7px;
                               background-color: #5bc0de;
                              font-size: 15px;
                              border-radius: 50px;"
                  >
                    {{ $Sport->trainer->count() }}
                  </span>
                </h3>
                <p style="color: #5bc0de;font-size: 13px;">
                  And a little description.
                  <br> and so one
                </p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="offer offer-gray">
              <div class="shape">
                <div class="shape-text">

                </div>
              </div>
              <div class="offer-content">
                <h3 class="lead" style="font-size:16px;font-weight:bold;">
                  {{ trans('player.referee') }}
                  <span class="text-center badge bg-danger" 
                        style="padding: 7px 9px 7px;
                               background-color: #969796;
                              font-size: 15px;
                              border-radius: 50px;"
                  >
                    {{ $Sport->referee->count() }}
                  </span>
                </h3>
                <p style="color: #969796;font-size: 13px;">
                  And a little description.
                  <br> and so one
                </p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
    {{------------------------------------------------------------------------}}
    {{------------------------------------------------------------------------}}

@endsection