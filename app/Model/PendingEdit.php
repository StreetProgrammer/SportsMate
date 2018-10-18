<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class PendingEdit extends Model
{
	use Notifiable;
    protected $table = 'pending_edits';

    protected $fillable = [
        'taraget_model_type',
        'taraget_model_id',
        'user_id',
        'display',
        'old_data',
        'new_data',
        'status',
    ];
}
