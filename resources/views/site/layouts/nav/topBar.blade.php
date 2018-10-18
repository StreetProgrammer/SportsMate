<nav class="notify-nav" >
@auth
    {{-- auth player nav --}}
  <div class="container">

    <ul>
       <li><a href="{{ url('/') }}/search"><i class="fa fa-search"></i></a></li> 
       <li> | </li>
       <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-bell"></i> <b class="caret"></b></a>
          <ul class="dropdown-menu" >
            <li><a href="#">Inbox</a></li>
            <li><a href="#">Drafts</a></li>
            <li><a href="#">Sent Items</a></li>
            <li class="divider"></li>
            <li><a href="#">Trash</a></li>
          </ul>
        </li>
        <div class="dropdown-content">
          <a href="#home">Home</a>
          <a href="#about">About</a>
          <a href="#contact">Contact</a>
        </div>
        <li> | </li>
        <li>
          <a href="{{ url('/') }}/profile/{{sm_crypt(Auth::id())}}">
            <!-- <i class="fa fa-user"></i> -->
            <img style="width: 25px;"
              @if (empty(Auth::user()->user_img))
                src="{{ url('/') }}/design/AdminLTE/dist/img/user.png"
              @else
                src="{{ Storage::url(Auth::user()->user_img) }}"
              @endif class="user-image" alt="User Image" alt=""
            >
          </a>
        </li> 
        <li> | </li>
        <li><a href="{{ url('/') }}/logout"><i class="fa fa-sign-out"></i> logout</a></li>
    </ul>
  </div>
{{-- auth player nav --}}
@else
{{-- visitor nav --}}
  <div class="container">
    <ul>
       <li><i class="fa fa-search"></i></li> 
       <li> | </li>
       <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-bell"></i> <b class="caret"></b></a>
          <ul class="dropdown-menu" >
            <li><a href="#">Inbox</a></li>
            <li><a href="#">Drafts</a></li>
            <li><a href="#">Sent Items</a></li>
            <li class="divider"></li>
            <li><a href="#">Trash</a></li>
          </ul>
        </li>
        <div class="dropdown-content">
          <a href="#home">Home</a>
          <a href="#about">About</a>
          <a href="#contact">Contact</a>
        </div>
        <li> | </li>
        <li><a href="{{ url('/') }}/login"><i class="fa fa-sign-in"></i> login</a></li>
        <li><a href="#" data-toggle="modal" data-target="#RegisterAs">
          <i class="fa fa-user-plus"></i> register</a>
        </li> 
    </ul>
  </div>
{{-- visitor nav --}}

@endauth

</nav>

@guest()
  {{----}}
    <!-- Modal -->
  <div class="modal fade" id="RegisterAs" role="dialog" style="">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <!-- <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div> -->
        <!-- <div class="modal-body"> -->
          <div class="panel panel-default" style="margin-bottom: 0px">
                <div class="panel-heading" style="color: #fff;background-color: #06774a !important;">
                  You Are 
                  <button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
                </div>
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
                                <button type="submit" class="flatbutton">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <!-- </div> -->
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
    </div>
  </div>
{{----}}
@endguest
