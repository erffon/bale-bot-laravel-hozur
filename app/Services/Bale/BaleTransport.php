<?php

namespace App\Services\Bale;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class BaleTransport
{
    private PendingRequest $http;

    public function __construct()
    {

        $botToken = config('services.bale.token');

        if (!is_string($botToken) || $botToken == '') {
            throw new \RuntimeException('Bot Token is not defined. Bot configuration crashed!');
        }

        $baseUrl = rtrim(config('services.bale.base_url'), "/");

        $this->http = Http::baseUrl("{$baseUrl}/bot{$botToken}/")->acceptJson()->asJson()->timeout(15);
    }

    public function post(string $method, array $data = []): array
    {
        $response = $this->http->post($method, $data)->throw();

        $body = $response->json();

        if (!is_array($body) || ($body['ok'] ?? null) !== true) {
            throw new \RuntimeException(
                is_array($body)
                    ? ($body['description'] ?? 'Bale API error')
                    : 'Invalid Bale API response'
            );
        }

        return $body['result'] ?? $body;
    }
}
