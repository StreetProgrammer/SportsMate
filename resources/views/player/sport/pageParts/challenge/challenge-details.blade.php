<div>
           <div class="panel panel-default shade top-bottom-border" >

          <!--------------------->
          <div class="panel-heading text-center shade bottom-border" >
            <h4 style="color: #06774a;margin: 5px 0px">Event Detalis</h4>
          </div>
          <div class="shade-2 text-center" 
               style="background: #ececec;
                  border: 1px solid #ddd;
                  margin:15px 50px 5px 50px;"
          >
            <h4 style="font-size: 15px !important;">
              <span>Sport: </span>
              <a class="a-holding-divs"
                  href="{{url('/')}}/Sport/{{ sm_crypt($challenge->challengeSport->id) }}">
                {{ $challenge->challengeSport->en_sport_name }}
              </a>
            </h4>
          </div>

          <div class="shade-2 text-center" 
               style="background: #ececec;
                  border: 1px solid #ddd;
                  margin: 5px 50px;">
            <h4 style="font-size: 15px !important;">
              <span>preferred rate: </span>
              <span>
                {{-- to dispaly preferred rate in stars--}}
                @php
                $rate = round($challenge->C_preferred_rate) / 2 ;
                for ($i=0; $i < 5; $i++) { 
                    if ( $rate > $i ) {
                        //echo round($productitem->getRate($product['id'])) ;
                        echo '<i style="color:#ffb300" class="fa fa-star"  aria-hidden="true"></i>' ;
                      } else {
                        //echo "not";
                        echo '<i style="color:#9e9e9e" class="fa fa-star"  aria-hidden="true"></i>' ;
                      }
                }// end for loop
              @endphp
                
              </span>
            </h4>
          </div>

          <!--------------------->
          <div class="shade-2 text-center" 
               style="background: #ececec;
                  border: 1px solid #ddd;
                  margin:5px 50px;"
          >
            <h4 style="font-size: 15px !important;">
              <span>
                <i class="fa fa-calendar" style="color: #f89406;font-size: 20px;"></i> </span>
              <span>{{ strftime( '%d-%m-%Y' , strtotime($challenge->C_date ) )}} </span>
              <span><i class="fa fa-clock-o" style="color: #f89406;font-size: 20px;"></i></i></span>
              <span>{{ $challenge->ChallengeFrom->hour_format}} </span>
              <span><i class="fa fa-arrows-h" style="color: #f89406;font-size: 20px;"></i></i></span>
              <span>{{ $challenge->ChallengeTo->hour_format}} </span>
            </h4>
          </div>
</div>