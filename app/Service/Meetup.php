<?php

namespace App\Service;

use DMS\Service\Meetup\MeetupKeyAuthClient;

class Meetup
{
    public function getUpcomingMeetups(int $limit = 5)
    {
        $group_url_name = 'Kingston-Developers'; // TODO: Extract to a config maybe?
        
        // Terrible to pull the config directly.
        $client = MeetupKeyAuthClient::factory(['key' => config('meetup.api_key')]);
        
        $response = $client->getGroupEvents([
                                                'urlname'     => $group_url_name,
                                                'status'      => 'upcoming',
                                                'text_format' => 'plain',
                                                'scroll'      => 'future_or_past',
                                                'fields'      => 'plain_text_no_images_description,rsvp_limit',
                                            ]);
        return $response->getData();
    }
}