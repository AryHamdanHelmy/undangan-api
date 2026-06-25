<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    'invitation_id', 'name', 'start_time', 'end_time',
    'location_name', 'location_address', 'map_url',
    'is_countdown_target', 'notes',
    ];
    public function invitation(){
        return $this->belongsTo(Invitation::class);
    }
}
