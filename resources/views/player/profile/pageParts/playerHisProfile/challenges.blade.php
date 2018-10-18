@if ( $challenges->count() > 0 )
	@foreach ($challenges as $challenge)
	  	<div>
	      <a href="{{url('/')}}/Challenge/Show/{{sm_crypt($challenge->id)}}" class="a-holding-divs" style="">
				<div class="row" style="background-color: #fff;padding: 20px 53px;">
				    <div class="col-md-4 text-center">
				      <div style="border-radius: 100%; overflow: hidden; width: 60px; height: 60px; margin-top: 15px;margin: 0px auto;">
				        <img style="    width: 60px;" 
				            @if (empty( $challenge->creator->user_img))
				              src="{{ url('/') }}/design/AdminLTE/dist/img/user.png"
				            @else
				              src="{{ Storage::url($challenge->creator->user_img) }}"
				            @endif 
				              style="width: 65px;height: auto;"
				        >
				      </div>
				      <div style="margin-top: 25px;">
				        <p>{{ $challenge->creator->name }}</p>
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
				        <img style="width: 60px;" 
							@if (empty($challenge->candidate->user_img))
				              src="{{ url('/') }}/design/AdminLTE/dist/img/user.png"
				            @else
				              src="{{ Storage::url($challenge->candidate->user_img) }}"
				            @endif 
				              style="width: 65px;height: auto;"
				        >
				      </div>
				      <div style="margin-top: 25px;">
				        <p>{{ $challenge->candidate->name }}</p>
				        <h4>4</h4>
				      </div>
				      <div style="margin-top: 25px;">
				        @if ($challenge->C_YesOrNo == 0)
				            <span class="a-holding-divs" 
				                  style="color:#00C853;font-size:10px;" 
				            >
				                <i class="fa fa-question" aria-hidden="true"></i>
				            </span>                  
				          @elseif ($challenge->C_YesOrNo == 1)
				            <span class="a-holding-divs" 
				                  style="color:#00C853;font-size:10px;" 
				            >
				                <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>
				            </span>
				          @elseif ($challenge->C_YesOrNo == 2)
				            <span class="a-holding-divs" 
				                   style="color:#D50000;font-size:10px;" 
				            >
				                <i class="fa fa-thumbs-up fa-rotate-180 fa-2x" ></i>
				            </span>
				          @endif
				      </div>
				    </div>  
				</div>
				<div class="row text-center">
				  <div class="col-md-12" style="background-color: #4f4c41;padding: 10px;">
				    <div class="col-md-4" style="color: white;">
				      <i class="fa fa-calendar" style="color:#f89406;font-size: 20px;"></i>
				      @php
				        echo strftime( '%d %B %Y' , strtotime($challenge->C_date) );// to display a nice formatted date
				      @endphp
				    </div>
				    <div class="col-md-4" style="color: white;">
				      <i class="fa fa-clock-o" style="color:#f89406;font-size: 20px;"></i>
				      {{$challenge->ChallengeFrom->hour_format}}
				      <i class="fa fa-arrows-h" style="color:#f89406;font-size: 20px;"></i>
				      {{$challenge->ChallengeTo->hour_format}}
				    </div>
				    <div class="col-md-4" style="color: white;">
				      <i class="fa fa-club" style="font-size: 20px;"></i>
				      @if ($challenge->C_playground_id != null)
				      	{{ $challenge->challengePlayground->c_b_p_name }}
				      @else
						no playground
				      @endif
				    </div>
				  </div>
				</div> 
			</a>   
		</div>

	@endforeach
@else
	<div class="row text-center">
		<div class="col-md-12" style="padding: 70px;">
			<span class="shade" style="font-size: 20px;color: #9e9e9e;padding: 40px;">
				no Challenge TillNow
			</span>
		</div>
	</div>
    
@endif

