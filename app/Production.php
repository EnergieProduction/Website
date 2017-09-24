<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    function installedPower()
    {
        return $this->belongsTo(InstalledPower::class, 'installed_powers_id');
    }

    public function getVerifiedAttribute() :bool
    {
    	return (bool) $this->attributes['verified'];
    }

    public function getPowerAttribute() :int
    {
    	return (int) $this->attributes['power'];
    }    
}
