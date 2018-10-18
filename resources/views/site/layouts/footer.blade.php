<footer>
    <div class="container" >
        <div class="row">
            <div class="col-md-4">
                <h3>SPORTMATE</h3>
                <p>About us</p>
                <p>Home</p>
                <p>Getting Started</p>
                <p>Players</p>
                <p>Courts</p>
            </div>
            <div class="col-md-4">
                <h3>SUPPORT</h3>
                <p>Find us</p>
                <p>Follow us</p>
            </div>
            <div class="col-md-4">
                <h3>LATEST TWEETS</h3>
                <p>
                    @pepperstreet Hi there, could you
                    take a screenshot for us and let us
                    know the error, we cannot see.
                    Thanks, JoomlaMan
                </p>
            </div>
        </div>
    </div>
</footer>
      

    <!----end--------->
    <script src="{{ url('/') }}/player/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/jquery.flexslider-min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="{{ url('/') }}/player/js/custom.js"></script>
    <script src="{{ asset('js/croppie.js') }}"></script>
    <script src="{{ url('/') }}/player/js/playerprofile.js"></script>
    <script src="{{ url('/') }}/player/js/event.js"></script>
    <script src="{{ url('/') }}/player/js/challenge.js"></script>
    <script src="{{ url('/') }}/player/js/playerSearch.js"></script>
    <script src="{{ url('/') }}/player/js/playgroundSearch.js"></script>
    <script src="{{ url('/') }}/player/js/inputRange.js"></script>

    <!-- fullCalendar -->
    <script src="{{ url('/') }}/design/AdminLTE/bower_components/moment/moment.js"></script>
    <script src="{{ url('/') }}/design/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

    @include('player.layouts.SM-player-fullCalender.playground-calender')

    <script>
      
    </script>

  </body>
</html>