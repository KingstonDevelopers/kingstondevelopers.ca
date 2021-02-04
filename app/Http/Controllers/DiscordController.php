<?php

namespace App\Http\Controllers;

use App\Service\DiscordApi;
use Illuminate\Cache\CacheManager;

class DiscordController extends Controller
{
    private DiscordApi $discord;
    private CacheManager $cache;

    public function __construct(DiscordApi $discordApi, CacheManager $cache)
    {
        $this->discord = $discordApi;
        $this->cache = $cache;
    }

    public function badge()
    {
        abort_unless(config('discord.badge.enabled'), 404);

        $widgetJson = $this->cache->remember(
            'discord-widget-response',
            60,
            function () {
                return $this->discord->getWidget();
            }
        );

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

    public function invite_link()
    {
        abort_unless(config('discord.badge.enabled'), 404);

        $widgetJson = $this->getWidgetData();

        return $widgetJson->instant_invite;
    }

    private function getWidgetData() {
        return $this->cache->remember(
            'discord-widget-response',
            60,
            function () {
                return $this->discord->getWidget();
            }
        );
    }
}
