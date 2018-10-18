<div id="event-data-tabs" style="margin-bottom:10px">
  <input type="hidden" name="user_id" value="{{ $user->id}}">
  <div class="shade row text-center" style="background-color: #9E9E9E;;color:#fff ;padding: 5px 0;">
    <div class="col-xs-3">
      <span id="played" class="event tab-li-focus">
        all events 
        <span class="badge badge-warning">5</span>
        <span class="played fa fa-circle-o-notch fa-spin" style="display: none;padding: 0px 10px;"></span>
      </span>
    </div>
    <div class="col-xs-3">
      <span id="won" class="event tab-li">
        Won 
        <span class="badge badge-warning">5</span>
        <span class="won fa fa-circle-o-notch fa-spin" style="display: none;padding: 0px 10px;"></span>
      </span>
    </div>
    <div class="col-xs-3">
      <span id="drawn" class="event tab-li">
        Drawn 
        <span class="badge badge-warning">5</span>
        <span class="drawn fa fa-circle-o-notch fa-spin" style="display: none;padding: 0px 10px;"></span>
      </span>
    </div>
    <div class="col-xs-3">
      <span id="lost" class="event tab-li">
        Lost 
        <span class="badge badge-warning">5</span>
        <span class="lost fa fa-circle-o-notch fa-spin" style="display: none;padding: 0px 10px;"></span>
      </span>
    </div>
  </div>
</div>


<div id="event-data-display" class="shade scrollable">

  @include('player.profile.pageParts.playerHisProfile.events')
  
</div>

