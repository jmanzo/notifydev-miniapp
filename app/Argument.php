<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Argument extends Model
{

	protected $fillable = ['event_id', 'field', 'value'	];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
