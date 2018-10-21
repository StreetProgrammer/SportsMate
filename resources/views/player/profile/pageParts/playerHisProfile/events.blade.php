@if ( $events->count() > 0 )
	@foreach ($events as $event)
	  	<div>
	      <a href="{{url('/')}}/Event/Show/{{sm_crypt($event->id)}}" class="a-holding-divs" style="">
				<div class="row" style="background-color: #fff;padding: 20px 53px;">
				    <div class="col-xs-4 text-center">
				      <div style="border-radius: 100%; overflow: hidden; width: 60px; height: 60px; margin-top: 15px;margin: 0px auto;">
				        <img style="    width: 60px;" 
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
				    <div class="col-xs-4 text-center">
							<div class="row text-center">
								<div class="text-center col-xs-12">V.S</div>
								<div class="text-center col-xs-6">
									<span class=" span-number">
										1
									</span>
								</div>
								<div class="text-center col-xs-6">
									<span class=" span-number">
										1
									</span>
								</div>
								<div class="text-center col-xs-6">
									<span class=" span-number">
										1
									</span>
								</div>
								<div class="text-center col-xs-6">
									<span class=" span-number">
										1
									</span>
								</div>
								<div class="text-center col-xs-6">
									<span class=" span-number" >
										1
									</span>
								</div>
								<div class="text-center col-xs-6">
									<span class=" span-number" >
										1
									</span>
								</div>
								<div class="text-center col-xs-6">
									<span class=" span-number" >
										1
									</span>
								</div>
								<div class="text-center col-xs-6">
									<span class=" span-number" >
										1
									</span>
								</div>
							</div>
				    </div>
				    <div class="col-xs-4 text-center">
				      <div style="border-radius: 100%; overflow: hidden; width: 60px; height: 60px; margin-top: 15px;margin: 0px auto;">
				        <img style="width: 60px;" 
										@if ($event->E_candidate_id == null)
                      src="{{ url('/') }}/player/img/qMark.jpeg" 
                    @else
                      @if (empty($event->candidate->user_img))
                        src="{{ url('/') }}/design/AdminLTE/dist/img/user.png"
                      @else
                        src="{{ Storage::url($event->candidate->user_img) }}"
                      @endif class="user-image" alt="User Image" alt=""
                      src="{{ url('/') }}/player/img/qMark.jpg" 
                    @endif 
				              style="width: 65px;height: auto;"
				        >
				      </div>
							<div style="margin-top: 25px;">
								<p>
									@if ($event->E_candidate_id == null)
									<i class="fa fa-question-circle" aria-hidden="true"></i>
									@else
									{{$event->candidate->name}}
									@endif
								</p>
				        <h4>4</h4>
				      </div>
				    </div>  
				</div>
				<div class="row text-center" style="background-color: #4f4c41;padding: 10px;">

				    <div class="col-xs-4 text-center" style="color: white;">
				      <i class="fa fa-calendar" style="color:#f89406;font-size: 20px;"></i>
				      @php
				        echo strftime( '%d %B %Y' , strtotime($event->E_date) );// to display a nice formatted date
				      @endphp
				    </div>
				    <div class="col-xs-4 text-center " style="color: white;display:inline-flex;">
				      <i class="fa fa-clock-o" style="color:#f89406;font-size: 20px;"></i>
				      {{$event->eventFrom->hour_format}}
				      <i class="fa fa-arrows-h" style="color:#f89406;font-size: 20px;"></i>
				      {{$event->eventTo->hour_format}}
				    </div>
				    <div class="col-xs-4 text-center" style="color: white;">
				      <i class="fa fa-club" style="font-size: 20px;"></i>
				      @if ($event->E_playground_id != null)
				      	{{ $event->eventPlayground->c_b_p_name }}
				      @else
						{{ trans('player.no_playground') }} 
				      @endif
				    </div>

				</div> 
			</a>   
		</div>

	@endforeach
@else
	<div class="row text-center">
		<div class="col-md-12" style="padding: 70px;">
			<span class="shade" style="font-size: 20px;color: #9e9e9e;padding: 40px;">
				no event TillNow
			</span>
		</div>
	</div>
    
@endif

