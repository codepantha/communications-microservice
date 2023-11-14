<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionToChannel extends Model
{
    protected $fillable = [
        'user_id', 'channel_id',
    ];

}
