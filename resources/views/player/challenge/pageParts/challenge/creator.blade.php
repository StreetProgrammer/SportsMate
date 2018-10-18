<div>
	<div class="panel panel-default shade top-bottom-border">

      <!--------------------->
      <div class="panel-heading text-center shade bottom-border">
        <h4 style="color: #06774a;margin: 5px 0px">creator</h4>
      </div>
        <a href="{{url('/')}}/profile/{{sm_crypt($challenge->creator->id)}}">
	      <div class="profile-img-container text-center" style="padding: 25px 0px 0px 0px;">
	        <div class="d-flex justify-content-center h-100">
	          <div class="image_outer_container">
	            <!-- <div class="green_icon"></div> -->
	            <div class="image_inner_container">
	               <img class="shade"
	                  	style="height: 100px;width: 100px;border:5px solid #06774ad4;"
	                    @if (empty($challenge->creator->user_img))
	                      src="{{ url('/') }}/design/AdminLTE/dist/img/user.png"
	                    @else
	                      src="{{ Storage::url($challenge->creator->user_img) }}"
	                    @endif class="user-image" alt="User Image" alt=""
		         
	            	>
	            </div>
	          </div>
	        </div>
	      </div>
	    </a>
      <!--------------------->
      <div class="text-center">
        <h4>{{ $challenge->creator->name }}</h4>
      </div>

    </div> <!-- .panel -->
</div> 