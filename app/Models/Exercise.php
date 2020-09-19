<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'name'
    ];

    public function calendars()
    {
        return $this->hasMany('App\Models\Calendar');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
