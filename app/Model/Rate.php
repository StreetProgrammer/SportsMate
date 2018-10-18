<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'event'         => 'App\Event',
    'challenge'     => 'App\Challenge'
]);

class Rate extends Model
{

    public function rateable()
    {
        return $this->morphTo();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'giver_user_id',
        'rated_user_id',
        'rateable_id',
        'rateable_type',
        'Sport_id',
        'Q_1',
        'Q_2',
        'Q_3',
        'Q_4',
        'Q_5',
        'Q_T',
        'comment',
        'integer_to_be_used',
        'string_to_be_used',
        ];

        /**
         * Get the Event of that Rate.
         */
        public function RateEvent()
        {
            return $this->belongsTo(Event::class, 'Event_id')->withDefault();
        }

        /**
         * Get the Sport of that Rate.
         */
        public function RateSport()
        {
            return $this->belongsTo(Sport::class, 'Event_id')->withDefault();
        }

}
