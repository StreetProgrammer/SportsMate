@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('areas')]) !!}
    <div class="form-group">
      {!! Form::label('a_ar_name',trans('admin.area_name_ar')) !!}
      {!! Form::text('a_ar_name',old('a_ar_name'),['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('a_en_name',trans('admin.area_name_en')) !!}
      {!! Form::text('a_en_name',old('a_en_name'),['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('a_governorate_id',trans('admin.area_governorate')) !!}
      <select name="a_governorate_id" class="form-control">

        @foreach( \App\Model\Governorate::all() as $governorate )
            <option value="{{ $governorate->id }}" style="height: 40px !important ;">
                @php
                  echo $name = (session('lang')) == 'en' ? $governorate->g_en_name : $governorate->g_ar_name ;
                @endphp
            </option>
        @endforeach

      </select>
    </div>
    <br>
    
    {!! Form::submit(trans('admin.saveCountryBtn'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection