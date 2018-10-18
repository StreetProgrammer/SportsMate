<div>
  
  <div class="panel panel-default shade top-bottom-border">

    <!--------------------->
    <div class="panel-heading text-center shade"
          style="border-block-end-color: #06774a;
              border-block-end-width: 5px;
              border-radius: 0px;
              padding:3px 15px"
    >
      <h4 style="color: #06774a;margin: 5px 0px">candidate</h4>
    </div>
    <a href="{{url('/')}}/profile/{{sm_crypt($challenge->candidate->id)}}" >
      <div class="profile-img-container text-center" style="padding: 25px 0px 0px 0px;">
        <div class="d-flex justify-content-center h-100">
          <div class="image_outer_container">
            <!-- <div class="green_icon"></div> -->
            <div class="image_inner_container">
              <img class="shade"
                    style="height: 100px;width: 100px;border:5px solid #06774ad4;"
                      @if (empty($challenge->candidate->user_img))
                        src="{{ url('/') }}/design/AdminLTE/dist/img/user.png"
                      @else
                        src="{{ Storage::url($challenge->candidate->user_img) }}"
                      @endif class="user-image" alt="User Image" alt="" 
              >
            </div>
          </div>
        </div>
      </div>
    </a>
    <!--------------------->
    <div class="text-center">
      <h4>
          {{$challenge->candidate->name}} 
      </h4>
      {{--start candidate desien part--}}

      @if ( $challenge->creator->id != Auth::id() )
        <p>
           @if ($challenge->C_YesOrNo == 0)

            <span class="a-holding-divs AcceptRejectchallenge" 
                style="color:#ffb300;font-size:10px;cursor:pointer;"
                id="{{ $challenge->id }}_1_challenge" 
            >
                <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>
            </span>
            <span id="{{ $challenge->id }}_ARChallengeLoader" 
                  style="display:none">
                <i class="fa fa-circle-o-notch fa-spin" style="font-size:15px"></i>
            </span>
            <span class="a-holding-divs AcceptRejectchallenge" 
                  style="color:#ffb300;font-size:10px;cursor:pointer;"
                  id="{{ $challenge->id }}_2_challenge" 
            >
                <i class="fa fa-thumbs-up fa-rotate-180 fa-2x" ></i>
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
        </p>
      @elseif ( $challenge->creator->id == Auth::id() )
        <p>
          @if ($challenge->C_YesOrNo == 0)
              <p style="font-size:95%;color:#06774a;">
                  No decision Yet
              </p>
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
        </p>
      @endif

      {{--start candidate desien part--}}
    </div>
  </div>

</div>