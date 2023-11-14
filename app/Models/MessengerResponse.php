<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessengerResponse extends Model
{
    protected $fillable = [
        'user_id', 'chat_bot_id', 'response_data',
    ];

}
