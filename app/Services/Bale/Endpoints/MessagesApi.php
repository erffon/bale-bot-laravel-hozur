<?php

namespace App\Services\Bale\Endpoints;

use App\Services\Bale\BaleTransport;

class MessagesApi
{

    public function __construct(private BaleTransport $transport)
    {
    }

    public function sendMessage(string|int $chat_id, string $text, array $options = []): array
    {
        return $this->transport->post('sendMessage', [
            ...$options,
            'chat_id' => $chat_id,
            'text' => $text,
        ]);

    }

    public function editMessageText(
        string|int $chatId,
        int        $messageId,
        string     $text
    ): array
    {
        return $this->transport->post('editMessageText', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'text' => $text,
        ]);
    }
}
