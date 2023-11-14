<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatBot;
use App\Subscription;
use App\User;

class UserController extends Controller
{
    /**
     * Subscribe a user to a chat bot.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $chatBotId
     * @return \Illuminate\Http\Response
     */
    public function subscribeToChatBot(Request $request, $chatBotId)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|uuid', // Since we are passing in the user_id in the request
        ]);

        $user = User::findOrFail($request->user_id);

        $chatBot = ChatBot::findOrFail($chatBotId);

        // Check if the user is already subscribed to the chat bot
        if ($user->subscriptions()->where('chat_bot_id', $chatBotId)->exists()) {
            return response()->json(['message' => 'User is already subscribed to the chat bot.'], 400);
        }

        // Subscribe the user to the chat bot
        $subscription = new Subscription([
            'user_id' => $user->id,
            'chat_bot_id' => $chatBot->id,
        ]);

        $subscription->save();

        return response()->json(['message' => 'User subscribed to the chat bot successfully.']);
    }

    /**
     * Subscribe a user to a channel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $channelId
     * @return \Illuminate\Http\Response
     */
    public function subscribeToChannel(Request $request, $channelId)
    {
        // Validate the request 
        $request->validate([
            'user_id' => 'required|uuid', 
        ]);

        $user = User::findOrFail($request->user_id);

        $channel = Channel::findOrFail($channelId);

        // Check if the user is already subscribed to the channel
        if ($user->subscriptionsToChannels()->where('channel_id', $channelId)->exists()) {
            return response()->json(['message' => 'User is already subscribed to the channel.'], 400);
        }

        // Subscribe the user to the channel
        $subscriptionToChannel = new SubscriptionToChannel([
            'user_id' => $user->id,
            'channel_id' => $channel->id,
        ]);

        $subscriptionToChannel->save();

        return response()->json(['message' => 'User subscribed to the channel successfully.']);
    }
}
