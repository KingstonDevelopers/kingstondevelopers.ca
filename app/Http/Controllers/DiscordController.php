<?php

namespace App\Http\Controllers;

use App\Contracts\DiscordApiContract;
use Illuminate\Cache\CacheManager;

class DiscordController extends Controller
{
    private DiscordApiContract $discord;
    private CacheManager $cache;

    public function __construct(DiscordApiContract $discordApi, CacheManager $cache)
    {
        $this->discord = $discordApi;
        $this->cache = $cache;
    }

    public function badge()
    {
        abort_unless(config('discord.badge.enabled'), 404);

        $widgetJson = $this->discord->getWidget();

        $title = config('discord.badge.title');

        $left = (strlen($title) * 6) + 16;
        if (config('discord.badge.enabled')) {
            $value = $widgetJson->presence_count;
        }
        $width = $left + (strlen($value) * 6) + 10;


        return response()
            ->view(
                'slack.badge',
                [
                    'title' => $title,
                    'color' => config('discord.badge.color'),
                    'value' => $value,
                    'width' => $width,
                    'left' => $left,
                ]
            )
            ->header('Content-Type', 'image/svg+xml');
    }
}
