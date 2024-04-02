<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeTrait extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trait {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new trait.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $traitName = ucfirst($name);
        $directory = app_path('Traits');
        $traitPath = app_path("Traits/{$traitName}.php");

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        if (file_exists($traitPath)) {
            $this->error("Trait {$traitName} already exists!");
            return;
        }

        $content = "<?php\nnamespace App\Traits;\n\ntrait {$traitName}\n{\n\t// write your code.\n}";
        file_put_contents($traitPath, $content);
        $this->info("Trait {$traitName} created successfully.");
    }
}
