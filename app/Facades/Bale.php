<?php

namespace App\Facades;

use App\Services\Bale\BaleClient;
use Illuminate\Support\Facades\Facade;


/**
 * @method static MessagesApi messages()
 * * @method static FilesApi files()
 * * @method static array sendMessage(string|int $chatId, string $text, array $options = [])
 * * @method static array editMessageText(string|int $chatId, int $messageId, string $text, array $options = [])
 * *
 * @see BaleClient
 */
class Bale extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return BaleClient::class;
    }

}
