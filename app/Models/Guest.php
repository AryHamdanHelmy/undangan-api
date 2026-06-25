<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['invitation_id', 'name', 'token', 'is_opened'];
    public function invitation(){
        return $this->belongsTo(Invitation::class);
    }
    public function entries(){
        return $this->hasMany(Guestbook::class);
    }
}
