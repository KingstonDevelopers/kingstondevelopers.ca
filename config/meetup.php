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
    | Meetup API Key
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */
    
    'api_key' => env('MEETUP_API_KEY', ''),

];
