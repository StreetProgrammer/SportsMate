<div class="panel panel-default shade">
  <div class="scroll" style="background-color: #fff; height: 658px;overflow-y: scroll;margin-bottom: 20px">
  @if ($playgrounds->count() > 0)
      @foreach ($playgrounds as $playground)
        <div class="col-sm-4 col-xs-6 text-center">
          <a class="a-holding-divs" href="{{ url('/') }}/Playground/{{sm_crypt($playground->id)}}">
            <div class="club" style="border: 1px solid #ffa500;margin: 5px 0px;padding-bottom: 0px;">
              <div style="width: 100%;overflow: hidden;height: auto;">
                <img 
                  @if ($playground->Photos->count() > 0)
                      @foreach ($playground->Photos as $photo)
                        src="{{ Storage::url( $loop->first ? $photo->path : '' ) }}"
                      @endforeach
                  @else
                      src="{{ url('/') }}/player/img/football-playground.jpg"
                  @endif
                  style="width: 100%;height: 125px;">
              </div>
              <div style="margin-bottom: 10px">
                <h3 style="font-family: sans-serif;">{{$playground->c_b_p_name}}</h3>
                <p style="font-family: 'Roboto', sans-serif;font-size: 12px;">
                  <span>Intermediate</span> / 
                  <span>19 Matches</span>
                </p>
              </div>
              
              <br>
            </div>
          </a>
        </div>
      @endforeach
  @else
     no record match your search 
  @endif
    
  </div>
</div>