<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id', 'chat_bot_id', 'content',
    ];

    // Message belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Message belongs to a chat bot
    public function chatBot()
    {
        return $this->belongsTo(ChatBot::class);
    }
}
