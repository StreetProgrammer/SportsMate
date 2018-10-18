@extends('admin.index')
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
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ url('/') }}/design/AdminLTE/dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $User->name }}</h3>

              <p class="text-muted text-center">User - Club</p>
              <p class="text-muted text-center">
	              Member since  @php  echo date('d-m-Y', strtotime($User->created_at)) ; @endphp
	          </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Branches</b> <a class="pull-right">{{ $User->clubBranches()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Playgrounds</b> <a class="pull-right">{{ $User->clubPlaygrounds()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Reservations</b> <a class="pull-right">{{ $User->clubReservation()->count() }}</a>
                </li>
              </ul>

                    {!! Form::open(['url' => aurl('Club/changeActivationStatus/'), 'method' => 'POST']) !!}
                    {!! Form::hidden( 'target', $User->id ) !!}
                    @if($User->our_is_active == 1)
                        {!! Form::hidden( 'status', 0 ) !!}
                        {!! Form::submit('Deactivate', ['class' => 'btn btn-danger btn-block']) !!}
                    @elseif ($User->our_is_active == 0)
                        {!! Form::hidden( 'status', 1 ) !!}
                        {!! Form::submit('Activate', ['class' => 'btn btn-success btn-block']) !!}
                    @elseif ($User->our_is_active == 2)
                    	<div class="text-center">
                    		{!! Form::hidden( 'status', 1 ) !!}
	                        {!! Form::submit('Accept', ['class' => 'btn btn-success']) !!}
	                        <span class="btn btn-danger" 
	                        		data-toggle="modal" 
	                        		data-target="#RejectMessage"
	                        >
	                    		Reject
	                    	</span>
                    	</div>
                    @elseif ($User->our_is_active == 3)
                    	<div class="text-center">
	                    	<span class="badge" style="padding: 10px 10px;font-size: 13px;">
	                    		<i class="fa fa-warning margin-r-5" ></i>
	                    		rejected Account
	                    	</span> 
	                    	<span class="btn btn-danger" 
		                        		data-toggle="modal" 
		                        		data-target="#DeleteRejectedAccountModal"
		                        >
		                    		Delete
		                    </span>
		                </div>
                    @endif

                    {!! Form::close() !!}

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>

		 <div class="col-md-8">
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About {{$User->name}} Club</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-phone custom"></i></i>  Phone</strong>

              <p class="text-muted">
              {{ $User->clubProfile->c_phone }}
              </p>

              <hr>

              <strong><i class="fa fa-venus-mars custom"></i></i>  Preferred Gender</strong>

              <p class="text-muted">
              
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-soccer-ball-o margin-r-5"></i> Sports</strong>

              <p>
              	@foreach ($User->sports as $sport)

			           <span class="label @php echo randomClasses() ;  @endphp">{{$sport->sport_name}}</span>
			     @endforeach

              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Description</strong>

              <p>{{ $User->clubProfile->c_desc }}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
            		@if($User->createdEvents->count() > 0)
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
	                @foreach( $User->createdEvents as $createdEvent)
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
					<h3> {{ $User->name }} Don't Create any Event Yet </h3>
				</div>
          	@endif
    	</div><!-- /.tab-pane -->
<!--=============================end CreatedEvents tab=============================-->

<!--=============================start createdChallenges tab=============================-->

    	<div class="tab-pane" id="createdChallenges">
    		@if($User->createdChallenges->count() > 0)

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
	                @foreach( $User->createdChallenges as $createdChallenge)
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
					<h3> {{ $User->name }} Don't Create any Challenge Yet </h3>
				</div>
          	@endif

<!---========================================================================---->
    	</div>
    	<!--=============================end createdChallenges tab=============================-->

    	<!---========================= start appliedEvents tab =====================================---->
    	<div class="tab-pane" id="appliedEvents">
    		    		@if($User->appliedEvents->count() > 0)

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
	                @foreach( $User->appliedEvents as $appliedEvent)
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
					<h3> {{ $User->name }} Don't Create any Challenge Yet </h3>
				</div>
          	@endif
    	</div>
    	<!---========================= end appliedEvents  =====================================---->
    	<!---========================= start candidatedEvents  =====================================---->
    	<div class="tab-pane" id="candidatedEvents">
    		@if($User->candidatedEvents->count() > 0)

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
	                @foreach( $User->candidatedEvents as $candidatedEvent)
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
					<h3> {{ $User->name }} Don't Create any Challenge Yet </h3>
				</div>
          	@endif
    	</div>
    	<!---========================= end candidatedEvents  =====================================---->
    	<!---========================= start appliedEvents  =====================================---->
    	<div class="tab-pane" id="challenged">
    		@if($User->challengeEvents->count() > 0)

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
	                @foreach( $User->challengeEvents as $challengeEvent)
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
					<h3> {{ $User->name }} No One Challenge {{ $User->name }} Till now</h3>
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

  <!-- start Reject club Modal -->
	<div id="RejectMessage" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header" style="background: #d9534f;color: #fff;">
	        <button type="button" class="close" data-dismiss="modal" style="color: #fff;">&times;</button>
	        <h4 class="modal-title">reject reason</h4>
	      </div>
	      <div class="modal-body">
	        <p>please write the reason of reject the club account in details </p>
	        {!! Form::open(['url' => aurl('Club/changeActivationStatus/'), 'method' => 'POST']) !!}
            {!! Form::hidden( 'target', $User->id ) !!}
            {!! Form::textarea('rejectReason',null,['class'=>'form-control', 'rows' => 4, 'cols' => 40]) !!}
	      </div>
	      <div class="modal-footer">
	      	{!! Form::hidden( 'status', 3 ) !!}
	        {!! Form::submit('Send', ['class' => 'btn btn-danger']) !!}
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        {!! Form::close() !!}
	      </div>
	    </div>

	  </div>
	</div>
 <!-- end Reject club Modal -->
 <!-- start Delete Rejected club Modal -->
	<div id="DeleteRejectedAccountModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header" style="background: #d9534f;color: #fff;">
	        <button type="button" class="close" data-dismiss="modal" style="color: #fff;">&times;</button>
	        <h4 class="modal-title">reject reason</h4>
	      </div>
	      <div class="modal-body">
	        <p>please write the reason of reject the club account in details </p>
	        {!! Form::open(['url' => aurl('Club/changeActivationStatus/'), 'method' => 'POST']) !!}
            {!! Form::hidden( 'target', $User->id ) !!}
	      </div>
	      <div class="modal-footer">
	      	{!! Form::hidden( 'status', 3 ) !!}
	        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        {!! Form::close() !!}
	      </div>
	    </div>

	  </div>
	</div>
 <!-- end Delete Rejected club Modal -->
@endsection
