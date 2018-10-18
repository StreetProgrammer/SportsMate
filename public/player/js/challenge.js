////////////////// //////////////////////////////


///////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
////////////////////start of add new Challenge /////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
$(document).on('click', "#addNewChallenge", function () {
	
	$('#challengeInfoLoader').fadeIn();
	var err = 0 ;

	var date  =  $("input[name=C_date]").val();
	if (date == null || date == "" ) {
		err = 1 ;
	}
	var from  =  $("select[name=C_from]").val();
	if (from == null || from == "" ) {
		err = 1 ;
	}
	var to    =  $("select[name=C_to]").val();
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
		var sport_id 		= 	$("select[name=sport_id]").val();
		$.ajax({
	      type:'POST',
	      url:'/Challenge/Add',
	      data:{
             	_token:_token,
             	playerId:playerId,
             	C_sport_id:sport_id,
             	C_date:date,
             	C_from:from,
             	C_to:to,
         },
	    	success:function(data){
	    		console.log(data) ;
	    		if (data == 'true') {
	    			//$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
	    			//$('#getPlayerVacants').load('/getPlayerVacants/player/' + playerId);
	    			setTimeout(function() {
				        $('#challengeErrors').show(800);
				        $('#challengeErrorsSuccess').show();
				    }, 2000);
	    			setTimeout(function() {
				        $('#challengeErrors').hide();
				        $('#challengeErrorsSuccess').hide();
				    }, 10000);
	    		} else if(data == 'false') {
	    			//$('#display-MainInfo').load('/displayMainInfo/player/' + playerId).fadeIn('slow');
	    			//$('#getPlayerVacants').load('/getPlayerVacants/player/' + playerId);
	    			//$('#errors').fadeIn();
	    			setTimeout(function() {
				        $('#challengeErrors').show(800);
				        $('#challengeErrorsFaild').show();
				    }, 2000);
	    			setTimeout(function() {
				        $('#challengeErrors').hide();
				        $('#challengeErrorsFaild').hide();
				    }, 10000);
	    		}
    		
            	console.log(data) ;
	    		$('#challengeInfoLoader').fadeOut();
	            console.log(data) ;   
	         }
	   });
	}else{
		alert('done');
		setTimeout(function() {
	        $('#challengeErrors').show(800);
	        $('#challengeErrorsFaild').show();
	    }, 2000);
		setTimeout(function() {
	        $('#challengeErrors').hide();
	        $('#challengeErrorsFaild').hide();
	    }, 10000);
	    $('#challengeInfoLoader').fadeOut();
	}
});

/////////////////////////////////////////////////////////////////////////////////
////////////////////end of add new Challenge /////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

/*/////////////////////////////////////////////////////////////////////////////////
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
*/

/////////////////////////////////////////////////////////////////////////////////
//////////////start of accept or reject challenge //////////////////////
/////////////////////////////////////////////////////////////////////////////////
$(document).on('click', ".AcceptRejectchallenge", function () {

	var params = this.id ;
	alert(params);
	var params = params.split("_");
	var loader = $('#' + params[0] + '_ARChallengeLoader');
	loader.fadeIn();
	var challengeId  		= params[0] ;
	var status 			= params[1];
	alert(challengeId);
	alert(status);

	var _token = $("input[name=_token]").val();
	alert(_token) ;
		$.ajax({
	      type:'POST',
	      url:'/Challenge/AcceptRejectchallenge',
	      data:{
             	_token:_token,
             	challengeId:challengeId,
             	status:status,
         },
	    	success:function(data){
	    		console.log(data) ;
	    		if (data == 'true') {
	    			$('#challenge-sport-playgrounds').load('/challenge/challengeSportPlaygrounds/' + challengeId).fadeIn('slow');
	    			$('#expected-playgrounds').load('/challenge/suggestedPlaygrounds/' + challengeId).fadeIn('slow');
	    		} else if(data == 'false') {
	    		}
    			$('#candidate').load('/challenge/candidate/' + challengeId).fadeIn('slow');
            	console.log(data) ;
	    		loader.fadeOut();
	            console.log(data) ;   
	         }
	   });
	
});

/////////////////////////////////////////////////////////////////////////////////
///////////////////end of accept or reject challenge ////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
//////////////start of suggest a playground for the challenge //////////////////////
/////////////////////////////////////////////////////////////////////////////////
$(document).on('click', ".suggestChallengePlayground", function () {

	var params = this.id ;
	var params = params.split("_");
	var loader = $('#' + params[0] + '_' + params[1]+ '_suggestLoader');
	loader.fadeIn();
	var challengeId  = params[0] ;
	var playgroundId = params[1];
	alert(challengeId);
	alert(playgroundId);

	var _token = $("input[name=_token]").val();
	alert(_token) ;
		$.ajax({
	      type:'POST',
	      url:'/Challenge/SuggestPlayground',
	      data:{
             	_token:_token,
             	playgroundId:playgroundId,
             	challengeId:challengeId
         },
	    	success:function(data){
	    		$('#challenge-sport-playgrounds').load('/challenge/challengeSportPlaygrounds/' + challengeId).fadeIn('slow');
	    		$('#expected-playgrounds').load('/challenge/suggestedPlaygrounds/' + challengeId).fadeIn('slow');
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
//////////////end of suggest a playground for the challenge //////////////////////
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
	var challengeId  		= params[0] ;
	var playgroundId 	= params[1];
	var status 			= params[2];
	alert(challengeId);
	alert(playgroundId);

	var _token = $("input[name=_token]").val();
	alert(_token) ;
		$.ajax({
	      type:'POST',
	      url:'/Challenge/AcceptRejectPlayground',
	      data:{
             	_token:_token,
             	playgroundId:playgroundId,
             	challengeId:challengeId,
             	status:status,
         },
	    	success:function(data){
	    		//$('#event-sport-playgrounds').load('/event/eventSportPlaygrounds/' + challengeId).fadeIn('slow');
	    		$('#expected-playgrounds').load('/challenge/suggestedPlaygrounds/' + challengeId).fadeIn('slow');
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
/////////////////////////////////////////////////////////////////////////////////*/