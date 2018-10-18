@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('countriesControl'),'files'=>true]) !!}
    <div class="form-group">
      {!! Form::label('c_ar_name',trans('admin.country_name_ar')) !!}
      {!! Form::text('c_ar_name',old('c_ar_name'),['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('c_en_name',trans('admin.country_name_en')) !!}
      {!! Form::text('c_en_name',old('c_en_name'),['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('c_code',trans('admin.countryCode')) !!}
      {!! Form::text('c_code',old('c_code'),['class'=>'form-control']) !!}
    </div>
     <div class="form-group">
      {!! Form::label('c_mob',trans('admin.countryMob')) !!}
      {!! Form::text('c_mob',old('c_mob'),['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('c_logo',trans('admin.countryLogo')) !!}
      {!! Form::file('c_logo',['class'=>'form-control']) !!}
    </div>
    
    {!! Form::submit(trans('admin.saveCountryBtn'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection