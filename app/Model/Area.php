<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'a_en_name', 'a_ar_name', 'a_governorate_id'
    ];

    /**
     * Get the players of this country.
     */
    public function a_players()
    {
        return $this->hasMany(playerProfile::class, 'p_area')->withDefault();
    }

    /**
     * Get the clubs of this country.
     */
    public function a_clubs()
    {
        return $this->hasMany(clubProfile::class, 'c_area')->withDefault();
    }

    /**
     * Get the clubsbranches of this country.
     */
    public function a_branches()
    {
        return $this->hasMany(clubBranche::class, 'c_b_area')->withDefault();
    }

    /**
     * Get the clubsbranches of this country.
     */
    public function a_playgrounds()
    {
        return $this->hasMany(Playground::class, 'c_b_p_area')->withDefault();
    }

    /**
     * Get the governorate of the area.
     */
    public function a_Governorate()
    {
        return $this->belongsTo(governorate::class, 'a_governorate_id')->withDefault();
    }
}
