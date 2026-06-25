<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    protected $fillable = [
    'invitation_id', 'guest_id', 'guest_name',
    'attendance', 'guest_count', 'message',
    ];
    public function invitation(){
        return $this->belongsTo(Invitation::class);
    }
}
