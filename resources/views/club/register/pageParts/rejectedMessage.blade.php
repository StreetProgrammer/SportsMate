<div class="container" style="display: block;">
    
    @php
    $rejectedMessage = DB::table('rejectmsgs')
                            ->select('*')
                            ->where('taraget_id', '=', Auth::id())
                            ->limit(1)
                            ->orderBy('created_at', 'desc')
                            ->first(); 
    @endphp
    @if ($rejectedMessage && Auth::user()->our_is_active == 3)
        <!-- Start of [[[ Reject Reason Message ]]] -->
        <div class="col-md-12">
        <div class="box box-default color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title">
                <span style="font-size: 150%;color: #f00">
                    <i class="fa fa-times-circle"></i> 
                </span>
                    Rejected Message
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h4 class="text-center" style="color:#f00;">
                        {{$rejectedMessage->reason}}                     
                    </h4>
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            </div>
        </div>
    <!-- End of [[[ Reject Reason Message ]]] -->
    @endif
    
    <!-- </div> -->
    <!-- <div class="row"> -->
        <div class="col-md-12">
        <div class="box box-default color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-tag"></i> {{ trans('club.Edit_Information') }}</h3>
            </div>
            <div class="box-body">
                <div class="row">
                <div class="col-sm-4 col-md-6">
                    <h4 class="text-center" style="color:#3c8dbc;">
                    {{ trans('club.mainAccountInfo') }} 
                    <span id="ShowEditPart" style="cursor: pointer;">
                        <i class="fa fa-edit"></i>
                    </span>
                    </h4>

                    <!-- <div class="color-palette-set">
                    <div class="bg-light-blue disabled color-palette"><span>Disabled</span></div>
                    <div class="bg-light-blue color-palette"><span>#3c8dbc</span></div>
                    <div class="bg-light-blue-active color-palette"><span>Active</span></div>
                    </div> -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-6">
                    <h4 class="text-center" style="color:#3c8dbc;">
                    {{ trans('club.mainAccountBranchesPlaygroundsInfo') }}
                    <span class="ShowManagePart" style="cursor: pointer;">
                        <i class="fa fa-tasks"></i>
                    </span>
                    </h4>

                    <!-- <div class="color-palette-set">
                    <div class="bg-aqua disabled color-palette"><span>Disabled</span></div>
                    <div class="bg-aqua color-palette"><span>#00c0ef</span></div>
                    <div class="bg-aqua-active color-palette"><span>Active</span></div>
                    </div> -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            </div>
        </div>
    <!-- </div> -->
</div>