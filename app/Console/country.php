<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'c_en_name', 
        'c_ar_name',
    ];

    

    /**
     * Get the players of this country.
     */
    public function c_players()
    {
        return $this->hasMany(playerProfile::class, 'p_country');
    }

    /**
     * Get the clubs of this country.
     */
    public function c_clubs()
    {
        return $this->hasMany(clubProfile::class, 'c_country');
    }

    /**
     * Get the clubsbranches of this country.
     */
    public function c_branches()
    {
        return $this->hasMany(clubBranche::class, 'c_b_country');
    }

    /**
     * Get the playgrounds of this country.
     */
    public function c_playgrounds()
    {
        return $this->hasMany(Playground::class, 'c_b_p_country');
    }

    /**
     * Get the governorate of this country.
     */
    public function c_cites()
    {
        return $this->hasMany(playerProfile::class, 'p_country');
    }
}
