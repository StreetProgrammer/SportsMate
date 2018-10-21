//////////////////////////////////////////////////////////////////////////////////////
/////////////////////////// start change tabs and contents ///////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
$(document).on('click', ".evechares", function (e) {
  //alert('ddd');
  var type = $(this).attr('id');
  var user_id = $("input[name=user_id]").val() ;
  //alert(filter) ;
  $('.' + type).show();

  if($(this).hasClass('tab-li')){ //this is the start of our condition 
      $('.col-xs-4 span.evechares').addClass('tab-li');
      $('.col-xs-4 span.evechares').removeClass('tab-li-focus');           
      $(this).removeClass('tab-li');
      $(this).addClass('tab-li-focus');

      //var type = 'evechares' ;
      var sport = 0 ;

      setTimeout(function(){ 
        $('#event-data-display').load('/getInfo/' + user_id + '-' + type + '-' + '-' + sport).fadeIn('slow');
        $('.' + type).hide();
      }, 1000);

  }
});
/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// start change tabs and contents //////////////////
/////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////
$(document).on('click', ".event", function (e) {
	var filter = $(this).attr('id');
	var user_id = $("input[name=user_id]").val() ;
	//alert(filter) ;
	$('.' + filter).show();

	if($(this).hasClass('tab-li')){ //this is the start of our condition 
	    $('.col-xs-3 span.event').addClass('tab-li');
	    $('.col-xs-3 span.event').removeClass('tab-li-focus');           
	    $(this).removeClass('tab-li');
	    $(this).addClass('tab-li-focus');

	    var type = 'event' ;
	    var sport = 0 ;

	    setTimeout(function(){ 
	    	$('#event-data-display').load('/getInfo/' + user_id+ '-' + type + '-' + filter + '-' + sport).fadeIn('slow');
	    	$('.' + filter).hide();
	    }, 1000);

	}
});

//////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
//////////////////start of proccess of profile image crop and upload///////////////
/////////////////////////////////////////////////////////////////////////////////

// start proccess of profile image crop and upload
  $image_crop = $('#player_photo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $(document).on('change', "#upload", function () {

    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    //alert('done') ;
    $('#uploadimageModal').modal('show');
  });
  // End proccess of profile image crop and upload

  //$('.crop_image').click(function(event){
  $(document).on('click', ".crop_image", function (event) {
    $('.imageInfo').css('opacity', '0.6');
    $('#imageInfoLoader').fadeIn();
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      var _token = $("input[name=_token]").val();
      var playerId = $("input[name=playerId]").val();
      $.ajax({
        url:"/player/changeProfilePhoto",
        type: "POST",
        data:{
          "image": response,
          "_token":_token,
          'playerId':playerId
        },
        success:function(data)
        {
          var upload = $("#upload");
          upload.replaceWith( upload = upload.clone( true ) );
          $('#uploadimageModal').modal('hide');
          $('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
          $('#imageInfo').css('opacity', '1');
          $('.imageInfoLoader').fadeOut();
          console.log(data.imgUrl);
        }
      });
    })
  });


/////////////////////////////////////////////////////////////////////////////////
//////////////////end of proccess of profile image crop and upload///////////////
/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
////////////////////start of update main profile info/////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
$(document).on('click', "#updatePlayerMainInfo", function (e) {
	$('#editMainInfoMessage').fadeOut();
  e.preventDefault();
  var errors = 0 ;
  
  var name = $("input[name=name]").val();

    if(name.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=name]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

  var p_phone = $("input[name=p_phone]").val();

    if(p_phone.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=p_phone]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=p_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var email = $("input[name=email]").val();

    if(email.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=email]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=email]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var p_city = $("select[name=p_city]").val();

    if(p_city.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=p_city]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=p_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var p_area = $("select[name=p_area]").val();

    if(p_area.replace(/\s/g,"") === ""){

        errors = 1;
        $("select[name=p_area]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("select[name=p_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var p_address = $("input[name=p_address]").val();

    if(p_address.replace(/\s/g,"") === ""){

          errors = 1;
        $("input[name=p_address]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    }else{
        $("input[name=p_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    }

    var password = $("input[name=password]").val();

    if(password.replace(/\s/g,"") === ""){

          //errors = 1;
        $("input[name=password]").css({border: '2px solid #e80f0f',background: '#b2e8b2'});

    }else{
    	
    	if (password.length < 6) {
    		errors = 1;
	        $("input[name=password]").css({border: '2px solid #e80f0f',background: '#f7e7e7'});

    	} else {
    		$("input[name=p_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
    	}
    	
    }

    if(errors === 0){
      $('.profileInfo').css('opacity', '0.6');
      $('#profileInfoLoader').fadeIn();

      $("input[name=name]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=p_phone]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=email]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=p_area]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("select[name=p_city]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=p_address]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      $("input[name=password]").css({border: '2px solid #5cb85c',background: '#b2e8b2'});
      var _token = $("input[name=_token]").val();
      var playerId = $("input[name=playerId]").val();
      var p_gender = $("input[name=p_gender]:checked").val();
      var p_preferred_gender = $("input[name=p_preferred_gender]:checked").val();
      var user_is_active = $("input[name=user_is_active]:checked").val();
      var p_born_date = $("input[name=p_born_date]").val();
      $.ajax({
          type:'POST',
          url:'/player/editMainInfo',

          data:{
          		playerId:playerId,
                _token:_token,
                name:name,
                email:email,
                p_phone:p_phone,
                p_city:p_city,
                p_area:p_area,
                p_address:p_address,
                p_gender:p_gender,
                p_preferred_gender:p_preferred_gender,
                p_born_date:p_born_date,
                password:password,
                user_is_active:user_is_active,
             },
             success:function(data){
             	console.log(data) ;
                if (data === 'true') {
	                $('.profileInfo').css('opacity', '1');
	                $('#profileInfoLoader').fadeOut();
	                $('#editMainInfoModal').modal('hide');                
	                $('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
                }else if(data === 'false') {
                	$('.profileInfo').css('opacity', '1');
	                $('#profileInfoLoader').fadeOut();
	                setTimeout(function() {
			        $('#editMainInfoMessage').show(800);
				    }, 2000);
	    			setTimeout(function() {
				        $('#editMainInfoMessage').hide();
				    }, 10000);
                }
                

             }
       });

    }else{

    	setTimeout(function() {
        $('#editMainInfoMessage').show(800);
	    }, 2000);
		setTimeout(function() {
	        $('#editMainInfoMessage').hide();
	    }, 10000);
    }

});
/////////////////////////////////////////////////////////////////////////////////
////////////////////end of update main profile info/////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
////////////////////start of player attach Sport/////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

$(document).on('change','#sportToAdd', function() {
	$('#sportsInfoLoader').fadeIn();
	var sportId = $(this).find('option:selected').val() ;
	var playerId = $("input[name=playerId]").val();
	var _token = $("input[name=_token]").val();
	if (sportId != '') {
		$.ajax({
	      type:'POST',
	      url:'/player/attachSport' ,
	      data:{
             	_token:_token,
             	sportId:sportId,
             	playerId:playerId,
         },
	    	success:function(data){
	    		//alert(sportId)
				$('#sportToAdd').find('[value="' + sportId + '"]').remove();
	    		$('#sportsInfoLoader').fadeOut();
	    		$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
	    		$('#getPlayerSports').load('/getPlayerSports/player/' + playerId);
	    		$('#sportseditModal').modal('show');
	            console.log(data) ;
	            //$('#AddGameLoading').hide();
	            
	         }
	   });
		
	}

});

/////////////////////////////////////////////////////////////////////////////////
////////////////////end of player attach Sport/////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
////////////////////start of player detach Sport/////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
$(document).on('click', ".detachSport", function () {

		var err = 0 ;
		var sportId = this.id ;
		var playerId = $("input[name=playerId]").val();
		
		//alert(sportId) ;
		$('#sportsInfoLoader').fadeIn();
		var _token = $("input[name=_token]").val();

		$.ajax({
	      type:'POST',
	      url:'/player/detachSport' ,
	      data:{
             	_token:_token,
             	sportId:sportId,
             	playerId:playerId,
         },
	    	success:function(data){
	    		$('#sportsInfoLoader').fadeOut();
	    		if (data == 'true') {
	    			$('#' + sportId ).parent().parent().parent().hide();
					//$('#' + sportId +'_sport_div').fadeOut();
					$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
					$('#getPlayerSports').load('/getPlayerSports/player/' + playerId);

	    		} else {
	    			$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
					$('#getPlayerSports').load('/getPlayerSports/player/' + playerId);
	    			setTimeout(function() {
			        $('#errors').show(800);
				    }, 2000);
	    			setTimeout(function() {
				        $('#errors').hide();
				    }, 10000);
	    		}
	    		$('#sportsInfoLoader').fadeOut();
	            //alert(data);
	            console.log(data) ;
	            //$('#AddGameLoading').hide();
	            
	         }
	   });

	});
/////////////////////////////////////////////////////////////////////////////////
////////////////////end of player detach Sport/////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
////////////////////start of player update Sport Role [player - trainer - refree]/////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

$(document).on('change','.sport_role', function() {
	var data =  new Array() ;
	var id = this.id ;
	var res = id.split("_");
	data['sport_id'] = res[0] ;
	data['role'] = res[1] ;
	if($( "#" + id ).is(":checked")){
		data['value'] = '1' ;
	}else{
		data['value'] = '0' ;
	}
	console.log(data);

	var playerId = $("input[name=playerId]").val();
	var _token = $("input[name=_token]").val();

	$.ajax({
      type:'POST',
      url:'/player/updateSportRole' ,
      data:{
         	_token:_token,
         	sportId:data['sport_id'] = res[0] ,
         	playerId:playerId,
         	role:data['role'] = 'as_' + res[1] ,
         	value:data['value'],
     },
    	success:function(data){
    		if (data == 'true') {
    			$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
    			$('#getPlayerSports').load('/getPlayerSports/player/' + playerId);
    		} else if(data == 'false') {
    			$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
    			$('#getPlayerSports').load('/getPlayerSports/player/' + playerId);
    			//$('#errors').fadeIn();
    			setTimeout(function() {
			        $('#sportErrors').show(800);
			    }, 2000);
    			setTimeout(function() {
			        $('#sportErrors').hide();
			    }, 10000);
    		}
    		
            console.log(data) ;
            
         }
   });

});

/////////////////////////////////////////////////////////////////////////////////
////////////////////end of player update Sport Role [player - trainer - refree]/////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
////////////////////start of add player vacant time /////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
$(document).on('click', "#addNewVacantTime", function (e) {
	e.preventDefault() ;
	$('#vacantInfoLoader').fadeIn();
	var err = 0 ;
	var day  =  $("select[name=day]").val();
	if (day == null || day == "" ) {
		err = 1 ;
	}
	var from  =  $("select[name=from]").val();
	if (from == null || from == "" ) {
		err = 1 ;
	}
	var to    =  $("select[name=to]").val();
	if (to == null || to == "" ) {
		err = 1 ;
	}
	var diff = parseInt(to) - parseInt(from) ;
	if ( Math.sign(diff) != 1 ) {
		err = 1
	}
	//alert( date + ' ' + from + ' ' + to);
	//alert(err) ;
	if(err == 0){
		var _token = $("input[name=_token]").val();
		var playerId = $("input[name=playerId]").val();
		$.ajax({
	      type:'POST',
	      url:'/Vacant/Add' ,
	      data:{
             	_token:_token,
             	playerId:playerId,
             	day:day,
             	from:from,
             	to:to,
         },
	    	success:function(data){
	    		if (data == 'true') {
	    			$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
	    			$('#getPlayerVacants').load('/getPlayerVacants/player/' + playerId);
	    		} else if(data == 'false') {
	    			$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
	    			$('#getPlayerVacants').load('/getPlayerVacants/player/' + playerId);
	    			//$('#errors').fadeIn();
	    			setTimeout(function() {
				        $('#vacantErrors').show(800);
				    }, 2000);
	    			setTimeout(function() {
				        $('#vacantErrors').hide();
				    }, 10000);
	    		}
    		
            console.log(data) ;
	    		$('#vacantInfoLoader').fadeOut();
	            //alert(data);
	            console.log(data) ;
	            //$('#AddGameLoading').hide();
	            
	         }
	   });
	}else{
		$('#vacantInfoLoader').fadeOut();
		setTimeout(function() {
	        $('#vacantErrors').show(800);
	    }, 2000);
		setTimeout(function() {
	        $('#vacantErrors').hide();
	    }, 10000);
	}
});

/////////////////////////////////////////////////////////////////////////////////
////////////////////end of add player vacant time /////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
////////////////////start of delete player vacant time /////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
$(document).on('click', ".delVacant", function (e) {
	e.preventDefault() ;
	$('#vacantInfoLoader').fadeIn();
	var id = this.id ;
	vacantTimeId = id.substr(0, id.indexOf('_'));
	var _token = $("input[name=_token]").val();
	var playerId = $("input[name=playerId]").val();
	$.ajax({
      type:'POST',
      url:'/Vacant/Delete' ,
      data:{
         	_token:_token,
         	playerId:playerId,
         	vacantTimeId:vacantTimeId,
     },
    	success:function(data){
    		if (data == 'true') {
    			$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
    			$('#getPlayerVacants').load('/getPlayerVacants/player/' + playerId);
    		} else if(data == 'false') {
    			$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
    			$('#getPlayerVacants').load('/getPlayerVacants/player/' + playerId);
    			//$('#errors').fadeIn();
    			setTimeout(function() {
			        $('#vacantErrors').show(800);
			    }, 2000);
    			setTimeout(function() {
			        $('#vacantErrors').hide();
			    }, 10000);
    		}
		
        console.log(data) ;
    		$('#vacantInfoLoader').fadeOut();
            //alert(data);
            console.log(data) ;
            //$('#AddGameLoading').hide();
            
         }
   });
	
});

/////////////////////////////////////////////////////////////////////////////////
////////////////////end of delete player vacant time /////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
////////////////////start of edit player vacant time /////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
$(document).on('click', ".editVacant", function (e) {
	e.preventDefault() ;
	$('#vacantInfoLoader').fadeIn();
	var id = this.id ;
	vacantTimeId = id.substr(0, id.indexOf('_'));
	//alert(vacantTimeId);
	var _token = $("input[name=_token]").val();
	var playerId = $("input[name=playerId]").val();
	$.ajax({
      type:'POST',
      url:'/Vacant/Edit' ,
      data:{
         	_token:_token,
         	playerId:playerId,
         	vacantTimeId:vacantTimeId,
     },
    	success:function(data){
    		if (data == 'true') {
    			$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
    			$('#getPlayerVacants').load('/getPlayerVacants/player/' + playerId);
    		} else if(data == 'false') {
    			$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
    			$('#getPlayerVacants').load('/getPlayerVacants/player/' + playerId);
    			//$('#errors').fadeIn();
    			setTimeout(function() {
			        $('#vacantErrors').show(800);
			    }, 2000);
    			setTimeout(function() {
			        $('#vacantErrors').hide();
			    }, 10000);
    		}
		
        console.log(data) ;
    		$('#vacantInfoLoader').fadeOut();
            //alert(data);
            console.log(data) ;
            //$('#AddGameLoading').hide();
            
         }
   });
	
});

/////////////////////////////////////////////////////////////////////////////////
////////////////////end of edit player vacant time /////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
