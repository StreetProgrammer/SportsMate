<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day_format',
        'integer_toBeUse',
        'string_toBeUse',
    ];


    /**
     * Get the vacants for that day.
     */
    public function day_vacants()
    {
        return $this->hasMany(vacantTime::class, 'day');
    }

    /**
     * Get the Reservations for that day.
     */
    public function dayReservations()
    {
        return $this->hasMany(Reservation::class, 'R_day');
    }

    /**
     * Get the Events in that day.
     */
    public function dayEvents()
    {
        return $this->hasMany(Event::class, 'E_day');
    }

    /**
     * Get the Challenges in that day.
     */
    public function dayChallenges()
    {
        return $this->hasMany(Challenge::class, 'C_day');
    }
}
