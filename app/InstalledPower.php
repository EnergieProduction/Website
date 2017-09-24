<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstalledPower extends Model
{
	public $table = 'installed_powers';

    public function getPowerAttribute() :int
    {
    	return (int) $this->attributes['power'];
    }   	
}
