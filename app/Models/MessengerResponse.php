<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessengerResponse extends Model
{
    protected $fillable = [
        'user_id', 'chat_bot_id', 'response_data',
    ];

    // MessengerResponse belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // MessengerResponse belongs to a chat bot
    public function chatBot()
    {
        return $this->belongsTo(ChatBot::class);
    }
}
