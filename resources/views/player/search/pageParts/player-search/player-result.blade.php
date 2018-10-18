<div class="panel panel-default shade">
	<div class="scroll" style="background-color: #fff; height: 500px;overflow-y: scroll;margin-bottom: 20px">
	@foreach ($players as $player)
		<div class="col-md-4 text-center">

			<a class="a-holding-divs" href="{{ url('/') }}/profile/{{sm_crypt($player->id)}}">
				<div class="Player shade" style="border: 1px solid #ffa500;margin: 5px 0px;">

					<div class="profile-img-container text-center" style="padding: 5px 0px 0px 0px;">
						<div class="d-flex justify-content-center h-100">
						    <div class="image_outer_container">
						      <!-- <div class="green_icon"></div> -->
						        <div class="image_inner_container">
							        <img class="shade" 
							             style="height: 75px;
                                                width: 75px;
                                                border: 2px solid #f89406;" 
							            @if (empty($player->user_img))
							              src="{{ url('/') }}/design/AdminLTE/dist/img/user.png"
							            @else
							              src="{{ Storage::url($player->user_img) }}"
							            @endif
							        >
						        </div>
						    </div>
						</div>
					</div>
					<div style="margin-bottom: 10px">
						<h3 style="padding-top: 5px !important;
	                               margin-bottom: 5px !important;
	                               font-size: 15px"
	                    >
	                    	{{$player->name}}
	                    </h3>
						<p style="font-family: 'Roboto', sans-serif;font-size: 12px;">
			                <span>Intermediate</span> / 
			                <span>19 Matches</span>
			            </p>
					</div>

					<!-- <br>
					<div class="ovals">
						<span class="oval-div oval-div-green " >
							<i class="fa fa-star"></i>
							<span>Invite</span>
						</span>
						<span class="oval-div oval-div-orange " >
							<i class="fa fa-star"></i>
							<span>Fav</span>
						</span>
					</div>
					<br> -->
				</div>
			</a>
			
		</div>
	@endforeach
	</div>
</div>
		