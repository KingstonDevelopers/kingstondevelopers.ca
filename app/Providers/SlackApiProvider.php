<?php

namespace App\Providers;

use App\Contracts\SlackApiContract;
use App\Service\CachingSlackApiClient;
use App\Service\SlackApiClient;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class SlackApiProvider extends ServiceProvider
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

        $this->app->singleton(SlackApiContract::class, CachingSlackApiClient::class);

        $this->app
            ->when(CachingSlackApiClient::class)
            ->needs(SlackApiContract::class)
            ->give(SlackApiClient::class);

        $this->app->when(SlackApiClient::class)
            ->needs(Client::class)
            ->give(
                function ($app) use ($config) {
                    return new Client(
                        [
                            'base_uri' => 'https://' . $config->get('slack.url') . '/api/',
                        ]
                    );
                }
            );
    }
}
