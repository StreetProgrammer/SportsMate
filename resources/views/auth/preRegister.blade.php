@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">You Are</div>
                    <div class="panel-body">
                    {{ Form::open(['url' => url('handlepreregister'), 'method' => 'GET', 'class' => 'form-horizontal our-form'])}}
                   <!--  <form class="form-horizontal our-form" method="POST" action="{{ route('register') }}">
                       {{ csrf_field() }} -->

                        
                        <div class="text-center form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!-- <label for="type" class="col-md-4 control-label">Type</label> -->

                            <div class="col-md-12">

                                <div class="radio">
                                    <label>
                                        <input type="radio" value="1" name="type" checked="checked">
                                        Player
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="2" name="type">
                                        Club
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
