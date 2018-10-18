@extends('site.index')
@section('content')

@yield('content')
    {{--------------------------------------------------------------------}}
   {{ csrf_field() }}

 <section class="courts-main players-main">
      <div class="container" style="font-size:80%;">
        <div class="row" >
          <div class="col-md-4 text-center">
            <div class="panel panel-default shade court-col">

              <div class="court-img">
                <img src="assets/img/football-playground.jpg" >
              </div>
              <div class="court-name">
                <h2>Al Jazeera Club</h2>
                
                <p><i class="fa fa-map-marker"></i>  Haram, Giza</p>
                 <p><i class="fa fa-envelope"></i>  club@email.com</p>
                <div style="margin: auto;width: 214px;">
                  <div class="oval-div oval-div-green" ">
                    <i class="fa fa-star"></i>
                    <span>Book</span>
                  </div>
                  <div class="court-seperator">
                    <div class="vl"></div>
                  </div>
                  <div class="oval-div oval-div-orange" >
                    <i class="fa fa-star"></i>
                    <span>Fav</span>
                  </div>
                </div>             
                
              </div>
              <div class="clearfix"></div>
              <hr style="border-top: 2px solid #eee; margin: 20px;">
              <div style="color: #fff;margin: auto;padding: 15px;">
                <div style="margin-bottom: 40px">
                  <h4 style="    color: #99d21e;">Played Matches</h4>
                  <p>150 Matches</p>
                </div>
                <div style="margin-bottom: 40px">
                  <h4 style="color: #99d21e;">Players</h4>
                  <p>113</p>
                </div>
                <div style="margin-bottom: 40px">
                  <h4 style="color: #99d21e;">Branches</h4>
                  <p>113</p>
                </div>
                <div style="margin-bottom: 40px">
                  <h4 style="color: #99d21e;">Sports</h4>
                  <p>113</p>
                </div>
                
              </div>
            </div>
          </div>
            
          

          <div class="col-md-8" >
            <div class="panel panel-default shade">
                <!----Slider------>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                    <li data-target="#myCarousel" data-slide-to="5"></li>
                    <li data-target="#myCarousel" data-slide-to="6"></li>
                  </ol>

                  <!-- Wrapper for slides -->

                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="assets/img/en_background_golf.png">                    
                    </div>                 

                    <div class="item">
                      <img src="assets/img/EN_Backgrund_billiards.png">                    
                    </div>

                    <div class="item">
                      <img src="assets/img/en_background_bowling.png">                    
                    </div>
                    
                    <div class="item">
                      <img src="assets/img/en_background_tennis.png">                    
                    </div>

                    <div class="item">
                      <img src="assets/img/Basket_ball_English.png">                    
                    </div>

                  </div>                
                </div>
                <!--end Slider------> 
            </div>
          </div>
          <div class="col-md-8" >
            <div class="panel panel-default shade">
                <div class="branch-details">
                  <h2>Branch Name</h2>
                  <p>Address</p>
                  <p>Email</p>
                  <p>Phone</p>
                  <p>Playgrounds</p>
                  <p>Sports</p>
                </div>
              
               

                              
            </div>           
          </div>

        </div>
      </div>
      
    </section>

@endsection