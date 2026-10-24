<?php

namespace App\Services\Bot;


use App\Services\Bot\Commands\StartCommand;

class BotService
{
    public function __construct(
        private StartCommand $start,
        private CheckInCommand  $checkIn,
//        private CheckOutCommand $checkOut,
    )
    {
    }

    public function handle(array $update):void
    {
        $message = $update['message'] ?? null;

        if (!is_array($message)) return;

        $chatId = $message['chat']['id'];
        $text = $message['text'];

        if ($chatId === null || !is_string($text)) return;

        $user = $message['from'];

        match ($text) {
            '/start' => $this->start->handle($chatId),
            '/checkin' => $this->checkIn->handle($chatId, $user),
//            '/checkout' => $this->checkOut->handle($chatId),
            default => null,
        };
    }

}
