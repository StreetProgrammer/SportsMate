<?php

namespace App\Http\Controllers;
use App\Model\Event ;
use App\Model\Rate ;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RateController extends Controller
{
    public function AddPlayerRate(Event $Event)
    {
        $request = request() ;

        //return $data ;
        $Rate = Rate::where('giver_user_id', Auth::user()->id)
                    ->where('rated_user_id', $request->rated_user_id)
                    ->where('Event_id', $Event->id)
                    ->where('Sport_id', $Event->E_sport_id)
                    ->get();
        if ($Rate->count() == 0) {
            $Q_T = round( ($request->Q_1 + $request->Q_2 + $request->Q_3 + $request->Q_4 + $request->Q_5)/ (5) ) ;
            Rate::create([
                'giver_user_id'         => Auth::user()->id ,
                'rated_user_id'         => $request->rated_user_id ,
                'rateable_id'           => $Event->id ,
                'rateable_id'           => 'event' ,
                'Sport_id'              => $Event->E_sport_id ,
                'Q_1'                   => $request->Q_1 ,
                'Q_2'                   => $request->Q_2 ,
                'Q_3'                   => $request->Q_3 ,
                'Q_4'                   => $request->Q_4 ,
                'Q_5'                   => $request->Q_5 ,
                'Q_T'                   => $Q_T ,
                'comment'               => $request->comment ,
                'event_type'            => 1 ,
                ]);

                return 'true' ;
            $Event = Event::with('Applicants')
    							->with('creator.playerProfile')
    							->with('eventSport')->find($Event) ;

        }else {
                return 'flase' ;
        }//end else

    }

    /*
    * function to load patrial view after A player give A rate to Ather player
    */
    public function EventResult($Event)
    {
        $Event = Event::with('Applicants')
							->with('creator.playerProfile')
							->with('eventSport')->find($Event) ;
        //return $Event ;

        return view('event.parts.EventPart_1', compact('Event')) ;
    }















}
