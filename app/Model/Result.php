<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'E_R_OpinionBy',
        'E_R_ConfirmBy',
        'E_R_EventId',
        'Sport_id',
        'E_R_CreatorScore',
        'E_R_CandidateScore',
        'E_R_IsFinalResult',
        'E_R_WinerId',
        'E_R_event_type',
        'E_R_YesOrNo',
        'string_to_be_used',
    ];

    /**
     * Get the Event of that Rate.
     */
    public function ResultEvent()
    {
        return $this->belongsTo(Event::class, 'E_R_EventId')->withDefault();
    }

    /**
     * Get the Event of that Rate.
     */
    public function ResultSubEvent()
    {
        return $this->belongsTo(SubEvent::class, 'E_R_EventId')->withDefault();
    }
}
