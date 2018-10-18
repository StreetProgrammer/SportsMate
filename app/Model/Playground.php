<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Playground extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    				'c_user_id',
    				'c_branch_id',
			        'c_b_p_name',
                    'c_b_p_phone',
			        'c_b_p_desc',
                    'c_b_p_logo',
			        'c_b_p_sport_id',
                    'c_b_p_price_per_hour',
			        'c_b_p_country',
                    'c_b_p_city',
                    'c_b_p_area',
                    'c_b_p_address',
                    'c_b_p_lat',
                    'c_b_p_lng',
			        'slug',
			        'rating',
			        'is_active',
                    'our_is_active',
			        'active_code',
                    'feature1',
                    'feature2',
                    'feature3',
                    'feature4',
                    'feature5',
                    'feature6',
                    'feature7',
                    'feature8',
                    'feature9',
                    'feature10',
    ];

    //###########################################################
    /**
     * used to allow advanced seaarch in [Playground] Model
     */
    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query) ;
    }
    //###########################################################

    /**
     * Get the photos of the playground.
     */
    public function Photos()
    {
        return $this->hasMany(Photo::class, 'owner_id');
    }
    

    /**
     * Get the country of the branch.
     */
    public function country()
    {
        return $this->belongsTo(country::class, 'c_b_p_Country')->withDefault();
    }

    /**
     * Get the city of the branch.
     */
    public function city()
    {
        return $this->belongsTo(governorate::class, 'c_b_p_city')->withDefault();
    }

    /**
     * Get the city of the branch.
     */
    public function area()
    {
        return $this->belongsTo(area::class, 'c_b_p_area')->withDefault();
    }

    /**
     * Get the main **user** that own branches which have this **playgrounds**.
     */
    public function clubUser()
    {
        return $this->belongsTo(User::class, 'c_user_id')->withDefault();
    }

    /**
     * Get the playerProfile record associated with the user.
     */
    public function sport()
    {
        return $this->belongsTo(Sport::class, 'c_b_p_sport_id')->withDefault();
    }

    /**
     * Get the **Branch** that owns the **playgrounds**.
     */
    public function branch()
    {
        return $this->belongsTo(clubBranche::class,'c_branch_id')->withDefault();
    }

    /**
     * Get the Events for this playground
     */
    public function playgroundEvents()
    {
        return $this->hasMany(Event::class, 'E_playground_id');
    }
    /**
     * Get the SubEvents for this playground
     */
    public function playgroundSubEvents()
    {
        return $this->hasMany(SubEvent::class, 'S_E_playground_id');
    }

    /**
     * The expected Events that belong to the user.
     */
     public function expectedEvents()
    {
        return $this->belongsToMany(Event::class)
                    ->withPivot('chosenBy', 'responsedBy', 'yesOrno')
                    ->as('expectedEvents')
                    ->withTimestamps();
    }

    /**
     * Get the playground Reservations for the user  .
     */
    public function PlaygroudReservations()
    {
        return $this->hasMany(Reservation::class, 'R_playground_id');
    }

    /**
     * The users that belong to the plaground as [ managers ].
     */
     public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('active', 'reservations', 'tobeuse')
                    ->as('PlaygroundUsers')
                    ->withTimestamps();
    }
}
