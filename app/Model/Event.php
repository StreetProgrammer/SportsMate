<?php

namespace App\Model;

use App\Model\Result ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'E_creator_id',
        'E_candidate_id',
        'E_creator_team',
        'E_candidate_team',
        'E_preferred_rate',
        'E_sport_id',
        'E_playground_id',
        'E_reservation',
        'E_payment_type',
        'E_payment',
        'E_date',
        'E_day',
        'E_from',
        'E_to',
        'E_JQueryFrom',
        'E_JQueryTo',
        'E_result',
        'E_winer_id',

    ];

    protected $casts = [
      'E_result' => 'array',
  ];


    /**
     * Get the creator user record for this Event
     */

    public function creator()
    {
        return $this->belongsTo(User::class, 'E_creator_id')->withDefault();
    }

    /**
     * Get the candidate user record for this Event
     */

    public function candidate()
    {
        return $this->belongsTo(User::class, 'E_candidate_id')->withDefault();
    }


    /**
     * Get the Sport that in this event.
     */
    public function eventSport()
    {
        return $this->belongsTo(Sport::class, 'E_sport_id')->withDefault();
    }

    /**
     * Get the Playground that in this event.
     */
    public function eventPlayground()
    {
        return $this->belongsTo(Playground::class, 'E_playground_id')->withDefault();
    }

    /**
     * The expected Events that belong to the user.
     */
     public function expectedPlaygrounds()
    {
        return $this->belongsToMany(Playground::class)
                    ->withPivot('chosenBy', 'responsedBy', 'yesOrno')
                    ->as('expectedEvents')
                    ->withTimestamps();
    }

    /**
     * Get the reservation record associated with the event.
     */
    public function EventReservation()
    {
        return $this->hasOne(Reservation::class, 'E_reservation');
    }

    /**
     * Get the Day of that Reservation.
     */
    public function EventDay()
    {
        return $this->belongsTo(Day::class, 'E_day', 'day_id')->withDefault()->withDefault();
    }

    /**
     * Get the start time ( hour ) of that Reservation.
     */
    public function EventFrom()
    {
        return $this->belongsTo(Hour::class, 'E_from', 'hour_id')->withDefault();
    }

    /**
     * Get the end time ( hour ) of that Reservation.
     */
    public function EventTo()
    {
        return $this->belongsTo(Hour::class, 'E_to', 'hour_id')->withDefault();
    }

    /**
     * Get the SubEvents for that event.
     */
    /*public function SubEvents()
    {
        return $this->hasMany(SubEvent::class, 'S_E_Event_id');

    }*/

    /**
     * Get the SubEvents for that event.
     */
    public function SubEvents()
    {
        return $this->morphMany(SubEvent::class, 'mainEvent');
    }

    /**
     * Get the reates for that event.
     */
    public function EventRate()
    {
        return $this->morphMany(Rate::class, 'rateable');
    }

    /**
     * Get the reates for that event.
     */
    public function EventResult()
    {
        return $this->hasOne(Result::class, 'E_R_EventId');
    }



    /*
    *function to Suggest a Playground
    */
    public function SuggestPlayground($request)
    {
        if ($this->expectedPlaygrounds->contains($request->playgroundId) == true) {
            // will return some value say that this palyground in suggested playgrounds
        }else{
            // make chossenBy **the player whow choose the playground == the Auth::user**
            $chosenBy = Auth::id() ;

                // here we try to know who is the auth::user
                if ( Auth::id() == $this->E_creator_id && $this->E_candidate_id != null) {
                    // is the Auth::user is the Event creator And ther is candidate user
                    $responsedBy = $this->E_candidate_id ;

                } elseif (Auth::id() == $this->E_candidate_id && $this->E_candidate_id != null) {

                    $responsedBy = $this->E_creator_id ;
                } else{
                    $responsedBy = 0 ;
                }

        	$this->expectedPlaygrounds()->attach($request->playgroundId ,
                [
                    'chosenBy'    => $chosenBy ,
                    'responsedBy' => $responsedBy ,
                    'yesOrno'     => 0
                ]) ;
        }
        return 'true' ;

    }

    /**
     * Accept Suggested Playground
     */
     public function AcceptSuggestedPlayground($request)
     {
         $this->expectedPlaygrounds()->updateExistingPivot($request->playgroundId, [
                                                    'responsedBy' => Auth::id(),
                                                    'yesOrno' => 1
                                                ]);
     }

     /**
      * refuse Suggested Playground
      */
      public function refuseSuggestedPlayground($request)
      {
          $this->expectedPlaygrounds()->updateExistingPivot($request->playgroundId, [
                                                     'responsedBy' => Auth::id(),
                                                     'yesOrno' => 2
                                                 ]);
      }

    /**
     * The applyers that belong to that event.
     */
     public function Applicants()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('as_player', 'as_trainer', 'as_referee')
                    ->as('appliedEventsInfo')
                    ->withTimestamps();
    }

    /**
     * function to handle apply for that Event
     */
    public function AddApplicant($request)
    {
      if ($request->playerId == Auth::user()->id) {
        $this->Applicants()->attach(Auth::user()->id ,
            ['as_player' => 1 ,
            'as_trainer' => 0 ,
            'as_referee' => 0
                            ]) ;
        return 'true' ;
      } else {
        return 'false' ;
      }
      
    	
    }

    /**
     * function to handle Accept Applicant for that Event
     */
    public function AcceptApplicant($request)
    {
        $this->E_candidate_id = $request->playerId;

        $this->save();

        return 'true' ;
    }



    /**
     * function to Suggest A result for that Event
     */
    public function SuggestResult($request)
    {
        if (Auth::id() == $this->E_creator_id) {

            //for insert in Result Model !!

            $Result = new Result;

            $Result->E_R_OpinionBy          =   $this->E_creator_id;
            $Result->E_R_ConfirmBy          =   $this->E_candidate_id;
            $Result->E_R_EventId               =   $this->id;
            $Result->Sport_id               =   $this->E_sport_id;
            $Result->E_R_CreatorScore       =   $request->CreatorScore;
            $Result->E_R_CandidateScore     =   $request->CandidateScore;
            $Result->E_R_IsFinalResult      =   0 ;
            $Result->E_R_event_type         =   1 ;

            $Result->save();



        }elseif (Auth::id() == $this->E_candidate_id) {
            $Result = new Result;

            $Result->E_R_OpinionBy          =   $this->E_candidate_id;
            $Result->E_R_ConfirmBy          =   $this->E_creator_id;
            $Result->E_R_EventId               =   $this->id;
            $Result->Sport_id               =   $this->E_sport_id;
            $Result->E_R_CreatorScore       =   $request->CreatorScore;
            $Result->E_R_CandidateScore     =   $request->CandidateScore;
            $Result->E_R_IsFinalResult      =   0 ;
            $Result->E_R_event_type         =   1 ;

            $Result->save();
        }
    }

    /**
     * function to Accept A result for that Event
     */
    public function AcceptSuggestedResult($request)
    {
        $FinalResult = Result::where('E_R_EventId', '=' , $this->id)
                                ->where('E_R_IsFinalResult', '=' , 1)
                                ->where('E_R_YesOrNo', '=' , 2)
                                ->find(1);

        if($FinalResult == null){

            if (Auth::id() == $this->E_creator_id) {

                $Result = Result::where('E_R_OpinionBy', '=' , $this->E_candidate_id)
                                    ->where('E_R_ConfirmBy', '=' , $this->E_creator_id)
                                    ->where('E_R_EventId', '=' , $this->id)
                                    ->update(['E_R_IsFinalResult' => 2, 'E_R_YesOrNo' => 2]);

                $ResultInfo = Result::where('E_R_OpinionBy', '=' , $this->E_candidate_id)
                                    ->where('E_R_ConfirmBy', '=' , $this->E_creator_id)
                                    ->where('E_R_EventId', '=' , $this->id)
                                    ->first();

            }elseif (Auth::id() == $this->E_candidate_id) {

                $Result = Result::where('E_R_OpinionBy', '=' , $this->E_creator_id)
                                    ->where('E_R_ConfirmBy', '=' , $this->E_candidate_id)
                                    ->where('E_R_EventId', '=' , $this->id)
                                    ->update(['E_R_IsFinalResult' => 2, 'E_R_YesOrNo' => 2]);

                $ResultInfo = Result::where('E_R_OpinionBy', '=' , $this->E_creator_id)
                                    ->where('E_R_ConfirmBy', '=' , $this->E_candidate_id)
                                    ->where('E_R_EventId', '=' , $this->id)
                                    ->first();

            }
            //Add Winer to this event !!
            if ($ResultInfo->E_R_CreatorScore > $ResultInfo->E_R_CandidateScore) {
                $Winer_id = $this->E_creator_id ;
            }elseif ($ResultInfo->E_R_CandidateScore > $ResultInfo->E_R_CreatorScore) {
                $Winer_id = $this->E_candidate_id ;
            }else {
                $Winer_id = -10 ;
            }
            $this->E_winer_id = $Winer_id;

            $this->save();
        }

    }

    /**
     * function to refuse A result for that Event
     */
    public function refuseSuggestedResult($request)
    {
        if (Auth::id() == $this->E_creator_id) {

            $Result = Result::where('E_R_OpinionBy', '=' , $this->E_candidate_id)
                                ->where('E_R_ConfirmBy', '=' , $this->E_creator_id)
                                ->where('E_R_EventId', '=' , $this->id)
                                ->update(['E_R_IsFinalResult' => 1, 'E_R_YesOrNo' => 1]);

            //$Result->E_R_IsFinalResult = 0;
            //$Result->E_R_YesOrNo = 0 ;

        }elseif (Auth::id() == $this->E_candidate_id) {

            $Result = Result::where('E_R_OpinionBy', '=' , $this->E_creator_id)
                                ->where('E_R_ConfirmBy', '=' , $this->E_candidate_id)
                                ->where('E_R_EventId', '=' , $this->id)
                                ->update(['E_R_IsFinalResult' => 1, 'E_R_YesOrNo' => 1]);
            //return $Result ;

            //$Result->E_R_IsFinalResult = 0;
            //$Result->E_R_YesOrNo = 0 ;

        }

        //$Result->save();

    }


}
