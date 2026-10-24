<?php

namespace App\Services\Bot\Commands;

class CheckInCommand
{
    public function handle(string|int $chat_id, array $user): void
    {
        $user_id = $user['id'];
        $username = $user['username'];

        if (!is_string($chat_id)) return;
        if (!isset($user)) return;

        // check if User exists in DB

    }
}
