@extends('admin.index')
@section('content')

<!------ start Profile Content---------->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Challenge
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Event</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
       
       <!!--================================================-->
		 <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
            	<div style="padding:50px;background:#fff;">
            		<div class="row">
            			<div class="col-md-6" style="">
            				<div style="margin: 20px;border:3px solid #3c8dbc;padding:10px;background: #9e9e9e3b;">
				              	 <img 
				              	 	class="profile-user-img img-responsive img-circle" 
				              	 	style="height: 100px;border: 3px solid #fff" 
				              	 	src="{{ url('design/AdminLTE') }}/dist/img/user2-160x160.jpg"" alt="User profile picture"
				              	 >

					              <h3 class="profile-username text-center">{{ $Challenge->creator->name }}</h3>
					              <h5 class=" text-center">Challenge Creator</h5>

					              <!-- <p class="text-muted text-center">User - Player</p> -->
					              <p class="text-muted text-center">
						              Member since  @php  echo date('d-m-Y', strtotime($Challenge->creator->created_at)) ; @endphp
						          </p>
							</div>
		              </div>
		              <div class="col-md-6" style="">
		              		<div style="margin: 20px;border:3px solid #3c8dbc;padding:10px;background: #9e9e9e3b;">
				              	  <img 
				              	 	class="profile-user-img img-responsive img-circle" 
				              	 	style="height: 100px;border: 3px solid #fff" 
				              	 	src="{{ url('design/AdminLTE') }}/dist/img/user2-160x160.jpg"" alt="User profile picture"
				              	 >
								@if (!empty($Challenge->C_candidate_id))
									<h3 class="profile-username text-center">{{ $Challenge->candidate->name }}</h3>
					                <h5 class=" text-center">Challenge Candidate</h5>

					              <!-- <p class="text-muted text-center">User - Player</p> -->
					              <p class="text-muted text-center">
						              Member since  @php  echo date('d-m-Y', strtotime($Challenge->candidate->created_at)) ; @endphp
						          </p>
						        @else
						          <h3 class="alert-danger text-center">No Candidate Till Now</h3>
								@endif
					              
							</div>
		              </div>
            		</div>
				</div>
             <!--  <ul class="list-group list-group-unbordered">
             	<li class="list-group-item">
                 <b>Last Update</b> <a class="pull-right">{{-- $Challenge->idupdated_at --}}</a>
               </li>
               <li class="list-group-item">
                 <b>Lovers</b> <a class="pull-right">{{-- $Challenge->id --}}</a>
               </li>
               <li class="list-group-item">
                 <b>Playgrounds</b> <a class="pull-right">{{-- $Challenge->id  --}}</a>
               </li>
               <li class="list-group-item">
                 <b>Events</b> <a class="pull-right">{{-- $Challenge->id --}}</a>
               </li>
               <li class="list-group-item">
                 <b>Challenges</b> <a class="pull-right">{{-- $Challenge->id --}}</a>
               </li>
               <li class="list-group-item">
                 <b>SubEvents</b> <a class="pull-right">{{-- $Challenge->id --}}</a>
               </li>
               <li class="list-group-item">
                 <b>Rates</b> <a class="pull-right">{{-- $Challenge->id --}}</a>
               </li>
               <li class="list-group-item" style="border-bottom: 1px solid #fff;">
                 <b>Event Description</b> <a class="pull-right">{{-- $Challenge->id --}}</a>
               </li>
               <li class="list-group-item">
                 <b>Candidated Events</b> <a class="pull-right">{{-- $Challenge->candidatedEvents()->count() ----}}</a>
               </li>
             </ul>
             <br>
             					<a href="{{ aurl('sports/' . $Challenge->id . '/edit') }}" class="btn btn-success ">
             						Edit
             						<i class="fa fa-edit"></i>
             					</a>         -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
       <!--===============================================-->

         <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#expectedPlaygrounds" data-toggle="tab">Expected Playgrounds</a></li>
              <!-- <li><a href="#SportEvents" data-toggle="tab">Sport Events</a></li> -->
            </ul>
            <div class="tab-content">

<!--=============================start Sport Playgrounds tab=============================-->
            	<div class=" tab-pane" id="expectedPlaygrounds">
            		@if($Challenge->expectedPlaygrounds->count() > 0)
					<div class="box">
			            <div class="box-header">
			              <h3 class="box-title">Suggested Playground</h3>

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
	                @foreach( $Challenge->expectedPlaygrounds as $playground)
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
					<h3>  Don't Have any expected Playgrounds Yet </h3>
				</div>
          	@endif
    	</div><!-- /.tab-pane -->
<!--=============================end Sport Playgrounds tab=============================-->




          
      </div>

        </div>
        <!--/.col -->
      </div>
      <!-- /.row -->

    </section>

  <!------ End Profile Content ------------->

@endsection
