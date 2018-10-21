<div>
  
  <div class="panel panel-default shade top-bottom-border">

    <!--------------------->
    <div class="panel-heading text-center shade"
          style="border-block-end-color: #06774a;
              border-block-end-width: 5px;
              border-radius: 0px;
              padding:3px 15px"
    >
      <h4 style="color: #06774a;margin: 5px 0px">{{ trans('player.Event_candidate') }}</h4>
      {{ trans('player.Desc_Event_candidate') }}
    </div>
    <a 
      href="@if ($event->E_candidate_id == null)
              #
            @else
              {{url('/')}}/profile/{{sm_crypt($event->candidate->id)}}
            @endif">
      <div class="profile-img-container text-center" style="padding: 25px 0px 0px 0px;">
        <div class="d-flex justify-content-center h-100">
          <div class="image_outer_container">
            <!-- <div class="green_icon"></div> -->
            <div class="image_inner_container">
              <img class="shade"
                    style="height: 100px;width: 100px;border:5px solid #06774ad4;"
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
              >
            </div>
          </div>
        </div>
      </div>
    </a>
    <!--------------------->
    <div class="text-center">
      <h4>
        @if ($event->E_candidate_id == null)
          <i class="fa fa-question-circle" aria-hidden="true"></i>
        @else
          {{$event->candidate->name}}
        @endif 
      </h4>
    </div>
  </div>

</div>