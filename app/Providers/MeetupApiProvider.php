<?php

namespace App\Providers;

use App\Contracts\MeetupApiContract;
use App\Service\CachingMeetupApiClient;
use App\Service\MeetupApiClient;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class MeetupApiProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $config = $this->app->make('config');

        if ($config->get('meetup.cache_results')) {
            $this->app->singleton(MeetupApiContract::class, CachingMeetupApiClient::class);
        } else {
            $this->app->singleton(MeetupApiContract::class, MeetupApiClient::class);
        }

        $this->app
            ->when(CachingMeetupApiClient::class)
            ->needs(MeetupApiContract::class)
            ->give(MeetupApiClient::class);


        $this->app->when(MeetupApiClient::class)
            ->needs(Client::class)
            ->give(
                function ($app) use ($config) {
                    return new Client(
                        [
                            'base_uri' => $config->get('meetup.url') . '/' . $config->get('meetup.group_name') . '/',
                        ]
                    );
                }
            );
    }
}
