<?php

namespace App\Http\Controllers;

use DB ;

use App\Model\Event;
use App\Model\SubEvent;
use App\Model\Result ;
use App\Model\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubEventController extends Controller
{
    public function AddSubEvent(Event $Event)
    {
        //return $Event ;

        $request = request() ;

        if ($request->CreatorScore > $request->CandidateScore) {

            $Winer = $Event->E_creator_id ;

        }elseif ($request->CandidateScore > $request->CreatorScore) {

            $Winer = $Event->E_candidate_id ;

        }else {

            $Winer = -10 ;

        }

        $SPORT = $Event->E_sport_id ;
        $Game = SubEvent::create([

            'mainEvent_id'              => $Event->id ,// id for the event contain that SubEvent
            'mainEvent_type'            => $request->EventType,
            'S_E_creator_id'            => $Event->E_creator_id , // SubEvent Creator ID
            'S_E_candidate_id'          => $Event->E_candidate_id , // SubEvent Candidate ID
            'S_E_creator_team'          => $Event->E_creator_team_id ,
            'S_E_candidate_team'        => $Event->E_candidate_team_id ,
            'S_E_sport_id'              => $Event->E_sport_id , // SubEvent Sport ID
            'S_E_playground_id'         => $Event->E_playground_id , // SubEvent Playground ID
            'S_E_R_CreatorScore'        => $request->CreatorScore , // SubEvent Creator Score ID
            'S_E_R_CandidateScore'      => $request->CandidateScore ,
            'S_E_date'                  => $Event->E_date ,
            'S_E_day'                   => $Event->E_day ,
            'S_E_from'                  => $Event->E_from ,
            'S_E_to'                    => $Event->E_to ,
            'S_E_JQueryFrom'            => $Event->E_JQueryFrom ,
            'S_E_JQueryTo'              => $Event->E_JQueryTo ,
            'S_E_winer_id'              => $Winer ,

           ]);

           if ($request->OpinionBy == $Event->E_creator_id) {
               $E_R_ConfirmBy = $Event->E_candidate_id ;
           }elseif ($request->OpinionBy == $Event->E_candidate_id) {
               $E_R_ConfirmBy = $Event->E_creator_id ;
           }
    $GameResult = Result::create([
            'E_R_OpinionBy'         =>  $request->OpinionBy ,
            'E_R_ConfirmBy'         =>  $E_R_ConfirmBy ,
            'E_R_EventId'           =>  $Game->id ,
            'Sport_id'              =>  $SPORT ,
            'E_R_CreatorScore'      =>  $request->CreatorScore ,
            'E_R_CandidateScore'    =>  $request->CandidateScore ,
            'E_R_IsFinalResult'     =>  0 ,
            //'E_R_WinerId'           =>  '' ,
            'E_R_event_type'        =>  2 ,
            'E_R_YesOrNo'           =>  0 ,
            ]);

            if ($Game && $GameResult) {
                return 'true' ;
            }else {
                return 'false' ;
            }

    }

    /*
    * function to delete A Suggested Game
    */
    public function deleteSuggestedGame(SubEvent $SubEvent)
    {
        //return $SubEvent ;

        $DeleteResult = Result::destroy($SubEvent->SubEventResult->id);

        $DeleteSubEvent = SubEvent::destroy($SubEvent->id);

        if ($DeleteResult && $DeleteSubEvent) {
            return 'true' ;
        }else {
            return 'false' ;
        }
    }

    /*
    * function to load patrial view after A player suggest A game to his event
    */
    public function refuseSuggestedGame(SubEvent $SubEvent)
    {
        //return $SubEvent ;

        $SubEventResult = Result::where('E_R_EventId', '=', $SubEvent->id)->first();

        $SubEventResult->E_R_YesOrNo = 1 ;

        $SubEventResult->save();

        if ($SubEventResult) {
            return 'true' ;
        }else {
            return 'false' ;
        }
    }

    /*
    * function to Accept a Game suggested and update Game Result
    * and create Main Event Result Or Update it if exist
    */
    public function acceptSuggestedGame(SubEvent $SubEvent)
    {
        //return $SubEvent ;
        // Start PART Of Update SubEvent RESULT
        $SubEventResult = Result::where('E_R_EventId', '=', $SubEvent->id)->first();

        $SubEventResult->E_R_YesOrNo = 2 ;

        $SubEventResult->E_R_IsFinalResult = 2 ;

        $SubEventResult->save();

        // End PART Of Update SubEvent RESULT
        ///////////////////////////////////

        // StartPART Of Update who is SubEvent WINER
        /*
        if ($SubEventResult->S_E_R_CreatorScore > $SubEventResult->S_E_R_CandidateScore) {

            $Winer = $SubEvent->S_E_creator_id ;

        }elseif ($SubEventResult->S_E_R_CandidateScore > $SubEventResult->S_E_R_CreatorScore) {

            $Winer = $SubEvent->S_E_candidate_id ;

        }else {

            $Winer = -10 ;

        }
        $SubEvent = SubEvent::find($SubEvent->id);

        $SubEvent->S_E_winer_id = $Winer ;

        $SubEvent->save();
        */

        // End PART Of Update who is SubEvent WINER
        //////////////////////////////
        // Start PART Of Update MAIN EVENT WINER ID AND Upate if Exist Or Create MAIN EVENT RESULT
        $CreatorGames =  SubEvent::where('S_E_Event_id', '=', $SubEvent->S_E_Event_id)
                                    ->where('S_E_winer_id', '=', $SubEvent->S_E_creator_id)
                                    ->count();

        $CandidateGames =  SubEvent::where('S_E_Event_id', '=', $SubEvent->S_E_Event_id)
                                    ->where('S_E_winer_id', '=', $SubEvent->S_E_candidate_id)
                                    ->count();

        if ($CreatorGames > $CandidateGames) {
            $MAinEventWiner = $SubEvent->S_E_creator_id ;
        }elseif ($CandidateGames > $CreatorGames) {
            $MAinEventWiner = $SubEvent->S_E_candidate_id ;
        }else {
            $MAinEventWiner = -10 ;
        }

        $MainEvent = Event::find($SubEvent->S_E_Event_id);

        $MainEvent->E_winer_id = $MAinEventWiner ;

        $MainEvent->save();


        $MainEventResult =  Result::where('E_R_EventId', '=', $SubEvent->S_E_Event_id)
                                    ->first();
        if ($MainEventResult) {
            $MainEventResult->E_R_CreatorScore      = $CreatorGames ;
            $MainEventResult->E_R_CandidateScore    = $CandidateGames ;
            $MainEventResult->E_R_IsFinalResult     =  2 ;
            $MainEventResult->E_R_YesOrNo           =  2 ;

            $MainEventResult->save();
        }else {
            $MainEventResult = Result::create([
                            'E_R_OpinionBy'         =>  $SubEvent->S_E_creator_id ,
                            'E_R_ConfirmBy'         =>  $SubEvent->S_E_candidate_id ,
                            'E_R_EventId'           =>  $SubEvent->S_E_Event_id ,
                            'Sport_id'              =>  $SubEvent->S_E_sport_id ,
                            'E_R_CreatorScore'      =>  $CreatorGames ,
                            'E_R_CandidateScore'    =>  $CandidateGames ,
                            'E_R_IsFinalResult'     =>  2 ,
                            //'E_R_WinerId'           =>  '' ,
                            'E_R_event_type'        =>  1 ,
                            'E_R_YesOrNo'           =>  2 ,
                            ]);
        }


        // End PART Of Update MAIN EVENT WINER ID AND Upate if Exist Or Create MAIN EVENT RESULT

        if ($SubEventResult) {
            $returned = 'true   '  . $MAinEventWiner. '  ' . $CreatorGames . '  ' .$CandidateGames ;
            return  $returned ;
        }else {
            return 'false' ;
        }
    }


    /*
    * function to load patrial view after A player suggest A game to his event
    */
    public function EventGames($Event)
    {
        $Event = Event::with('Applicants')
							->with('creator.playerProfile')
							->with('eventSport')->find($Event) ;
        //return $Event ;

        return view('event.parts.EventGames', compact('Event')) ;
    }

}
