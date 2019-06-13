<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Room;

class Tag extends Model
{
    public function rooms()
    {
    	return $this->belongsToMany('App\Room');
    }
}
