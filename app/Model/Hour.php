<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hour_format',
        'integer_toBeUse',
        'string_toBeUse',
    ];

    /**
     * Get all the vacants start at that hour
     */
    public function from_vacants()
    {
        return $this->hasMany(vacantTime::class, 'from');
    }

    /**
     * Get all the vacants ends at that hour
     */
    public function to_vacants()
    {
        return $this->hasMany(vacantTime::class, 'to');
    }

    /**
     * Get the Reservations starts that hour.
     */
    public function startAtReservations()
    {
        return $this->hasMany(Reservation::class, 'R_from');
    }

    /**
     * Get the Reservations ends that hour.
     */
    public function EndAtReservations()
    {
        return $this->hasMany(Reservation::class, 'R_to');
    }

    /**
     * Get the Events starts that hour.
     */
    public function startAtEvents()
    {
        return $this->hasMany(Event::class, 'E_from');
    }

    /**
     * Get the Events ends that hour.
     */
    public function EndAtEvents()
    {
        return $this->hasMany(Event::class, 'E_to');
    }
}
