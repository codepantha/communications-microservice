<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Message;
use App\User;

class MessageController extends Controller
{
    /**
     * Send a message to subscribers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $channelId
     * @return \Illuminate\Http\Response
     */
    public function sendMessageToSubscribers(Request $request, $channelId)
    {
        // Validate the request (you can customize this based on your requirements)
        $this->validate($request, [
            'user_id' => 'required|uuid', // Assuming you're passing the user_id in the request
            'content' => 'required|string',
        ]);

        // Retrieve the user
        $user = User::findOrFail($request->user_id);

        // Retrieve the channel
        $channel = Channel::findOrFail($channelId);

        // Check if the user is subscribed to the channel
        if (!$user->subscriptionsToChannels()->where('channel_id', $channelId)->exists()) {
            return response()->json(['message' => 'User is not subscribed to the channel.'], 400);
        }

        // Create a new message
        $message = new Message([
            'user_id' => $user->id,
            'channel_id' => $channel->id,
            'content' => $request->content,
        ]);

        $message->save();

        return response()->json(['message' => 'Message sent to subscribers successfully.']);
    }
}
