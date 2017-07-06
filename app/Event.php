<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }

    public function arguments()
    {
        return $this->hasMany('App\Argument');
    }

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function offsets()
    {
        return $this->hasMany('App\Offset');
    }
}
