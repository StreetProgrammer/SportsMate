

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');


//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
*/

////////////////////////tooltip//////////////////////////////////////////////////////
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});


////////////////////////////////tabs java script/////////////////////////////////////

$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").hide();
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).fadeIn(2000)
        //$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        //$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});

$(document).ready(function() {
    $( "#g" ).click(function() {

    });
});
$(document).on('click','#DisplayAddGameForm',function(){
    //change button content (((( change icon from + to x --or-- from x to + ))))
        $(this).html(function(i, text){
          return text == '<i aria-hidden="true" class="fa fa-plus fa-2x"></i>' ? '<i aria-hidden="true" class="fa fa-close fa-2x"></i>' : '<i aria-hidden="true" class="fa fa-plus fa-2x"></i>';
      }) ;

      $(this).removeClass( "active" );

      $( "#AddGameForm" ).toggle( "slow" );

});


////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
////////////////////////////handle rate of player and club /////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

////////////////////////////// start of stars part ///////////////////////
$(document).ready(function(){

  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });

  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });


  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');

    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }

    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    responseMessage(msg);

  });


});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
////////////////////////////// end of stars part ///////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start of player rate a player for event part ///////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function(){


    $("#RatePlayerBtn").click(function(e){

       e.preventDefault();
       $('#PlayerRateLoading').show();
       var Q_1, Q_1, Q_1, Q_1, Q_1, PlayerComment ;
       Q_1 = Q_1 = Q_1 = Q_1 = Q_1 = 0 ;
       PlayerComment = '' ;
       if (Q_1 = $('input:radio[name=Q_1]:checked').val() != null) {
           Q_1 = $('input:radio[name=Q_1]:checked').val() ;
       }else{
           Q_1 = 0 ;
       }
       if (Q_2 = $('input:radio[name=Q_2]:checked').val() != null) {
           Q_2 = $('input:radio[name=Q_2]:checked').val() ;
       }else{
           Q_2 = 0 ;
       }
       if (Q_3 = $('input:radio[name=Q_3]:checked').val() != null) {
           Q_3 = $('input:radio[name=Q_3]:checked').val() ;
       }else{
           Q_3 = 0 ;
       }
       if (Q_4 = $('input:radio[name=Q_4]:checked').val() != null) {
           Q_4 = $('input:radio[name=Q_4]:checked').val() ;
       }else{
           Q_4 = 0 ;
       }
       if (Q_5 = $('input:radio[name=Q_5]:checked').val() != null) {
           Q_5 = $('input:radio[name=Q_5]:checked').val() ;
       }else{
           Q_5 = 0 ;
       }

        PlayerComment = $('textarea[name=PlayerComment]').val();
        var _token = $('input[name=_token]').val();
        var Event = $('input[name=Event]').val();
        var rated_user_id = $('input[name=rated_user_id]').val();

      //Q_1: $('input:radio[name=Q_1]:checked').val(),
      //Q_2: $('input:radio[name=Q_2]:checked').val(),
      //Q_3: $('input:radio[name=Q_3]:checked').val(),
      //Q_4: $('input:radio[name=Q_4]:checked').val(),
      //Q_5: $('input:radio[name=Q_5]:checked').val(),

      console.log('Q_1 = ' + Q_1 + ' Q_1 = ' + Q_2 + ' Q_1 = ' + Q_3 + ' Q_1 = ' + Q_4 + ' Q_1 = ' + Q_5 + PlayerComment);
      //alert('Q_1 = ' + Q_1 + ' Q_1 = ' + Q_2 + ' Q_1 = ' + Q_3 + ' Q_1 = ' + Q_4 + ' Q_1 = ' + Q_5 + PlayerComment + ' ' + _token + ' ' + Event + ' ' + rated_user_id);
      //var load ;

      $.ajax({
         type:'POST',
         url:'/Rate/' + Event + '/Add',
         data:{Q_1:Q_1,
                Q_2:Q_2,
                Q_3:Q_3,
                Q_4:Q_4,
                Q_5:Q_5,
                comment:PlayerComment,
                _token:_token,
                rated_user_id:rated_user_id,
            },
         success:function(data){
            //alert(data);
            $('#PlayerRateLoading').hide();
            $('#ShowPlayerRateModal').hide() ;
            $('#RatePlayer').find('.modal-content').find('.modal-body').html('<i class="fa fa-check fa-3x" style="color:#f52;margin: 80px;font-size: 70px;"></i><hr style="border-bottom: 1px solid #f52;"><p><button type="button" style="background: #f52;color: #fff;" class="btn btn-default btn-xs" data-dismiss="modal"> Close</button></p>').fadeIn('slow');

            $('#result').load('http://127.0.0.1:8000/Event/' + Event + '/Result').fadeIn('slow');
         }
      });






    });
    ////////////////////////////// end of player rate a player for event part ///////////////////////

});
///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// End of player rate a player for event part /////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start of Add Game to Event event part //////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

    $(document).on('click', "#AddGameBtn", function (e) {
    //$("#AddGameBtn").on("click", function(e){
    //$("#AddGameBtn").click(function(e){

       e.preventDefault();
       console.log('true');
       $('#AddGameLoading').show();

        var _token = $('input[name=_token]').val();

        var EventType = $('input[name=EventType]').val();

        var MainEvent = $('input[name=MainEvent]').val();

        var OpinionBy = $('input[name=OpinionBy]').val();

        var CreatorScore = $('input[name=CreatorScore]').val();

        var CandidateScore = $('input[name=CandidateScore]').val();


      console.log('MainEvent = ' + MainEvent + ' OpinionBy = ' + OpinionBy + ' CreatorScore = ' + CreatorScore + ' CandidateScore = ' + CandidateScore + ' _token = ' + _token);
      //var load ;

      $.ajax({
         type:'POST',
         url:'/SubEvent/' + MainEvent + '/Add',
         data:{
                EventType:EventType,
                OpinionBy:OpinionBy,
                CreatorScore:CreatorScore,
                CandidateScore:CandidateScore,
                _token:_token,
            },
         success:function(data){
            //alert(data);
            $('#AddGameLoading').hide();

            $('#result').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Result').fadeIn('slow');
            $('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

         }
      });

    });



///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// End of Add Game to Event event part ////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start of refuse a Game to Event part ////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
$(document).on('click', ".refuseSuggestedGame", function (e) {
//$("#AddGameBtn").on("click", function(e){
//$("#AddGameBtn").click(function(e){
    $('#AddGameLoading').show();
   e.preventDefault();
   var _token = $('input[name=_token]').val();
   var MainEvent = $('input[name=MainEvent]').val();
   var id = $(this).attr('id');
   SubEvent = id.replace('refuseSuggestedGame', '')
   console.log(id);
   console.log('true');

   $.ajax({
      type:'POST',
      url:'/SubEvent/' + SubEvent + '/RefuseGame',

      data:{
             _token:_token,
         },
         success:function(data){
            //alert(data);
            $('#AddGameLoading').hide();

            $('#result').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Result').fadeIn('slow');
            $('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

         }
   });


});



///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// End of refuse a Game to Event part ////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start of Accept a Game to Event part ////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
$(document).on('click', ".accpetSuggestedGame", function (e) {
//$("#AddGameBtn").on("click", function(e){
//$("#AddGameBtn").click(function(e){
    $('#AddGameLoading').show();
   e.preventDefault();
   var _token = $('input[name=_token]').val();
   var MainEvent = $('input[name=MainEvent]').val();
   var id = $(this).attr('id');
   SubEvent = id.replace('accpetSuggestedGame', '')
   console.log(id);
   console.log('true');

   $.ajax({
      type:'POST',
      url:'/SubEvent/' + SubEvent + '/AcceptGame',

      data:{
             _token:_token,
         },
         success:function(data){
            alert(data);
            $('#AddGameLoading').hide();
            $('#result').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Result').fadeIn('slow');
            $('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

         }
   });


});



///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// End of Accept a Game to Event part /////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start of Delete a Game to Event part ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).on('click', ".deleteSuggestedGame", function (e) {
//$("#AddGameBtn").on("click", function(e){
//$("#AddGameBtn").click(function(e){
    $('#AddGameLoading').show();
   e.preventDefault();
   var _token = $('input[name=_token]').val();
   var MainEvent = $('input[name=MainEvent]').val();
   var id = $(this).attr('id');
   SubEvent = id.replace('deleteSuggestedGame', '')
   console.log(id);
   console.log('true');

   $.ajax({
      type:'POST',
      url:'/SubEvent/' + SubEvent + '/DeleteGame',

      data:{
             _token:_token,
         },
         success:function(data){
            alert(data);
            $('#AddGameLoading').hide();
            $('#result').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Result').fadeIn('slow');
            $('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

         }
   });


});

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// End of Delete a Game to Event part /////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// start Club Scripts ////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start fill area select on city change /////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


$(document).on('change','#governorate', function() {

        var city = $.trim($(this).find('option:selected').text()) ;
        //alert($(this).find('option:selected').text()) ;
        if ($(this).find('option:selected').val() == '') {

            swal({
              title: "Not Valid ?",
              text: "City Cannot be Empty !!!",
              icon: "warning",
              dangerMode: true,
            });

            $('#updateProfile').attr({
                disabled: 'disabled',

            });

        } else {
            //$('#loader').css('visibility', 'visible');
            $("#loader").show(300);
            $.get('/governorate/'+$(this).val(), function(data) {

                //console.log(data) ;
                $('#area').empty() ;
                //$('#p_address').empty() ;
                $('#p_address').attr('value','');

                $('#p_address').attr('value',city);
                $('#area').append('<option value="">Select Area</option>');

                $.each(data, function(index, element) {
                    //alert(element.a_en_name);
                    $('#area').append($('<option>').text(element.a_en_name).attr('value', element.id));
                });

            });
            $('#updateProfile').removeAttr('disabled');
        }
    //$('#loader').css('visibility', 'hidden');
    $("#loader").fadeOut(2000);

});
    $(document).on('change','#area', function() {

        if ($(this).find('option:selected').val() == '') {

            swal({
              title: "Not Valid ?",
              text: "Area Cannot be Empty !!!",
              icon: "warning",
              dangerMode: true,
            });

            $('#updateProfile').attr({
                disabled: 'disabled',

            });
        } else {

                var area = $.trim($(this).find('option:selected').text()) ;

                if ($('#governorate').find('option:selected').val() == '') {

                    swal({
                      title: "Not Valid ?",
                      text: "City Cannot be Empty !!!",
                      icon: "warning",
                      dangerMode: true,
                    });

                } else {
                    $("#loader").show(300);

                    var city = $.trim($('#governorate').find('option:selected').text()) ;

                    $('#p_address').attr('value', '');

                    $('#p_address').attr('value', city + ',' + area);

                    $('#updateProfile').removeAttr('disabled');
                }


        }

        $("#loader").fadeOut(2000);

});
///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// end fill area select on city change /////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start display small pop up on hover/////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


$(document).on({
    mouseenter: function () {
        $(this).css("color", "#757575"); //END FUNCTION
        $(this).next().fadeIn(300);
        //$(this).addClass('image-popout-shadow');
    },
    mouseleave: function () {
        $(this).css("color", "#3c8dbc");
        $(this).next().fadeOut(300); //END FUNCTION

    }
}, '.hoverAble');


///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// end display small pop up on hover /////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start display password on hover on eye icon/////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


$(document).on({
    mouseenter: function () {
        $(this).children('.fa').css("color", "#757575");
        $(this).css("border", "2px solid #757575"); //END FUNCTION
        $("input[name=password]").attr('type', 'text');
        //$(this).addClass('image-popout-shadow');
    },
    mouseleave: function () {
        $(this).children('.fa').css("color", "#3c8dbc");
        $(this).css("border", "2px solid #3c8dbc");
        $("input[name=password]").attr('type', 'password');

    }
}, '.showHidePass');


///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// end display password on hover on eye icon /////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////// start change from display details to edit details for Main info as  (club or branch)////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#showHideEdit", function () {

    if ( $(this).hasClass( "done" ) == false ) {
      $(this).addClass( "done" );
      //alert('done class ADDED') ;
      $('.editDetails').each(function(i, obj) {
          $(this).show( 300 );
      });
      $('.displayDetails').each(function(i, obj) {
          $(this).fadeOut();
      });
    } else {
      $(this).removeClass( "done" );
      //alert('done class REMOVED') ;
      $('.displayDetails').each(function(i, obj) {
          $(this).show( 300 );
      });
      $('.editDetails').each(function(i, obj) {
          $(this).fadeOut();
      });
    }
});

///////////////////////////////////////////////////////////////////////////////////////////////////
////////// end change from display details to edit details for Main info as  (club or branch)////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////// start change from display playgrounds details to Add new play ground form //////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#showHidePlaygrounds", function () {

    if ( $(this).hasClass( "done" ) == false ) {
      $(this).addClass( "done" );
      //alert('done class ADDED') ;
      $('.addNewPlayground').each(function(i, obj) {
          $(this).show( 300 );
      });
      $('.displayPlaygroundsDetails').each(function(i, obj) {
          $(this).fadeOut();
      });
    } else {
      $(this).removeClass( "done" );
      //alert('done class REMOVED') ;
      $('.displayPlaygroundsDetails').each(function(i, obj) {
          $(this).show( 300 );
      });
      $('.addNewPlayground').each(function(i, obj) {
          $(this).fadeOut();
      });
    }
});

///////////////////////////////////////////////////////////////////////////////////////////////////
////////// end change from display playgrounds details to Add new play ground form //////////////
///////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////////////////////////
///////////// start validate and [[ Update ]] club profile main data [[ before register]] /////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#UpdateClubMainInfo", function (e) {
  e.preventDefault();
  var errors = 0 ;

  var name = $("input[name=name]").val();

    if(name.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=name]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

  var c_phone = $("input[name=c_phone]").val();

    if(c_phone.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_phone]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var email = $("input[name=email]").val();

    if(email.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=email]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=email]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_city = $("select[name=c_city]").val();

    if(c_city.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_city]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_area = $("select[name=c_area]").val();

    if(c_area.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_area]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_address = $("input[name=c_address]").val();

    if(c_address.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_address]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var password = $("input[name=password]").val();

    /*if(password.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=password]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=password]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }*/

    if(errors === 0){
      $('#contentChangable').css('opacity', '0.6');
      $('.Loader').fadeIn();

      $("input[name=name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=email]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=password]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      var _token = $("input[name=_token]").val();
      var user_img = $("input[name=user_img]").val();
      var type = $("input[name=type]").val();
      var clubId = $("input[name=clubId]").val();
      var c_desc = $('textarea#c_desc').val();
      $.ajax({
          type:'POST',
          url:'/updateRegisterClubMainInfo',

          data:{
                 _token:_token,
                 type:type,
                 clubId:clubId,
                 name:name,
                 c_phone:c_phone,
                 email:email,
                 c_city:c_city,
                 c_area:c_area,
                 c_address:c_address,
                 password:password,
                 c_desc:c_desc,
             },
             success:function(data){
                //alert(data);
                 swal({
                    title: "Updated",
                    text: "Club Account Main Information Updated successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                //$('#clubUserName').text(data);
                $('#contentChangable').css('opacity', '1');
                $('.Loader').fadeOut();
                $('#contentChangable').load('/club/editMainRegisterInfo').fadeIn('slow');
                //$('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

             }
       });

    }else{

        swal({
            title: "Not Valid ?",
            text: "Check Errors, and try again !!!",
            icon: "warning",
            dangerMode: true,
        });

    }

});
///////////////////////////////////////////////////////////////////////////////////////////////////
/////////////// end validate and [[ Update ]] club profile main data [[ before register]] ////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////start [[ Update ]] club profile image [[ before register]]//////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#updateClubProfileImage", function (e) {
  e.preventDefault();
  //alert('done');
  $('#contentChangable').css('opacity', '0.6');
  $('.Loader').fadeIn();
      var _token = $("input[name=_token]").val();
      var clubId = $("input[name=clubId]").val();
      //var clubBranchId = $("input[name=clubBranchId]").val();
      var user_img = $("input[name=user_img]").val();
      $.ajax({
          type:'POST',
          url:'/updateRegisterClubPhoto',

          data:{
                 _token:_token,
                 clubId:clubId,
                 //clubBranchId:clubBranchId,
                 user_img:user_img,
             },
             success:function(data){

                //alert(data);
                 swal({
                    title: "Updated",
                    text: "Image Updated successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                //$('#clubUserName').text(data);
                $('#contentChangable').css('opacity', '1');
                $('.Loader').fadeOut();
                //$('.mainBranchInfo').load('/branches/' + clubBranchId + '/loadUpdateLogobanner/').fadeIn('slow');
                //$('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

             }
       });

});
///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// end [[ Update ]] club profile image [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
/////////// start [[ create ]] Playground record for Club [[ before register ]] ///////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#AddNewPlaygroundRegister", function (e) {
  e.preventDefault();
  var photosArr = [] ;
  $('.gallaryImg').each(function() {
    //alert( $(this).attr('src') );
    photosArr.push( $(this).attr('src') ) ;
  });
  console.log( photosArr ) ;
  //var features = $("input[name='features[]']").val();
  var features= [];

  $("input[name='features[]']:checked").each(function(){
    features.push($(this).val());
  });
  //alert(photosArr);
  console.log(photosArr) ;

  var errors = 0 ;

  var c_b_p_name = $("input[name=c_b_p_name]").val();

    if(c_b_p_name.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_p_name]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_p_name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

  var c_b_p_phone = $("input[name=c_b_p_phone]").val();

    if(c_b_p_phone.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_p_phone]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_p_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_p_sport_id = $("select[name=c_b_p_sport_id]").val();

    if(c_b_p_sport_id.replace(/\s/g,"") === ""){

          errors = 1;
        $("select[name=c_b_p_sport_id]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_p_sport_id]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_p_price_per_hour = $("input[name=c_b_p_price_per_hour]").val();

    if(c_b_p_price_per_hour.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_p_price_per_hour]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_p_price_per_hour]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_p_city = $("select[name=c_b_p_city]").val();

    if(c_b_p_city.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_b_p_city]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_p_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_p_area = $("select[name=c_b_p_area]").val();

    if(c_b_p_area.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_b_p_area]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_p_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_p_address = $("input[name=c_b_p_address]").val();

    if(c_b_p_address.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_p_address]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_p_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    if(errors === 0){
      $('.contentChangable').css('opacity', '0.6');
      $('.Loader').fadeIn();

      $("input[name=c_b_p_name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_b_p_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_b_p_sport_id]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_b_p_price_per_hour]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_p_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_p_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_b_p_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      var _token = $("input[name=_token]").val();
      var clubId = $("input[name=clubId]").val();
      var branchId = $("input[name=branchId]").val();
      var playgroundPhotos = photosArr ;
      //var c_b_banner = $("input[name=c_b_banner]").val();
      var c_b_p_desc = $('textarea#c_b_p_desc').val();

      $.ajax({
          type:'POST',
          url:'/club/StoreRegisterClubPlayground',

          data:{
                 _token:_token,
                 clubId:clubId,
                 branchId:branchId,
                 c_b_p_name:c_b_p_name,
                 c_b_p_phone:c_b_p_phone,
                 c_b_p_sport_id:c_b_p_sport_id,
                 c_b_p_price_per_hour:c_b_p_price_per_hour,
                 c_b_p_city:c_b_p_city,
                 c_b_p_area:c_b_p_area,
                 c_b_p_address:c_b_p_address,
                 c_b_p_desc:c_b_p_desc,
                 photosArr:photosArr,
                 features:features,
             },
             success:function(data){
                console.log(data);
                //alert(data);
                 swal({
                    title: "Created",
                    text: "Playground Created successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                //$('#clubUserName').text(data);
                $('.contentChangable').css('opacity', '1');
                $('.Loader').fadeOut();
                $('#contentChangable').load('club/registerAddBranch').fadeIn('slow');
                //$('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

             }
       });

    }else{

        swal({
            title: "Not Valid ?",
            text: "Check Errors, and try again !!!",
            icon: "warning",
            dangerMode: true,
        });

    }

});
///////////////////////////////////////////////////////////////////////////////////////////////////
/////////////// end [[ create ]] Playground record for Club before [[ register ]] /////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////
/////////// start [[ update ]] Playground record for Club [[ before register ]] ///////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#updatePlaygroundRegister", function (e) {
  e.preventDefault();

  var features= [];

  $("input[name='features[]']:checked").each(function(){
    features.push($(this).val());
  });

  var errors = 0 ;

  var c_b_p_name = $("input[name=c_b_p_name]").val();

    if(c_b_p_name.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_p_name]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_p_name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

  var c_b_p_phone = $("input[name=c_b_p_phone]").val();

    if(c_b_p_phone.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_p_phone]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_p_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_p_sport_id = $("select[name=c_b_p_sport_id]").val();

    if(c_b_p_sport_id.replace(/\s/g,"") === ""){

          errors = 1;
        $("select[name=c_b_p_sport_id]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_p_sport_id]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_p_price_per_hour = $("input[name=c_b_p_price_per_hour]").val();

    if(c_b_p_price_per_hour.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_p_price_per_hour]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_p_price_per_hour]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_p_city = $("select[name=c_b_p_city]").val();

    if(c_b_p_city.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_b_p_city]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_p_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_p_area = $("select[name=c_b_p_area]").val();

    if(c_b_p_area.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_b_p_area]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_p_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_p_address = $("input[name=c_b_p_address]").val();

    if(c_b_p_address.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_p_address]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_p_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    if(errors === 0){
      $('.contentChangable').css('opacity', '0.6');
      $('.Loader').fadeIn();

      $("input[name=c_b_p_name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_b_p_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_b_p_sport_id]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_b_p_price_per_hour]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_p_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_p_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_b_p_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      var _token = $("input[name=_token]").val();
      var playgroundId = $("input[name=playgroundId]").val();
      var branchId = $("input[name=branchId]").val();
      //var playgroundPhotos = photosArr ;
      //var c_b_banner = $("input[name=c_b_banner]").val();
      var c_b_p_desc = $('textarea#c_b_p_desc').val();

      $.ajax({
          type:'POST',
          url:'/UpdateRegisterClubPlayground',

          data:{
                 _token:_token,
                 playgroundId:playgroundId,
                 branchId:branchId,
                 c_b_p_name:c_b_p_name,
                 c_b_p_phone:c_b_p_phone,
                 c_b_p_sport_id:c_b_p_sport_id,
                 c_b_p_price_per_hour:c_b_p_price_per_hour,
                 c_b_p_city:c_b_p_city,
                 c_b_p_area:c_b_p_area,
                 c_b_p_address:c_b_p_address,
                 c_b_p_desc:c_b_p_desc,
                 features:features,
             },
             success:function(data){
                console.log(data);
                //alert(data);
                 swal({
                    title: "Upated",
                    text: "Playground Upated successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                //$('#clubUserName').text(data);
                $('.contentChangable').css('opacity', '1');
                $('.Loader').fadeOut();
                //$('#contentChangable').load('club/registerAddBranch').fadeIn('slow');
                //$('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

             }
       });

    }else{

        swal({
            title: "Not Valid ?",
            text: "Check Errors, and try again !!!",
            icon: "warning",
            dangerMode: true,
        });

    }

});
///////////////////////////////////////////////////////////////////////////////////////////////////
/////////////// end [[ update ]] Playground record for Club before [[ register ]] /////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// start [[ Delete ]] club Playground by Playground Id [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', ".DeletePlayground", function () {
  var PlaygroundId = $(this).attr('id');
  $('#contentChangable').fadeOut('200');
  $('.Loader').fadeIn();
  var _token = $("input[name=_token]").val();
     $.ajax({
          type:'POST',
          url:'/club/DeleteRegisterClubPlayground',

          data:{
                 _token:_token,
                 PlaygroundId:PlaygroundId,
             },
             success:function(data){
                console.log(data);
                //alert(data);
                 swal({
                    title: "Deleted",
                    text: "Playground Deleted successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                  $('.Loader').delay( 500 ).fadeOut();
                  $('#contentChangable').load('/club/registerAddBranch').fadeIn('slow');
                  $('#contentChangable').fadeIn('200');
             }
       });
});

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// end [[ Delete ]] club Playground by Branch Id [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// start [[ Delete ]] club Branch by Branch Id [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', ".DeleteBranch", function () {
  var BranchId = $(this).attr('id');
  $('#contentChangable').fadeOut('200');
  $('.Loader').fadeIn();
  var _token = $("input[name=_token]").val();
     $.ajax({
          type:'POST',
          url:'/club/DeleteRegisterClubBranch',

          data:{
                 _token:_token,
                 BranchId:BranchId,
             },
             success:function(data){
                console.log(data);
                //alert(data);
                 swal({
                    title: "Deleted",
                    text: "Branch Deleted successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                  $('.Loader').delay( 500 ).fadeOut();
                  $('#contentChangable').load('/club/registerAddBranch').fadeIn('slow');
                  $('#contentChangable').fadeIn('200');
             }
       });
});

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// end [[ Delete ]] club Branch by Branch Id [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////// start handle [[ Edit ]] club Branch view by Branch Id [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#updateBranchRegister", function (e) {
  e.preventDefault();
  var errors = 0 ;

  var c_b_name = $("input[name=c_b_name]").val();

    if(c_b_name.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_name]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

  var c_b_phone = $("input[name=c_b_phone]").val();

    if(c_b_phone.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_phone]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_city = $("select[name=c_b_city]").val();

    if(c_b_city.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_b_city]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_area = $("select[name=c_b_area]").val();

    if(c_b_area.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_b_area]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_address = $("input[name=c_b_address]").val();

    if(c_b_address.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_address]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    if(errors === 0){
      $('#contentChangable').fadeOut('200');
      $('.Loader').fadeIn();

      $("input[name=c_b_name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_b_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      var _token       = $("input[name=_token]").val();
      var clubBranch   = $("input[name=clubBranch]").val();
      var c_b_desc     = $('textarea#c_b_desc').val();

      $.ajax({
          type:'POST',
          url:'/club/updateRegisterClubBranch',

          data:{
                 _token:_token,
                 clubBranch:clubBranch,
                 c_b_name:c_b_name,
                 c_b_phone:c_b_phone,
                 c_b_city:c_b_city,
                 c_b_area:c_b_area,
                 c_b_address:c_b_address,
                 c_b_desc:c_b_desc,
             },
             success:function(data){
                console.log(data);
                //alert(data);
                 swal({
                    title: "Updated",
                    text: "Branch Updated successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                $('.Loader').delay( 500 ).fadeOut();

                $('#contentChangable').load('/club/' + clubBranch + '/DisplayEditBranchRegister').fadeIn('slow');
                $('#contentChangable').fadeIn('200');

             }
       });

    }else{

        swal({
            title: "Not Valid ?",
            text: "Check Errors, and try again !!!",
            icon: "warning",
            dangerMode: true,
        });

    }

});

///////////////////////////////////////////////////////////////////////////////////////////////////
////////// end handle [[ Edit ]] club Branch view by Branch Id [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
/////////// start [[ create ]] Playground record for Club [[ before register ]] ///////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#AddNewBranchRegister", function (e) {
  e.preventDefault();
  var errors = 0 ;

  var c_b_name = $("input[name=c_b_name]").val();

    if(c_b_name.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_name]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

  var c_b_phone = $("input[name=c_b_phone]").val();

    if(c_b_phone.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_phone]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_city = $("select[name=c_b_city]").val();

    if(c_b_city.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_b_city]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_area = $("select[name=c_b_area]").val();

    if(c_b_area.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_b_area]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_address = $("input[name=c_b_address]").val();

    if(c_b_address.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_address]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    if(errors === 0){
      $('.contentChangable').css('opacity', '0.6');
      $('.Loader').fadeIn();

      $("input[name=c_b_name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_b_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      var _token = $("input[name=_token]").val();
      var clubId = $("input[name=clubId]").val();
      //var c_b_logo = $("input[name=c_b_logo]").val();
      //var c_b_banner = $("input[name=c_b_banner]").val();
      var c_b_desc = $('textarea#c_b_desc').val();

      $.ajax({
          type:'POST',
          url:'/club/StoreRegisterClubBranch',

          data:{
                 _token:_token,
                 clubId:clubId,
                 c_b_name:c_b_name,
                 c_b_phone:c_b_phone,
                 c_b_city:c_b_city,
                 c_b_area:c_b_area,
                 c_b_address:c_b_address,
                 c_b_desc:c_b_desc,
                 //c_b_logo:c_b_logo,
                 //c_b_banner:c_b_banner,
             },
             success:function(data){
                console.log(data);
                //alert(data);
                 swal({
                    title: "Created",
                    text: "Branch Created successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                //$('#clubUserName').text(data);
                $('.contentChangable').css('opacity', '1');
                $('.Loader').fadeOut();
                $('#contentChangable').load('club/registerAddBranch').fadeIn('slow');
                //$('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

             }
       });

    }else{

        swal({
            title: "Not Valid ?",
            text: "Check Errors, and try again !!!",
            icon: "warning",
            dangerMode: true,
        });

    }

});
///////////////////////////////////////////////////////////////////////////////////////////////////
/////////////// end [[ create ]] Playground record for Club [[ before register ]] /////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// start display [[ Add ]] Playground view by Branch Id [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', ".AddPlaygroundRegister", function () {
  var BranchId = $(this).attr('id');
  $('#contentChangable').fadeOut('200');
  $('.Loader').fadeIn();


  $('.Loader').delay( 500 ).fadeOut();

  $('#contentChangable').load('/club/' + BranchId + '/DisplayAddPlaygroundRegister').fadeIn('slow');
  $('#contentChangable').fadeIn('200');
});

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// end display [[ Add ]] Playground view by Branch Id [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// start display [[ Edit ]] Playground view by Playground Id [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', ".DisplayEditPlayground", function () {
  var PlaygroundId = $(this).attr('id');
  $('#contentChangable').fadeOut('200');
  $('.Loader').fadeIn();


  $('.Loader').delay( 500 ).fadeOut();

  $('#contentChangable').load('/club/' + PlaygroundId + '/DisplayEditPlaygroundRegister').fadeIn('slow');
  $('#contentChangable').fadeIn('200');
});

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// end display [[ Edit ]] Playground view by Playground Id [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// start display [[ Edit ]] club Branch view by Branch Id [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', ".DisplayEditBranch", function () {
  var BranchId = $(this).attr('id');
  $('#contentChangable').fadeOut('200');
  $('.Loader').fadeIn();


  $('.Loader').delay( 500 ).fadeOut();

  $('#contentChangable').load('/club/' + BranchId + '/DisplayEditBranchRegister').fadeIn('slow');
  $('#contentChangable').fadeIn('200');
});

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// end display [[ Edit ]] club Branch view by Branch Id [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// start [[ display ]] club profile Edit Part [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#ShowEditPart", function () {
  //alert('done') ;
  $('#contentChangable').fadeOut('200');
  $('.Loader').fadeIn();


  $('.Loader').delay( 500 ).fadeOut();

  $('#contentChangable').load('/club/editMainRegisterInfo').fadeIn('slow');
  $('#contentChangable').fadeIn('200');
});

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// end [[ display ]] club profile Edit Part [[ before register]]/////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
//// start [[ display ]] club Manage [[ add edit branches && courts ]] Part [[ before register]]///
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', ".ShowManagePart", function () {
  //alert('done') ;
  $('#contentChangable').fadeOut('200');
  $('.Loader').fadeIn();


  $('.Loader').delay( 500 ).fadeOut();

  $('#contentChangable').load('/club/registerAddBranch').fadeIn('slow');
  $('#contentChangable').fadeIn('200');
});

///////////////////////////////////////////////////////////////////////////////////////////////////
//// end [[ display ]] club Manage [[ add edit branches && courts ]] Part [[ before register]]/////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start validate and update club profile main data //////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#EditClubMainInfo", function (e) {
  e.preventDefault();
  var errors = 0 ;

  var name = $("input[name=name]").val();

    if(name.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=name]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

  var c_phone = $("input[name=c_phone]").val();

    if(c_phone.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_phone]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_city = $("select[name=c_city]").val();

    if(c_city.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_city]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_area = $("select[name=c_area]").val();

    if(c_area.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_area]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_address = $("input[name=c_address]").val();

    if(c_address.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_address]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    if(errors === 0){
      $('.mainInfo').css('opacity', '0.6');
      $('.mainInfoLoader').fadeIn();

      $("input[name=name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      var _token = $("input[name=_token]").val();
      var clubId = $("input[name=clubId]").val();
      var c_desc = $('textarea#c_desc').val();
      var editData = {
           'name':name,
           'c_phone':c_phone,
           'c_city':c_city,
           'c_area':c_area,
           'c_address':c_address,
           'c_desc':c_desc
      }
      $.ajax({
          type:'POST',
          url:'/club/clubProfileEdit',

          data:{
                 _token:_token,
                 editData:editData,
                 clubId:clubId,
                 name:name,
                 c_phone:c_phone,
                 c_city:c_city,
                 c_area:c_area,
                 c_address:c_address,
                 c_desc:c_desc
             },
             success:function(data){
                //alert(data);
                 swal({
                    title: "Updated",
                    text: "Profile Main Info Updated successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                $('#clubUserName').text(name);
                $('.mainInfo').css('opacity', '1');
                $('.mainInfoLoader').fadeOut();
                $('.mainInfo').load('/maininfodivload/club').fadeIn('slow');
                //$('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

             }
       });

    }else{

        swal({
            title: "Not Valid ?",
            text: "Check Errors, and try again !!!",
            icon: "warning",
            dangerMode: true,
        });

    }

});
///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// end validate and update club profile main data//////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start update club  activate status  //////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#EditActiveStatus", function (e) {
  e.preventDefault();
  $('.imageInfo').css('opacity', '0.6');
  $('.imageInfoLoader').fadeIn();
      var _token = $("input[name=_token]").val();
      var target = $("input[name=target]").val();
      var status = $("input[name=status]").val();
      $.ajax({
          type:'POST',
          url:'/club/clubProfileEdit',

          data:{
                 _token:_token,
                 target:target,
                 status:status,
             },
             success:function(data){

                //alert(data);
                 swal({
                    title: "Updated",
                    text: "Profile Activation Status Updated successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                //$('#clubUserName').text(data);
                $('.imageInfo').css('opacity', '1');
                $('.imageInfoLoader').fadeOut();
                $('.imageInfo').load('/imageinfodivload/club').fadeIn('slow');
                //$('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

             }
       });

});
///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// end update club  activate status //////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start display cam button to change img//////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


$(document).on({
    mouseenter: function () {
      //alert('done');
        //$(this).css("color", "#757575"); //END FUNCTION
        $(this).next().fadeIn(300);
        //$(this).addClass('image-popout-shadow');
    },
    mouseleave: function () {
        //alert('done');
        //$(this).css("color", "#3c8dbc");
        $(this).next().fadeOut(300); //END FUNCTION

    }
}, '.displayCamIcon');


///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// end display cam button to change img ///////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start create Branch record for auth Club //////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#createBranch", function (e) {
  e.preventDefault();
  var errors = 0 ;

  var c_b_name = $("input[name=c_b_name]").val();

    if(c_b_name.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_name]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

  var c_b_phone = $("input[name=c_b_phone]").val();

    if(c_b_phone.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_phone]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_city = $("select[name=c_b_city]").val();

    if(c_b_city.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_b_city]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_area = $("select[name=c_b_area]").val();

    if(c_b_area.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_b_area]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_address = $("input[name=c_b_address]").val();

    if(c_b_address.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_address]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    if(errors === 0){
      $('.mainInfo').css('opacity', '0.6');
      $('.mainInfoLoader').fadeIn();

      $("input[name=c_b_name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_b_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      var _token = $("input[name=_token]").val();
      var clubId = $("input[name=clubId]").val();
      var c_b_logo = $("input[name=c_b_logo]").val();
      var c_b_banner = $("input[name=c_b_banner]").val();
      var c_b_desc = $('textarea#c_b_desc').val();

      $.ajax({
          type:'POST',
          url:'/branches/club/store',

          data:{
                 _token:_token,
                 clubId:clubId,
                 c_b_name:c_b_name,
                 c_b_phone:c_b_phone,
                 c_b_city:c_b_city,
                 c_b_area:c_b_area,
                 c_b_address:c_b_address,
                 c_b_desc:c_b_desc,
                 c_b_logo:c_b_logo,
                 c_b_banner:c_b_banner,
             },
             success:function(data){
                console.log(data);
                //alert(data);
                 swal({
                    title: "Created",
                    text: "Branch Created successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                $('#clubUserName').text(data);
                $('.mainInfo').css('opacity', '1');
                $('.mainInfoLoader').fadeOut();
                //$('.mainInfo').load('/maininfodivload/club').fadeIn('slow');
                //$('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

             }
       });

    }else{

        swal({
            title: "Not Valid ?",
            text: "Check Errors, and try again !!!",
            icon: "warning",
            dangerMode: true,
        });

    }

});
///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// end create Branch record for auth Club//////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start Update Branch record for auth Club //////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#EditclubBrancheMainInfo", function (e) {
  e.preventDefault();
  var errors = 0 ;

  var c_b_name = $("input[name=c_b_name]").val();

    if(c_b_name.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_name]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

  var c_b_phone = $("input[name=c_b_phone]").val();

    if(c_b_phone.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_phone]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_city = $("select[name=c_b_city]").val();

    if(c_b_city.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_b_city]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_area = $("select[name=c_b_area]").val();

    if(c_b_area.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_b_area]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_address = $("input[name=c_b_address]").val();

    if(c_b_address.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_address]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    if(errors === 0){
      $('.mainBranchInfo').css('opacity', '0.6');
      $('.mainInfoLoader').fadeIn();

      $("input[name=c_b_name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_b_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      var _token     = $("input[name=_token]").val();
      var clubId     = $("input[name=clubId]").val();
      var branchId   = $("input[name=branchId]").val();
      var c_b_logo   = $("input[name=c_b_logo]").val();
      var c_b_banner = $("input[name=c_b_banner]").val();
      var c_b_desc   = $('textarea#c_b_desc').val();

      $.ajax({
          type:'POST',
          url:'/branches/club/update',

          data:{
                 _token:_token,
                 clubId:clubId,
                 branchId:branchId,
                 c_b_name:c_b_name,
                 c_b_phone:c_b_phone,
                 c_b_city:c_b_city,
                 c_b_area:c_b_area,
                 c_b_address:c_b_address,
                 c_b_desc:c_b_desc,
                 c_b_logo:c_b_logo,
                 c_b_banner:c_b_banner,
             },
             success:function(data){
                console.log(data);
                //alert(data);
                 swal({
                    title: "Created",
                    text: "Branch Created successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                $('#clubUserName').text(data);
                $('.mainBranchInfo').css('opacity', '1');
                $('.mainInfoLoader').fadeOut();
                $('.mainBranchInfo').load('/branches/' + branchId + '/loadUpdateMainDiv/').fadeIn('slow');
                //$('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

             }
       });

    }else{

        swal({
            title: "Not Valid ?",
            text: "Check Errors, and try again !!!",
            icon: "warning",
            dangerMode: true,
        });

    }

});
///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// end Update Branch record for auth Club//////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start update branch logo image  //////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#ChangeBranchLogo", function (e) {
  e.preventDefault();
  //alert('done');
  $('.imageInfoDiv').css('opacity', '0.6');
  $('.logoUpload').fadeIn();
      var _token = $("input[name=_token]").val();
      var clubId = $("input[name=clubId]").val();
      var type   = $("input[name=logoType]").val();
      var clubBranchId = $("input[name=clubBranchId]").val();
      var image = $("input[name=c_b_logo]").val();
      $.ajax({
          type:'POST',
          url:'/branches/updateLogoBannerImage',

          data:{
                 _token:_token,
                 clubId:clubId,
                 type:type,
                 clubBranchId:clubBranchId,
                 image:image,
             },
             success:function(data){

                //alert(data);
                 swal({
                    title: "Updated",
                    text: "Image Updated successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                //$('#clubUserName').text(data);
                $('.imageInfoDiv').css('opacity', '1');
                $('.logoUpload').fadeOut();
                $('.mainBranchInfo').load('/branches/' + clubBranchId + '/loadUpdateLogobanner/').fadeIn('slow');
                //$('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

             }
       });

});
///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// end update branch logo image //////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start update branch banner image  //////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#ChangeBranchBanner", function (e) {
  e.preventDefault();
  //alert('done');
  $('.imageInfoDiv').css('opacity', '0.6');
  $('.logoUpload').fadeIn();
      var _token = $("input[name=_token]").val();
      var clubId = $("input[name=clubId]").val();
      var type   = $("input[name=bannerType]").val();
      var clubBranchId = $("input[name=clubBranchId]").val();
      var image = $("input[name=c_b_banner]").val();
      $.ajax({
          type:'POST',
          url:'/branches/updateLogoBannerImage',

          data:{
                 _token:_token,
                 clubId:clubId,
                 type:type,
                 clubBranchId:clubBranchId,
                 image:image,
             },
             success:function(data){

                //alert(data);
                 swal({
                    title: "Updated",
                    text: "Image Updated successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                //$('#clubUserName').text(data);
                $('.imageInfoDiv').css('opacity', '1');
                $('.logoUpload').fadeOut();
                $('.imageInfoDiv').load('/branches/' + clubBranchId + '/loadUpdateLogobanner/').fadeIn('slow');
                //$('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

             }
       });

});
///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// end update branch banner image //////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// start create Playground record for auth Club //////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click', "#EditclubBrancheMainInfo", function (e) {
  e.preventDefault();
  var errors = 0 ;

  var c_b_name = $("input[name=c_b_name]").val();

    if(c_b_name.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_name]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

  var c_b_phone = $("input[name=c_b_phone]").val();

    if(c_b_phone.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_phone]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_city = $("select[name=c_b_city]").val();

    if(c_b_city.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_b_city]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_area = $("select[name=c_b_area]").val();

    if(c_b_area.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=c_b_area]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=c_b_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var c_b_address = $("input[name=c_b_address]").val();

    if(c_b_address.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=c_b_address]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=c_b_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    if(errors === 0){
      $('.mainInfo').css('opacity', '0.6');
      $('.mainInfoLoader').fadeIn();

      $("input[name=c_b_name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=c_b_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=c_b_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      var _token = $("input[name=_token]").val();
      var clubId = $("input[name=clubId]").val();
      var c_b_logo = $("input[name=c_b_logo]").val();
      var c_b_banner = $("input[name=c_b_banner]").val();
      var c_b_desc = $('textarea#c_b_desc').val();

      $.ajax({
          type:'POST',
          url:'/branches/club/store',

          data:{
                 _token:_token,
                 clubId:clubId,
                 c_b_name:c_b_name,
                 c_b_phone:c_b_phone,
                 c_b_city:c_b_city,
                 c_b_area:c_b_area,
                 c_b_address:c_b_address,
                 c_b_desc:c_b_desc,
                 c_b_logo:c_b_logo,
                 c_b_banner:c_b_banner,
             },
             success:function(data){
                console.log(data);
                //alert(data);
                 swal({
                    title: "Created",
                    text: "Branch Created successfuly !!!",
                    icon: "success",
                    dangerMode: false,
                });
                $('#clubUserName').text(data);
                $('.mainInfo').css('opacity', '1');
                $('.mainInfoLoader').fadeOut();
                //$('.mainInfo').load('/maininfodivload/club').fadeIn('slow');
                //$('#EventGames').load('http://127.0.0.1:8000/Event/' + MainEvent + '/Games').fadeIn('slow');

             }
       });

    }else{

        swal({
            title: "Not Valid ?",
            text: "Check Errors, and try again !!!",
            icon: "warning",
            dangerMode: true,
        });

    }

});
///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// end create Playground record for auth Club//////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// end Club Scripts //////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
