<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'slug',
        'groom_name', 
        'groom_parents', 
        'groom_photo',
        'bride_name', 
        'bride_parents', 
        'bride_photo', 
        'cover_photo',
        'quote_text', 
        'quote_source', 
        'music_url', 
        'theme',
    ];
    public function events(){
        return $this->hasMany(Event::class);
    }
    public function guests(){
        return $this->hasMany(Guest::class); 
    }
    public function guestbook(){
        return $this->hasMany(Guestbook::class);
    }
    public function gifts(){
        return $this->hasMany(Gift::class);
    }
    public function gallery(){
        return $this->hasMany(Gallery::class);
    }
}
