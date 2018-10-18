@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('governorates/' . $Governorate->id), 'method' => 'put']) !!}
    <div class="form-group">
      {!! Form::label('g_ar_name',trans('admin.governorate_name_ar')) !!}
      {!! Form::text('g_ar_name',$Governorate->g_ar_name,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('g_en_name',trans('admin.governorate_name_en')) !!}
      {!! Form::text('g_en_name',$Governorate->g_en_name,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('g_country_id',trans('admin.governorate_country')) !!}
      <select name="g_country_id" id="categories" class="form-control">
        @foreach(\App\Model\Area\Country::all() as $country)
            <option value="{{ $country->id }}"
                    style="height: 40px !important ;"
                    @php echo $selected = ($country->id) == $Governorate->g_country_id ? 'selected' : '' ; @endphp
            >
                @php
                  echo $name = (session('lang')) == 'en' ? $country->c_en_name : $country->c_ar_name ;
                @endphp
            </option>
        @endforeach
      </select>
    </div>
    <br>
    
    {!! Form::submit(trans('admin.svaeEdits'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection