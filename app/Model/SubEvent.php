<?php

namespace App\Model;

use App\Result ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'event'         => 'App\Event',
    'challenge'     => 'App\Challenge'
]);


class SubEvent extends Model
{

        public function mainEvent()
        {
          return $this->morphTo();
        }
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [

            'mainEvent_id', // id for the event contain that SubEvent
            'mainEvent_type', // type for the event contain that SubEvent
            'S_E_creator_id', // SubEvent Creator ID
            'S_E_candidate_id', // SubEvent Candidate ID
            'S_E_creator_team',
            'S_E_candidate_team',
            'S_E_sport_id', // SubEvent Sport ID
            'S_E_playground_id', // SubEvent Playground ID
            'S_E_reservation', // SubEvent Reservation ID
            'S_E_R_CreatorScoreator', // SubEvent Creator Score ID
            'S_E_R_CandidateScoreator',
            'S_E_date',
            'S_E_day',
            'S_E_from',
            'S_E_to',
            'S_E_JQueryFrom',
            'S_E_JQueryTo',
            'S_E_result',
            'S_E_winer_id',

        ];

        protected $casts = [
          'S_E_result' => 'array',
      ];

      /**
       * Get the Main Event this SubEvent
       */

      /*public function MainEvent()
      {
          return $this->belongsTo(Event::class, 'S_E_Event_id');
      }*/

        /**
         * Get the creator user record for this Event
         */

        public function creator()
        {
            return $this->belongsTo(User::class, 'S_E_creator_id')->withDefault();
        }

        /**
         * Get the candidate user record for this Event
         */

        public function candidate()
        {
            return $this->belongsTo(User::class, 'S_E_candidate_id')->withDefault();
        }


        /**
         * Get the Sport that in this event.
         */
        public function subEventSport()
        {
            return $this->belongsTo(Sport::class, 'S_E_sport_id')->withDefault();
        }

        /**
         * Get the Playground that in this event.
         */
        public function subEventPlayground()
        {
            return $this->belongsTo(Playground::class, 'S_E_playground_id')->withDefault();
        }


        /**
         * Get the Day of that Reservation.
         */
        public function EventDay()
        {
            return $this->belongsTo(Day::class, 'S_E_day', 'day_id')->withDefault();
        }

        /**
         * Get the start time ( hour ) of that Reservation.
         */
        public function EventFrom()
        {
            return $this->belongsTo(Hour::class, 'S_E_from', 'hour_id')->withDefault();
        }

        /**
         * Get the end time ( hour ) of that Reservation.
         */
        public function EventTo()
        {
            return $this->belongsTo(Hour::class, 'S_E_to', 'hour_id')->withDefault();
        }

        /**
         * Get the playerProfile record associated with the user.
         */
        /*
        public function playerProfile()
        {
            return $this->hasOne(playerProfile::class, 'p_user_id');
        }
        */

        /**
         * Get the reates for that event.
         */
        public function SubEventResult()
        {
            return $this->hasOne(Result::class, 'E_R_EventId');
        }



        /*
        *function to Suggest a Playground
        */
        /*
        public function SuggestPlayground($request)
        {
            if ($this->expectedPlaygrounds->contains($request->playground) == true) {
                // will return some value say that this palyground in suggested playgrounds
            }else{


                // make chossenBy **the player whow choose the playground == the Auth::user**
                $chosenBy = Auth::id() ;

                    // here we try to know who is the auth::user
                    if ( Auth::id() == $this->S_E_creator_id && $this->S_E_candidate_id != null) {
                        // is the Auth::user is the Event creator And ther is candidate user
                        $responsedBy = $this->S_E_candidate_id ;

                    } elseif (Auth::id() == $this->S_E_candidate_id && $this->S_E_candidate_id != null) {

                        $responsedBy = $this->S_E_creator_id ;
                    } else{
                        $responsedBy = 0 ;
                    }

            	$this->expectedPlaygrounds()->attach($request->playground ,
                    [
                        'chosenBy' => $chosenBy ,
                        'responsedBy' => $responsedBy ,
                        'yesOrno' => 0
                    ]) ;
            }

        }
        */

        /**
         * Accept Suggested Playground
         */
         /*
         public function AcceptSuggestedPlayground($request)
         {
             $this->expectedPlaygrounds()->updateExistingPivot($request->playground_id, [
                                                        'responsedBy' => Auth::id(),
                                                        'yesOrno' => 1
                                                    ]);
         }
         */

         /**
          * refuse Suggested Playground
          */
          /*
          public function refuseSuggestedPlayground($request)
          {
              $this->expectedPlaygrounds()->updateExistingPivot($request->playground_id, [
                                                         'responsedBy' => Auth::id(),
                                                         'yesOrno' => 2
                                                     ]);
          }
          */


        /**
         * The applyers that belong to that event.
         */
         /*
         public function Applicants()
        {
            return $this->belongsToMany(User::class)
                        ->withPivot('as_player', 'as_trainer', 'as_referee')
                        ->as('appliedEventsInfo')
                        ->withTimestamps();
        }
        */

        /**
         * function to apply for that Event
         */
         /*
        public function AddApplicant($request)
        {
        	$this->Applicants()->attach(Auth::user()->id ,
                ['as_player' => 1 ,
                'as_trainer' => 0 ,
                'as_referee' => 0
                                ]) ;
        }
        */

        /**
         * function to Accept Applicant for that Event
         */
         /*
        public function AcceptApplicant($request)
        {
            $this->S_E_candidate_id = $request->accepted;

            $this->save();
        }
        */



        /**
         * function to Suggest A result for that Event
         */
         /*
        public function SuggestResult($request)
        {
            if (Auth::id() == $this->S_E_creator_id) {

                //for insert in Result Model !!

                $Result = new Result;

                $Result->S_E_R_OpinionBy          =   $this->S_E_creator_id;
                $Result->S_E_R_ConfirmBy          =   $this->S_E_candidate_id;
                $Result->Event_id                 =   $this->id;
                $Result->Sport_id                 =   $this->S_E_sport_id;
                $Result->S_E_R_CreatorScore       =   $request->CreatorScore;
                $Result->S_E_R_CandidateScore     =   $request->CandidateScore;
                $Result->S_E_R_IsFinalResult      =   0 ;
                $Result->S_E_R_event_type         =   1 ;

                $Result->save();



            }elseif (Auth::id() == $this->S_E_candidate_id) {
                $Result = new Result;

                $Result->S_E_R_OpinionBy          =   $this->S_E_candidate_id;
                $Result->S_E_R_ConfirmBy          =   $this->S_E_creator_id;
                $Result->Event_id               =   $this->id;
                $Result->Sport_id               =   $this->S_E_sport_id;
                $Result->S_E_R_CreatorScore       =   $request->CreatorScore;
                $Result->S_E_R_CandidateScore     =   $request->CandidateScore;
                $Result->S_E_R_IsFinalResult      =   0 ;
                $Result->S_E_R_event_type         =   1 ;

                $Result->save();
            }
        }
        */

        /**
         * function to Accept A result for that Event
         */
         /*
        public function AcceptSuggestedResult($request)
        {
            $FinalResult = Result::where('Event_id', '=' , $this->id)
                                    ->where('S_E_R_IsFinalResult', '=' , 1)
                                    ->where('S_E_R_YesOrNo', '=' , 2)
                                    ->find(1);

            if($FinalResult == null){

                if (Auth::id() == $this->S_E_creator_id) {

                    $Result = Result::where('S_E_R_OpinionBy', '=' , $this->S_E_candidate_id)
                                        ->where('S_E_R_ConfirmBy', '=' , $this->S_E_creator_id)
                                        ->where('Event_id', '=' , $this->id)
                                        ->update(['S_E_R_IsFinalResult' => 2, 'S_E_R_YesOrNo' => 2]);

                    $ResultInfo = Result::where('S_E_R_OpinionBy', '=' , $this->S_E_candidate_id)
                                        ->where('S_E_R_ConfirmBy', '=' , $this->S_E_creator_id)
                                        ->where('Event_id', '=' , $this->id)
                                        ->first();

                }elseif (Auth::id() == $this->S_E_candidate_id) {

                    $Result = Result::where('S_E_R_OpinionBy', '=' , $this->S_E_creator_id)
                                        ->where('S_E_R_ConfirmBy', '=' , $this->S_E_candidate_id)
                                        ->where('Event_id', '=' , $this->id)
                                        ->update(['S_E_R_IsFinalResult' => 2, 'S_E_R_YesOrNo' => 2]);

                    $ResultInfo = Result::where('S_E_R_OpinionBy', '=' , $this->S_E_creator_id)
                                        ->where('S_E_R_ConfirmBy', '=' , $this->S_E_candidate_id)
                                        ->where('Event_id', '=' , $this->id)
                                        ->first();

                }
                //Add Winer to this event !!
                if ($ResultInfo->S_E_R_CreatorScore > $ResultInfo->S_E_R_CandidateScore) {
                    $Winer_id = $this->S_E_creator_id ;
                }elseif ($ResultInfo->S_E_R_CandidateScore > $ResultInfo->S_E_R_CreatorScore) {
                    $Winer_id = $this->S_E_candidate_id ;
                }else {
                    $Winer_id = -10 ;
                }
                $this->S_E_winer_id = $Winer_id;

                $this->save();
            }

        }
        */

        /**
         * function to refuse A result for that Event
         */
         /*
        public function refuseSuggestedResult($request)
        {
            if (Auth::id() == $this->S_E_creator_id) {

                $Result = Result::where('S_E_R_OpinionBy', '=' , $this->S_E_candidate_id)
                                    ->where('S_E_R_ConfirmBy', '=' , $this->S_E_creator_id)
                                    ->where('Event_id', '=' , $this->id)
                                    ->update(['S_E_R_IsFinalResult' => 1, 'S_E_R_YesOrNo' => 1]);

                //$Result->S_E_R_IsFinalResult = 0;
                //$Result->S_E_R_YesOrNo = 0 ;

            }elseif (Auth::id() == $this->S_E_candidate_id) {

                $Result = Result::where('S_E_R_OpinionBy', '=' , $this->S_E_creator_id)
                                    ->where('S_E_R_ConfirmBy', '=' , $this->S_E_candidate_id)
                                    ->where('Event_id', '=' , $this->id)
                                    ->update(['S_E_R_IsFinalResult' => 1, 'S_E_R_YesOrNo' => 1]);;
                //return $Result ;

                //$Result->S_E_R_IsFinalResult = 0;
                //$Result->S_E_R_YesOrNo = 0 ;

            }

            //$Result->save();

        }
        */


    }
