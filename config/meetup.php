<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cache Results
    |--------------------------------------------------------------------------
    |
    | Whether or not you want to cache the results of the meetup API requests.
    */

    'cache_results' => env('MEETUP_CACHE_RESULTS', false),

    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'api_key' => env('MEETUP_API_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | API Group Name
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'group_name' => env('MEETUP_GROUP_NAME', ''),

    /*
    |--------------------------------------------------------------------------
    | MeetupApi API Key
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'url' => env('MEETUP_API_URL', 'https://api.meetup.com'),

];
