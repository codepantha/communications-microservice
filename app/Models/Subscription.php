<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'user_id', 'chat_bot_id',
    ];

    // Subscription belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Subscription belongs to a chat bot
    public function chatBot()
    {
        return $this->belongsTo(ChatBot::class);
    }
}
