<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatBot extends Model
{
    protected $fillable = [
        'name',
    ];

    // ChatBot has many subscriptions
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    // ChatBot has many messenger responses
    public function messengerResponses()
    {
        return $this->hasMany(MessengerResponse::class);
    }
}
