<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PlayerRate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'PR_PlayerId',
        'PR_OpinionBy',
        'PR_EventId',
        'PR_SportId',
        'PR_Rate_1',
        'PR_Rate_2',
        'PR_Rate_3',
        'PR_Rate_4',
        'PR_Rate_5',
        'PR_Rate',
        'PR_Desc',
    ];

}
