@extends('site.index')
@section('content')

@yield('content')
    {{--------------------------------------------------------------------}}

    
    <!----Slider content------------------------------------------------------ ----->

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
      <div class="slider1"></div>
      <div class="en_text1"><h1>Play Your Favourite Sport</h1></div>
      <div><a class="link-as-button en_text" href="#">Reserve Now</a></div>
      <!-- <img src="assets/img/en_background_golf.png" alt="New York">
      <img class="en_text img-responsive" src="assets/img/golf_en_text.png">
      <img class="en_ball img-responsive" src="assets/img/EN_Ball_golf.png"> -->
    </div>
    

    

    <div class="item">
      <div class="slider2"></div>
      <div class="en_text1"><h1>Play Your Favourite Sport</h1></div>
      <div><a class="link-as-button en_text" href="#">Reserve Now</a></div>
      
      <!-- <img src="assets/img/en_background_bowling.png" alt="New York">
      <img class="en_text img-responsive" src="assets/img/bowling_en_text.png">
      <img class="en_ball img-responsive" src="assets/img/EN_Ball_bowling.png"> -->
    </div>

    
    <div class="item">
      <div class="slider3"></div>
      <div class="en_text1"><h1>Play Your Favourite Sport</h1></div>
      <div><a class="link-as-button en_text" href="#">Reserve Now</a></div>
     
      <!-- <img src="assets/img/en_background_tennis.png" alt="New York">
      <img class="en_text img-responsive" src="assets/img/tennis_en_text.png">
      <img class="en_ball img-responsive" src="assets/img/EN_Ball.png"> -->
    </div>
    <div class="item">
      <div class="slider4"></div>
      <div class="en_text1"><h1>Play Your Favourite Sport</h1></div>
      <div><a class="link-as-button en_text" href="#">Reserve Now</a></div>
      
      <!-- <img src="assets/img/Basket_ball_English.png" alt="Los Angeles">
      <img class="en_text img-responsive" src="assets/img/EN_Text.png">
      <img class="en_ball img-responsive" src="assets/img/EN_Ball.png"> -->
    </div>
    <div class="item">
      <div class="slider5"></div>
      <div class="en_text1"><h1>Play Your Favourite Sport</h1></div>
      <div><a class="link-as-button en_text" href="#">Reserve Now</a></div>
      
      <!-- <img src="assets/img/EN_Backgrund_billiards.png" alt="Chicago">
      <img class="en_text_billiard img-responsive" src="assets/img/billiard_en_text.png">
      <img class="en_ball_billiard img-responsive" src="assets/img/Balls_billiard.png"> -->
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <!-- #endregion Jssor Slider End -->


    <!----content----->

    <section>
                <div class="container">
                    <div class="row" style="text-align: center;max-width: 600px; margin: auto;padding: 30px">
                        <h1 style="color:#15563f"><strong>FEATURES</strong></h1>
                       <div class="hr-theme-slash-2">
                          <div class="hr-line"></div>
                          <div class="hr-icon"><span style="font-size: 30px;">.</span><span style="font-size: 50px;margin: 0px 2px;">.</span><span style="font-size: 30px;">.</span></div>
                          <div class="hr-line"></div>
                        </div>
                        <p style="color: #706f6f; font-size: 20px;">"When you have got something to prove, There is nothing 
                            <strong>greater than challenge</strong>"</p>
                    </div>

                    <div class="row text-center" style="margin-bottom:40px;padding-bottom: 20px;">
                      <div class="col-md-4">
                        <p><i class="fa fa-credit-card fa-3x" style="color:#06774a"></i></p>
                        <h3>Reserve Club</h3>
                        <p>You Can Reserve Club Online</p>
                          <br>
                        <a class="link-as-button">Reserve Now</a>

                      </div>
                      <div class="col-md-4">
                        <p><i class="fa fa-calendar-o fa-3x" style="color:#06774a"></i></p>
                        <h3>Create Event</h3>
                        <p>You can Create Event</p>
                        <br>
                        <a class="link-as-button">Create Now</a>
                        
                      </div>
                      <div class="col-md-4">
                        <p><i class="fa fa-user-o fa-3x" style="color:#06774a"></i></p>
                        <h3>Create Chalenge</h3>
                        <p>You can Create Chalenge</p>
                        <br>
                        <a class="link-as-button">Create Now</a>
                      </div>
                    </div>
                </div>       
            </section>
            <section class="counter-section text-center"> 
              <div class="counter-overlay ">
                <div class="container text-center" style="margin-bottom: 40px;">
                   <!--  <div class="row" style="padding-bottom: 40px">

                            <div class="col-md-4" >
                                <h2 style="color: #fff;font-weight: 500">Players Joined</h2>
                                <h1 style="color: #fff">235</h1>
                                <i style="font-size: 40px; color: #fff" class="fa fa-user"></i>
                            </div>
                            <div class="col-md-4">
                                <h2 style="color: #fff;font-weight: 500">Players Joined</h2>
                                <h1 style="color: #fff">235</h1>
                                <i style="font-size: 40px; color: #fff" class="fa fa-user"></i>
                            </div>
                            <div class="col-md-4">
                                <h2 style="color: #fff;font-weight: 500"> Players Joined</h2>
                                <h1 style="color: #fff">235</h1>
                                <i style="font-size: 40px; color: #fff" class="fa fa-user"></i>
                            </div>

                        
                    </div>  --> 

                    <div class="wrapper">
                      <div class="counter col-md-3">
                        <i class="fa fa-user fa-3x"></i>
                        <h2 class="timer count-title count-number" data-to="300" data-speed="1500"></h2>
                         <p class="count-text ">Registered Players</p>
                      </div>

                      <div class="counter col-md-3">
                        <i class="fa fa-user fa-3x"></i>
                        <h2 class="timer count-title count-number" data-to="1700" data-speed="1500"></h2>
                        <p class="count-text ">Registered Courts</p>
                      </div>

                      <div class="counter col-md-3">
                        <i class="fa fa-user fa-3x"></i>
                        <h2 class="timer count-title count-number" data-to="11900" data-speed="1500"></h2>
                        <p class="count-text ">Events Completed</p>
                      </div>

                      <div class="counter col-md-3 end">
                        <i class="fa fa-user fa-3x"></i>
                        <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
                        <p class="count-text ">Challenges Completed</p>
                      </div>
                  </div>
                                      
                </div> 
                <a href="" style="margin-top: 30px" class="link-as-button">Join us Now</a>               
              </div>              
                
            </section>
            <section >
                <div class="container">
                    <div class="row" style="text-align: center;max-width: 600px; margin: auto;padding: 30px">
                        <h1 style="color:#15563f"><strong>START PLAYING</strong></h1>
                         <div class="hr-theme-slash-2">
                          <div class="hr-line"></div>
                          <div class="hr-icon"><span style="font-size: 30px;">.</span><span style="font-size: 50px;margin: 0px 2px;">.</span><span style="font-size: 30px;">.</span></div>
                          <div class="hr-line"></div>
                        </div>
                        <p style="color: #706f6f; font-size: 20px;">The competition is open to everyone. Want to 
                            <strong>get in?</strong>
                        </p>
                    </div>


                    <!-- start PC row -->
                    <div class="row text-center hidden-xs hidden-sm flow1-div">
                        <div class="col-md-3 " style="padding: 0px">
                            <div class="flow2-div">
                                <div class="flow-div" style="background-color: #eed502; ">
                                    <i class="fa fa-user" ></i>
                                </div> 
                                <div style="padding-top: 25px;">
                                    <p style="">Sign Up for FREE</p>  
                                </div>
                            </div>
                            

                            <div class="hr">
                              <div class="hr-line"></div>
                              <div class="hr-icon"><i class="fa fa-caret-right"></i></div>
                              <div class="hr-line"></div>
                            </div>                     
                        </div>

                         <div class="col-md-3" style="padding: 0px">
                            <div class="flow2-div">
                                <div class="flow-div" style="background-color: #86c586">
                                    <i class="fa fa-user"></i>
                                </div> 
                                <div style="padding-top: 25px;">
                                    <p>Find A Court</p>   
                                </div>  
                            </div>
                            <div class="hr">
                              <div class="hr-line"></div>
                              <div class="hr-icon"><i class="fa fa-caret-right"></i></div>
                              <div class="hr-line"></div>
                            </div>                            
                        </div>

                         <div class="col-md-3" style="padding: 0px">
                            <div class="flow2-div">
                                <div class="flow-div" style="background-color: #e87b74">
                                    <i class="fa fa-user" ></i>
                                </div> 
                                <div style="padding-top: 25px;">
                                    <p>Invite Players</p> 
                                </div>
                            </div>
                            <div class="hr" style="position: relative">
                              <div class="hr-line"></div>
                              <div class="hr-icon"><i class="fa fa-caret-right"></i></div>
                              <div class="hr-line"></div>
                            </div>                                
                        </div>

                         <div class="col-md-3" class="flow-last" style="">
                            <div class="flow2-div">
                                <div class="flow-div" style="background-color: #0989bf">
                                    <i class="fa fa-user" ></i>
                                </div> 
                                <div style="padding-top: 25px;">
                                     <p>Play A Match</p> 
                                </div> 
                            </div>                          
                        </div>
                       
                    </div>
                    <!-- end PC row -->

                    <!-- start mobile row -->
                    <div class="row text-center hidden-md hidden-lg" >
                        <div class="col-md-3 " style="padding: 0px">
                            <div style="width: 115px;    margin: auto;">
                                <div class="flow-div" style="background-color: #eed502; ">
                                    <i class="fa fa-user"></i>
                                </div> 
                                <div style="padding-top: 25px;">
                                    <p style="">Sign Up for FREE</p>  
                                </div>
                            </div>                                                
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-3" style="padding: 0px">
                            <div style="width: 115px;   margin: auto;">
                                <div class="flow-div" style="background-color: #86c586">
                                    <i class="fa fa-user" ></i>
                                </div> 
                                <div style="padding-top: 25px;">
                                    <p>Find A Court</p>   
                                </div>  
                            </div>                                                      
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-3" style="padding: 0px">
                            <div style="width: 115px;    margin: auto;">
                                <div class="flow-div" style="background-color: #e87b74">
                                    <i class="fa fa-user" ></i>
                                </div> 
                                <div style="padding-top: 25px;">
                                    <p>Invite Players</p> 
                                </div>
                            </div>                                                          
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-3" style="padding: 0px">
                            <div style="width: 115px;    margin: auto;">
                                <div class="flow-div" style="background-color: #0989bf">
                                    <i class="fa fa-user"></i>
                                </div> 
                                <div style="padding-top: 25px;">
                                     <p>Play A Match</p> 
                                </div> 
                            </div>                          
                        </div>
                       
                    </div>
                    <!-- end mobile row -->

                </div>
            </section>
            <!--- end content --->

    {{--------------------------------------------------------------------}}

@endsection