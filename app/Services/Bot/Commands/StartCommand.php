<?php

namespace App\Services\Bot\Commands;

use App\Facades\Bale;

class StartCommand
{
    public function handle(string|int $chat_id):void
    {
        Bale::messages()->sendMessage($chat_id,'سلام به ربات ما خوش آمدید');

        // check if Bale account (id) has User in DB
    }

}
