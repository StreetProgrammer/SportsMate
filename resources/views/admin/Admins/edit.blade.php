@extends('admin.index')
@section('content')

<section class="content-header">
      <h1>
        {{ trans('admin.update_admin_account_details') }}
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
		{!! Form::open(['url' => aurl('admins/' . $admin->id), 'method' => 'put']) !!}
		      <div class="input-group">
		        <span class="input-group-addon" style="color: #00c0ef; "><i class="fa fa-user"></i></span>
		        {!! Form::text( 'name', $admin->name, ['class' => 'form-control', 'placeholder' => 'Name'] ) !!}
		      </div>
	      	  <br>

		      <div class="input-group">
		        <span class="input-group-addon" style="color: #00c0ef; "><i class="fa fa-at"></i></span>
		        {!! Form::email( 'email', $admin->email, ['class' => 'form-control', 'placeholder' => 'E-mail'] ) !!}
		      </div>
		      <br>

		       <div class="input-group">
		        <span class="input-group-addon" style="color: #00c0ef; " ><i class="fa fa-eye-slash"></i></span>
		        {!! Form::password( 'password', ['class' => 'form-control'] ) !!}
		      </div>
		      <br>

		      <div class="input-group {{ $admin->type === 1 ? "hidden" : "" }} ">
		      	<div class="radio">
		      		<label>
		      			<input type="radio" name="our_is_active" value="1" {{ $admin->our_is_active === 1 ? "checked" : "" }} >
		      			{{ trans('admin.activate') }}
		      		</label>
		      	</div>
		      	<div class="radio">
		      		<label>
		      			<input type="radio" name="our_is_active" value="0" {{ $admin->our_is_active === 0 ? "checked" : "" }}>
			      		{{ trans('admin.deactivate') }}
			      	</label>
		      	</div>
		      </div>
		      <br>

		      {{-- <div class="input-group">
		        <span class="input-group-addon"><i class="fa fa-at"></i></span>
		        {!! Form::text( 'confirmPassword', old('name'), ['class' => 'form-control', 'placeholder' => 'Name'] ) !!}
		      </div> --}}
		      <br>
			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	    {!! Form::close() !!}
    </div>
    <!-- /.box-body -->
 </div>



  


@endsection
