<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    public function calendars()
    {
        return $this->hasMany('App\Models\Calendar');
    }
}
