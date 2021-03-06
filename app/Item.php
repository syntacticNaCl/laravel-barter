<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Item extends Model
{
    use FormAccessible;

    protected $fillable = ['name','quantity', 'description', 'event_id'];

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

    public function availableCount()
    {
        return $this->quantity - $this->claimers->count();
    }

    public function isAvailable()
    {
        return $this->availableCount() >= 0;
    }
}
