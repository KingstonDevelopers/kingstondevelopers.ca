<?php

namespace App\Providers;

use App\Contracts\DiscordApi as DiscordApiContract;
use App\Service\CachingDiscordApi;
use App\Service\DiscordApi;
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

        $this->app->singleton(DiscordApiContract::class, CachingDiscordApi::class);

        $this->app
            ->when(CachingDiscordApi::class)
            ->needs(DiscordApiContract::class)
            ->give(DiscordApi::class);

        $this->app->when(DiscordApi::class)
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
