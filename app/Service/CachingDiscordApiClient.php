<?php

namespace App\Service;

use App\Contracts\DiscordApiContract;
use Illuminate\Cache\CacheManager;

class CachingDiscordApiClient implements DiscordApiContract
{
    private CacheManager $cache;
    private DiscordApiContract $api;

    public function __construct(CacheManager $cache, DiscordApiContract $api)
    {
        $this->cache = $cache;
        $this->api = $api;
    }

    public function getWidget()
    {
        return $this->cache->remember(
            'discord-api-get-widget',
            600,
            function () {
                return $this->api->getWidget();
            }
        );
    }
}
