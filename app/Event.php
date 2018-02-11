<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'name', 'location', 'description', 'group_id'
    ];

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
