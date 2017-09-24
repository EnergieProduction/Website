<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    function installedPowers()
    {
        return $this->hasMany(InstalledPower::class, 'source_id');
    }
}
