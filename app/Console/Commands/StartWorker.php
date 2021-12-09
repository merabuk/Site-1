<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartWorker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start:worker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for sever cron task shedule';

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
        $this->call('queue:work', ['--max-time' => '2400', '--tries' => '3']);
    }
}
