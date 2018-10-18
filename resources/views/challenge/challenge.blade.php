@extends('Challenge.layouts.challengeLayout')

@section('content')
<div class="container" style="font-size:80%;">
    @if ($Challenge->C_candidate_id != '')
        @if ($Challenge->ChallengeRate->count() == 0  && !in_array($Challenge->C_winer_id, [-10, $Challenge->C_creator_id, $Challenge->C_candidate_id]) == true)
            <div class="row">
                <!-- start Result view -->
                <div id="result">
                </div>
                <!-- End Result view -->
            </div>
        @else
            <div class="row">
                <!-- start Result view -->
                <div id="result">
                <!-- ----------------------- -->
                    <!-- start Result view -->
                    @include('challenge.parts.ChallengePart_1')
                    <!--- end Result view --->
                <!-- ----------------------- -->

                </div><!--#result -->
                <!-- End Result view -->
            </div>
         @endif
    @endif



    <div class="row">
        <!-- start Challenge Details And Applicants view -->
        <div id="ChallengeGames">
        <!-- ----------------------- -->
            <!-- start Result view -->
            @include('challenge.parts.ChallengeGames')
            <!--- end Result view --->
        <!-- ----------------------- -->

        </div><!--#result -->
        <!-- End Challenge Details And Applicants view -->

    </div>

    <div class="row">
        <!-- start Challenge Details And Applicants view -->
        <div id="ChallengeDetailsApplicants">
        <!-- ----------------------- -->
            <!-- start Result view -->
            @include('challenge.parts.ChallengePart_2')
            <!--- end Result view --->
        <!-- ----------------------- -->

        </div><!--#result -->
        <!-- End Challenge Details And Applicants view -->

    </div>

    <div class="row">
        <!-- start Challenge Plagrounds Details -->
        <div id="ChallengePlagroundsDetails">
        <!-- ----------------------- -->
            <!-- start Result view -->
            @include('challenge.parts.ChallengePart_3')
            <!--- end Result view --->
        <!-- ----------------------- -->

        </div><!--#result -->
        <!-- End Challenge Plagrounds Details -->
    </div>

    <div class="row">
        <!-- start Result view -->
        <div id="ChallengeModels">
        <!-- ----------------------- -->
            <!-- start Result view -->
            @include('challenge.parts.ChallengePart_4')
            <!--- end Result view --->
        <!-- ----------------------- -->

        </div><!--#result -->
        <!-- End Result view -->
    </div>


</div>
</div>

@endsection
