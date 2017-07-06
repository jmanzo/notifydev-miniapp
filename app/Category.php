<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $fillable = ['event_id', 'field', 'name'	];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
