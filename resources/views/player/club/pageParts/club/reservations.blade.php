@if ($events->count() > 0)
  @foreach ($events as $event)
    
    <div class="row" style="background-color: #fff;padding: 20px 53px;">
      <div class="col-md-4 text-center">
        <div style="border-radius: 100%; overflow: hidden; width: 60px; height: 60px; margin-top: 15px;margin: 0px auto;">
          <img 
              @if (empty( $event->creator->user_img))
                src="{{ url('/') }}/design/AdminLTE/dist/img/user.png"
              @else
                src="{{ Storage::url($event->creator->user_img) }}"
              @endif 
                style="width: 65px;height: auto;"
          >
        </div>
        <div style="margin-top: 25px;">
          <p>{{ $event->creator->name }}</p>
          <h4>4</h4>
        </div>
      </div>
      <div class="col-md-4 text-center">
        
          <div>V.S</div>
          
            <div class="div-number">4</div>
          
         
            <div class="div-number" style="float: right;">4</div>
            
         <div class="clearfix"></div>
          
            <div class="div-number" >4</div>
        
        
            <div class="div-number" style="float: right;">4</div> 
      </div>
      <div class="col-md-4 text-center">
        <div style="border-radius: 100%; overflow: hidden; width: 60px; height: 60px; margin-top: 15px;margin: 0px auto;">
          <img 
              @if (empty($event->candidate->user_img))
                src="{{ url('/') }}/design/AdminLTE/dist/img/user.png"
              @else
                src="{{ Storage::url($event->candidate->user_img) }}"
              @endif 
                style="width: 65px;height: auto;"
          >
        </div>
        <div style="margin-top: 25px;">
          <p>{{ $event->candidate->name }}</p>
          <h4>4</h4>
        </div>
      </div>  
    </div>
    <div class="row text-center">
    <div class="col-md-12" style="background-color: #4f4c41;padding: 10px;">
      <div class="col-md-4" style="color: white;">
        <i class="fa fa-calendar" style="color:#f89406;font-size: 20px;"></i>
        @php
          echo strftime( '%d %B %Y' , strtotime($event->E_date) );// to display a nice formatted date
        @endphp
      </div>
      <div class="col-md-4" style="color: white;">
        <i class="fa fa-clock-o" style="color:#f89406;font-size: 20px;"></i>
        {{$event->EventFrom->hour_format}}
        <i class="fa fa-arrows-h" style="color:#f89406;font-size: 20px;"></i>
        {{$event->EventTo->hour_format}}
      </div>
      <div class="col-md-4" style="color: white;">
        <i class="fa fa-club" style="font-size: 20px;"></i>
        al-gazeera
      </div>
    </div>
  </div>    

  @endforeach
@else
  <div class="row text-center">
    <div class="col-md-12" style="padding: 70px;">
      <span class="shade" style="font-size: 20px;color: #9e9e9e;padding: 40px;background: #fff;">
        no Reservations Till Now
      </span>
    </div>
  </div>
    
@endif

