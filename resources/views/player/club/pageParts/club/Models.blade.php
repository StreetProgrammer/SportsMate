
@foreach ($club->clubBranches as $branch)
    <!------------------------------------------->
    <!--  start add new Challenge Modal -->
    <!--------------------------------->
    <div id="{{$branch->id}}" class="modal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 0px;">
          <div class="modal-header" style="color: #fff;background-color: #06774a !important;">
            <button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
            <h4 class="modal-title" >
              Branch: {{ $branch->c_b_name }} 
              <span id="challengeInfoLoader" style="display:none;">
                <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
              </span>
            </h4>
          </div>
          <div id="getPlayerVacants" class="modal-body">

            {{----------------------------------------------------------------}}

              <div class="row">
                @foreach ($branch->branchPlaygrounds as $playground)
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="offer offer-default ">
                      <div class="shape">
                        <div class="shape-text">
                                       
                        </div>
                      </div>
                      <div class="offer-content">
                        <h3 class="lead" style="font-size:16px;font-weight:bold;">
                          <a href="{{url('/')}}/Playground/{{sm_crypt($playground->id)}}}" class="a-holding-divs">
                            <span class="text-center badge bg-danger" 
                                style="padding: 7px 9px 7px;
                                       background-color: #06774a;
                                      font-size: 15px;
                                      border-radius: 50px;"
                            >
                              {{$playground->c_b_p_name}}
                            </span>
                          </a>
                        </h3>
                        <p style="color: #06774a;font-size: 13px;">
                            <i class="fa fa-phone"></i>
                            {{ $playground->c_b_p_phone }}
                        </p>
                        <p style="color: #06774a;font-size: 13px;">
                            <i class="fa fa-map-marker"></i>
                            
                        </p>
                        <p style="color: #06774a;font-size: 13px;">
                            <i class="fa fa-phone"></i>
                            {{ $playground->c_b_p_desc }}
                        </p>
                      </div>
                    </div>
                  </div>
                @endforeach

              </div> <!--row-->
            </div>
          </div>
          <div class="modal-footer" style="color: #fff;background-color: #06774a !important;border: 0px">
            <button 
                  type="button"
                  style="background: #fff !important; color: #000 !important;border-color:#ddd;box-shadow: 1px 0px 0px #eee;" 
                  class="btn sm-inputs btn-default" 
                  data-dismiss="modal"
            >
              Close
            </button>
          </div>
          </div>
        </div>

    </div>
    <!------------------------------------>
    <!--  end add new Challenge Modal --><!--------------------------------------->
    {{-- end of model for profile to other users--}}
@endforeach
