<?php

namespace Abukbt13\ModelMigration\Providers;

use Illuminate\Support\ServiceProvider;
use Abukbt13\ModelMigration\Console\Commands\MakeModelAndMigration;

class MigrationFieldsServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register any bindings, if needed
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeModelAndMigration::class,
            ]);
        }
    }
}
