<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id', 'name', 'email',
    ];

    // User has many subscriptions
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    // User has many messages
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // User has many messenger responses
    public function messengerResponses()
    {
        return $this->hasMany(MessengerResponse::class);
    }
}
