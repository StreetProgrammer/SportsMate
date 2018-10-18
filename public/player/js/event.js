////////////////// //////////////////////////////


///////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
////////////////////start of add new Event /////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
$(document).on('click', "#addNewEvent", function () {
	
	$('#eventInfoLoader').fadeIn();
	var err = 0 ;

	var date  =  $("input[name=E_date]").val();
	if (date == null || date == "" ) {
		err = 1 ;
	}
	var from  =  $("select[name=E_from]").val();
	if (from == null || from == "" ) {
		err = 1 ;
	}
	var to    =  $("select[name=E_to]").val();
	if (to == null || to == "" ) {
		err = 1 ;
	}
	var diff = parseInt(to) - parseInt(from) ;
	if ( Math.sign(diff) != 1 ) {
		err = 1 ;
	}
	//err = 0;
	//alert(Math.sign(diff));
	if(err == 0){
		var _token       	= 	$("input[name=_token]").val();
		var playerId 		= 	$("input[name=playerId]").val();
		var preferred_rate 	= 	$("input[name=preferred_rate]").val();
		var sport_id 		= 	$("select[name=sport_id]").val();
		$.ajax({
	      type:'POST',
	      url:'/Event/Add',
	      data:{
             	_token:_token,
             	playerId:playerId,
             	E_preferred_rate:preferred_rate,
             	E_sport_id:sport_id,
             	E_date:date,
             	E_from:from,
             	E_to:to,
         },
	    	success:function(data){
	    		console.log(data) ;
	    		if (data == 'true') {
	    			$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
	    			//$('#getPlayerVacants').load('/getPlayerVacants/player/' + playerId);
	    			setTimeout(function() {
				        $('#eventErrors').show(800);
				        $('#eventErrorsSuccess').show();
				    }, 2000);
	    			setTimeout(function() {
				        $('#eventErrors').hide();
				        $('#eventErrorsSuccess').hide();
				    }, 10000);
	    		} else if(data == 'false') {
	    			$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
	    			//$('#getPlayerVacants').load('/getPlayerVacants/player/' + playerId);
	    			//$('#errors').fadeIn();
	    			setTimeout(function() {
				        $('#eventErrors').show(800);
				        $('#eventErrorsFaild').show();
				    }, 2000);
	    			setTimeout(function() {
				        $('#eventErrors').hide();
				        $('#eventErrorsFaild').hide();
				    }, 10000);
	    		}
    		
            	console.log(data) ;
	    		$('#vacantInfoLoader').fadeOut();
	            console.log(data) ;   
	         }
	   });
	}else{
		alert('done');
		setTimeout(function() {
	        $('#eventErrors').show(800);
	        $('#eventErrorsFaild').show();
	    }, 2000);
		setTimeout(function() {
	        $('#eventErrors').hide();
	        $('#eventErrorsFaild').hide();
	    }, 10000);
	    $('#eventInfoLoader').fadeOut();
	}
});

/////////////////////////////////////////////////////////////////////////////////
////////////////////start of add new Event /////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
////////////////////start of apply to a new Event /////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
$(document).on('click', ".apply", function () {
	$('#applyLoader').fadeIn();
	var params = this.id ;
	var params = params.split("_");
	var eventId  = params[0] ;
	var playerId = params[1];
	alert(eventId);
	alert(playerId);
	$('#applyLoader').fadeOut();
	var _token = $("input[name=_token]").val();
		$.ajax({
	      type:'POST',
	      url:'/Event/Apply',
	      data:{
             	_token:_token,
             	playerId:playerId,
             	eventId:eventId
         },
	    	success:function(data){
	    		$('#applicants').load('/event/applicants/' + eventId).fadeIn('slow');
	    		console.log(data) ;
	    		if (data == 'true') {

	    		} else if(data == 'false') {
	    		}
    		
            	console.log(data) ;
	    		$('#applyLoader').fadeOut();
	            console.log(data) ;   
	         }
	   });
	
});

/////////////////////////////////////////////////////////////////////////////////
////////////////////start of apply to a new Event /////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
//////////////start of accept an applicant to be the event candidate ////////////
/////////////////////////////////////////////////////////////////////////////////
$(document).on('click', ".accept", function () {
	//$('#' + params[0] + '_' + params[1]+ '_acceptLoader').fadeIn();
	var params = this.id ;
	var params = params.split("_");
	var loader = $('#' + params[0] + '_' + params[1]+ '_acceptLoader');
	loader.fadeIn();
	var eventId  = params[0] ;
	var playerId = params[1];
	alert(eventId);
	alert(playerId);
	//$('#' + params[0] + '_' + params[1]+ '_acceptLoader').fadeOut();
	var _token = $("input[name=_token]").val();
	alert(_token) ;
		$.ajax({
	      type:'POST',
	      url:'/Event/AcceptApplicant',
	      data:{
             	_token:_token,
             	playerId:playerId,
             	eventId:eventId
         },
	    	success:function(data){
	    		$('#applicants').load('/event/applicants/' + eventId).fadeIn('slow');
	    		$('#candidate').load('/event/candidate/' + eventId).fadeIn('slow');
	    		console.log(data) ;
	    		if (data == 'true') {

	    		} else if(data == 'false') {
	    		}
    		
            	console.log(data) ;
	    		loader.fadeOut();
	            console.log(data) ;   
	         }
	   });
	
});

/////////////////////////////////////////////////////////////////////////////////
//////////////end of accept an applicant to be the event candidate ////////////
/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
//////////////start of accept an applicant to be the event candidate ////////////
/////////////////////////////////////////////////////////////////////////////////
$(document).on('click', ".suggestEventPlayground", function () {

	var params = this.id ;
	var params = params.split("_");
	var loader = $('#' + params[0] + '_' + params[1]+ '_suggestLoader');
	loader.fadeIn();
	var eventId  = params[0] ;
	var playgroundId = params[1];
	alert(eventId);
	alert(playgroundId);

	var _token = $("input[name=_token]").val();
	alert(_token) ;
		$.ajax({
	      type:'POST',
	      url:'/Event/SuggestPlayground',
	      data:{
             	_token:_token,
             	playgroundId:playgroundId,
             	eventId:eventId
         },
	    	success:function(data){
	    		$('#event-sport-playgrounds').load('/event/eventSportPlaygrounds/' + eventId).fadeIn('slow');
	    		$('#expected-playgrounds').load('/event/suggestedPlaygrounds/' + eventId).fadeIn('slow');
	    		console.log(data) ;
	    		if (data == 'true') {

	    		} else if(data == 'false') {
	    		}
    		
            	console.log(data) ;
	    		loader.fadeOut();
	            console.log(data) ;   
	         }
	   });
	
});

/////////////////////////////////////////////////////////////////////////////////
//////////////end of accept an applicant to be the event candidate ////////////
/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
//////////////start of accept or reject suggested playground //////////////////////
/////////////////////////////////////////////////////////////////////////////////
$(document).on('click', ".AcceptRejectPlayground", function () {

	var params = this.id ;
	alert(params);
	var params = params.split("_");
	var loader = $('#' + params[0] + '_' + params[1]+ '_ARPlaygroundLoader');
	loader.fadeIn();
	var eventId  		= params[0] ;
	var playgroundId 	= params[1];
	var status 			= params[2];
	alert(eventId);
	alert(playgroundId);

	var _token = $("input[name=_token]").val();
	alert(_token) ;
		$.ajax({
	      type:'POST',
	      url:'/Event/AcceptRejectPlayground',
	      data:{
             	_token:_token,
             	playgroundId:playgroundId,
             	eventId:eventId,
             	status:status,
         },
	    	success:function(data){
	    		//$('#event-sport-playgrounds').load('/event/eventSportPlaygrounds/' + eventId).fadeIn('slow');
	    		$('#expected-playgrounds').load('/event/suggestedPlaygrounds/' + eventId).fadeIn('slow');
	    		console.log(data) ;
	    		if (data == 'true') {

	    		} else if(data == 'false') {
	    		}
    		
            	console.log(data) ;
	    		loader.fadeOut();
	            console.log(data) ;   
	         }
	   });
	
});

/////////////////////////////////////////////////////////////////////////////////
//////////////end of accept or reject suggested playground //////////////////////
/////////////////////////////////////////////////////////////////////////////////