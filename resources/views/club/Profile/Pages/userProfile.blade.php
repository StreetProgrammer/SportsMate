@extends('club.index')
@section('content')

<!------ start Profile Content---------->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Club Profile
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Club profile</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="imageInfo col-md-4">
			@include('club.Profile.pageParts.userProfile.userProfileImageDiv')
        </div>

		<div class="mainInfo col-md-8">
			@include('club.Profile.pageParts.userProfile.mainUserProfileInfo')
        </div>

         <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#CreatedEvents" data-toggle="tab">Created Events</a></li>
              <li><a href="#appliedEvents" data-toggle="tab">Applied Events</a></li>
              <li><a href="#candidatedEvents" data-toggle="tab">Candidated Events</a></li>
              <li><a href="#createdChallenges" data-toggle="tab">Created Challenges</a></li>
              <li><a href="#challenged" data-toggle="tab">Challenged</a></li>
            </ul>
            <div class="tab-content">
<!--=============================start CreatedEvents tab=============================-->
            	<div class="active tab-pane" id="CreatedEvents">
            		@if($club->createdEvents->count() > 0)
					<div class="box">
			            <div class="box-header">
			              <h3 class="box-title">Created Events</h3>

			              <div class="box-tools">
			                <div class="input-group input-group-sm" style="width: 150px;">
			                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

			                  <div class="input-group-btn">
			                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
			                  </div>
			                </div>
			              </div>
			            </div>
	            <!-- /.box-header -->
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover">
	                <tbody><tr>
	                  <th>ID</th>
	                  <th>Candidate</th>
	                  <th>Time to Play</th>
	                  <th>from - to</th>
	                  <th>Created Date</th>
	                  <th>Sport</th>
	                  <th>Playground</th>
	                </tr>
	                @foreach( $club->createdEvents as $createdEvent)
	                	<tr>
	        	                  <td>{{ $createdEvent->id }}</td>

	        	                  <td>
	        	                  	 @if ($createdEvent->E_candidate_id == '')
	                            <span style="color:#FF5522;font-weight:bold;">
	                                No Candidate Till Now !!
	                            </span>
	                        @else
	                        <a href="{{aurl()}}/clubs/{{ $createdEvent->candidate->slug }}/details/">
	                            <span style="color:#FF5522;font-weight:bold;">
	                                {{ $createdEvent->candidate->name }}
	                            </span>
	                        </a>

	                         @endif
	        	                  </td>

	        	                  <td>@php  echo date('d-m-Y', strtotime($createdEvent->E_date)) ; @endphp </td>
	        	                  <td>
	        	                  	<span class="label label-success">
	        	                  		{{ $createdEvent->EventFrom->hour_format }}
	        	                  	</span>

	        	                  	<span class="label label-success">
	        	                  		{{ $createdEvent->EventTo->hour_format }}
	        	                  	</span>

	        	                  </td>
	        	                  <td>@php  echo date('d-m-Y', strtotime($createdEvent->created_at)) ; @endphp </td>
	        	                  <td>
	        	                  	{{ $createdEvent->eventSport->sport_name }}
	        	                  </td>
	        	                  <td>
	        	                  	 @if ($createdEvent->E_playground_id == '')
	                            <span style="color:#FF5522;font-weight:bold;">
	                                No Playground Till Now !!
	                            </span>
	                        @else
	                        <a href="profile/{{ $createdEvent->candidate->id }}">
	                            <span style="color:#FF5522;font-weight:bold;">
	                                {{ $createdEvent->eventPlayground->c_b_p_name }}
	                            </span>
	                        </a>

	                         @endif

	        	                  </td>
	        	                </tr>
	                @endforeach


	              </tbody>
	          	</table>
	            </div>
	            <!-- /.box-body -->
          	</div>
            		<!--------- created events ---------------->
            @else
				<div class="text-center">
					<h3> {{ $club->name }} Don't Create any Event Yet </h3>
				</div>
          	@endif
    	</div><!-- /.tab-pane -->
<!--=============================end CreatedEvents tab=============================-->

<!--=============================start createdChallenges tab=============================-->

    	<div class="tab-pane" id="createdChallenges">
    		@if($club->createdChallenges->count() > 0)

			<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Created Challenges</h3>

	              <div class="box-tools">
	                <div class="input-group input-group-sm" style="width: 150px;">
	                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

	                  <div class="input-group-btn">
	                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	                  </div>
	                </div>
	              </div>
            </div>
	            <!-- /.box-header -->
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover">
	                <tbody><tr>
	                  <th>ID</th>
	                  <th>Candidate</th>
	                  <th>Time to Play</th>
	                  <th>from - to</th>
	                  <th>Created Date</th>
	                  <th>Sport</th>
	                  <th>Playground</th>
	                </tr>
	                @foreach( $club->createdChallenges as $createdChallenge)
	                	<tr>
	        	                  <td>{{ $createdChallenge->id }}</td>

	        	                  <td>
	        	                  	 @if ($createdChallenge->C_candidate_id == '')
	                            <span style="color:#FF5522;font-weight:bold;">
	                                No Candidate Till Now !!
	                            </span>
	                        @else
	                        <a href="{{aurl()}}/Player/{{ $createdChallenge->candidate->slug }}/details/">
	                            <span style="color:#FF5522;font-weight:bold;">
	                                {{ $createdChallenge->candidate->name }}
	                            </span>
	                        </a>

	                         @endif
	        	                  </td>

	        	                  <td>@php  echo date('d-m-Y', strtotime($createdChallenge->C_date)) ; @endphp </td>
	        	                  <td>
	        	                  	<span class="label label-success">
	        	                  		{{ $createdChallenge->EventFrom->hour_format }}
	        	                  	</span>

	        	                  	<span class="label label-success">
	        	                  		{{ $createdChallenge->EventTo->hour_format }}
	        	                  	</span>

	        	                  </td>
	        	                  <td>@php  echo date('d-m-Y', strtotime($createdChallenge->created_at)) ; @endphp </td>
	        	                  <td>
	        	                  	{{ $createdChallenge->challengeSport->sport_name }}
	        	                  </td>
	        	                  <td>
	        	                  	 @if ($createdChallenge->C_playground_id == '')
	                            <span style="color:#FF5522;font-weight:bold;">
	                                No Playground Till Now !!
	                            </span>
	                        @else
	                        <a href="profile/{{ $createdChallenge->candidate->id }}">
	                            <span style="color:#FF5522;font-weight:bold;">
	                                {{ $createdChallenge->eventPlayground->c_b_p_name }}
	                            </span>
	                        </a>

	                         @endif

	        	                  </td>
	        	                </tr>
	                @endforeach


	              </tbody>
	          	</table>
	            </div>
	            <!-- /.box-body -->
          	</div>
          	@else
				<div class="text-center">
					<h3> {{ $club->name }} Don't Create any Challenge Yet </h3>
				</div>
          	@endif

<!---========================================================================---->
    	</div>
    	<!--=============================end createdChallenges tab=============================-->

    	<!---========================= start appliedEvents tab =====================================---->
    	<div class="tab-pane" id="appliedEvents">
    		    		@if($club->appliedEvents->count() > 0)

			<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Applied Events</h3>

	              <div class="box-tools">
	                <div class="input-group input-group-sm" style="width: 150px;">
	                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

	                  <div class="input-group-btn">
	                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	                  </div>
	                </div>
	              </div>
            </div>
	            <!-- /.box-header -->
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover">
	                <tbody><tr>
	                  <th>ID</th>
	                  <th>Creator</th>
	                  <th>Time to Play</th>
	                  <th>from - to</th>
	                  <th>Created Date</th>
	                  <th>Sport</th>
	                  <th>Playground</th>
	                </tr>
	                @foreach( $club->appliedEvents as $appliedEvent)
	                	<tr>
	        	                  <td>{{ $appliedEvent->id }}</td>

	        	                  <td>

	                        <a href="{{aurl()}}/Player/{{ $appliedEvent->creator->slug }}/details">
	                            <span style="color:#FF5522;font-weight:bold;">
	                                {{ $appliedEvent->creator->name }}
	                            </span>
	                        </a>


	        	                  </td>

	        	                  <td>@php  echo date('d-m-Y', strtotime($appliedEvent->E_date)) ; @endphp </td>
	        	                  <td>
	        	                  	<span class="label label-success">
	        	                  		{{ $appliedEvent->EventFrom->hour_format }}
	        	                  	</span>

	        	                  	<span class="label label-success">
	        	                  		{{ $appliedEvent->EventTo->hour_format }}
	        	                  	</span>

	        	                  </td>
	        	                  <td>@php  echo date('d-m-Y', strtotime($appliedEvent->created_at)) ; @endphp </td>
	        	                  <td>
	        	                  	{{ $appliedEvent->eventSport->sport_name }}
	        	                  </td>
	        	                  <td>
	        	                  	 @if ($appliedEvent->C_playground_id == '')
	                            <span style="color:#FF5522;font-weight:bold;">
	                                No Playground Till Now !!
	                            </span>
	                        @else
	                        <a href="profile/{{ $appliedEvent->candidate->id }}">
	                            <span style="color:#FF5522;font-weight:bold;">
	                                {{ $appliedEvent->eventPlayground->c_b_p_name }}
	                            </span>
	                        </a>

	                         @endif

	        	                  </td>
	        	                </tr>
	                @endforeach


	              </tbody>
	          	</table>
	            </div>
	            <!-- /.box-body -->
          	</div>
          	@else
				<div class="text-center">
					<h3> {{ $club->name }} Don't Create any Challenge Yet </h3>
				</div>
          	@endif
    	</div>
    	<!---========================= end appliedEvents  =====================================---->
    	<!---========================= start candidatedEvents  =====================================---->
    	<div class="tab-pane" id="candidatedEvents">
    		@if($club->candidatedEvents->count() > 0)

			<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Candidated Events</h3>

	              <div class="box-tools">
	                <div class="input-group input-group-sm" style="width: 150px;">
	                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

	                  <div class="input-group-btn">
	                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	                  </div>
	                </div>
	              </div>
            </div>
	            <!-- /.box-header -->
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover">
	                <tbody><tr>
	                  <th>ID</th>
	                  <th>Creator</th>
	                  <th>Time to Play</th>
	                  <th>from - to</th>
	                  <th>Created Date</th>
	                  <th>Sport</th>
	                  <th>Playground</th>
	                </tr>
	                @foreach( $club->candidatedEvents as $candidatedEvent)
	                	<tr>
	    	                  <td>{{ $candidatedEvent->id }}</td>

	    	                  <td>

			                        <a href="{{aurl()}}/Player/{{ $candidatedEvent->creator->slug }}/details/">
			                            <span style="color:#FF5522;font-weight:bold;">
			                                {{ $candidatedEvent->creator->name }}
			                            </span>
			                        </a>

	    	                  </td>

	    	                  <td>@php  echo date('d-m-Y', strtotime($candidatedEvent->E_date)) ; @endphp </td>
	    	                  <td>
	    	                  	<span class="label label-success">
	    	                  		{{ $candidatedEvent->EventFrom->hour_format }}
	    	                  	</span>

	    	                  	<span class="label label-success">
	    	                  		{{ $candidatedEvent->EventTo->hour_format }}
	    	                  	</span>

	    	                  </td>
	    	                  <td>@php  echo date('d-m-Y', strtotime($candidatedEvent->created_at)) ; @endphp </td>
	    	                  <td>
	    	                  	{{ $candidatedEvent->eventSport->sport_name }}
	    	                  </td>
        	                  <td>
        	                  	 @if ($candidatedEvent->E_playground_id == '')
		                            <span style="color:#FF5522;font-weight:bold;">
		                                No Playground Till Now !!
		                            </span>
		                        @else
		                        <a href="profile/{{ $candidatedEvent->candidate->id }}">
		                            <span style="color:#FF5522;font-weight:bold;">
		                                {{ $candidatedEvent->eventPlayground->c_b_p_name }}
		                            </span>
		                        </a>

		                         @endif

        	                  </td>
        	                </tr>
	                @endforeach


	              </tbody>
	          	</table>
	            </div>
	            <!-- /.box-body -->
          	</div>
          	@else
				<div class="text-center">
					<h3> {{ $club->name }} Don't Create any Challenge Yet </h3>
				</div>
          	@endif
    	</div>
    	<!---========================= end candidatedEvents  =====================================---->
    	<!---========================= start appliedEvents  =====================================---->
    	<div class="tab-pane" id="challenged">
    		@if($club->challengeEvents->count() > 0)

			<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Challenge Events</h3>

	              <div class="box-tools">
	                <div class="input-group input-group-sm" style="width: 150px;">
	                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

	                  <div class="input-group-btn">
	                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	                  </div>
	                </div>
	              </div>
            </div>
	            <!-- /.box-header -->
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover">
	                <tbody><tr>
	                  <th>ID</th>
	                  <th>Creator</th>
	                  <th>Time to Play</th>
	                  <th>from - to</th>
	                  <th>Created Date</th>
	                  <th>Sport</th>
	                  <th>Playground</th>
	                </tr>
	                @foreach( $club->challengeEvents as $challengeEvent)
	                	<tr>
	    	                  <td>{{ $challengeEvent->id }}</td>

	    	                  <td>

			                        <a href="{{aurl()}}/Player/{{ $challengeEvent->creator->slug }}/details/">
			                            <span style="color:#FF5522;font-weight:bold;">
			                                {{ $challengeEvent->creator->name }}
			                            </span>
			                        </a>

	    	                  </td>

	    	                  <td>@php  echo date('d-m-Y', strtotime($challengeEvent->E_date)) ; @endphp </td>
	    	                  <td>
	    	                  	<span class="label label-success">
	    	                  		{{ $challengeEvent->EventFrom->hour_format }}
	    	                  	</span>

	    	                  	<span class="label label-success">
	    	                  		{{ $challengeEvent->EventTo->hour_format }}
	    	                  	</span>

	    	                  </td>
	    	                  <td>@php  echo date('d-m-Y', strtotime($challengeEvent->created_at)) ; @endphp </td>
	    	                  <td>
	    	                  	{{ $challengeEvent->challengeSport->sport_name }}
	    	                  </td>
        	                  <td>
        	                  	 @if ($challengeEvent->E_playground_id == '')
		                            <span style="color:#FF5522;font-weight:bold;">
		                                No Playground Till Now !!
		                            </span>
		                        @else
		                        <a href="profile/{{ $challengeEvent->candidate->id }}">
		                            <span style="color:#FF5522;font-weight:bold;">
		                                {{ $challengeEvent->eventPlayground->c_b_p_name }}
		                            </span>
		                        </a>

		                         @endif

        	                  </td>
        	                </tr>
	                @endforeach


	              </tbody>
	          	</table>
	            </div>
	            <!-- /.box-body -->
          	</div>
          	@else
				<div class="text-center">
					<h3> {{ $club->name }} No One Challenge {{ $club->name }} Till now</h3>
				</div>
          	@endif
    	</div>
    	<!---========================= end appliedEvents  =====================================---->

    	<!---========================= end tabs =====================================---->

          </div>

        </div>
        <!--/.col -->
      </div>
      <!-- /.row -->

    </section>

  <!------ End Profile Content ------------->
<!--  start upload profile image Model -->
<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Upload & Crop Image</h4>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo" style="<!-- width:350px; --> margin-top:30px"></div>
  					</div>
  					<div class="col-md-12 text-center" style="padding-top:30px;">
						<button class="btn btn-success crop_image">Crop & Upload</button>
					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
    </div>
</div>

<!--  end upload profile image Model -->
@endsection
