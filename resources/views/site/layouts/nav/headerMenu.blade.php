<nav class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
      <div class="container">
        <div class="navbar-header">
          <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{ Storage::url(setting()->logo) }}" width="150px ;height:auto">
          </a>
        </div>
        
        @auth
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" 
              class="dropdown-toggle" 
              data-toggle="dropdown" 
              role="button" 
              aria-haspopup="true" 
              aria-expanded="false"
          >
            <i class="fa fa-bell"></i>
            <span class="label label-warning"
                    style="position: relative;
                          bottom: 10px;
                          right: 13px;
                          border-radius: 16px;
                          padding: 4px 4px;"  
            >
                10
            </span> 
          </a>
          <ul class="dropdown-menu notify-drop" style="">
            <div class="notify-drop-title">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">Bildirimler (<b>2</b>)</div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
              </div>
            </div>
            <!-- end notify title -->
            <!-- notify content -->
            <div class="drop-content">

             {{-- @foreach (Auth::user()->notifications as $notification)
                    <li @if($notification->unread())style="background: #ddd;"@endif>
                      <a href="{{url()}}{{ $notification->data['url'] }}">
                        <div style="font-size: 90%">
                          <i class="{{ $notification->data['iconClass'] }}"></i>
                          @if (session('lang') == 'en')
                            {{ $notification->data['en'] }}
                          @elseif (session('lang') == 'ar')
                            {{ $notification->data['ar'] }}
                          @endif 
                           - 
                          <span style="color: #00c0ef;">
                            {{ $notification->data['clubName'] }}
                          </span>
                        </div>
                      </a>
                    </li>
                  @endforeach--}}
              <!---------- start notification ----------->
              <li>
                <div class="col-md-3 col-sm-3 col-xs-3">
                  <div class="notify-img">
                    <img src="http://placehold.it/45x45" alt="">
                  </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-9 pd-l0">
                  <a href="">
                    Ahmet
                  </a> 
                  yorumladı. 
                  <a href="">
                    Çicek bahçeleri...
                  </a> 
                  <a href="" class="rIcon">
                    <i class="fa fa-dot-circle-o"></i>
                  </a>
                
                <hr>
                <p class="time">Şimdi</p>
                </div>
              </li>
            <!------------end notification ------------>
              <li>
                <div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
                <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                <p>Lorem ipsum sit dolor amet consilium.</p>
                <p class="time">1 Saat önce</p>
                </div>
              </li>
              <li>
                <div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
                <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                <p>Lorem ipsum sit dolor amet consilium.</p>
                <p class="time">29 Dakika önce</p>
                </div>
              </li>
              <li>
                <div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
                <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                <p>Lorem ipsum sit dolor amet consilium.</p>
                <p class="time">Dün 13:18</p>
                </div>
              </li>
              <li>
                <div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
                <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                <p>Lorem ipsum sit dolor amet consilium.</p>
                <p class="time">2 Hafta önce</p>
                </div>
              </li>
            </div>
            <div class="notify-drop-footer text-center">
              <a href=""><i class="fa fa-eye"></i> Tümünü Göster</a>
            </div>
          </ul>
        </li>
      </ul>

      @endauth
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="file:///C:/Olfat/Sportmate%20design1/home2.html">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sports <b class="caret"></b></a>   

                  <div class="row dropdown-menu mega-menu" ">
                    @php
                      $sports = \App\Model\Sport::all() ;
                    @endphp
                    
                    @foreach ($sports as $sport)
                      <div class="col-md-3 text-center">
                        <div class="sport-menu" style="background: #fff;padding: 10px 0px;">
                          <a class="a-holding-divs" href="#">{{$sport->en_sport_name}}</a>
                        </div>
                      </div>
                    @endforeach
                </li>
              <li><a href="{{url('/')}}/search/player">Players</a></li>
                <li><a  href="{{url('/')}}/search/playgrounds">Courts</a></li>
            </ul>
    
        </div>
      </div>
    
  </nav>