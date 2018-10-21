@extends('site.index')
@section('content')

@yield('content')
    {{--------------------------------------------------------------------}}
 <!----Slider ----->

 
{{-- @include('player.profile.pageParts.playerHisProfile.topImage') --}}
 
  
</div>
    <!-- #endregion Jssor Slider End -->
<section class="players-main">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

       {{--  <div id="event-data-tabs" style="margin-bottom:10px">
          <input type="hidden" name="user_id" value="{{ $playground->id }}">
          <div class="shade row text-center" style="background-color: #fff;;color:#06774a;padding: 15px 0;">
            <div class="col-xs-4">
              <span id="events" class="evechares tab-li-focus">
                events 
                <span class="badge badge-warning">5</span>
                <span class="events fa fa-circle-o-notch fa-spin" style="display: none;padding: 0px 10px;"></span>
              </span>
            </div>
            <div class="col-xs-4">
              <span id="challenges" class="evechares tab-li">
                challenges 
                <span class="badge badge-warning">5</span>
                <span class="challenges fa fa-circle-o-notch fa-spin" style="display: none;padding: 0px 10px;"></span>
              </span>
            </div>
            <div class="col-xs-4">
              <span id="reservations" class="evechares tab-li">
                reservations
                <span class="badge badge-warning">5</span>
                <span class="reservations fa fa-circle-o-notch fa-spin" style="display: none;padding: 0px 10px;"></span>
              </span>
            </div>
            <!-- <div class="col-xs-3">
              <span id="lost" class="event tab-li">
                Lost 
                <span class="badge badge-warning">5</span>
                <span class="lost fa fa-circle-o-notch fa-spin" style="display: none;padding: 0px 10px;"></span>
              </span>
            </div> -->
          </div>
        </div> --}}

      </div>
    </div>
    <div class="row" >
      <div class="col-md-4" >
        <div 
            id="info-content" 
            class="separator shade" 
            style="padding: 1px;height: auto;background-color: #06774a;margin:3px "
        >

          <div id="display-MainInfo">
            @include('player.playground.pageParts.playground.display-MainInfo')
          </div>

          <div id="editInfo">
            
          </div>
        </div><!-- #info-content .separator-->
        
      </div> <!--col-4-->
            
      <div class="col-md-8">

        <div class="separator" style="height: auto;margin:3px ">
          <div id="slider">
            @include('player.playground.pageParts.playground.slider')
          </div>
        </div>

        <div class="row">
          <div class="separator" style="height: auto;margin:3px ">

            <div id="features">
            
              @include('player.playground.pageParts.playground.features')

            </div>
          </div>
        </div> <!-- branches row-->
         

      </div>
    </div>
  </div>
      
</section>

    {{--------------------------------------------------------------------}}
        @include('player.playground.pageParts.playground.Models')
    {{------------------------------------------------------------------------}}

@endsection