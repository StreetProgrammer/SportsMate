<!-- start Result view -->

<!--------------------------------------------- Start of Rate Player Section ---------------------------->
        <!-- Modal -->
        <div id="RatePlayer" class="modal fade " role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center uk-block-primary" style="background: #dddddd4f;">
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>

                    <p style="font-size: 15px;font-weight: bold;color: #FF5522;margin-bottom: 1px;margin-top: 1px;">
                        Player Rate and Feedback
                        <span style="font-size: 20px;color: #d50000;">
                            <i class="fa fa-thumbs-down fa-flip-horizontal"  aria-hidden="true"></i>
                        </span>
                        <span style="font-size: 20px;color: #00c853;">
                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                        </span>
                    </p>
                </div>
                <div class="modal-body text-center" style="padding:20px ; background:#fff; color:#FF5522;">
                        <p id="PlayerRateLoading" style="display:none;color:#f52;"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></p>
                        <form method="POST" action="{{url('try')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="Event" value="{{$Event->id}}">
                            @if (Auth::id() == $Event->E_creator_id && $Event->E_creator_id != null)
                                <input type="hidden" name="rated_user_id" value="{{$Event->E_candidate_id}}">
                            @elseif (Auth::id() == $Event->E_candidate_id && $Event->E_creator_id != null)
                                <input type="hidden" name="rated_user_id" value="{{$Event->E_creator_id}}">
                            @endif
                            <div id="rate-body">

                                <div class="row">
                                    <div class="col-xs-4 " style="padding:10px ;"><label><small>Rate Question 1 </small></label></div>
                                    <div id='var-1' class="col-xs-4 rating" >
                                        <input class="stars" type="radio" id="1-star5" name="Q_1" value="5" />
                                        <label class = "full" for="1-star5" title="Awesome - 5 stars"></label>
                                        <input class="stars" type="radio" id="1-star4" name="Q_1" value="4" />
                                        <label class = "full" for="1-star4" title="Pretty good - 4 stars"></label>
                                        <input class="stars" type="radio" id="1-star3" name="Q_1" value="3" />
                                        <label class = "full" for="1-star3" title="Meh - 3 stars"></label>
                                        <input class="stars" type="radio" id="1-star2" name="Q_1" value="2" />
                                        <label class = "full" for="1-star2" title="Kinda bad - 2 stars"></label>
                                        <input class="stars" type="radio" id="1-star1" name="Q_1" value="1" />
                                        <label class = "full" for="1-star1" title="Sucks big time - 1 star"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 " style="padding:10px ;"><label><small>Rate Question 2 </small></label></div>
                                    <div id='var-2' class="col-xs-4 rating" >
                                        <input class="stars" type="radio" id="2-star5" name="Q_2" value="5" />
                                        <label class = "full" for="2-star5" title="Awesome - 5 stars"></label>
                                        <input class="stars" type="radio" id="2-star4" name="Q_2" value="4" />
                                        <label class = "full" for="2-star4" title="Pretty good - 4 stars"></label>
                                        <input class="stars" type="radio" id="2-star3" name="Q_2" value="3" />
                                        <label class = "full" for="2-star3" title="Meh - 3 stars"></label>
                                        <input class="stars" type="radio" id="2-star2" name="Q_2" value="2" />
                                        <label class = "full" for="2-star2" title="Kinda bad - 2 stars"></label>
                                        <input class="stars" type="radio" id="2-star1" name="Q_2" value="1" />
                                        <label class = "full" for="2-star1" title="Sucks big time - 1 star"></label>
                                    </div>
                                </div>
                                <!--<hr style="margin: 5px auto;">-->
                                <div class="row">
                                    <div class="col-xs-4 " style="padding:10px ;"><label><small>Rate Question 3 </small></label></div>
                                    <div id='var-3' class="col-xs-4 rating" >
                                        <input class="stars" type="radio" id="3-star5" name="Q_3" value="5" />
                                        <label class = "full" for="3-star5" title="Awesome - 5 stars"></label>
                                        <input class="stars" type="radio" id="3-star4" name="Q_3" value="4" />
                                        <label class = "full" for="3-star4" title="Pretty good - 4 stars"></label>
                                        <input class="stars" type="radio" id="3-star3" name="Q_3" value="3" />
                                        <label class = "full" for="3-star3" title="Meh - 3 stars"></label>
                                        <input class="stars" type="radio" id="3-star2" name="Q_3" value="2" />
                                        <label class = "full" for="3-star2" title="Kinda bad - 2 stars"></label>
                                        <input class="stars" type="radio" id="3-star1" name="Q_3" value="1" />
                                        <label class = "full" for="3-star1" title="Sucks big time - 1 star"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 " style="padding:10px ;"><label><small>Rate Question 4</small></label></div>
                                    <div id='var-4' class="col-xs-4 rating" >
                                        <input class="stars" type="radio" id="4-star5" name="Q_4" value="5" />
                                        <label class = "full" for="4-star5" title="Awesome - 5 stars"></label>
                                        <input class="stars" type="radio" id="4-star4" name="Q_4" value="4" />
                                        <label class = "full" for="4-star4" title="Pretty good - 4 stars"></label>
                                        <input class="stars" type="radio" id="4-star3" name="Q_4" value="3" />
                                        <label class = "full" for="4-star3" title="Meh - 3 stars"></label>
                                        <input class="stars" type="radio" id="4-star2" name="Q_4" value="2" />
                                        <label class = "full" for="4-star2" title="Kinda bad - 2 stars"></label>
                                        <input class="stars" type="radio" id="4-star1" name="Q_4" value="1" />
                                        <label class = "full" for="4-star1" title="Sucks big time - 1 star"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 " style="padding:10px ;"><label><small>Rate Question 5</small></label></div>
                                    <div id='var-5' class="col-xs-4 rating" >
                                        <input class="stars" type="radio" id="5-star5" name="Q_5" value="5" />
                                        <label class = "full" for="5-star5" title="Awesome - 5 stars"></label>
                                        <input class="stars" type="radio" id="5-star4" name="Q_5" value="4" />
                                        <label class = "full" for="5-star4" title="Pretty good - 4 stars"></label>
                                        <input class="stars" type="radio" id="5-star3" name="Q_5" value="3" />
                                        <label class = "full" for="5-star3" title="Meh - 3 stars"></label>
                                        <input class="stars" type="radio" id="5-star2" name="Q_5" value="2" />
                                        <label class = "full" for="5-star2" title="Kinda bad - 2 stars"></label>
                                        <input class="stars" type="radio" id="5-star1" name="Q_5" value="1" />
                                        <label class = "full" for="5-star1" title="Sucks big time - 1 star"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 " style="padding:10px ;"><label><small>Rate Comment</small></label></div>
                                    <div id='var-5' class="col-xs-4 rating" >
                                        <textarea name="PlayerComment" rows="3" cols="25" style="border:0px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        <input type="submit" name="submit" value="Save" class="btn btn-primary btn-xs" id="RatePlayerBtn">
                        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"> Close</button>

                        </form>
                    </div>

                </div>

            </div>
        </div>
        <!--------------------------------------------- Start of Rate Playground Section ---------------------------->
                <!-- Modal -->
                <div id="RatePlayground" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Playground Rate and Feedback</h4>
                      </div>
                      <div class="modal-body">
                        <p>Some text in the modal.</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>
<!--------------------------------------------- End of Rate Section ---------------------------->

@if ($Event->E_candidate_id != '')
    <!--------------------------------------------- Suggest Result Section ---------------------------->
            <!-- Modal -->
            <div id="SuggestResult" class="modal fade " role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header text-center uk-block-primary" style="background: #dddddd4f;">
                        <button type="button" class="close" data-dismiss="modal" >&times;</button>

                        <p style="font-size: 15px;font-weight: bold;color: #FF5522;margin-bottom: 1px;margin-top: 1px;">
                            <span style="font-size: 20px;color: #00c853;">
                                <i class="fa fa-trophy fa-pulse" aria-hidden="true"></i>
                            </span>
                            <span style="font-size: 20px;color: #00c853;">
                                <i class="fa fa-trophy fa-pulse" aria-hidden="true"></i>
                            </span>
                            <span style="font-size: 20px;color: #00c853;">
                                <i class="fa fa-trophy fa-pulse" aria-hidden="true"></i>
                            </span>
                            Who is The WINER !!
                            <span style="font-size: 20px;color: #00c853;">
                                <i class="fa fa-trophy fa-pulse" aria-hidden="true"></i>
                            </span>
                            <span style="font-size: 20px;color: #00c853;">
                                <i class="fa fa-trophy fa-pulse" aria-hidden="true"></i>
                            </span>
                            <span style="font-size: 20px;color: #00c853;">
                                <i class="fa fa-trophy fa-pulse" aria-hidden="true"></i>
                            </span>
                        </p>
                    </div>
                    <div class="modal-body text-center" style="padding:20px ; background:#fff; color:#FF5522;">
                            <p id="PlayerRateLoading" style="display:none;color:#f52;"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></p>
                            <form method="POST" action="{{url('/Event')}}/{{$Event->id}}/SuggestResult">
                                {{ csrf_field() }}
                                <input type="hidden" name="Event" value="{{$Event->id}}">
                                <input type="hidden" name="OpinionBy" value="{{ Auth::id() }}">
                                <div id="rate-body">
                                    <div class="row">
                                        <div class="col-md-offset-2 col-md-8">

                                            <div class="panel panel-default">
                                        		<div class='panel panel-heading text-center'>
                                                    Suggest Result For You And
                                                    <span style="color:#FF5522;font-style:italic;">
                                                        @if (Auth::id() == $Event->candidate->id && $Event->E_creator_id != null)
                                                            <a href="/profile/{{ $Event->creator->slug }}">
                                                                {{ $Event->creator->name }}
                                                            </a>
                                                        @elseif (Auth::id() == $Event->creator->id && $Event->E_creator_id != null)
                                                            <a href="/profile/{{ $Event->creator->slug }}">
                                                                {{ $Event->candidate->name }}
                                                            </a>
                                                        @endif

                                                    </span>
                                                    Event
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

                                                                 <li class="list-group-item text-center">
                                                                     <input type="number" name="CreatorScore" value="0" style="width: 25%;border: 0px;">
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
                                                                <li class="list-group-item text-center">
                                                                    <input type="number" name="CandidateScore" value="0" style="width: 25%;border: 0px;">
                                                                </li>

                                                          </ul>
                                                      </div>
                                            	</div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            <input type="submit" name="submit" value="Save" class="btn btn-primary btn-xs" id="RatePlayerBtn">
                            <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"> Close</button>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
    <!--------------------------------------------- End of Suggest Result Section ---------------------------->



            <!--------------------------------------------- start of Accept or Refuse Result Section ---------------------------->
            <!-- Modal -->


            <!--------------------------------------------- End of Accept or Refuse Result Section ---------------------------->


@endif




<!--end result content -->
