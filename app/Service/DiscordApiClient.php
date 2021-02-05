<?php

namespace App\Service;

use App\Contracts\DiscordApiContract;
use GuzzleHttp\Client as HttpClient;

class DiscordApiClient implements DiscordApiContract
{
    private HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    public function getWidget()
    {
        $widgetResponse = $this->client->request(
            'GET',
            'widget.json'
        );

        return json_decode($widgetResponse->getBody()->getContents());
    }
}
