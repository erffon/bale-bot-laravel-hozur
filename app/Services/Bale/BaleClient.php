<?php

namespace App\Services\Bale;



use App\Services\Bale\Endpoints\MessagesApi;

class BaleClient
{
    public function __construct(private MessagesApi $messagesApi){}

    public function messages():MessagesApi
    {
        return $this->messagesApi;
    }



}
