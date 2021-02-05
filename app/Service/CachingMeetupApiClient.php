<?php

namespace App\Service;

use App\Contracts\MeetupApiContract;
use Illuminate\Cache\CacheManager;

class CachingMeetupApiClient implements MeetupApiContract
{
    private CacheManager $cache;
    private MeetupApiContract $api;

    public function __construct(CacheManager $cache, MeetupApiContract $api)
    {
        $this->cache = $cache;
        $this->api = $api;
    }

    public function getUpcomingMeetups(int $limit = 5): array
    {
        return $this->cache->remember(
            'meetup-upcoming-meetups',
            600,
            function () {
                return $this->api->getUpcomingMeetups();
            }
        );
    }
}
