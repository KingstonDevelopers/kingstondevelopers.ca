<?php

namespace App\Service;

use App\Contracts\SlackApiContract;
use Illuminate\Cache\CacheManager;

class CachingSlackApiClient implements SlackApiContract
{
    private CacheManager $cache;
    private SlackApiContract $api;

    public function __construct(CacheManager $cache, SlackApiContract $api)
    {
        $this->cache = $cache;
        $this->api = $api;
    }

    public function getTeamLogo(): string
    {
        return $this->cache->remember(
            'slack-team-logo',
            86400,
            function () {
                return $this->api->getTeamLogo();
            }
        );
    }

    public function getMemberCount(): int
    {
        return $this->cache->remember(
            'slack-member-count',
            86400,
            function () {
                return $this->api->getMemberCount();
            }
        );
    }

    public function invite(string $email)
    {
        return $this->api->invite($email);
    }
}
