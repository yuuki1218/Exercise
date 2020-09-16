<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = [
        'exercise_name', 'line', 'lowest_line', 'goal'
    ];

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function records()
    {
        return $this->hasMany('App\Models\Record');
    }

    public function exercise()
    {
        return $this->belongsTo('App\Models\Exercise');
    }
}
