<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Community Name
    |--------------------------------------------------------------------------
    |
    | The name of your community / team to display on the join page.
    |
    */
    'community' => env('DISCORD_COMMUNITY_NAME'),

    /*
    |--------------------------------------------------------------------------
    | Discord api URI
    |--------------------------------------------------------------------------
    |
    | You probably will never need to change this.
    |
    */
    'uri' => env('DISCORD_API_URI', 'https://discord.com/api'),

    /*
    |--------------------------------------------------------------------------
    | Discord server id
    |--------------------------------------------------------------------------
    |
    | You can get this by going into your server settings
    | and enabling widgets.
    |
    */
    'server_id' => env('DISCORD_SERVER_ID'),

    /*
    |--------------------------------------------------------------------------
    | Discord Badge
    |--------------------------------------------------------------------------
    |
    | Configure the appearance of the discord Badge.
    | You can access it at /discord/badge.svg once enabled.
    |
    */
    'badge' => [

        'enabled' => env('DISCORD_BADGE_ENABLED', true),

        'presence' => env('DISCORD_ENABLE_PRESENCE', false),

        'title' => env('DISCORD_BADGE_TITLE', 'discord'),

        'color' => env('DISCORD_BADGE_COLOR', '7289DA'),

    ],
];
