<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = [
        'name',
    ];

    // Channel has many subscription to channels
    public function subscriptionsToChannels()
    {
        return $this->hasMany(SubscriptionToChannel::class);
    }
}
