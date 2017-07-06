<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'provider_id',
        'status', 
        'sg_event_id', 
        'sg_message_id',
        'response', 
        'email',
        'smtp-id', 
        'send_at', 
        'event', 
        'asm_group_id', 
        'reason', 
        'type', 
        'ip', 
        'tls', 
        'cert_err',
        'useragent',
        'url',
        'attempt'
    ];

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
