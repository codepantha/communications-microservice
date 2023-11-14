<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MessengerResponse;
use App\User;
use App\ChatBot;

class WebhookController extends Controller
{
    /**
     * Handle incoming messenger API webhook.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handleMessengerWebhook(Request $request)
    {
        // Validate the incoming request

        // Process the webhook data
        $webhookData = $request->json()->all();

        // Extract relevant information from the webhook data
        $userId = $webhookData['user_id'];
        $chatBotId = $webhookData['chat_bot_id'];
        $responseData = $webhookData['response_data'];

        // Retrieve the user and chat bot
        $user = User::findOrFail($userId);
        $chatBot = ChatBot::findOrFail($chatBotId);

        // Store the messenger response in the database
        $messengerResponse = new MessengerResponse([
            'user_id' => $user->id,
            'chat_bot_id' => $chatBot->id,
            'response_data' => $responseData,
        ]);

        $messengerResponse->save();

        return response()->json(['message' => 'Messenger webhook handled successfully.']);
    }
}
