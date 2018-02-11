<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function creator()
    {
        return $this->belongsTo('App\User','creator_id', 'id');
    }

    public function claimers()
    {
        return $this->belongsToMany('App\User', "user_claim", "user_id", "item_id");
    }
}
