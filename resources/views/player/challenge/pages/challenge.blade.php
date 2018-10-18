@extends('site.index')
@section('content')

@yield('content')
    {{--------------------------------------------------------------------}}
<section class="courts-main players-main">
  {{ csrf_field() }}
  <div class="container" style="font-size:80%;">

    <div class="row">
       <!----------- start challenge creator section -------------->
      <div class="col-md-7" id="challenge-sport-playgrounds">

        @include('player.challenge.pageParts.challenge.challenge-sport-playgrounds')

      </div>
      <!----------- end challenge creator section -------------->

      <!----------- start challenge-details section -------------->
      <div class="col-md-5" id="expected-playgrounds">

        @include('player.challenge.pageParts.challenge.expected-playgrounds')

      </div> <!-- end challenge details-->
        

      </div><!-- .row-->

    <div class="row">
       <!----------- start challenge creator section -------------->
      <div class="col-md-3" id="creator">

        @include('player.challenge.pageParts.challenge.creator')

      </div>
      <!----------- end challenge creator section -------------->

      <!----------- start challenge-details section -------------->
      <div class="col-md-6" id="challenge-details">

        @include('player.challenge.pageParts.challenge.challenge-details')

      </div>
        

      </div><!-- end challenge details-->
      <!----------- end challenge-details section -------------->

      <!----------- start candidate players -------------->
      <div class="col-md-3" id="candidate">
         
        @include('player.challenge.pageParts.challenge.candidate')

      </div><!-- end challenge details-->
      <!----------- end candidate players -------------->

    </div><!--end row--->

     <div class="row">
      
      <!----------- start candidate players -------------->
      <div class="col-md-4" id="candidate-1">
         
        @include('player.challenge.pageParts.challenge.candidate')

      </div><!-- end challenge details-->
      <!----------- end candidate players -------------->

       <!----------- start challenge applicants section -------------->
      <div class="col-md-8" id="applicants">

        @include('player.challenge.pageParts.challenge.applicants')

      </div> <!-- col-md-8 -->
      <!----------- end challenge applicants section -------------->

    </div><!--end row--->

    
  </div><!--end container--->
</section>
    {{------------------------------------------------------------------------}}
    {{------------------------------------------------------------------------}}

@endsection