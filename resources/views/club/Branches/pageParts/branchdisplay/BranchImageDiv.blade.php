      
          <!-- Profile Image -->
          <div class="box box-primary imageInfoDiv">
            <div class="box-body box-profile">
            	 <div class="text-center" style="position: relative;">
                <img id="branchLogoPlaceholder" class="displayCamIcon img img-rounded" 
                    @if (empty($clubBranche->c_b_logo))
                      src="http://via.placeholder.com/200x200?text=Branch%20Logo"
                    @else
                      src="{{ Storage::url($clubBranche->c_b_logo) }}"
                    @endif
                    alt="User profile picture"
                 alt="">
                <label for="logoUpload" style="position:absolute;bottom:0%;left:50%;
                  transform:translate(-50%, -20%);
                  -ms-transform:translate(-50%, -20%);display: none;
                  color:white;border:none;
                  cursor:pointer;font-size:35px;color:#fff;">
                    <span style="">
                      <i class="fa fa-camera" aria-hidden="true"></i>
                    </span>
                    <input type="file" id="logoUpload" accept="image/*" style="display:none">
                </label>
              </div>
              <br>
                  {!! Form::open(['url' => url(''), 'method' => 'POST']) !!}
                      {!! Form::hidden( 'clubId', Auth::id() ) !!}
                      {!! Form::hidden( 'clubBranchId', $clubBranche->id ) !!}
                      {!! Form::hidden( 'logoType', 'logo' ) !!}
                      {!! Form::hidden( 'c_b_logo', '' ) !!}
                      {!! Form::submit('Upload', 
                                        ['class' => 'btn btn-success btn-block', 
                                        'id' => 'ChangeBranchLogo',
                                        'style' => 'display:none'
                                      ]) 
                      !!}
                  {!! Form::close() !!}
              <hr>
              <br>
              <div class="text-center" style="position: relative;">
                <img id="branchBannerPlaceholder" class="displayCamIcon img img-rounded" 
                        @if (empty($clubBranche->c_b_banner))
                          src="http://via.placeholder.com/300x150?text=Branch%20Banner"
                        @else
                          src="{{ Storage::url($clubBranche->c_b_banner) }}"
                        @endif
                     alt="">
                <label for="bannerUpload" style="position:absolute;bottom:0%;left:50%;
                  transform:translate(-50%, -20%);
                  -ms-transform:translate(-50%, -20%);display: none;
                  color:white;border:none;
                  cursor:pointer;font-size:35px;color:#fff;">
                    <span style=""
                    >
                      <i class="fa fa-camera" aria-hidden="true"></i>
                    </span>
                    <input type="file" id="bannerUpload" style="display:none" accept="image/*">
                </label>
              </div>
              <br>
              {!! Form::open(['url' => url(''), 'method' => 'POST']) !!}
                      {!! Form::hidden( 'clubBranchId', $clubBranche->id ) !!}
                      {!! Form::hidden( 'bannerType', 'banner' ) !!}
                      {!! Form::hidden( 'c_b_banner', '' ) !!}
                      {!! Form::submit('Upload', 
                                        ['class' => 'btn btn-success btn-block', 
                                        'id' => 'ChangeBranchBanner',
                                        'style' => 'display:none'
                                      ]) 
                      !!}
              {!! Form::close() !!}
              <br>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->