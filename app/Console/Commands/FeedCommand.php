<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FeedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '...';

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
     * @return mixed
     */
    public function handle()
    {
        // $sources = $this->sourcesRepository->all();
        
        $feedManager = app('App\Managers\Feed\DriverContract');

        $feedManager->productionsOfTheDay();
    }
}
