      
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
            	<div class="text-center" style="position: relative">
            		<img 
		              	class="displayCamIcon profile-user-img img-responsive img-circle" 
                    @if (empty($club->user_img))
                      src="{{ url('/') }}/design/AdminLTE/dist/img/user4-128x128.jpg"
                    @else
                      src="{{ Storage::url($club->user_img) }}"
                    @endif
		              	alt="User profile picture"
		            >
		            <label for="upload" style="position:absolute;bottom:0%;left:50%;
									transform:translate(-50%, -20%);
									-ms-transform:translate(-50%, -20%);display: none;
									color:white;font-size:16px;border:none;
									cursor:pointer;font-size:20px;color:#dddddd94;">
			            <span style="position:absolute;bottom:0%;left:50%;
									transform:translate(-50%, -20%);
									-ms-transform:translate(-50%, -20%);
									color:white;font-size:16px;border:none;
									cursor:pointer;font-size:20px;color:#dddddd94;"
						      >
			            	<i class="fa fa-camera" aria-hidden="true"></i>
			            </span>
			            <input type="file" id="upload" style="display:none">
		        	</label>
            	</div>
              

              <h3 id="clubUserName" class="profile-username text-center" style="color:#3c8dbc">{{ $club->name }}</h3>

              <p class="text-muted text-center">User - Club</p>
              <p class="text-muted text-center">
	              Member since  @php  echo date('d-m-Y', strtotime($club->created_at)) ; @endphp
	          </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Branches</b> <a class="pull-right">{{ $club->clubBranches()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Playgrounds</b> <a class="pull-right">{{ $club->clubPlaygrounds()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Reservations</b> <a class="pull-right">{{ $club->clubReservation()->count() }}</a>
                </li>
              </ul>

                    {!! Form::open(['url' => url(''), 'method' => 'POST']) !!}
                    {!! Form::hidden( 'target', $club->id ) !!}
                    @if($club->user_is_active == 1)
                        {!! Form::hidden( 'status', 0 ) !!}
                        {!! Form::submit('Deactivate', ['class' => 'btn btn-danger btn-block', 'id' => 'EditActiveStatus']) !!}
                    @elseif ($club->user_is_active == 0)
                        {!! Form::hidden( 'status', 1 ) !!}
                        {!! Form::submit('Activate', ['class' => 'btn btn-success btn-block', 'id' => 'EditActiveStatus']) !!}
                    @endif

                    {!! Form::close() !!}

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->