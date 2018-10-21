@extends('site.index')
@section('content')

@yield('content')
    {{--------------------------------------------------------------------}}
  <section class="players-main search-filtter">
    <div class="container">
      <div class="row">
      <div class="col-md-12">

        <div id="event-data-tabs" style="">
          <input type="hidden" name="user_id" value="">
          <div class="shade row text-center" style="background-color: #fff;;color:#06774a;padding: 15px 0;">
            <div class="col-xs-4">
              <span id="players" class="players-playgrounds-events tab-li @isset($players) tab-li-focus @endisset">
                {{ trans('player.players') }} 
                {{-- <span class="badge badge-warning">5</span> --}}
                <span class="players fa fa-circle-o-notch fa-spin" style="display: none;padding: 0px 10px;"></span>
              </span>
            </div>
            <div class="col-xs-4">
              <span id="playgrounds" class="players-playgrounds-events tab-li @isset($playgrounds) tab-li-focus @endisset"">
                {{ trans('player.playgrounds') }} 
                {{-- <span class="badge badge-warning">5</span> --}}
                <span class="playgrounds fa fa-circle-o-notch fa-spin" style="display: none;padding: 0px 10px;"></span>
              </span>
            </div>
            <div class="col-xs-4">
              <span id="events" class="players-playgrounds-events tab-li">
                {{ trans('player.events') }}
                {{-- <span class="badge badge-warning">5</span> --}}
                <span class="events fa fa-circle-o-notch fa-spin" style="display: none;padding: 0px 10px;"></span>
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
        </div>

      </div>
    </div>
    </div>
  </section>  

  <section class="players-main search-result">
    <div class="container">
      <div class="row">
        <div id="search-filtter" class="col-md-4">
          @if ($model == 'player')
            @include('player.search.pageParts.player-search.player-filtter')
          @elseif($model == 'playground')
            @include('player.search.pageParts.playground-search.playground-filtter')
          @else
            @include('player.search.pageParts.player-search.player-filtter')
          @endif
          
        </div>
        <div id="search-result" class="col-md-8">
          @if ($model == 'player')
            @include('player.search.pageParts.player-search.player-result')
          @elseif($model == 'playground')
            @include('player.search.pageParts.playground-search.playground-result')
          @else
            @include('player.search.pageParts.player-search.player-result')
          @endif
        </div>
        
      </div>
    </div>
  </section>
    {{--------------------------------------------------------------------}}
 
@endsection