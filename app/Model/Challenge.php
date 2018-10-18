<?php

namespace App\Model;

use App\Result ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Challenge extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'C_creator_id',
        'C_candidate_id',
        'C_creator_team',
        'C_candidate_team',
        'C_YesOrNo',
        'C_sport_id',
        'C_playground_id',
        'C_reservation',
        'C_payment_type',
        'C_payment',
        'C_date',
        'C_day',
        'C_from',
        'C_to',
        'C_JQueryFrom',
        'C_JQueryTo',
        'C_result',
        'C_winer_id',

    ];

    protected $casts = [
      'C_result' => 'array',
  ];


    /**
     * Get the creator user record for this Event
     */

    public function creator()
    {
        return $this->belongsTo(User::class, 'C_creator_id');
    }

    /**
     * Get the candidate user record for this Event
     */

    public function candidate()
    {
        return $this->belongsTo(User::class, 'C_candidate_id');
    }


    /**
     * Get the Sport that in this Challenge.
     */
    public function challengeSport()
    {
        return $this->belongsTo(Sport::class, 'C_sport_id');
    }

    /**
     * Get the Playground that in this event.
     */
    public function challengePlayground()
    {
        return $this->belongsTo(Playground::class, 'C_playground_id');
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
    public function ChallengeReservation()
    {
        return $this->hasOne(Reservation::class, 'C_reservation');
    }

    /**
     * Get the Day of that Reservation.
     */
    public function ChallengeDay()
    {
        return $this->belongsTo(Day::class, 'C_day', 'day_id');
    }

    /**
     * Get the start time ( hour ) of that Reservation.
     */
    public function ChallengeFrom()
    {
        return $this->belongsTo(Hour::class, 'C_from', 'hour_id');
    }

    /**
     * Get the end time ( hour ) of that Reservation.
     */
    public function ChallengeTo()
    {
        return $this->belongsTo(Hour::class, 'C_to', 'hour_id');
    }

    /**
     * Get the SubEvents for that event.
     */
    /*public function SubEvents()
    {
        return $this->hasMany(SubEvent::class, 'S_E_Event_id');
    }*/

    /**
     * Get the SubEvents for that challenge.
     */
    public function SubEvents()
    {
        return $this->morphMany(SubEvent::class, 'mainEvent');
    }

    /**
     * Get the reates for that event.
     */
    public function ChallengeRate()
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
    public function SuggestPlayground($request) //final
    {
        if ($this->expectedPlaygrounds->contains($request->playground) == true) {
            // will return some value say that this palyground in suggested playgrounds
        }else{


            // make chossenBy **the player whow choose the playground == the Auth::user**
            $chosenBy = Auth::id() ;

                // here we try to know who is the auth::user
                if ( Auth::id() == $this->C_creator_id ) {
                    // is the Auth::user is the Event creator And ther is candidate user
                    $responsedBy = $this->C_candidate_id ;

                } elseif (Auth::id() == $this->C_candidate_id ) {

                    $responsedBy = $this->C_creator_id ;
                } else{
                    $responsedBy = 0 ;
                }

        	$this->expectedPlaygrounds()->attach($request->playgroundId ,
                [
                    'chosenBy' => $chosenBy ,
                    'responsedBy' => $responsedBy ,
                    'yesOrno' => 0
                ]) ;
          return 'true' ;
        }

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
     * function to Accept Challenge
     */
    public function AcceptChallenge($request)
    {
        $this->C_YesOrNo = 1;

        $this->save();

        return 'true' ;
    }

    /**
     * function to refuse Challenge
     */
    public function RefuseChallenge($request)
    {
        $this->C_YesOrNo = 2;

        $this->save();

        return 'false' ;
    }



    /**
     * function to Suggest A result for that Event
     */
    public function SuggestResult($request)
    {
        if (Auth::id() == $this->C_creator_id) {

            //for insert in Result Model !!

            $Result = new Result;

            $Result->E_R_OpinionBy          =   $this->C_creator_id;
            $Result->E_R_ConfirmBy          =   $this->C_candidate_id;
            $Result->E_R_EventId            =   $this->id;
            $Result->Sport_id               =   $this->C_sport_id;
            $Result->E_R_CreatorScore       =   $request->CreatorScore;
            $Result->E_R_CandidateScore     =   $request->CandidateScore;
            $Result->E_R_IsFinalResult      =   0 ;
            $Result->E_R_event_type         =   1 ;

            $Result->save();



        }elseif (Auth::id() == $this->C_candidate_id) {
            $Result = new Result;

            $Result->E_R_OpinionBy          =   $this->C_candidate_id;
            $Result->E_R_ConfirmBy          =   $this->C_creator_id;
            $Result->E_R_EventId            =   $this->id;
            $Result->Sport_id               =   $this->C_sport_id;
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

            if (Auth::id() == $this->C_creator_id) {

                $Result = Result::where('E_R_OpinionBy', '=' , $this->C_candidate_id)
                                    ->where('E_R_ConfirmBy', '=' , $this->C_creator_id)
                                    ->where('E_R_EventId', '=' , $this->id)
                                    ->update(['E_R_IsFinalResult' => 2, 'E_R_YesOrNo' => 2]);

                $ResultInfo = Result::where('E_R_OpinionBy', '=' , $this->C_candidate_id)
                                    ->where('E_R_ConfirmBy', '=' , $this->C_creator_id)
                                    ->where('E_R_EventId', '=' , $this->id)
                                    ->first();

            }elseif (Auth::id() == $this->C_candidate_id) {

                $Result = Result::where('E_R_OpinionBy', '=' , $this->C_creator_id)
                                    ->where('E_R_ConfirmBy', '=' , $this->C_candidate_id)
                                    ->where('E_R_EventId', '=' , $this->id)
                                    ->update(['E_R_IsFinalResult' => 2, 'E_R_YesOrNo' => 2]);

                $ResultInfo = Result::where('E_R_OpinionBy', '=' , $this->C_creator_id)
                                    ->where('E_R_ConfirmBy', '=' , $this->C_candidate_id)
                                    ->where('E_R_EventId', '=' , $this->id)
                                    ->first();

            }
            //Add Winer to this event !!
            if ($ResultInfo->E_R_CreatorScore > $ResultInfo->E_R_CandidateScore) {
                $Winer_id = $this->C_creator_id ;
            }elseif ($ResultInfo->E_R_CandidateScore > $ResultInfo->E_R_CreatorScore) {
                $Winer_id = $this->C_candidate_id ;
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
        if (Auth::id() == $this->C_creator_id) {

            $Result = Result::where('E_R_OpinionBy', '=' , $this->C_candidate_id)
                                ->where('E_R_ConfirmBy', '=' , $this->C_creator_id)
                                ->where('E_R_EventId', '=' , $this->id)
                                ->update(['E_R_IsFinalResult' => 1, 'E_R_YesOrNo' => 1]);

            //$Result->E_R_IsFinalResult = 0;
            //$Result->E_R_YesOrNo = 0 ;

        }elseif (Auth::id() == $this->C_candidate_id) {

            $Result = Result::where('E_R_OpinionBy', '=' , $this->C_creator_id)
                                ->where('E_R_ConfirmBy', '=' , $this->C_candidate_id)
                                ->where('E_R_EventId', '=' , $this->id)
                                ->update(['E_R_IsFinalResult' => 1, 'E_R_YesOrNo' => 1]);
            //return $Result ;

            //$Result->E_R_IsFinalResult = 0;
            //$Result->E_R_YesOrNo = 0 ;

        }

        //$Result->save();

    }


}
