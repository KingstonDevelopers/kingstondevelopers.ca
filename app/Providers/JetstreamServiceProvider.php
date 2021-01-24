<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Enum\Permission;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            Permission::CREATE_ANY,
            Permission::READ_ANY,
            Permission::UPDATE_ANY,
            Permission::DELETE_ANY,
            Permission::SENSOR_READING_READ,
            Permission::SENSOR_READING_WRITE,
        ]);
    }
}
