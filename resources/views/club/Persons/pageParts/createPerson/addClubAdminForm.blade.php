
              {!! Form::hidden( 'clubId', $club->id ) !!}
              {!! Form::hidden( 'type', 3 ) !!}
              <p style="font-weight:bold" id="formTitle">
                <i class="fa fa-user custom" style="color: #3c8dbc;"></i>
                {{ trans('club.adminName') }}
             </p>
              <p class="text-muted">
                {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
              </p>
              <hr>

              <p class="" style="font-weight:bold">
                <i class="fa fa-phone custom" style="color: #3c8dbc;"></i>
                {{ trans('club.email') }}
            </p>
              <p class="text-muted">
                {!! Form::text('email',old('email'),['class'=>'form-control']) !!}
              </p>
              <hr>
              <p class="displayDetails" style="font-weight:bold">
                <i class="fa fa-key margin-r-5" style="color: #3c8dbc;"aria-hidden="true"></i>
                {{ trans('club.password') }}
              </p>
              <div class="col-md-10">
                <p class="text-muted">
                  <input type="password" name="password" class="form-control" value="">
                </p>
              </div>
              <div class="col-md-2 text-center">
                <strong class="showHidePass" style="font-size: 120%;
                                        border: 2px solid #3c8dbc;
                                        padding: 3px 5px;
                                        border-radius: 15px;
                                        cursor: pointer;"
                >
                  <i class="fa fa-eye" style="color: #3c8dbc;"aria-hidden="true"></i>
                </strong>
              </div>
              <br><br><br><br><br>
              <!----->
