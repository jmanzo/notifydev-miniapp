<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
