@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
{!! Form::open(['url'=>aurl('sports/' . $sport->id), 'method' => 'put', 'files'=>true]) !!}
    <div class="form-group">
      {!! Form::label('ar_sport_name',trans('admin.sportArabicName')) !!}
      {!! Form::text('ar_sport_name', $sport->ar_sport_name,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('en_sport_name',trans('admin.sportEnglishName')) !!}
      {!! Form::text('en_sport_name', $sport->en_sport_name, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('sport_desc',trans('admin.sportDescription')) !!}
      {!! Form::text('sport_desc', $sport->sport_desc, ['class'=>'form-control']) !!}
    </div>
     <div class="form-group">
      {!! Form::label('sport_player_num',trans('admin.sportPlayerNumber')) !!}
      {!! Form::text('sport_player_num',$sport->sport_player_num, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('sport_img',trans('admin.sportImage')) !!}
      {!! Form::file('sport_img',['class'=>'form-control']) !!}
       <br>
      @if(!empty($sport->sport_img))
        <img class="img img-responsive" src="{{ Storage::url($sport->sport_img) }}" style="width: 50px;" >
      @endif
    </div>
    
    {!! Form::submit(trans('admin.saveEditsBtn'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection