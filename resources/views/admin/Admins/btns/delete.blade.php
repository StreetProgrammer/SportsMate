@if ( $type == 1 )
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#del_admin_err">
    <span class="fa-stack">
    <i class="fa fa-trash fa-stack-1x"></i>
    <i class="fa fa-ban fa-stack-2x text-danger" style="color:red;"></i>
  </span>
  </button>
@else
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del_admin{{ $id }}">
    <i class="fa fa-trash"></i> 
  </button>
@endif


<!------------------->
  <div class="modal fade" id="del_admin{{ $id }}" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{!! trans('admin.modelDeleteTitle') !!}</h4>
              </div>

              {!! Form::open(['url' => aurl('admins/' . $id), 'method' => 'delete']) !!}
              <div class="modal-body" style="color:#fff;background:#dd4b39;">

                <div class="notEmptyRecord">
                  <h3>
                  	are you sure, delete {{ $name }} Account ?
                    {!! trans('admin.ask_delete_one_item') !!}
                    <span class="record_count"></span>
                    {!! trans('admin.questionMark') !!}
                  </h3>
                </div>

              </div>
              <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
					{!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
              </div>
              {!! Form::close()!!}
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  <!------------------->

  <!------------------->
  <div class="modal fade" id="del_admin_err" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{!! trans('admin.warning_cannot') !!}</h4>
              </div>
              <div class="modal-body" style="color:#fff;background:#dd4b39;">

                <div class="notEmptyRecord">
                  <h3>
                   {{ trans('admin.warning_cannot_del_admin') }}
                  </h3>
                </div>

              </div>
              <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  <!------------------->

