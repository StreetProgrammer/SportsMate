<!-- start Result view -->
<div class="col-md-offset-2 col-md-8">

    <div class="panel panel-default">
        <div class='panel panel-heading text-center'>
            <span style="color:#FF5522;font-style:italic;">

                <a href="/profile/{{ $Event->creator->slug }}">
                    {{ $Event->creator->name }}
                </a>
                <a href="/Sport/{{ $Event->eventSport->id }}">
                    {{ $Event->eventSport->sport_name }}
                </a>

            </span> Event Results
        </div>
        <div class='panel-body'>
                <div class='col-sm-6 text-center'>
                    <ul class="list-group">
                         <li class="list-group-item">
                             <img class='team-icon' src='http://fakeimg.pl/100x100/?text=Player 1&font=lobster' width='64' height='64'>
                             <p style="font-style: italic;font-weight: bold;color: #f52;">
                                 {{ $Event->creator->name }}
                             </p>
                         </li>


                             {{--@if ($Event->EventResult != 0)--}}
                                 {{--@foreach ($Event->EventResult as $Event->EventResult)--}}
                                     @if ($Event->EventResult != null && $Event->EventResult->E_R_IsFinalResult == 2)
                            <li class="list-group-item">
                                         <p style="font-style: italic;font-weight: bold;color: #f52;font-size: 150%;">
                                             {{$Event->EventResult->E_R_CreatorScore}}
                                             @if ($Event->E_winer_id == $Event->E_creator_id)
                                                 <span style="font-size: 20px; color: rgb(0, 200, 83);">
                                                     <i aria-hidden="true" class="fa fa-trophy "></i>
                                                 </span>
                                             @endif
                                         </p>
                            </li>

                                 {{--@endforeach--}}
                             @else
                             <li class="list-group-item">
                                 No Result Till Now
                             </li>
                             @endif

                         <li class="list-group-item">
                             @php
                             $Rate = \App\Rate::where('giver_user_id', $Event->candidate->id)
                                         ->where('rated_user_id', $Event->creator->id)
                                         ->where('Event_id', $Event->id)
                                         ->where('Sport_id', $Event->E_sport_id)
                                         ->first();
                            if ($Rate != null) {
                                for ($i=1; $i <=5 ; $i++) {
                                    if ($Rate->Q_T >= $i) {
                                        echo '<i class="fa fa-star fa-2x" aria-hidden="true" style="color:#FFD700;"></i>';
                                    }else {
                                        echo '<i class="fa fa-star fa-2x" aria-hidden="true" style="color:#ddd;"></i>';
                                    }

                                }
                            }else {
                                echo '<p style="font-style: italic;font-weight: bold;color: #f52;">Not Rated Till Now</p>';
                            }

                             @endphp
                         </li>
                     </ul>
                </div>
              <div class='col-sm-6 text-center'>
                  <ul class="list-group">
                        <li class="list-group-item">
                            <img class='team-icon' src='http://fakeimg.pl/100x100/?text=Player 2&font=lobster' width='64' height='64'>
                            <p style="font-style: italic;font-weight: bold;color: #f52;">
                                {{ $Event->candidate->name }}
                            </p>
                        </li>

                            {{--@if ($Event->EventResult != 0)--}}
                                {{--@foreach ($Event->EventResult as $Event->EventResult)--}}
                                    @if ($Event->EventResult != null && $Event->EventResult->E_R_IsFinalResult == 2)
                         <li class="list-group-item">
                                        <p style="font-style: italic;font-weight: bold;color: #f52;font-size: 150%;">
                                            {{$Event->EventResult->E_R_CandidateScore}}
                                            @if ($Event->E_winer_id == $Event->E_candidate_id)
                                                <span style="font-size: 20px; color: rgb(0, 200, 83);">
                                                    <i aria-hidden="true" class="fa fa-trophy "></i>
                                                </span>
                                            @endif
                                        </p>
                            </li>

                                {{--@endforeach--}}
                            @else
                            <li class="list-group-item">
                                No Result Till Now
                            </li>
                            @endif

                        <li class="list-group-item">
                            @php
                            $Rate = \App\Rate::where('giver_user_id', $Event->creator->id)
                                        ->where('rated_user_id', $Event->candidate->id)
                                        ->where('Event_id', $Event->id)
                                        ->where('Sport_id', $Event->E_sport_id)
                                        ->first();
                           if ($Rate != null) {
                               for ($i=1; $i <=5 ; $i++) {
                                   if ($Rate->Q_T >= $i) {
                                       echo '<i class="fa fa-star fa-2x" aria-hidden="true" style="color:#FFD700;"></i>';
                                   }else {
                                       echo '<i class="fa fa-star fa-2x" aria-hidden="true" style="color:#ddd;"></i>';
                                   }

                               }
                           }else {
                               echo '<p style="font-style: italic;font-weight: bold;color: #f52;">Not Rated Till Now</p>';
                           }

                            @endphp
                        </li>
                  </ul>
              </div>
        </div>
    </div>

</div>
<!--end result content -->
