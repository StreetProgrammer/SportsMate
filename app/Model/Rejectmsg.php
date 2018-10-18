<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rejectmsg extends Model
{
    protected $table = 'rejectmsgs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'taraget_id', 'taraget_type', 'reason'
    ];
}
