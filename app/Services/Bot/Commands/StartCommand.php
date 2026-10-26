<?php

namespace App\Services\Bot\Commands;

use App\Facades\Bale;
use App\Models\BaleAccount;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class StartCommand
{
    public function handle(string|int $chat_id, array $message): void
    {

        $account = BaleAccount::updateOrCreate(
            ['chat_id' => $message['chat']['id'],],
            [
                'username' => $message['from']['username'] ?? null,
                'firstname' => $message['from']['first_name'] ?? null,
                'lastname' => $message['from']['last_name'] ?? null,
                'bot_user_id' => $message['from']['id'],
                'verified_at' => now()
            ]);

        Bale::messages()->sendMessage($chat_id, __('bot.welcome'));

        if ($account->wasChanged()) Log::channel('bot')->info("user {$message['from']['username']} | with chat_id {$chat_id} was started");

        // new user
        if ($account->wasRecentlyCreated) {

            Log::channel('bot')->info("user {$message['from']['username']} | with chat_id {$chat_id} created account in the bot.");


        }


    }

}
