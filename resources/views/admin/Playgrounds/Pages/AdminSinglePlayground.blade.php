@extends('admin.index')
@section('content')


<!------ start Profile Content---------->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Playground Data
      </h1>
      <p class="text-muted text-center breadcrumb">
	    Created since  @php  echo date('d-m-Y', strtotime($Playground->created_at)) ; @endphp
	  </p>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Club profile</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

	    <div class="row">
	        <div class="mainBranchInfo col-md-12">
				   <span class="mainInfoLoader" style="position:absolute;bottom:50%;left:50%;
						transform:translate(-50%, -20%);
						-ms-transform:translate(-50%, -20%);
						color:white;font-size:16px;border:none;
						cursor:pointer;font-size:10px;color:#3c8dbc;
						z-index: 1;display: none"
			>
				<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
			</span>
          <div class="box box-primary mainBranchInfo">
            <div class="box-header with-border">
              <h3 class="box-title">
                About 
                <span style="color:#3c8dbc;font-weight: bold;">
                  {{$Playground->c_b_p_name}}
                </span> 
                Playground
              </h3>

              @if ($Playground->is_active == 1)
                <span class="btn btn-success btn-flat margin">activated by Owner</span>
              @elseif($Playground->is_active == 0)
                <span class="btn btn-danger btn-flat">deactivated by Owner</span>
              @endif
              
              {!! Form::open(['url' => aurl('Playground/changeActivationStatus/'), 'method' => 'POST']) !!}
              {!! Form::hidden( 'target', $Playground->id ) !!}
                @if($Playground->our_is_active == 1)
                  {!! Form::hidden( 'status', 0 ) !!}
                  {!! Form::submit('Deactivate', ['class' => 'btn btn-danger btn-flat  pull-right']) !!}
                @elseif ($Playground->our_is_active == 0)
                  {!! Form::hidden( 'status', 1 ) !!}
                  {!! Form::submit('Activate', ['class' => 'btn btn-success btn-flat pull-right']) !!}
                @endif
              {!! Form::close() !!}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="list-group list-group-unbordered displayDetails">
                <li class="list-group-item">
                  	<b>Total Events Count</b>
                  	<a class="pull-right badge">{{ $Playground->playgroundEvents()->count() }}</a>
                </li>

                <li class="list-group-item">
                    <b>Total Challenges Count</b>
                    <a class="pull-right badge">{{ $Playground->playgroundEvents()->count() }}</a>
                </li>

                <li class="list-group-item">
                    <b>Playground Gallary</b>
                    @if ($Playground->Photos()->count() > 0)
                      <a class="pull-right badge">{{ $Playground->Photos()->count() }}</a>
                      <br>
                      <div>
                        @foreach ($Playground->Photos as $Photo)
                          <span style="margin: 10px">
                            <img class="img img-thumbnail" width="100" 
                                src="{{ Storage::url($Photo->path) }}" alt=""
                            >
                          </span>
                            
                        @endforeach
                      </div>
                      
                    @else
                      <b class="pull-right badge">No Photos for This Playground !!</b>
                    @endif
                </li>
              </ul>
              <strong><i class="fa fa-phone custom" style="color: #3c8dbc;"></i>  Phone</strong>
  
              <p class="text-muted">
              	<span class="displayDetails">{{ $Playground->c_b_p_phone }}</span>
              </p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5" style="color: #3c8dbc;"></i> Location</strong>

              <p class="displayDetails text-muted">
              	{{ $Playground->country->c_en_name }}, {{ $Playground->city->g_en_name }} {{ $Playground->area->a_en_name }}, 
              </p>
              <p class="displayDetails text-muted">
                {{ $Playground->c_b_p_address }}, 
              </p>
              <!---->
              <hr>
			
            <div class="col-lg-2 editDetails" style="display:none;" >
              <div id="loader"
              class="text-center "
              style="display: none;z-index: 99999;font-size: 10px;color: #3c8dbc;"
              >
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
              </div>
            </div>
	        <div class="clearfix"></div>
          <!---->

            <strong>
              <i class="fa fa-file-text-o margin-r-5" style="color: #3c8dbc;"></i> 
              features
            </strong>
            <p class="displayDetails">
              @if($Playground->feature1 === 1)
                <span class="badge" style="background: #4CAF50;">feature1</span>
              @endif
              @if($Playground->feature2 === 1)
                <span class="badge" style="background: #4CAF50;">feature2</span>
              @endif
              @if($Playground->feature3 === 1)
                <span class="badge" style="background: #4CAF50;">feature3</span>
              @endif
              @if($Playground->feature4 === 1)
                <span class="badge" style="background: #4CAF50;">feature4</span>
              @endif
              @if($Playground->feature5 === 1)
                <span class="badge" style="background: #4CAF50;">feature5</span>
              @endif
              @if($Playground->feature6 === 1)
                <span class="badge" style="background: #4CAF50;">feature6</span>
              @endif
              @if($Playground->feature7 === 1)
                <span class="badge" style="background: #4CAF50;">feature7</span>
              @endif
              @if($Playground->feature8 === 1)
                <span class="badge" style="background: #4CAF50;">feature8</span>
              @endif
              @if($Playground->feature9 === 1)
                <span class="badge" style="background: #4CAF50;">feature9</span>
              @endif
              @if($Playground->feature10 === 1)
                <span class="badge" style="background: #4CAF50;">feature10</span>
              @endif

            </p>
            <div class="clearfix"></div>
            <!---->
            <hr>
            <div class="clearfix"></div>
            <!---->
            <strong>
              <i class="fa fa-file-text-o margin-r-5" style="color: #3c8dbc;"></i> 
              Price Per Hour
            </strong>
            <p class="displayDetails">{{$Playground->c_b_p_price_per_hour}}</p>
            <div class="clearfix"></div>
            <!---->
            <hr>
            <div class="clearfix"></div>
            <!---->

            <strong>
              <i class="fa fa-file-text-o margin-r-5" style="color: #3c8dbc;"></i> 
              Sport
            </strong>
            <p class="displayDetails">{{$Playground->Sport->en_sport_name}}</p>
            <div class="clearfix"></div>
            <!---->
            <hr>
            <!---->
            <div class="clearfix"></div>
            <!---->

            <strong>
              <i class="fa fa-file-text-o margin-r-5" style="color: #3c8dbc;"></i> 
              Description
            </strong>
            <p class="displayDetails">{{$Playground->c_b_p_desc}}</p>
            <div class="clearfix"></div>
            <!---->
            <hr>
            <!---->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	        </div>

    			{{--<div class="mainInfo col-md-4">
             @include('club.Branches.pageParts.Branchdisplay.BranchImageDiv')  
          </div> --}} 
      </div>

        <div class="row">
	       {{-- <div class="BranchPlaygroundsDiv col-md-8">
	       	       				@include('club.Branches.pageParts.Branchdisplay.BranchPlaygroundsDiv')
	       	       	        </div> --}}

			{{-- <div class="mainInfo col-md-4">
										@include('club.Branches.pageParts.Branchdisplay.BranchImageDiv')
							        </div> --}}
        </div>

    </section>

  <!------ End Profile Content ------------->
@endsection
