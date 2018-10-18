{{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}
{{-- scripts of calender for playground page--}}
{{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}

{{-- start script for display claender for playground  reservations to [ player ]  --}}
<script>
$( document ).ready(function() {
	@if (!empty($playground))
      	@if ($playground->is_active == 1 && $playground->our_is_active == 1)
	     var calendar{{$playground->id}} = $('#Reservations{{$playground->id}}').fullCalendar({
		    header:{
		     left:'prev,next today',
		     center:'title',
		     right:'month,agendaWeek,agendaDay'
		    },
	    	events: '/playerPlaygroundReservation/' + {{$playground->id}} + '/playground' ,
	   });
	 	@endif 
	@endif
	
});
</script>
{{-- end script for display claender for playground  reservations to [ player ] --}}


{{-- start script for check vacant time in some playground --}} 
<script>
	$(document).on('change', ".date", function () {

		var err = 0 ;
		var id = this.id ;
		//alert(id) ;
		id = id.substr(0, id.indexOf('_'));

		$("#" + id + "_err").text("");
		$("input[name=" + id + "_name]").val("") ;
		$("#" + id + "_nameDiv").fadeOut() ;
		//alert(id) ;
		var date  =  $("input[name=" + id + "_date]").val();
		if (date == null || date == "" ) {
			err = 1 ;
		}
		var from  =  $("select[name=" + id + "_from]").val();
		if (from == null || from == "" ) {
			err = 1 ;
		}
		var to    =  $("select[name=" + id + "_to]").val();
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
			$('.reCheckLoader').fadeIn();
			var _token = $("input[name=_token]").val();
			var playgroundId = $("input[name=playgroundId]").val();
			$.ajax({
		      type:'POST',
		      url:'/checkVacantTime/' ,
		      data:{
                 	_token:_token,
                 	playgroundId:id,
                 	date:date,
                 	from:from,
                 	to:to,
             },
		    	success:function(data){
		    		if (data == 'true') {
		    			$("#" + id + "_err").removeClass('alert-danger');
		    			$("#" + id + "_err").addClass('alert-success');
		    			$("#" + id + "_err").text("it's a vacant time, you can reserve it.");
		    			$("#" + id + "_nameDiv").fadeIn() ;
		    			$("input[name=" + id + "_add]").show() ;
		    			//$( "#" + playgroundId + "_add" ).removeClass( 'disabled' );

		    		} else {
		    			$( "#" + id + "_err" ).removeClass( 'alert-success' );
		    			$( "#" + id + "_err" ).addClass( 'alert-danger' );
		    			$("#" + id + "_err").text("Please check or complete your entries.");
		    			$("#" + id + "_nameDiv").fadeOut() ;
		    			$("input[name=" + id + "_add]").hide() ;
		    			//$( "#" + playgroundId + "_add" ).addClass( 'disabled' );
		    		}
		    		$('.reCheckLoader').fadeOut();
		            //alert(data);
		            console.log(data) ;
		            //$('#AddGameLoading').hide();
		            
		         }
		   });
		}else{
			$( "#" + id + "_err" ).removeClass( 'alert-success' );
		    $( "#" + id + "_err" ).addClass( 'alert-danger' );
			$("#" + id + "_err").text("Please check or complete your entries.");
		}

	});
</script>
{{-- end script for check vacant time in some playground --}}

{{-- start script for add new reservation --}} 
<script>
	$(document).on('click', ".submit", function (e) {
		e.preventDefault();
		
		var err = 0 ;
		var id = this.id ;
		//alert(id) ;
		id = id.substr(0, id.indexOf('_'));
		$("#" + id + "_err").text("");
		//alert(id) ;
		var date  =  $("input[name=" + id + "_date]").val();
		if (date == null || date == "" ) {
			err = 1 ;
		}
		var from  =  $("select[name=" + id + "_from]").val();
		if (from == null || from == "" ) {
			err = 1 ;
		}
		var to    =  $("select[name=" + id + "_to]").val();
		if (to == null || to == "" ) {
			err = 1 ;
		}
		var name   =  $("input[name=" + id + "_name]").val();
		console.log(name) ;
		if (name.replace(/\s/g,"") === "") {
			err = 1 ;
		}
		var diff = parseInt(to) - parseInt(from) ;
		if ( Math.sign(diff) != 1 ) {
			err = 1
		}
		//alert( date + ' ' + from + ' ' + to);
		//alert(err) ;
		if(err == 0){
			$('.reCheckLoader').fadeIn();
			var _token = $("input[name=_token]").val();
			//var playgroundId = $("input[name=playgroundId]").val();
			$.ajax({
		      type:'POST',
		      url:'/reservations/club/store/' ,
		      data:{
                 	_token:_token,
                 	playgroundId:id,
                 	date:date,
                 	from:from,
                 	to:to,
                 	name:name
             },
		    	success:function(data){
		    		console.log(data)
		    		if (data == 'true') {
		    			$("#" + id + "_err").removeClass( 'alert-danger' );
		    			$("#" + id + "_err").addClass( 'alert-success' );
		    			$("#" + id + "_err").text("Reservation Added Successfully ");
		    			$("#" + id + "_nameDiv").show() ;
		    			$("input[name=" + id + "_add]").show() ;
		    			//$( "#" + playgroundId + "_add" ).removeClass( 'disabled' );

		    		} else {
		    			$("#" + id + "_err").removeClass( 'alert-success' );
		    			$("#" + id + "_err").addClass( 'alert-danger' );
		    			$("#" + id + "_err").text("an Error Occurred, please try again");
		    			$("#" + id + "_nameDiv").hide() ;
		    			$("input[name=" + id + "_add]").hide() ;
		    			//$( "#" + playgroundId + "_add" ).addClass( 'disabled' );
		    		}
		    		$('.reCheckLoader').fadeOut();
		            //alert(data);
		            console.log(data) ;
		            //$('#AddGameLoading').hide();
		            
		         }
		   });
		}else{
			$("#" + id + "_err").removeClass( 'alert-success' );
		    $("#" + id + "_err").addClass( 'alert-danger' );
			$("#" + id + "_err").text("Please check or complete your entries.");
		}

	});
</script>
{{-- end script for add new reservation --}}