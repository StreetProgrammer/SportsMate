<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class vacantTime extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'v_p_user_id',
        'day',
        'from',
        'to',
        'active'
    ];


     /**
     * Get the Day that include the vacant.
     */
    public function Day()
    {
        return $this->belongsTo(Day::class, 'day', 'day_id');
    }

    /**
    * Get the Day that include the vacant.
    */
   public function From()
   {
       return $this->belongsTo(Hour::class, 'from', 'hour_id');
   }

   /**
   * Get the Day that include the vacant.
   */
  public function To()
  {
      return $this->belongsTo(Hour::class, 'to', 'hour_id');
  }


}
