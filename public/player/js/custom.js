jQuery(document).ready(function($) {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});

$( document ).ready( function () {
    $( '.dropdown-menu a.dropdown-toggle' ).on( 'click', function ( e ) {
        var $el = $( this );
        var $parent = $( this ).offsetParent( ".dropdown-menu" );
        if ( !$( this ).next().hasClass( 'show' ) ) {
            $( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
        }
        var $subMenu = $( this ).next( ".dropdown-menu" );
        $subMenu.toggleClass( 'show' );
        
        $( this ).parent( "li" ).toggleClass( 'show' );

        $( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function ( e ) {
            $( '.dropdown-menu .show' ).removeClass( "show" );
        } );
        
         if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
            $el.next().css( { "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 } );
        }

        return false;
    } );
} );

(function ($) {
    $.fn.countTo = function (options) {
        options = options || {};
        
        return $(this).each(function () {
            // set options for current element
            var settings = $.extend({}, $.fn.countTo.defaults, {
                from:            $(this).data('from'),
                to:              $(this).data('to'),
                speed:           $(this).data('speed'),
                refreshInterval: $(this).data('refresh-interval'),
                decimals:        $(this).data('decimals')
            }, options);
            
            // how many times to update the value, and how much to increment the value on each update
            var loops = Math.ceil(settings.speed / settings.refreshInterval),
                increment = (settings.to - settings.from) / loops;
            
            // references & variables that will change with each update
            var self = this,
                $self = $(this),
                loopCount = 0,
                value = settings.from,
                data = $self.data('countTo') || {};
            
            $self.data('countTo', data);
            
            // if an existing interval can be found, clear it first
            if (data.interval) {
                clearInterval(data.interval);
            }
            data.interval = setInterval(updateTimer, settings.refreshInterval);
            
            // initialize the element with the starting value
            render(value);
            
            function updateTimer() {
                value += increment;
                loopCount++;
                
                render(value);
                
                if (typeof(settings.onUpdate) == 'function') {
                    settings.onUpdate.call(self, value);
                }
                
                if (loopCount >= loops) {
                    // remove the interval
                    $self.removeData('countTo');
                    clearInterval(data.interval);
                    value = settings.to;
                    
                    if (typeof(settings.onComplete) == 'function') {
                        settings.onComplete.call(self, value);
                    }
                }
            }
            
            function render(value) {
                var formattedValue = settings.formatter.call(self, value, settings);
                $self.html(formattedValue);
            }
        });
    };
    
    $.fn.countTo.defaults = {
        from: 0,               // the number the element should start at
        to: 0,                 // the number the element should end at
        speed: 1000,           // how long it should take to count between the target numbers
        refreshInterval: 100,  // how often the element should be updated
        decimals: 0,           // the number of decimal places to show
        formatter: formatter,  // handler for formatting the value before rendering
        onUpdate: null,        // callback method for every time the element is updated
        onComplete: null       // callback method for when the element finishes updating
    };
    
    function formatter(value, settings) {
        return value.toFixed(settings.decimals);
    }
}(jQuery));

jQuery(function ($) {
  // custom formatting example
 
  $('.count-number').data('countToOptions', {
    formatter: function (value, options) {
      return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
    }
  });
   
  // start all the timers
    $('.timer').each(count);  
  
  function count(options) {
    var $this = $(this);
    options = $.extend({}, options || {}, $this.data('countToOptions') || {});
    $this.countTo(options);
  }

});

/* When the user clicks on the button, 
      toggle between hiding and showing the dropdown content */
      function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
      }

      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {

          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }

        $(window).on('scroll', function(){
            if( $(window).scrollTop() >= 200 ){

                $('.notify-nav').addClass('stickyNavIcon');
                $('.navbar-default').addClass('navbar-fixed-top');
                $('.navbar-default').fadeIn();

            }else{

                $('.notify-nav').removeClass('stickyNavIcon');
                $('.navbar-default').removeClass('navbar-fixed-top');

            }
        });

        $(window).on('scroll', function(){
            if( $(window).scrollTop() >= 300 && $(window).scrollTop() <= 800 ){
                $('.fa-3x').addClass('icons');
            }else{
                $('.fa-3x').removeClass('icons');
            }                
        });

        jQuery(document).ready(function(){
            $(".dropdown").hover(
                function() { $('.dropdown-menu', this).fadeIn("fast");
                },
                function() { $('.dropdown-menu', this).fadeOut("fast");
            });
        });


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
        $(this).children('.fa').css("color", "#f89406");
        $(this).css("border", "2px solid #f89406");
        $("input[name=password]").attr('type', 'password');

    }
}, '.showHidePass');


///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// end display password on hover on eye icon /////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
$(document).on('change', ".slider", function () {
    var id = this.id ;
    var value = $('#' + id).val();
    if (id == 'from') {
        if (value > $('#to').val()) {
            $('#from').val($('#to').val());
            value = $('#to').val() ;
        }
        alert('from ' + value);
        //$('#to').attr('min', value) ;
        $('.slider-from-value').fadeIn();
        $('.slider-from-value').html(value);
    }
    else if(id == 'to') {
        if (value < $('#from').val()) {
            $('#to').val($('#from').val());
            value = $('#from').val();
        } 
        alert('to ' + value);
        //$('#from').attr('min', value);
         $('.slider-to-value').fadeIn();
         $('.slider-to-value').text(value);
    }else{
        $('.slider-value').fadeIn();
        $('.slider-value').text(value);
    }
    
    //alert(value);
})
