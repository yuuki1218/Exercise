<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['done', 'date'];

    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
