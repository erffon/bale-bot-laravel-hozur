<?php

namespace App\Services\Bot\Commands;

use App\Facades\Bale;
use App\Models\BaleAccount;

class StartCommand
{
    public function handle(string|int $chat_id,array $message):void
    {
        Bale::messages()->sendMessage($chat_id,__('bot.welcome'));

        // check if Bale account (id) has User in DB
        BaleAccount::create([
            'username'=>$message['from']['username'],
            'chat_id'=>$message['chat']['id'],
            'firstname'=>$message['from']['first_name'] ?? null,
            'lastname'=>$message['from']['last_name'] ?? null,
            'bot_user_id'=>$message['from']['id'],

        ]);

    }

}
