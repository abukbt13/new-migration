<?php

namespace YourUsername\LaravelMigrationFields\Providers;

use Illuminate\Support\ServiceProvider;
use YourUsername\LaravelMigrationFields\Console\Commands\CreateMigrationFieldCommand;

class LaravelMigrationFieldsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register the command
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateMigrationFieldCommand::class,
            ]);
        }
    }

    public function register()
    {
        //
    }
}
