<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $fillable = [
    'invitation_id', 'type', 'provider_name',
    'account_number', 'account_holder', 'logo_url',
    ];
    public function invitation(){
        return $this->belongsTo(Invitation::class);
    }
}
