@extends('admin.index')
@section('content')

<!------ start Profile Content---------->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
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

              <p class="text-muted text-center">User - Player</p>
              <p class="text-muted text-center">
	              Member since  @php  echo date('d-m-Y', strtotime($User->created_at)) ; @endphp
	          </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Sports</b> <a class="pull-right">{{ $User->sports()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Created Events</b> <a class="pull-right">{{ $User->createdEvents()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Created Challenges</b> <a class="pull-right">{{ $User->createdChallenges()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Applied Events</b> <a class="pull-right">{{ $User->appliedEvents()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Candidated Events</b> <a class="pull-right">{{ $User->candidatedEvents()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>challenged</b> <a class="pull-right">{{ $User->challengeEvents()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Candidated Events</b> <a class="pull-right">{{ $User->candidatedEvents()->count() }}</a>
                </li>
              </ul>

                    {!! Form::open(['url' => aurl('Player/changeActivationStatus/'), 'method' => 'POST']) !!}
                    {!! Form::hidden( 'target', $User->id ) !!}
                    @if($User->our_is_active == 1)
                        {!! Form::hidden( 'status', 0 ) !!}
                        {!! Form::submit('Deactivate', ['class' => 'btn btn-danger btn-block']) !!}
                    @elseif ($User->our_is_active == 0)
                        {!! Form::hidden( 'status', 1 ) !!}
                        {!! Form::submit('Activate', ['class' => 'btn btn-success btn-block']) !!}
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
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-venus-mars custom"></i></i>  Gender</strong>

              <p class="text-muted">
               @if($User->playerprofile->p_gender == 1)
               		Male
               @elseif($User->playerprofile->p_gender == 2)
               		Female
               @else
               		Not Determind
               @endif
              </p>

              <hr>

              <strong><i class="fa fa-venus-mars custom"></i></i>  Preferred Gender</strong>

              <p class="text-muted">
               @if($User->playerprofile->p_preferred_gender == 1)
               		Male
               @elseif($User->playerprofile->p_preferred_gender == 2)
               		Female
               @else
               		Not Determind
               @endif
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

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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
	                        <a href="{{aurl()}}/Player/{{ $createdEvent->candidate->slug }}/details/">
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

@endsection
