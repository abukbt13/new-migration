<?php

namespace YourUsername\LaravelMigrationFields\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateMigrationFieldCommand extends Command
{
    protected $signature = 'make:migration-field {name} {--type=string}';
    protected $description = 'Create a new migration field';

    public function handle()
    {
        $name = $this->argument('name');
        $type = $this->option('type');

        $stub = $this->getStub($name, $type);

        File::put(database_path("migrations/stubs/{$name}.stub"), $stub);

        $this->info("Migration field {$name} of type {$type} created successfully.");
    }

    protected function getStub($name, $type)
    {
        return "<?php\n\n" .
            "use Illuminate\\Database\\Migrations\\Migration;\n" .
            "use Illuminate\\Database\\Schema\\Blueprint;\n" .
            "use Illuminate\\Support\\Facades\\Schema;\n\n" .
            "class Add{$name}ToTable extends Migration\n" .
            "{\n" .
            "    public function up()\n" .
            "    {\n" .
            "        Schema::table('your_table_name', function (Blueprint \$table) {\n" .
            "            \$table->{$type}('{$name}');\n" .
            "        });\n" .
            "    }\n\n" .
            "    public function down()\n" .
            "    {\n" .
            "        Schema::table('your_table_name', function (Blueprint \$table) {\n" .
            "            \$table->dropColumn('{$name}');\n" .
            "        });\n" .
            "    }\n" .
            "}\n";
    }
}
