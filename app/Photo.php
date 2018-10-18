<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

    protected $fillable = [
        'owner_id',
        'owner_type',
        'path',
        'photo_type',
    ];

    /**
     * Get the playground of the Photo.
     */
    public function photoPlayground()
    {
        return $this->belongsTo(Playground::class, 'owner_id')->withDefault();
    }
}
