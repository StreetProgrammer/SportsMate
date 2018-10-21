@foreach ($club->clubBranches as $branch)
  <div class="col-xs-12 col-sm-12 col-md-6">
    <div class="offer offer-default ">
      <div class="shape">
        <div class="shape-text">
                       
        </div>
      </div>
      <div class="offer-content">
        <h3 class="lead" style="font-size:16px;font-weight:bold;">
          {{$branch->c_b_name}}
          <a  
             class="a-holding-divs"
             @if ($branch->branchPlaygrounds->count() > 0)
              	data-toggle="modal" 
             	data-target="#{{$branch->id}}"
             @endif 
             
        >
            <span class="text-center badge bg-danger" 
                style="padding: 7px 9px 7px;
                       background-color: #06774a;
                      font-size: 15px;
                      border-radius: 50px;"
            >
              {{ $branch->branchPlaygrounds->count() }} {{ trans('player.Playgrounds') }}
            </span>
          </a>
        </h3>
        <p style="color: #06774a;font-size: 13px;">
            <i class="fa fa-phone"></i>
            {{ $branch->c_b_phone }}
        </p>
        <p style="color: #06774a;font-size: 13px;">
            <i class="fa fa-map-marker"></i>
            {{ $branch->c_b_City->g_en_name }} {{ $branch->c_b_Area->a_en_name }}, {{ $branch->c_b_address }}
        </p>
        <p style="color: #06774a;font-size: 13px;">
            <i class="fa fa-phone"></i>
            {{ $branch->c_b_desc }}
        </p>
      </div>
    </div>
  </div>
@endforeach