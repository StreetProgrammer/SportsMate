<div class="panel panel-default shade">
    {{--@foreach ($club->clubPlaygrounds as $playground)
          @if ($playground->Photos->count() > 0)
            @foreach ($playground->Photos as $photo)
              <div class="item ">
                {{$photo->path}} <br>                    
              </div>
            @endforeach
          @else
              no photos for {{$playground->c_b_p_name}} ===> {{$playground->id}}
          @endif
        @endforeach--}}
    <!----Slider------>
    @php
      $photos = array();
      foreach ($club->clubPlaygrounds as $playground){
        if ($playground->Photos->count() > 0){
          foreach ($playground->Photos as $photo){
            $photos[$photo->id] = ['path' => $photo->path, 'playground' => $photo->owner_id];
          }
        }
      }

      //print_r($photos) ;
    @endphp
    
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <!-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
        <li data-target="#myCarousel" data-slide-to="6"></li> -->
      </ol>

      <!-- Wrapper for slides -->

      <div class="carousel-inner" >
        
            @foreach ($photos as $img)
              <div class="item {{ $loop->first ? ' active' : '' }}" >
                <img src="{{ Storage::url( $img['path'] ) }}" style="height:300px">                    
              </div>
            @endforeach


        {{--<div class="item active">
              <img src="{{url('/')}}/player/img/en_background_golf.png">                    
            </div>                 
    
            <div class="item">
              <img src="{{url('/')}}/player/img/EN_Backgrund_billiards.png">                    
            </div>
    
            <div class="item">
              <img src="{{url('/')}}/player/img/en_background_bowling.png">                    
            </div>
            
            <div class="item">
              <img src="{{url('/')}}/player/img/en_background_tennis.png">                    
            </div>
    
            <div class="item">
              <img src="{{url('/')}}/player/img/Basket_ball_English.png">                    
            </div>--}}

      </div>                
    </div>
    <!--end Slider------> 
</div>