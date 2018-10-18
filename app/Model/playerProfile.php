<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class playerProfile extends Model
{
    	protected $fillable = [
        'p_user_id',
        'p_phone',
        'p_country',
        'p_city',
        'p_area',
        'p_address',
        'p_lat',
        'p_lng',
        'p_gender',
        'p_born_date',
    ];

    public function user()
	{
		return $this->belongsTo(User::class, 'p_user_id');
	}

    /**
     * Get the country of the player.
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'p_country')->withDefault();
    }

    /**
     * Get the city of the player.
     */
    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'p_city')->withDefault();
    }

    /**
     * Get the area of the player.
     */
    public function area()
    {
        return $this->belongsTo(Area::class, 'p_area')->withDefault();
    }

}
