@extends('admin.index')
@section('content')

<!------ start Profile Content---------->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
            	<div style="background-image: radial-gradient(circle, #eef2f8, #b2cdff, #7ca6ff, #4c7dff, #294efb);">
	              <img class="profile-user-img img-responsive" style="height: 100px" src="{{ Storage::url($sport->sport_img) }}" alt="User profile picture">

	              <h3 class="profile-username text-center">{{ $sport->en_sport_name }}</h3>
	              <h3 class="profile-username text-center">{{ $sport->ar_sport_name }}</h3>

	              <!-- <p class="text-muted text-center">User - Player</p> -->
	              <p class="text-muted text-center">
		              Added since  @php  echo date('d-m-Y', strtotime($sport->created_at)) ; @endphp
		          </p>
				</div>
              <ul class="list-group list-group-unbordered">
              	<li class="list-group-item">
                  <b>Last Update</b> <a class="pull-right">{{ $sport->updated_at }}</a>
                </li>
                <li class="list-group-item">
                  <b>Lovers</b> <a class="pull-right">{{ $sport->users()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Playgrounds</b> <a class="pull-right">{{ $sport->playgrounds()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Events</b> <a class="pull-right">{{ $sport->sportEvents()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Challenges</b> <a class="pull-right">{{ $sport->sportChallenges()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>SubEvents</b> <a class="pull-right">{{ $sport->sportSubEvents()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Rates</b> <a class="pull-right">{{ $sport->SportRate()->count() }}</a>
                </li>
                <li class="list-group-item" style="border-bottom: 1px solid #fff;">
                  <b>Sport Description</b> <a class="pull-right">{{ $sport->sport_desc}}</a>
                </li>
                <!--<li class="list-group-item">
                  <b>Candidated Events</b> <a class="pull-right">{{-- $sport->candidatedEvents()->count() --}}</a>
                </li> -->
              </ul>
              <br>
					<a href="{{ aurl('sports/' . $sport->id . '/edit') }}" class="btn btn-success ">
						Edit
						<i class="fa fa-edit"></i>
					</a>        
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


		 

         <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#SportLovers" data-toggle="tab">Sport Lovers</a></li>
              <li class=""><a href="#SportPlaygrounds" data-toggle="tab">Sport Playgrounds</a></li>
              <li><a href="#SportEvents" data-toggle="tab">Sport Events</a></li>
              <li><a href="#sportChallenges" data-toggle="tab">Sport Challenge</a></li>
              <!-- <li><a href="#candidatedEvents" data-toggle="tab">Candidated Events</a></li>
              <li><a href="#createdChallenges" data-toggle="tab">Created Challenges</a></li>
              <li><a href="#challenged" data-toggle="tab">Challenged</a></li> -->
            </ul>
            <div class="tab-content">
<!--=============================start Sport Lovers tab=============================-->
            	<div class="active tab-pane" id="SportLovers">
            		@if($sport->users->count() > 0)
					<div class="box">
			            <div class="box-header">
			              <h3 class="box-title">Sport Lovers</h3>

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
	            <div class="box-body table-responsive no-padding ">
	              <table class="table table-hover text-center">
	                <tbody><tr>
	                  <th>ID</th>
	                  <th>Photo</th>
	                  <th>Name</th>
	                  <th>E-mail</th>
	                  <th>Phone</th>
	                  <th>Gender</th>
	                  <th>Member Since</th>
	                </tr>
	                @foreach( $sport->users as $user)
	                	<tr>
	        	            <td>{{ $user->id }}</td>
	        	            <td>
	        	            	
	        	            </td>
							<td>
								<a href="{{aurl()}}/players/{{ $user->id }}/">
		                            <span style="">
		                                {{ $user->name }}
		                            </span>
			                    </a></td>
	        	            <td>
	        	                {{ $user->email }}
	        	            </td>

    	                  	<td>
	    	                  	{{ $user->playerProfile->p_phone }}
    	                  	</td>
	        	            <td>
	        	                @if ($user->playerProfile->p_gender == 1)
		                            Male
		                        @elseif ($user->playerProfile->p_gender == 2)
			                        Female
			                    @endif

	        	            </td>
	        	            <td>@php  echo date('d-m-Y', strtotime($user->created_at)) ; @endphp </td>
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
					<h3> {{ $sport->name }} Don't Create any Event Yet </h3>
				</div>
          	@endif
    	</div><!-- /.tab-pane -->
<!--=============================end Sport Lovers tab=============================-->
<!--=============================start Sport Playgrounds tab=============================-->
            	<div class=" tab-pane" id="SportPlaygrounds">
            		@if($sport->playgrounds->count() > 0)
					<div class="box">
			            <div class="box-header">
			              <h3 class="box-title">Sport Lovers</h3>

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
	            <div class="box-body table-responsive no-padding ">
	              <table class="table table-hover text-center">
	                <tbody><tr>
	                  <th>ID</th>
	                  <th>Photo</th>
	                  <th>Name</th>
	                  <th>Per Hour</th>
	                  <th>Owner Club</th>
	                  <th>Branch</th>
	                  <th>Reservations</th>
	                  <th>Member Since</th>
	                </tr>
	                @foreach( $sport->playgrounds as $playground)
	                	<tr>
	        	            <td>{{ $playground->id }}</td>
	        	            <td>
	        	            	
	        	            </td>
							<td>
								<a href="#{{-- aurl()}}/players/{{ $playground->id --}}/">
		                            <span style="">
		                                {{ $playground->c_b_p_name }}
		                            </span>
			                    </a></td>
	        	            <td>
	        	                {{ $playground->c_b_p_price_per_hour }}
	        	            </td>

    	                  	<td>
	    	                  	<a href="{{aurl()}}/clubs/{{ $playground->clubUser->id }}/">
		                            <span style="">
		                                {{ $playground->clubUser->name }}
		                            </span>
		                        </a>
    	                  	</td>
	        	            <td>
	        	                {{ $playground->branch->c_b_name }}
	        	            </td>
	        	            <td>
	        	                {{ $playground->PlaygroudReservations->count() }}
	        	            </td>
	        	            <td>@php  echo date('d-m-Y', strtotime($playground->created_at)) ; @endphp </td>
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
					<h3> {{ $sport->en_sport_name }} Don't Create any Event Yet </h3>
				</div>
          	@endif
    	</div><!-- /.tab-pane -->
<!--=============================end Sport Playgrounds tab=============================-->
<!--=============================start Sport Events tab=============================-->
            	<div class=" tab-pane" id="SportEvents">
            		@if($sport->sportEvents->count() > 0)
					<div class="box">
			            <div class="box-header">
			              <h3 class="box-title">Sport Events</h3>

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
	            <div class="box-body table-responsive no-padding ">
	              <table class="table table-hover text-center">
	                <tbody><tr>
	                  <th>ID</th>
	                  <th>Creator</th>
	                  <th>Candidate</th>
	                  <th>Time to Play</th>
	                  <th>from - to</th>
	                  <th>Playground</th>
	                  <th>Created Date</th>
	                </tr>
	                @foreach( $sport->sportEvents as $sportEvent)
	                	<tr>
	        	            <td>{{ $sportEvent->id }}</td>
							<td>
								<a href="{{aurl()}}/players/{{ $sportEvent->creator->id }}/">
		                            <span style="">
		                                {{ $sportEvent->creator->name }}
		                            </span>
			                    </a></td>
	        	            <td>
	        	                @if ($sportEvent->E_candidate_id == '')
		                            <span class="label label-danger" style="">
		                                No Candidate Till Now !!
		                            </span>
	                        	@else
			                        <a href="{{aurl()}}/players/{{ $sportEvent->candidate->id }}/">
			                            <span style="">
			                                {{ $sportEvent->candidate->name }}
			                            </span>
			                        </a>

	                         	@endif
	        	            </td>

	        	            <td>@php  echo date('d-m-Y', strtotime($sportEvent->E_date)) ; @endphp </td>
    	                  	<td>
	    	                  	<span class="label label-success pull-right">
	    	                  		{{ $sportEvent->EventFrom->hour_format }}
	    	                  	</span>

	    	                  	<span class="label label-info pull-left">
	    	                  		{{ $sportEvent->EventTo->hour_format }}
	    	                  	</span>
    	                  	</td>
	        	            <td>
	        	                @if ($sportEvent->E_playground_id == '')
		                            <span class="label label-danger" style="">
		                                No Playground Till Now !!
		                            </span>
		                        @else
			                        <a href="profile/{{ $sportEvent->candidate->id }}">
			                            <span style="">
			                                {{ $sportEvent->eventPlayground->c_b_p_name }}
			                            </span>
			                        </a>

			                    @endif

	        	            </td>
	        	            <td>@php  echo date('d-m-Y', strtotime($sportEvent->created_at)) ; @endphp </td>
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
					<h3> {{ $sport->name }} Don't Create any Event Yet </h3>
				</div>
          	@endif
    	</div><!-- /.tab-pane -->
<!--=============================end Sport Event tab=============================-->

<!--=============================start Sport Challenges tab=============================-->

    	<div class="tab-pane" id="sportChallenges">
    		@if($sport->sportChallenges->count() > 0)

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
	                  <th>Creator</th>
	                  <th>Candidate</th>
	                  <th>Time to Play</th>
	                  <th>from - to</th>
	                  <th>Playground</th>
	                  <th>Created Date</th>
	                </tr>
	                 @foreach( $sport->sportChallenges as $sportChallenge)
	                	<tr>
	        	            <td>{{ $sportChallenge->id }}</td>
							<td>
								<a href="{{aurl()}}/players/{{ $sportChallenge->creator->id }}/">
		                            <span style="">
		                                {{ $sportChallenge->creator->name }}
		                            </span>
			                    </a></td>
	        	            <td>
	        	                @if ($sportChallenge->C_candidate_id == '')
		                            <span class="label label-danger" style="">
		                                No Candidate Till Now !!
		                            </span>
	                        	@else
			                        <a href="{{aurl()}}/players/{{ $sportChallenge->candidate->id }}/">
			                            <span style="">
			                                {{ $sportChallenge->candidate->name }}
			                            </span>
			                        </a>

	                         	@endif
	        	            </td>

	        	            <td>@php  echo date('d-m-Y', strtotime($sportChallenge->E_date)) ; @endphp </td>
    	                  	<td>
	    	                  	<span class="label label-success pull-right">
	    	                  		{{ $sportChallenge->EventFrom->hour_format }}
	    	                  	</span>

	    	                  	<span class="label label-info pull-left">
	    	                  		{{ $sportChallenge->EventTo->hour_format }}
	    	                  	</span>
    	                  	</td>
	        	            <td>
	        	                @if ($sportChallenge->E_playground_id == '')
		                            <span class="label label-danger" style="">
		                                No Playground Till Now !!
		                            </span>
		                        @else
			                        <a href="profile/{{ $sportChallenge->candidate->id }}">
			                            <span style="">
			                                {{ $sportChallenge->eventPlayground->c_b_p_name }}
			                            </span>
			                        </a>

			                    @endif

	        	            </td>
	        	            <td>@php  echo date('d-m-Y', strtotime($sportChallenge->created_at)) ; @endphp </td>
	        	        </tr>
	                @endforeach



	              </tbody>
	          	</table>
	            </div>
	            <!-- /.box-body -->
          	</div>
          	@else
				<div class="text-center">
					<h3> {{ $sport->ar_sport_name }} Don't Create any Challenge Yet </h3>
				</div>
          	@endif

<!---============================end Sport Challenges tab ====================---->
    	</div>
    	<!--=============================end createdChallenges tab=============================-->

    	<!---========================= start appliedEvents tab =====================================---->
    	<div class="tab-pane" id="appliedEvents">
    		    		@if($sport->playgrounds->count() > 0)

			<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Sport Playground</h3>

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
	                  <th>Plyground Name</th>
	                  <th>Time to Play</th>
	                  <th>from - to</th>
	                  <th>Created Date</th>
	                  <th>Sport</th>
	                  <th>Playground</th>
	                </tr>
	                @foreach( $sport->playgrounds as $sportplayground)
	                	<tr>
	    	                <td>{{ $sportplayground->id }}</td>
	    	                <td>{{ $sportplayground->c_b_p_name }}</td>

	    	                <td>

		                        <a href="{{aurl()}}/club/{{ $sportplayground->clubUser->id }}">
		                            <span style="">
		                                {{ $sportplayground->clubUser->name }}
		                            </span>
		                        </a>
							</td>
							<td>
    	                  		{{ $sportplayground->branch->c_b_name }}
    	                  	</td>
	        	            <td>@php  echo date('d-m-Y', strtotime($sportplayground->E_date)) ; @endphp </td>
    	                  	
    	                  	<td>@php  echo date('d-m-Y', strtotime($sportplayground->created_at)) ; @endphp </td>
    	                </tr>
	                @endforeach


	              </tbody>
	          	</table>
	            </div>
	            <!-- /.box-body -->
          	</div>
          	@else
				<div class="text-center">
					<h3> {{ $sport->name }} Don't Create any Challenge Yet </h3>
				</div>
          	@endif
    	</div>
    	<!---========================= end appliedEvents  =====================================---->
    	<!---========================= start candidatedEvents  =====================================---->
    	<div class="tab-pane" id="candidatedEvents">
    		@if($sport->users->count() > 0)

			<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Sport Lovers</h3>

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
	                @foreach( $sport->users as $sortLover)
	                	<tr>
	    	                  <td>{{ $sortLover->id }}</td>

	    	                  <td>

			                        <a href="{{aurl()}}/Player/{{ $sortLover->slug }}/details/">
			                            <span style="">
			                                {{ $sortLover->name }}
			                            </span>
			                        </a>

	    	                  </td>

	    	                  <td>@php  echo date('d-m-Y', strtotime($sortLover->created_at)) ; @endphp </td>
	    	                  <td>
	    	                  	
	    	                  </td>
	    	                  <td>@php  echo date('d-m-Y', strtotime($sortLover->created_at)) ; @endphp </td>
	    	                  <td>
	    	                  	
	    	                  </td>
        	                  <td>
        	                  	
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
					<h3> {{ $sport->en_sport_name }} Don't Create any Challenge Yet </h3>
				</div>
          	@endif
    	</div>
    	<!---========================= end candidatedEvents  =====================================---->
    	<!---========================= start appliedEvents  =====================================---->
    	<div class="tab-pane" id="challenged">
    		@if($sport->sportSubEvents->count() > 0)

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
	                @foreach( $sport->sportSubEvents as $sportSubEvent)
	                	<tr>
	    	                  <td>
	    	                  	
	    	                  </td>

	    	                  <td>

	    	                  </td>

	    	                  <td>
	    	                  	
	    	                  </td>
	    	                  <td>
	    	                  	

	    	                  </td>
	    	                  <td>
	    	                  </td>
	    	                  <td>
	    	                  	
	    	                  </td>
        	                  <td>
        	                  	
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
					<h3> {{ $sport->en_sport_name }} No One Challenge Till now</h3>
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
