@php
  //$features = array( => );
  $attributes = $playground->toArray();
  $features = [];

  foreach ($attributes as $attrkey => $attrvalue) {
    if (strpos($attrkey, 'feature') !== false) {
          //echo $attrkey. ' <=> ' .$attrvalue . '<br>';
          $features[$attrkey] = $attrvalue ;
    } else {
      # code...
    }
    
  }
  
  //print_r($attributes);
@endphp
<div class="col-md-12">
  <h4>{{ trans('player.features') }}</h4>
  <hr style="margin:5px 0px;border-top: 2px solid #06774a;">
</div>

@foreach ($features as $key => $value)
  @if ($value == 1)
    <div class="col-xs-12 col-sm-12 col-md-4">
      <div class="offer offer-default ">
        <div class="shape">
          <div class="shape-text">
           <span>
             <!--<i class="fa fa-certificate" aria-hidden="true"></i>-->
             <i class="fa fa-check-circle fa-rotate-60" aria-hidden="true"></i>
             <!--<i class="fa fa-check-circle-o" aria-hidden="true"></i>-->
           </span>        
          </div>
        </div>
        <div class="offer-content">
          <h3 class="lead" style="font-size:16px;font-weight:bold;"> 
            <span class="text-center badge bg-danger" 
                style="padding: 7px 9px 7px;
                       background-color: #06774a;
                      font-size: 15px;
                      border-radius: 50px;"
            >
              {{ trans("player.$key") }}
            </span>
          </h3>
          {{--<p class="text-center" style="color: #06774a;font-size: 13px;">
                                  <i class="fa fa-phone"></i>
                                  {{ $value }}
                              </p>--}}
          
        </div>
      </div>
    </div>
  @endif
  
@endforeach