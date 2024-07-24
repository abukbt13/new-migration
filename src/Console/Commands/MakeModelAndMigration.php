<?php

namespace Abukbt13\ModelMigration\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeModelAndMigration extends Command
{
    // The name and signature of the console command.
    protected $signature = 'make:model-migration {name : The name of the model}';

    // The console command description.
    protected $description = 'Create a model and a migration with a single command';

    public function handle()
    {
        $name = $this->argument('name');

        // Generate the model
        Artisan::call('make:model', [
            'name' => $name,
            '--migration' => true, // This will create the migration along with the model
        ]);

        $this->info("Model and migration created for {$name}.");
    }
}
