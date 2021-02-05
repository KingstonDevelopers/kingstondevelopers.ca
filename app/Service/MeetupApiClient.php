<?php

namespace App\Service;

use App\Contracts\MeetupApiContract;
use GuzzleHttp\Client;

class MeetupApiClient implements MeetupApiContract
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getUpcomingMeetups(int $limit = 5): array
    {
        $widgetResponse = $this->client->request(
            'GET',
            'events',
            [
                'query' => [
                    'status' => 'past,upcoming',
                    'scroll' => 'recent_past',
                    'fields' => 'plain_text_no_images_description,rsvp_limit,featured_photo',
                ],
            ]
        );

        return json_decode($widgetResponse->getBody()->getContents());
    }
}
