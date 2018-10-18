@extends('admin.index')
@section('content')

<section class="content-header">
      <h1>
        {{ trans('admin.create_admin_account') }} 
      </h1>
     <ol class="breadcrumb">
        <li><a href="{{aurl('admins')}}"><i class="fa fa-users"></i> {{ trans('admin.admins') }}</a></li>
        <li class="active"><a href="{{aurl()}}"><i class="fa fa-dashboard"></i> {{ trans('admin.dashboard') }}</a></li>
     </ol>
</section>
<br>
<div class="box box-info">
	<div class="box-header with-border">
	    <h3 class="box-title">{{ $title }}</h3>
	</div>

    <div class="box-body">
		{!! Form::open(['url' => aurl('admins')]) !!}
		      <div class="input-group">
		        <span class="input-group-addon" style="color: #00c0ef; "><i class="fa fa-user"></i></span>
		        {!! Form::text( 'name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name'] ) !!}
		      </div>
	      	  <br>

		      <div class="input-group">
		        <span class="input-group-addon" style="color: #00c0ef; "><i class="fa fa-at"></i></span>
		        {!! Form::email( 'email', old('email'), ['class' => 'form-control', 'placeholder' => 'E-mail'] ) !!}
		      </div>
		      <br>

		       <div class="input-group">
		        <span class="input-group-addon" style="color: #00c0ef; " ><i class="fa fa-eye-slash"></i></span>
		        {!! Form::password( 'password', ['class' => 'form-control'] ) !!}
		      </div>
		      <br>

		      {{-- <div class="input-group">
		        <span class="input-group-addon"><i class="fa fa-at"></i></span>
		        {!! Form::text( 'confirmPassword', old('name'), ['class' => 'form-control', 'placeholder' => 'Name'] ) !!}
		      </div> --}}
		      <br>
			{!! Form::submit( trans('admin.save') , ['class' => 'btn btn-primary']) !!}
	    {!! Form::close() !!}
    </div>
    <!-- /.box-body -->
 </div>



  


@endsection
