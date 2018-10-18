<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $table = 'governorates';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'g_en_name', 'g_ar_name', 'g_country_id'
    ];

    
    /**
     * Get the players of this country.
     */
    public function city_players()
    {
        return $this->hasMany(playerProfile::class, 'p_city');
    }

    /**
     * Get the clubs of this country.
     */
    public function city_clubs()
    {
        return $this->hasMany(clubProfile::class, 'c_city');
    }

    /**
     * Get the clubsbranches of this country.
     */
    public function city_branches()
    {
        return $this->hasMany(clubBranche::class, 'c_b_city');
    }

    /**
     * Get the clubsbranches of this country.
     */
    public function city_playgrounds()
    {
        return $this->hasMany(Playground::class, 'c_b_p_city');
    }

    /**
     * Get the country of the governorate.
     */
    public function g_country()
    {
        return $this->belongsTo(country::class, 'g_country_id')->withDefault();
    }

    /**
     * Get the Areas of this city.
     */
    public function Areas()
    {
        return $this->hasMany(area::class, 'a_governorate_id');
    }
}
