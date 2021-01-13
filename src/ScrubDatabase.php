<?php

namespace JacobGardiner\Scrubbable;

use HaydenPierce\ClassFinder\ClassFinder;
use Illuminate\Console\Command;

class ScrubDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:scrub';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $factories = ClassFinder::getClassesInNamespace('Database\Factories', ClassFinder::RECURSIVE_MODE);

        $scrubFactories = collect($factories)->filter(fn ($factory) => in_array(Scrubbable::class, class_uses($factory)));

        $scrubFactories->each(function ($factory) {
            $this->info("Scrubbing {$factory}");
            $updateCount = (new $factory)->scrub();
            $this->line("Scrubbed {$updateCount} records");
        });

        return 0;
    }
}
