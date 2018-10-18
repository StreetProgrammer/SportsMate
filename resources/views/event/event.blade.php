@extends('event.layouts.eventLayout')

@section('content')
<div class="container" style="font-size:80%;">

    @php
        date_default_timezone_set('Africa/Cairo');
        $nowTime = strtotime(date('Y-m-d h:i:s a')) ;
        $eventEndAt = strtotime($Event->E_JQueryTo) ;
        if ($nowTime > $eventEndAt) {
            echo '<h1>' . date('Y-m-d h:i:s a') . '</h1>' ;
        }
    @endphp
    @if ($Event->E_candidate_id != '' && $nowTime > $eventEndAt){{--only if candidate not empty --}}
            
            @if ($Event->EventRate->count() == 0  || !in_array($Event->E_winer_id, [-10, $Event->E_creator_id, $Event->E_candidate_id]) == true)
                <div class="row">
                    <!-- start Result view -->
                    <div id="result">
                    <!-- ----------------------- -->
                        <!-- start Result view -->
                        {{-- @include('event.parts.EventRatePart') --}}
                        <!--- end Result view --->
                    <!-- ----------------------- -->

                    </div><!--#result -->
                    <!-- End Result view -->
                </div>
            @else
                <div class="row">
                    <!-- start Result view -->
                    <div id="result">
                    <!-- ----------------------- -->
                        <!-- start Result view -->
                        @include('event.parts.EventRatePart')
                        <!--- end Result view --->
                    <!-- ----------------------- -->

                    </div><!--#result -->
                    <!-- End Result view -->
                </div>
            @endif
    @else
        

    @endif {{-- ($Event->E_candidate_id != '') --}}



    <div class="row">
        <!-- start Event Details And Applicants view -->
        <div id="EventGames">
        <!-- ----------------------- -->
            <!-- start Result view -->
            @include('event.parts.EventGames')
            <!--- end Result view --->
        <!-- ----------------------- -->

        </div><!--#result -->
        <!-- End Event Details And Applicants view -->

    </div>

    <div class="row">
        <!-- start Event Details And Applicants view -->
        <div id="EventDetailsApplicants">
        <!-- ----------------------- -->
            <!-- start Result view -->
            @include('event.parts.EventDetailsApplicants')
            <!--- end Result view --->
        <!-- ----------------------- -->

        </div><!--#result -->
        <!-- End Event Details And Applicants view -->

    </div>

    <div class="row">
        <!-- start Event Plagrounds Details -->
        <div id="EventPlagroundsDetails">
        <!-- ----------------------- -->
            <!-- start Result view -->
            @include('event.parts.EventPart_3')
            <!--- end Result view --->
        <!-- ----------------------- -->

        </div><!--#result -->
        <!-- End Event Plagrounds Details -->
    </div>

    <div class="row">
        <!-- start Result view -->
        <div id="EventModels">
        <!-- ----------------------- -->
            <!-- start Result view -->
            @include('event.parts.EventPart_4')
            <!--- end Result view --->
        <!-- ----------------------- -->

        </div><!--#result -->
        <!-- End Result view -->
    </div>


</div>
</div>

@endsection
