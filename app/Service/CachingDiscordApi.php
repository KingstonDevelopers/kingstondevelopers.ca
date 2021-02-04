<?php

namespace App\Service;

use App\Contracts\DiscordApi as DiscordApiContract;
use Illuminate\Cache\CacheManager;

class CachingDiscordApi implements DiscordApiContract
{
    private CacheManager $cache;
    private DiscordApiContract $baseApi;

    public function __construct(CacheManager $cache, DiscordApiContract $baseApi)
    {
        $this->cache = $cache;
        $this->baseApi = $baseApi;
    }

    public function getWidget()
    {
        return $this->cache->remember(
            'discord-api-get-widget',
            60,
            function () {
                return $this->baseApi->getWidget();
            }
        );
    }
}
