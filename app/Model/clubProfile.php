<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class clubProfile extends Model
{
	 
    protected $fillable = [
        'c_user_id', 
        'c_phone',
        'c_country',
        'c_city',
        'c_area',
        'c_address',
        'c_lat', 
        'c_lng',
        'c_desc'
    ];

    /**
     * Get the Owner of the club.
     */
    public function user()
	{
		return $this->belongsTo(User::class, 'c_user_id')->withDefault();
	}

    /**
     * Get the country of the branch.
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'c_country')->withDefault();
    }

    /**
     * Get the city of the branch.
     */
    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'c_city')->withDefault();
    }

    /**
     * Get the city of the branch.
     */
    public function area()
    {
        return $this->belongsTo(Area::class, 'c_area')->withDefault();
    }

    /*/**
     * Get the admins of the club.
     */
   /* public function user()
    {
        return $this->belongsTo(User::class, 'c_user_id')->withDefault();
    }*/


    ////////////////////////////////////////////////////////////////////////
     /**
     * Get the [ admins/manages ] record associated with the club profile.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'club_id', 'c_user_id');
    }
    ////////////////////////////////////////////////////////////////////////
}
