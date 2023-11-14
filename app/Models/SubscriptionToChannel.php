<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionToChannel extends Model
{
    protected $fillable = [
        'user_id', 'channel_id',
    ];

    // SubscriptionToChannel belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // SubscriptionToChannel belongs to a channel
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
