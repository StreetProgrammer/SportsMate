@extends('site.index')
@section('content')

@yield('content')
    {{--------------------------------------------------------------------}}
<section class="courts-main players-main">
  {{ csrf_field() }}
  <div class="container" style="font-size:80%;">

    <div class="row">
       <!----------- start event creator section -------------->
      <div class="col-md-7" id="event-sport-playgrounds">

        @include('player.event.pageParts.event.event-sport-playgrounds')

      </div>
      <!----------- end event creator section -------------->

      <!----------- start event-details section -------------->
      <div class="col-md-5" id="expected-playgrounds">

        @include('player.event.pageParts.event.expected-playgrounds')

      </div> <!-- end event details-->
        

      </div><!-- .row-->

    <div class="row">
       <!----------- start event creator section -------------->
      <div class="col-md-4" id="creator">

        @include('player.event.pageParts.event.creator')

      </div>
      <!----------- end event creator section -------------->

      <!----------- start event-details section -------------->
      <div class="col-md-8" id="event-details">

        @include('player.event.pageParts.event.event-details')

      </div>
        

      </div><!-- end event details-->
      <!----------- end event-details section -------------->

    </div><!--end row--->

     <div class="row">
      
      <!----------- start candidate players -------------->
      <div class="col-md-4" id="candidate">
         
        @include('player.event.pageParts.event.candidate')

      </div><!-- end event details-->
      <!----------- end candidate players -------------->

       <!----------- start event applicants section -------------->
      <div class="col-md-8" id="applicants">

        @include('player.event.pageParts.event.applicants')

      </div> <!-- col-md-8 -->
      <!----------- end event applicants section -------------->

    </div><!--end row--->

    
  </div><!--end container--->
</section>
    {{------------------------------------------------------------------------}}
    {{------------------------------------------------------------------------}}

@endsection