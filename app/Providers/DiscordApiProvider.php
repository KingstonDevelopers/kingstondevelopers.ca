<?php

namespace App\Providers;

use App\Contracts\DiscordApiContract;
use App\Service\CachingDiscordApiClient;
use App\Service\DiscordApiClient;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class DiscordApiProvider extends ServiceProvider
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

        $this->app->singleton(DiscordApiContract::class, CachingDiscordApiClient::class);

        $this->app
            ->when(CachingDiscordApiClient::class)
            ->needs(DiscordApiContract::class)
            ->give(DiscordApiClient::class);

        $this->app->when(DiscordApiClient::class)
            ->needs(Client::class)
            ->give(
                function ($app) use ($config) {
                    return new Client(
                        [
                            'base_uri' => $config->get('discord.uri') . '/guilds/' . $config->get(
                                    'discord.server_id'
                                ) . '/',
                        ]
                    );
                }
            );
    }
}
