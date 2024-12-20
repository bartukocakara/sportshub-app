<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateApiPattern extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:api-pattern {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating api pattern';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('make:controller-own', [
            'name' => $this->argument('name'),
        ]);

        $this->call('make:service', [
            'name' => $this->argument('name'),
        ]);

        $this->call('make:repository', [
            'name' => $this->argument('name'),
        ]);

        $this->info('Commands executed successfully.');
    }
}
