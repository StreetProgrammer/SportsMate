<?php

namespace App\Model;

//use Illuminate\Auth\Middleware\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Sport extends Model
{
    protected $table = 'sports' ;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ar_sport_name',
        'en_sport_name',
        'sport_desc', 
        'sport_player_num', 
        'sport_img'
    ];

    /**
     * Get the playerProfile record associated with the user.
     */
    public function playgrounds()
    {
        return $this->hasMany(Playground::class, 'c_b_p_sport_id');
    }

	/**
     * The users that belong to the sport.
     */
     public function users()
    {
        return $this->belongsToMany(User::class)
        			->withPivot('as_player', 'as_trainer', 'as_referee','RateInSport')
					->withTimestamps()
					->as('sportUserInfo');
    }

    /**
     * fittering => to return user belong to sport [ must be a player ]
     */
    public function player()
    {
       return $this->belongsToMany(User::class)->wherePivot('as_player', '1');
    }
    /**
     * fittering => to return user belong to sport [ must be a referee ]
     */
    public function referee()
    {
       return $this->belongsToMany(User::class)->wherePivot('as_referee', '1');
    }
    /**
     * fittering => to return user belong to sport [ must be a trainer ]
     */
    public function trainer()
    {
       return $this->belongsToMany(User::class)->wherePivot('as_trainer', '1');
    }


    /**
     * Get the Events for this sport.
     */
    public function sportEvents()
    {
        return $this->hasMany(Event::class, 'E_sport_id');
    }

    /**
     * Get the Events for this sport.
     */
    public function sportChallenges()
    {
        return $this->hasMany(Challenge::class, 'C_sport_id');
    }

    /**
     * Get the SubEvents for this sport.
     */
    public function sportSubEvents()
    {
        return $this->hasMany(SubEvent::class, 'S_E_sport_id');
    }

    /**
     * Get all the rates for this sport.
     */
    public function SportRate()
    {
        return $this->hasMany(Rate::class, 'Sport_id');
    }



    public function AddUser($request)
    {
    	$player  = 0 ;
    	$trainer = 0 ;
    	$referee = 0 ;

    	$request = request() ;

    	if (in_array("Player", $request->roles)) {
		    $player = 1 ;
		}

		if (in_array("Trainer", $request->roles)) {
		    $trainer = 1 ;
		}

		if (in_array("Referee", $request->roles)) {
		    $referee = 1 ;
		}

    	$this->users()->attach(Auth::user()->id ,
    		['as_player' => $player ,
    		'as_trainer' => $trainer ,
    		'as_referee' => $referee
    						]) ;
    }
}
